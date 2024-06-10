<html>
<head>
    <meta charset="utf-8">
    <title>Accueil | Cabinet médical</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php 
    session_start();
    require_once('db.php');

    $id = $_GET['id'];
    // Récupérer les valeurs existantes depuis la base de données
    $sql_select = "SELECT * FROM dossiers_patients WHERE id = ?";
    $stmt_select = $pdo->prepare($sql_select);
    $stmt_select->execute([$id]);
    $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $nom_patient = $row['nom_patient'];
        $prenom_patient = $row['prenom_patient'];
        $num_national = $row['num_national'];
        $num_telephone = $row['num_telephone'];
        $Email = $row['email'];
        $Adresse = $row['Adresse'];
        $pathologie = $row['pathologie'];
        $allergie = $row['allergie'];
        $medicament = $row['medicament'];
        $motif_de_consultation = $row['motif_de_consultation'];
        $mutuelle = $row['mutuelle'];
        $photo_analyse = $row['photo_analyse'];
        $photo_imagerie_medicale = $row['photo_imagerie_medicale'];
        $ordonances = $row['ordonances'];
        $date_naissance = $row['date_naissance'];
        $date_consultation = $row['date_consultation'];
        $jour_consultation = $row['jour_consultation'];
        $descrip_maladie_patient = $row['descrip_maladie_patient'];
        $taille_patient = $row['taille_patient'];
        $poids_patient = $row['poids_patient'];
    }

    if (isset($_POST['ajouter'])) {
        $nom_patient = $_POST['nom_patient'];
        $prenom_patient = $_POST['prenom_patient'];
        $num_national = $_POST['num_national'];
        $num_telephone = $_POST['num_telephone'];
        $Email = $_POST['Email'];
        $Adresse = $_POST['Adresse'];
        $pathologie = $_POST['pathologie'];
        $allergie = $_POST['allergie'];
        $medicament = $_POST['medicament'];
        $motif_de_consultation = $_POST['motif_de_consultation'];
        $mutuelle = $_POST['mutuelle'];
        $photo_analyse = "";
        if (isset($_FILES['photo_analyse'])) {
            $image = $_FILES['photo_analyse']['name'];
            $photo_analyse = uniqid() . $image;
            move_uploaded_file($_FILES['photo_analyse']['tmp_name'], '' . $photo_analyse);
        }
        $photo_imagerie_medicale = "";
        if (isset($_FILES['photo_imagerie_medicale'])) {
            $image = $_FILES['photo_imagerie_medicale']['name'];
            $photo_imagerie_medicale = uniqid() . $image;
            move_uploaded_file($_FILES['photo_imagerie_medicale']['tmp_name'], '' . $photo_imagerie_medicale);
        }
        $ordonances = "";
        if (isset($_FILES['ordonances'])) {
            $image = $_FILES['ordonances']['name'];
            $ordonances = uniqid() . $image;
            move_uploaded_file($_FILES['ordonances']['tmp_name'], '' . $ordonances);
        }
        $date_naissance = $_POST['date_naissance'];
        $date_consultation = $_POST['date_consultation'];
        $jour_consultation = $_POST['jour_consultation'];
        $descrip_maladie_patient = $_POST['descrip_maladie_patient'];
        $taille_patient = $_POST['taille_patient'];
        $poids_patient = $_POST['poids_patient'];

        // Récupérer les anciennes valeurs pour les champs concaténés
        $sql_select = "SELECT * FROM dossiers_patients WHERE id = $id";
        $stmt_select = $pdo->query($sql_select);
        $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

       $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if (!empty($date_consultation)) {
                $date_consultation = $row['date_consultation'] . ', ' . $date_consultation;
            }
            if (!empty($jour_consultation)) {
                $jour_consultation = $row['jour_consultation'] . ', ' . $jour_consultation;
            }
            if (!empty($descrip_maladie_patient)) {
                $descrip_maladie_patient = $row['descrip_maladie_patient'] . ', ' . $descrip_maladie_patient;
            }
            if (!empty($pathologie)) {
                $pathologie = $row['pathologie'] . ', ' . $pathologie;
            }
            if (!empty($allergie)) {
                $allergie = $row['allergie'] . ', ' . $allergie;
            }
            if (!empty($medicament)) {
                $medicament = $row['medicament'] . ', ' . $medicament;
            }
            if (!empty($motif_de_consultation)) {
                $motif_de_consultation = $row['motif_de_consultation'] . ', ' . $motif_de_consultation;
            }
            if (!empty($mutuelle)) {
                $mutuelle = $row['mutuelle'] . ', ' . $mutuelle;
            }
            if (!empty($photo_analyse)) {
                $photo_analyse = $row['photo_analyse'] . ', ' . $photo_analyse;
            }
            if (!empty($photo_imagerie_medicale)) {
                $photo_imagerie_medicale = $row['photo_imagerie_medicale'] . ', ' . $photo_imagerie_medicale;
            }
            if (!empty($ordonances)) {
                $ordonances = $row['ordonances'] . ', ' . $ordonances;
            }
        }

        $sqlState = $pdo->prepare("UPDATE dossiers_patients SET nom_patient=?, prenom_patient=?, num_national=?, date_naissance=?, date_consultation=?, 
            jour_consultation=?, descrip_maladie_patient=?, taille_patient=?, poids_patient=?, num_telephone=?, email=?, Adresse=?, pathologie=?, allergie=?, medicament=?, 
            motif_de_consultation=?, mutuelle=?, photo_analyse=?, photo_imagerie_medicale=?, ordonances=? WHERE id=?");
        $stmt_update = $sqlState->execute([$nom_patient, $prenom_patient, $num_national, $date_naissance, $date_consultation, $jour_consultation, $descrip_maladie_patient,
            $taille_patient, $poids_patient, $num_telephone, $Email, $Adresse, $pathologie, $allergie, $medicament, $motif_de_consultation,
            $mutuelle, $photo_analyse, $photo_imagerie_medicale, $ordonances, $id]);

        if ($stmt_update) {
            header("Location: gerer_dossiers_patients.php");
            echo "Les informations ont été ajoutées avec succès.";
        } else {
            echo "Erreur lors de l'ajout des informations.";
        }
    }
    ?>
    <section id="appnt">
        <br><br><br>
        <div class="container">
            <div id="petite_boite">
                <h2 align="center">Ajouter Nouvelle consultation</h2>
                <form method="post" enctype="multipart/form-data" id="formulaire">
                    <label class="form-label">Nom du patient</label>
                    <input type="text" class="form-control" name="nom_patient" value="<?php echo $nom_patient; ?>" />
                    <br>
                    <label class="form-label">Prénom du patient</label>
                    <input type="text" class="form-control" name="prenom_patient" value="<?php echo $prenom_patient; ?>" />
                    <br>
                    <label class="form-label">Numéro de téléphone</label>
                    <input type="number" class="form-control" name="num_telephone" value="<?php echo $num_telephone; ?>" />
                    <br>
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="Email" value="<?php echo $Email; ?>" />
                    <br>
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="Adresse" value="<?php echo $Adresse; ?>" />
                    <br>
                    <label class="form-label">Numéro National</label>
                    <input type="text" class="form-control" name="num_national" value="<?php echo $num_national; ?>" />
                    <br>
                    <label class="form-label">Date de naissance</label>
                    <input type="date" name="date_naissance" value="<?php echo $date_naissance; ?>" />
                    <br>
                    <label class="form-label">Date de consultation</label>
                    <input type="date" name="date_consultation" value="<?php echo $date_consultation; ?>" />
                    <br>
                    <label class="form-label">Jour de consultation</label>
                    <input type="text" class="form-control" name="jour_consultation" value="<?php echo $jour_consultation; ?>" />
                    <br>
                    <label class="form-label">Description de la maladie</label>
                    <input type="text" class="form-control" name="descrip_maladie_patient" value="<?php echo $descrip_maladie_patient; ?>" />
                    <br>
                    <label class="form-label">Taille du patient</label>
                    <input type="text" class="form-control" name="taille_patient" value="<?php echo $taille_patient; ?>" />
                    <br>
                    <label class="form-label">Poids du patient</label>
                    <input type="text" class="form-control" name="poids_patient" value="<?php echo $poids_patient; ?>" />
                    <br>
                    <label class="form-label">Pathologie</label>
                    <input type="text" class="form-control" name="pathologie" value="<?php echo $pathologie; ?>" />
                    <br>
                    <label class="form-label">Allergie</label>
                    <input type="text" class="form-control" name="allergie" value="<?php echo $allergie; ?>" />
                    <br>
                    <label class="form-label">Médicament</label>
                    <input type="text" class="form-control" name="medicament" value="<?php echo $medicament; ?>" />
                    <br>
                    <label class="form-label">Motif de consultation</label>
                    <input type="text" class="form-control" name="motif_de_consultation" value="<?php echo $motif_de_consultation; ?>" />
                    <br>
                    <label class="form-label">Mutuelle</label>
                    <select name="mutuelle">
                        <option <?php if ($mutuelle == 'CNOPS') echo 'selected'; ?>>CNOPS</option>
                        <option <?php if ($mutuelle == 'CNSS') echo 'selected'; ?>>CNSS</option>
                        <option <?php if ($mutuelle == 'RMA') echo 'selected'; ?>>RMA</option>
                        <option <?php if ($mutuelle == 'SANLAN') echo 'selected'; ?>>SANLAN</option>
                        <option <?php if ($mutuelle == 'WAFA ASSURANCE') echo 'selected'; ?>>WAFA ASSURANCE</option>
                        <option <?php if ($mutuelle == 'FAR') echo 'selected'; ?>>FAR</option>
                        <option <?php if ($mutuelle == 'BANQUE POPULAIRE') echo 'selected'; ?>>BANQUE POPULAIRE</option>
                        <option <?php if ($mutuelle == 'AMO') echo 'selected'; ?>>AMO</option>
                    </select>
                    <br>
                    <label class="form-label">Photo analyse</label>
                    <input type="file" class="form-control" name="photo_analyse" />
                    <br>
                    <label class="form-label">Photo imagerie médicale</label>
                    <input type="file" class="form-control" name="photo_imagerie_medicale" />
                    <br>
                    <label class="form-label">Ordonances</label>
                    <input type="file" class="form-control" name="ordonances" />
                    <br>
                    <input type="submit" name="ajouter" value="Ajouter une nouvelle consultation">
                </form>
            </div>
        </div>
    </section>
</body>
</html>