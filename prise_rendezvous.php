<html>
<head>
    <meta charset="utf-8">
    <title>Accueil | Cabinet médical</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php 
    require_once('db.php');
    include('page_pricipale.php');
    session_start();
    
    $prenom_patient = "";
    if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'patient') {
        $prenom_patient = htmlspecialchars($_SESSION['user']['login']);
    }

    if (isset($_POST['ajouter'])) {
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $specialite = $_POST['specialite'];
        $nom_patient = !empty($_POST['nom_patient']) ? $_POST['nom_patient'] : $prenom_patient;

        if (isset($_POST['nom_medecin'])) {
            $nom_medecin = $_POST['nom_medecin'];
            require_once('db.php');
            $sqlState = $pdo->prepare("SELECT heure_debut, heure_fin FROM rendez_vous WHERE nom_medecin = ?");
            $sqlState->execute([$nom_medecin]);
            $req = $sqlState->fetchAll(PDO::FETCH_ASSOC);
            $disponible = false;
            foreach ($req as $row) {
                if ($heure >= $row['heure_debut'] && $heure <= $row['heure_fin']) {
                    $disponible = true;
                    break;
                }
            }
            if ($disponible) {
                if (!empty($date) && !empty($heure)) {
                    $sqlState1 = $pdo->prepare("INSERT INTO prise_rendezvous (date, heure, nom_medecin, specialite, nom_patient) VALUES (?, ?, ?, ?, ?)");
                    $sqlState1->execute([$date, $heure, $nom_medecin, $specialite, $nom_patient]);
                    echo '<script type="text/javascript"> 
                        window.onload = function () { 
                            alert("Votre rendez-vous a été pris avec succès."); 
                            window.location.href = "mes_rendezvous.php";  
                        }; 
                    </script>';
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Date, heure et jour sont obligatoires!
                    </div>
                    <?php
                }
            } else {
                echo '<script type="text/javascript"> 
                        window.onload = function () { 
                            alert("Veuillez choisir une heure entre '.$row['heure_debut'].' et '.$row['heure_fin'].' "); 
                            window.location.href = "prise_rendezvous.php";  
                        }; 
                    </script>'; 
            }
        }
    }
    ?>
    <section id="appnt">
        <br><br><br>
        <div id="petite_boite">
            <div>
                <h2 align="center">Prise de rendez-vous</h2>
                <form method="post" enctype="multipart/form-data" id="formulaire">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" />
                    <br>
                    <label class="form-label">Heure</label>
                    <input type="time" class="form-control" name="heure" />
                    <br>
                    <label class="form-label">Nom du médecin</label>
                    <input type="text" class="form-control" name="nom_medecin"/>
                    <br>
                    <label class="form-label">Spécialité</label>
                    <input type="text" class="form-control" name="specialite"/>
                    <br>
                    <label class="form-label">Nom du patient</label>
                    <input type="text" class="form-control" name="nom_patient" value="<?php echo $prenom_patient; ?>"/>
                    <br>
                    <input type="submit" class="btn btn-primary my-2" name="ajouter" value="Prise de rendez-vous">
                </form>
            </div>
        </div>
    </section>
</body>
</html>