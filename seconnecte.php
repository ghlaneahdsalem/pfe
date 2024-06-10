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
   if(isset($_POST['connexion'])){
      $login = $_POST['login'];
	  $pwd = $_POST['password'];
	  if((!empty($login)) && (!empty($pwd))){
	     require_once('db.php');
	    $sqlState = $pdo->prepare(query:'SELECT * FROM  utilisateurs WHERE login=? AND password=?');
		 $sqlState->execute([$login,$pwd]);
		 if($sqlState->rowCount()>=1){
		$_SESSION['user']= $sqlState->fetch();
		 header("location:authentifier.php");
		 } else{
	     ?>
		 <div class="alert alert-danger" role="alert">
         login ou password incorrectes!
         </div>
		 <?php
	  }
 }
	  else{
	     ?>
		 <div class="alert alert-danger" role="alert">
         login et password est obligatoire!
         </div>
		 <?php
	  }
   }
   ?>

<div id="petite_boite">
<h2 align="center"> connexion </h2>
  <form  method="post" >
        <label for="login">Entrez un login:</label>
        <input type="text" name="login" />
        <br>
        <label for="password">Entre a password:</label>
        <input type="password" name="password" /></br>
        
        <input type="submit" class="btn btn-primary my-2"name="connexion" value="connexion">	
    </form>
	</div>
	</body>
	</html>