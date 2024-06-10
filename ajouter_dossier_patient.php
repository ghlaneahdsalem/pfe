<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('secretaire_place.php'); ?>
	
	<?php
    if(isset($_POST['ajouter'])){
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
		if(isset($_FILES['photo_analyse'])){
			$image = $_FILES['photo_analyse']['name'];
			$photo_analyse = uniqid().$image;
			move_uploaded_file($_FILES['photo_analyse']['tmp_name'], '' .$photo_analyse);
		}
		$photo_imagerie_medicale = "";
		if(isset($_FILES['photo_imagerie_medicale'])){
			$image = $_FILES['photo_imagerie_medicale']['name'];
			$photo_imagerie_medicale = uniqid().$image;
			move_uploaded_file($_FILES['photo_imagerie_medicale']['tmp_name'], '' .$photo_imagerie_medicale);
		}
		$ordonances = "";
		if(isset($_FILES['ordonances'])){
			$image = $_FILES['ordonances']['name'];
			$ordonances = uniqid().$image;
			move_uploaded_file($_FILES['ordonances']['tmp_name'], '' .$ordonances);
		}
	   $date_naissance = $_POST['date_naissance'];
	   $date_consultation = $_POST['date_consultation'];
	   $jour_consultation = $_POST['jour_consultation'];
	   $descrip_maladie_patient = $_POST['descrip_maladie_patient'];
	   $taille_patient = $_POST['taille_patient'];
	    $poids_patient = $_POST['poids_patient'];
	   if((!empty($date_consultation)) && (!empty($descrip_maladie_patient) ) && (!empty($nom_patient))){
	      require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO dossiers_patients (id,nom_patient,prenom_patient,num_national,date_naissance,date_consultation,
		 jour_consultation,descrip_maladie_patient,taille_patient,poids_patient,num_telephone,email,Adresse,pathologie,allergie,medicament,
		 motif_de_consultation,mutuelle,photo_analyse,photo_imagerie_medicale,
		 ordonances)VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	     $sqlState->execute([$nom_patient,$prenom_patient,$num_national,$date_naissance,$date_consultation,$jour_consultation,$descrip_maladie_patient,
		 $taille_patient,$poids_patient,$num_telephone,$Email,$Adresse,$pathologie,$allergie,$medicament,$motif_de_consultation,$mutuelle,
		$photo_analyse,$photo_imagerie_medicale,$ordonances]);
		 
	    header ("location:gerer_dossiers_patients.php");
	   }
	   else{
	   		   ?>
		  <div class="alert alert-danger" role="alert">
         date_consultaion , descrip_maladie_patient et nom_patient sont obligatoire!
         </div>
		<?php
	   }
	}
?>
<section id="appnt"><br><br><br>
 <div class="container">
 <div id="petite_boite">
 <h2 align="center"> ajouter dossier_patient </h2>
    <form  method="post" enctype="multipart/form-data" id="formulaire">
	 <label class="form-label">nom_patient</label>
		<input type="text" class="form-control" name="nom_patient" /> 
		<br>
		 <label class="form-label">prenom_patient</label>
		<input type="text" class="form-control" name="prenom_patient" /> 
		<br>
		 <label class="form-label">num_telephone</label>
		<input type="number" class="form-control" name="num_telephone" /> 
		<br>
		<label class="form-label">Email</label>
		<input type="Email" class="form-control" name="Email" /> 
		<br>
		<label class="form-label">Adresse</label>
		<input type="text" class="form-control" name="Adresse" /> 
		<br>
		 <label class="form-label">num_national</label>
		<input type="text" class="form-control" name="num_national" /> 
		<br>
        <label class="form-label" >date_naissance</label>
        <input type="date" name="date_naissance" />
        <br>
		<label class="form-label" >date_consultation</label>
        <input type="date" name="date_consultation" />
        <br>
        <label class="form-label">jour_consultation</label>
		<input type="text" class="form-control" name="jour_consultation" /> 
		<br>
		<label class="form-label">descrip_maladie_patient</label>
		<input type="text" class="form-control" name="descrip_maladie_patient"/>
		<br>
		<label class="form-label">taille_patient</label>
		<input type="text" class="form-control" name="taille_patient"/>
		<br>
		<label class="form-label">poids_patient</label>
		<input type="text" class="form-control" name="poids_patient"/>
		<br>
		<label class="form-label">pathologie</label>
		<input type="text" class="form-control" name="pathologie" /> 
		<br>
		<label class="form-label">allergie</label>
		<input type="text" class="form-control" name="allergie" /> 
		<br>
		<label class="form-label">medicament</label>
		<input type="text" class="form-control" name="medicament" /> 
		<br>
		<label class="form-label">motif_de_consultation</label>
		<input type="text" class="form-control" name="motif_de_consultation" /> 
		<br>
		<label class="form-label">mutuelle</label>
		<select name="mutuelle">
		<option>CNOPS</option>
		<option>CNSS</option>
		<option>RMA</option>
		<option>SANLAN</option>
		<option>WAFA ASSURANCE</option>
		<option>FAR</option>
		<option>BANQUE POPULAIRE</option>
		<option>AMO</option>
		</select>
		<br>
		<label class="form-label">analyses</label>
		<input type="file" name="photo_analyse" />
		<br>
		<label class="form-label">photo_imagerie_medicale</label>
		<input type="file" name="photo_imagerie_medicale" >
		<br>
		<label class="form-label">ordonances</label>
		<input type="file" name="ordonances" >
		<br>
        <input type="submit" class="btn btn-primary my-2"name="ajouter" value="ajouter dossier patient">	
    </form>
	</div>
	</div>
	</section>
	</body>
	</html>