<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('secretaire_place.php'); ?>
	<h4> ajouter rendez_vous </h4> 
	<?php
    if(isset($_POST['ajouter'])){
      $date = $_POST['date'];
	   $heure = $_POST['heure'];
	    $nom_medecin = $_POST['nom_medecin'];
	   $nom_patient = $_POST['nom_patient'];
	   $specialite = $_POST['specialite'];
	   if((!empty($date)) && (!empty($heure) )){
	      require_once('db.php');
	     $sqlState1 = $pdo->prepare("INSERT INTO prise_rendezvous (date, heure, nom_medecin, specialite, nom_patient) VALUES (?, ?, ?, ?, ?)");
                    $sqlState1->execute([$date, $heure, $nom_medecin, $specialite, $nom_patient]);
		 
	    header ("location:liste_rendez_vous.php");
	   }
	   else{
		   ?>
		  <div class="alert alert-danger" role="alert">
          date , heure sont obligatoire!
         </div>
		<?php
	   }
	}
?>
<section id="appnt">
        <br><br><br>
        <div id="petite_boite">
            <div>
                <h2 align="center">Ajouter rendez-vous</h2>
    <form  method="post" enctype="multipart/form-data" id="formulaire">
        <label class="form-label" >date</label>
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
        <input type="text" class="form-control" name="nom_patient" />
        <br>
        <input type="submit" class="btn btn-primary my-2"name="ajouter" value="ajouter un rendez_vous">	
    </form>
	</div>
	</div>
	</section>
	</body>
	</html>