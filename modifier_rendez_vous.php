<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('secretaire_place.php'); ?>
	<h4> modifier rendez_vous</h4>
	<?php
    if(isset($_POST['modifier'])){
      $date = $_POST['date'];
	  $jour = $_POST['jour'];
	   $heure_debut = $_POST['heure_debut'];
	   $heure_fin = $_POST['heure_fin'];
	   $nom_patient = $_POST['nom_patient'];
	    if((!empty($date)) && (!empty($heure_debut)) && (!empty($heure_fin)) && (!empty($jour))){
		  
			   $query = "UPDATE rendezvous_confirmee SET date=? , jour=? , heure_debut=? , heure_fin=? nom_patient=? WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$date,$jour,$heure_debut,$heure_fin,$nom_patient,$id]);
	   header ("location:liste_rendez_vous_confirme.php");}
	}
?>

    <form  method="post" enctype="multipart/form-data">
        <label class="form-label" >date</label>
        <input type="date" name="date" />
        <br>
        <label class="form-label">jour</label>
		<input type="text" class="form-control" name="jour" /> 
		<br>
		<label class="form-label">heur_debut</label>
		<input type="time" class="form-control" name="heure_debut"/>
		<br>
		<label class="form-label">heure_fin</label>
		<input type="time" class="form-control" name="heure_fin"/>
		<br>
		<label class="form-label">nom_patient</label>
		<input type="text" class="form-control" name="nom_patient"/>
		<br>
        <input type="submit" class="btn btn-primary my-2"name="modifier" value="modifier rendez_vous">	
    </form>
	
	</body>
	</html>
	</body>
	</html>