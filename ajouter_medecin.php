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
	   $specialite = $_POST['specialite'];
	   $Email = $_POST['Email'];
		$filename="";
		if(isset($_FILES['image'])){
			$image = $_FILES['image']['name'];
			$filename = uniqid().$image;
			move_uploaded_file($_FILES['image']['tmp_name'], '' .$filename);
		}
	   if((!empty($civilite)) && (!empty($nom)) && (!empty($prenom) )){
	      require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO medecin (id,civilite,nom,prenom,image,specialite,Email)VALUES (null,?,?,?,?,?,?)');
	     $sqlState->execute([$civilite,$nom,$prenom,$filename,$specialite,$Email]);
		 
	    header ("location:medecins.php");
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
<section id="appnt">
 <div class="container">
 <div id="petite_boite">
 <h2 align="center"> Ajouter Medecin</h2>
    <form  method="post" enctype="multipart/form-data" id="formulaire">
        <label class="form-label" >civilite</label>
        <select  name="civilite" >
			<option>femme</option>
			<option>homme</option>
			</select>
        <br>
        <label class="form-label">nom</label>
		<input type="text" class="form-control" name="nom" /> 
		<br>
		<label class="form-label">prenom</label>
		<input type="text" class="form-control" name="prenom"/>
		<br>
		<label class="form-label">image</label>
		<input type="file" class="form-control" name="image"/>
		<br>
		<label class="form-label">specialite</label>
		<input type="text" class="form-control" name="specialite"/>
		<br>
		<label class="form-label">Email</label>
		<input type="email" class="form-control" name="Email"/>
        <input type="submit" class="btn btn-primary my-2"name="ajouter" value="ajouter medecin">	
    </form>
	</div>
	</div>
	</section>
	</body>
	</html>