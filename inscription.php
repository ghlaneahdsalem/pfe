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
	  $Date_Naissance = $_POST['Date_Naissance'];
	  $lieu_naissance = $_POST['lieu_naissance'];
	  $num_carte_national = $_POST['num_carte_national'];
	  
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
		 if($usertype == 'patient'){
		$sqlState = $pdo->prepare(query:'INSERT INTO patient (id, civilite, nom, prenom, Date_Naissance, lieu_naissance, num_carte_national,image)VALUES (null,?,?,?,?,?,?,?)');
		 $sqlState->execute([$civilite,$nom,$login,$Date_Naissance,$lieu_naissance,$num_carte_national,$image]);}
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
        <label for="Date_Naissance">Date_Naissance:</label>
        <input type="date" name="Date_Naissance" /></br>
		<br>
		<label for="lieu_naissance">lieu_naissance:</label>
        <input type="text" name="lieu_naissance" /></br>
		<label for="num_carte_national">num_carte_national:</label>
        <input type="text" name="num_carte_national" /></br>
        <label for="image">Image:</label>
        <input type="file" name="image" />
		<br>
		 <input type="submit" class="btn btn-primary my-2"name="inscrit" value="inscrit">
    </form>
	</div>
	</body>
	</html>