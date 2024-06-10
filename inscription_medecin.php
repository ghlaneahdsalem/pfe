<html>
	<head>
		<meta charset="utf-8">
		<title>connexion page | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php
   if(isset($_POST['inscrit'])){
      $login = $_POST['login'];
	  $pwd = $_POST['password'];
	  $usertype = $_POST['usertype'];
	  $civilite = $_POST['civilite'];
	  $nom = $_POST['nom'];
	  $specialite = $_POST['specialite'];
	  $Email = $_POST['email'];
	  
	  $image="";
		if(isset($_FILES['image'])){
			$imagee = $_FILES['image']['name'];
			$image = uniqid().$imagee;
			move_uploaded_file($_FILES['image']['tmp_name'], '' .$image);
		}
	  if((!empty($login)) && (!empty($pwd)) && (!empty($usertype))){
	     require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO utilisateurs (id, login, password, usertype)VALUES (null,?,?,?)');
		 $sqlState->execute([$login,$pwd,$usertype]);
		 if($usertype == 'medecin'){
		$sqlState = $pdo->prepare(query:'INSERT INTO medecin (id, civilite, nom, prenom, image, specialite, Email)VALUES (null,?,?,?,?,?,?)');
		 $sqlState->execute([$civilite,$nom,$login,$image,$specialite,$Email]);}
		 header ("location:seconnecte.php");
		 
    }
	  
	  else{
	     ?>
		 <div class="alert alert-danger" role="alert">
         login et password et obligatoire!
         </div>
		 <?php
	  }
   }
?>
<div id="petite_boite">
<h2 align="center"> inscription </h2>
  <form  method="post" >
        <label for="login">Entrez un login:</label>
        <input type="text" name="login" />
        <br>
        <label for="password">Entre a password:</label>
        <input type="password" name="password" />
		<br>
        <label >select votre usertype:</label>
		<select name="usertype">
		<option><option>
		<option>patient<option>
		<option>medecin<option>
		<option>secretaire<option>
		</select>	
		<br>
        <label for="civilite">Civilite:</label>
        <select  name="civilite" />
		<option><option>
		<option>Homme<option>
		<option>Femme<option>
		</select>
		<br>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" />
		<br>
        <label for="specialite">Specialite:</label>
        <input type="text" name="specialite" /></br>
		<br>
        <label for="image">Image:</label>
        <input type="file" name="image" />
		<br>
        <label for="email">Email:</label>
        <input type="email" name="email" /></br>
		
		 <input type="submit" class="btn btn-primary my-2"name="inscrit" value="inscrit">
    </form>
	</div>
	</body>
	</html>