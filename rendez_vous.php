<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php 
	require_once('db.php');
	include('medecin_place.php');
	 ?>
	<?php
       $name_medecin = "";
     if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'medecin') {
    $name_medecin = htmlspecialchars($_SESSION['user']['login']);
      }
	  $sql = $pdo->prepare("SELECT * FROM medecin WHERE  prenom = ?");
    $sql->execute([$name_medecin]);
    $data = $sql->fetch(PDO::FETCH_ASSOC);
	
    if(isset($_POST['ajouter'])){
        $date = $_POST['date'];
        $heure_debut = $_POST['heure_debut'];
        $heure_fin = $_POST['heure_fin'];
        $nom_medecin = !empty($_POST['nom_medecin']) ? $_POST['nom_medecin'] : $name_medecin;
		$specialite=!empty($_POST['specialite']) ? $_POST['specialite'] : $data['specialite'];
        if(!empty($date) && !empty($heure_debut) && !empty($heure_fin)  && !empty($nom_medecin)){
            require_once('db.php');
            $sqlState = $pdo->prepare('INSERT INTO rendez_vous (nom_medecin,specialite,date, heure_debut, heure_fin,id) VALUES ( ?, ?,?,?, ?, null)');
            $sqlState->execute([ $nom_medecin,$specialite,$date, $heure_debut, $heure_fin]);
            header("Location: mes_disponibilites.php");
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Date, heure de début, heure de fin, jour et nom du médecin sont obligatoires!
            </div>
            <?php
        }
    }
    ?>
	<section id="appnt">
		<div class="container">
			<div id="petite_boite">
			<h2 align="center "> disponibilité</h2>
				<form method="post" enctype="multipart/form-data" id="formulaire">
					<label class="form-label">Date</label>
					<input type="date" name="date" />
					<br>
					<label class="form-label">Heure de début</label>
					<input type="time" class="form-control" name="heure_debut" /> 
					<br>
					<label class="form-label">Heure de fin</label>
					<input type="time" class="form-control" name="heure_fin" /> 
					<br>
					<label class="form-label">Nom du médecin</label>
					<input type="text" class="form-control" name="nom_medecin" value="<?php echo $name_medecin; ?>"/>
					<br>
					<label class="form-label">specialite</label>
					<input type="text" class="form-control" name="specialite" value="<?php echo htmlspecialchars($data['specialite']);?>">
					<br>
					<input type="submit" class="btn btn-primary my-2" name="ajouter" value="Ajouter disponibilité">	
				</form>
			</div>
		</div>
	</section>
	</body>
</html>
