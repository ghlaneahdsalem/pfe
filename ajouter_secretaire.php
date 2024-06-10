<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('administrateur.php'); ?>
	
	<?php
    if(isset($_POST['ajouter'])){
      $civilite = $_POST['civilite'];
	  $nom = $_POST['nom'];
	   $prenom = $_POST['prenom'];
		$filename="";
		if(isset($_FILES['image'])){
			$image = $_FILES['image']['name'];
			$filename = uniqid().$image;
			move_uploaded_file($_FILES['image']['tmp_name'], '' .$filename);
		}
	   if((!empty($civilite)) && (!empty($nom)) && (!empty($prenom) )){
	      require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO secretaire (id,civilite,nom,prenom,image)VALUES (null,?,?,?,?)');
	     $sqlState->execute([$civilite,$nom,$prenom,$filename]);
		 
	    header ("location:secretaires.php");
	   }
	   else{
		   ?>
		  <div class="alert alert-danger" role="alert">
         civilite , nom, prenom sont obligatoire!
         </div>
		<?php
	   }
	}
?>
<div id="petite_boite">
<h2 align="center"> ajouter secretaire</h2>
    <form  method="post" enctype="multipart/form-data" >
        <label class="form-label" >civilite</label>
        <select  name="civilite" >
			<option>femme</option>
			<option>homme</option></select>
        <br>
        <label class="form-label">nom</label>
		<input type="text" class="form-control" name="nom" /> 
		<br>
		<label class="form-label">prenom</label>
		<input type="text" class="form-control" name="prenom"/>
		<br>
		<label class="form-label">image</label>
		<input type="file" class="form-control" name="image"/>
		
        <input type="submit" class="btn btn-primary my-2"name="ajouter" value="ajouter secretaire">	
    </form>
	</div>
	</body>
	</html>