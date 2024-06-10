<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifier Dossier Patient | Cabinet médical</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php include('medecin_place.php'); ?>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('db.php');
   

    $id = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM dossiers_patients WHERE id = ?");
    $sql->execute([$id]);
    $data = $sql->fetch(PDO::FETCH_ASSOC);

    if ($data === false) {
        echo "Patient non trouvé.";
        exit;
    }

    if (isset($_POST['modifier'])) {
        $nom_patient = !empty($_POST['nom_patient']) ? $_POST['nom_patient'] : $data['nom_patient'];
        $prenom_patient = !empty($_POST['prenom_patient']) ? $_POST['prenom_patient'] : $data['prenom_patient'];
        $num_national = !empty($_POST['num_national']) ? $_POST['num_national'] : $data['num_national'];
        $num_telephone = !empty($_POST['num_telephone']) ? $_POST['num_telephone'] : $data['num_telephone'];
        $Email = !empty($_POST['Email']) ? $_POST['Email'] : $data['email'];
        $Adresse = !empty($_POST['Adresse']) ? $_POST['Adresse'] : $data['adresse'];
        $pathologie = !empty($_POST['pathologie']) ? $_POST['pathologie'] : $data['pathologie'];
        $allergie = !empty($_POST['allergie']) ? $_POST['allergie'] : $data['allergie'];
        $medicament = !empty($_POST['medicament']) ? $_POST['medicament'] : $data['medicament'];
        $motif_de_consultation = !empty($_POST['motif_de_consultation']) ? $_POST['motif_de_consultation'] : $data['motif_de_consultation'];
        $mutuelle = !empty($_POST['mutuelle']) ? $_POST['mutuelle'] : $data['mutuelle'];
        $date_naissance = !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : $data['date_naissance'];
        $date_consultation = !empty($_POST['date_consultation']) ? $_POST['date_consultation'] : $data['date_consultation'];
        $jour_consultation = !empty($_POST['jour_consultation']) ? $_POST['jour_consultation'] : $data['jour_consultation'];
        $descrip_maladie_patient = !empty($_POST['descrip_maladie_patient']) ? $_POST['descrip_maladie_patient'] : $data['descrip_maladie_patient'];
        $taille_patient = !empty($_POST['taille_patient']) ? $_POST['taille_patient'] : $data['taille_patient'];
        $poids_patient = !empty($_POST['poids_patient']) ? $_POST['poids_patient'] : $data['poids_patient'];

        $photo_analyse = $data['photo_analyse'];
        if (isset($_FILES['photo_analyse']) && $_FILES['photo_analyse']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['photo_analyse']['name'];
            $photo_analyse = uniqid() . $image;
            move_uploaded_file($_FILES['photo_analyse']['tmp_name'], '' . $photo_analyse);
        }

        $photo_imagerie_medicale = $data['photo_imagerie_medicale'];
        if (isset($_FILES['photo_imagerie_medicale']) && $_FILES['photo_imagerie_medicale']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['photo_imagerie_medicale']['name'];
            $photo_imagerie_medicale = uniqid() . $image;
            move_uploaded_file($_FILES['photo_imagerie_medicale']['tmp_name'], '' . $photo_imagerie_medicale);
        }

        $ordonances = $data['ordonances'];
        if (isset($_FILES['ordonances']) && $_FILES['ordonances']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['ordonances']['name'];
            $ordonances = uniqid() . $image;
            move_uploaded_file($_FILES['ordonances']['tmp_name'], '' . $ordonances);
        }

        $sqlState = $pdo->prepare("UPDATE dossiers_patients SET nom_patient=?, prenom_patient=?, num_national=?, date_naissance=?, date_consultation=?, 
        jour_consultation=?, descrip_maladie_patient=?, taille_patient=?, poids_patient=?, num_telephone=?, email=?, Adresse=?, pathologie=?, allergie=?, medicament=?, 
        motif_de_consultation=?, mutuelle=?, photo_analyse=?, photo_imagerie_medicale=?, ordonances=? WHERE id=?");
        $sqlState->execute([$nom_patient, $prenom_patient, $num_national, $date_naissance, $date_consultation, $jour_consultation, $descrip_maladie_patient,
            $taille_patient, $poids_patient, $num_telephone, $Email, $Adresse, $pathologie, $allergie, $medicament, $motif_de_consultation,
            $mutuelle, $photo_analyse, $photo_imagerie_medicale, $ordonances, $id
        ]);

        header("Location: gerer_dossiers_patients.php");
    }
    ?>

    <section id="appnt">
        <div class="container">
            <div id="petite_boite">
                <h2 align="center">Modifier Dossier Patient</h2>
                <form method="post" enctype="multipart/form-data" id="formulaire">
                    <label class="form-label">Nom Patient</label>
                    <input type="text" class="form-control" name="nom_patient" value="<?php echo htmlspecialchars($data['nom_patient']); ?>" />
                    <br>
                    <label class="form-label">Prénom Patient</label>
                    <input type="text" class="form-control" name="prenom_patient" value="<?php echo htmlspecialchars($data['prenom_patient']); ?>" />
                    <br>
                    <label class="form-label">Numéro Téléphone</label>
                    <input type="number" class="form-control" name="num_telephone" value="<?php echo htmlspecialchars($data['num_telephone']); ?>" />
                    <br>
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="Email" value="<?php echo htmlspecialchars($data['email']); ?>" />
                    <br>
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="Adresse" value="<?php echo htmlspecialchars($data['Adresse']); ?>" />
                    <br>
                    <label class="form-label">Numéro National</label>
                    <input type="text" class="form-control" name="num_national" value="<?php echo htmlspecialchars($data['num_national']); ?>" />
                    <br>
                    <label class="form-label">Date de Naissance</label>
                    <input type="date" name="date_naissance" value="<?php echo htmlspecialchars($data['date_naissance']); ?>" />
                    <br>
                    <label class="form-label">Date de Consultation</label>
                    <input type="date" name="date_consultation" value="<?php echo htmlspecialchars($data['date_consultation']); ?>" />
                    <br>
                    <label class="form-label">Jour de Consultation</label>
                    <input type="text" class="form-control" name="jour_consultation" value="<?php echo htmlspecialchars($data['jour_consultation']); ?>" />
                    <br>
                    <label class="form-label">Description de la Maladie</label>
                    <input type="text" class="form-control" name="descrip_maladie_patient" value="<?php echo htmlspecialchars($data['descrip_maladie_patient']); ?>" />
                    <br>
                    <label class="form-label">Taille Patient</label>
                    <input type="text" class="form-control" name="taille_patient" value="<?php echo htmlspecialchars($data['taille_patient']); ?>" />
                    <br>
                    <label class="form-label">Poids Patient</label>
                    <input type="text" class="form-control" name="poids_patient" value="<?php echo htmlspecialchars($data['poids_patient']); ?>" />
                    <br>
                    <label class="form-label">Pathologie</label>
                    <input type="text" class="form-control" name="pathologie" value="<?php echo htmlspecialchars($data['pathologie']); ?>" />
                    <br>
                    <label class="form-label">Allergie</label>
                    <input type="text" class="form-control" name="allergie" value="<?php echo htmlspecialchars($data['allergie']); ?>" />
                    <br>
                    <label class="form-label">Médicament</label>
                    <input type="text" class="form-control" name="medicament" value="<?php echo htmlspecialchars($data['medicament']); ?>" />
                    <br>
                    <label class="form-label">Motif de Consultation</label>
                    <input type="text" class="form-control" name="motif_de_consultation" value="<?php echo htmlspecialchars($data['motif_de_consultation']); ?>" />
                    <br>
                    <label class="form-label">Mutuelle</label>
                    <select name="mutuelle">
                        <option value="CNOPS" <?php if ($data['mutuelle'] == 'CNOPS') echo 'selected'; ?>>CNOPS</option>
                        <option value="CNSS" <?php if ($data['mutuelle'] == 'CNSS') echo 'selected'; ?>>CNSS</option>
                        <option value="RMA" <?php if ($data['mutuelle'] == 'RMA') echo 'selected'; ?>>RMA</option>
                        <option value="SANLAN" <?php if ($data['mutuelle'] == 'SANLAN') echo 'selected'; ?>>SANLAN</option>
                        <option value="WAFA ASSURANCE" <?php if ($data['mutuelle'] == 'WAFA ASSURANCE') echo 'selected'; ?>>WAFA ASSURANCE</option>
                        <option value="FAR" <?php if ($data['mutuelle'] == 'FAR') echo 'selected'; ?>>FAR</option>
                        <option value="BANQUE POPULAIRE" <?php if ($data['mutuelle'] == 'BANQUE POPULAIRE') echo 'selected'; ?>>BANQUE POPULAIRE</option>
                        <option value="AMO" <?php if ($data['mutuelle'] == 'AMO') echo 'selected'; ?>>AMO</option>
                    </select>
                    <br>
                    <label class="form-label">Analyses</label>
                    <input type="file" name="photo_analyse" />
                    <br>
                    <label class="form-label">Imagerie Médicale</label>
                    <input type="file" name="photo_imagerie_medicale" />
                    <br>
                    <label class="form-label">Ordonances</label>
                    <input type="file" name="ordonances" />
                    <br>
                    <input type="submit" class="btn btn-primary my-2" name="modifier" value="Modifier un Dossier Patient">
                </form>
            </div>
        </div>
    </section>
</body>
</html>