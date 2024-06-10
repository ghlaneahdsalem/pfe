<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>connexion page | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	 <?php
	include('pageprincipale.php');?>
          <ul class="Menu">
		    <li id="Bouton"><a href="seconnecte.php">connexion</a></li>
			
			<li id="Bouton"><a href="inscription_medecin.php">inscription</a></li>
			
			
		</ul>
		
	</body>
	</html>