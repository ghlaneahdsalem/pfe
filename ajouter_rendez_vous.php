<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('secretaire_place.php'); ?>
	<h4> rendez_vous_confirme </h4>
	<?php
    if(isset($_POST['ajouter'])){
      $date = $_POST['date'];
	   $jour = $_POST['jour'];
	   $heure_debut = $_POST['heure_debut'];
	   $heure_fin = $_POST['heure_fin'];
	   $nom_patient = $_POST['nom_patient'];
	   $disponibilite = $_POST['disponibilite'];
	   if((!empty($date)) && (!empty($heure_debut)) && (!empty($jour) ) && (!empty($heure_fin))){
	      require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO rendezvous_confirmee (date,jour,heure_debut,heure_fin,nom_patient,id)VALUES (?,?,?,?,?,null)');
	     $sqlState->execute([$date,$jour,$heure_debut,$heure_fin,$nom_patient]);
		 
	    header ("location:liste_rendez_vous_confirme.php");
	   }
	   else{
		   ?>
		  <div class="alert alert-danger" role="alert">
          date , heure_debut , heure_fin , jour sont obligatoire!
         </div>
		<?php
	   }
	}
?>
<section id="appnt">
 <div class="container">
 <div>
    <form  method="post" enctype="multipart/form-data" id="formulaire">
        <label class="form-label" >date</label>
        <input type="date" name="date" />
        <br>
        <label class="form-label">jour</label>
		<input type="text" class="form-control" name="jour" /> 
		<br>
		<label class="form-label">heure_debut</label>
		<input type="time" class="form-control" name="heure_debut"/>
		<br>
		<label class="form-label">heure_fin</label>
		<input type="time" class="form-control" name="heure_fin"/>
		<br>
		<label class="form-label">nom_patient</label>
		<input type="text" class="form-control" name="nom_patient"/>
		<br>
        <input type="submit" class="btn btn-primary my-2"name="ajouter" value="ajouter un rendez_vous">	
    </form>
	</div>
	</div>
	</section>
	</body>
	</html>