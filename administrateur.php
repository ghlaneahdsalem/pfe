<?php
  session_start();
  $connect = false ;
  if(isset($_SESSION['admin'])){
	  $connect = true;
  }
 
?>
 <html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
          <ul class="Menu">
		  <?php
		    if($connect){
				?>
		    <li id="Bouton"><a href="administrateur.php">Accueil</a></li>
			
			<li id="Bouton"><a href="medecins.php">listes Médecins</a></li>
			<li id="Bouton"><a href="patients.php">listes patients</a></li>
			<li id="Bouton"><a href="secretaires.php">listes secretaires</a></li>
			<li id="Bouton"><a href="ajouter_medecin.php">ajouter medecin</a></li>
			<li id="Bouton"><a href="ajouter_secretaire.php">ajouter secretaire</a></li>
			<li id="Bouton"><a href="utilisateurs.php">les utilisateurs</a></li>
			<li id="Bouton"><a href="deconnexion_admin.php">Deconnexion</a></li>
			<?php
			}else{
			header("location:connexion_admin.php");}
			?>
		</ul>
		
	</body>
	</html>
	
	