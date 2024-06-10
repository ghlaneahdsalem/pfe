
<?php
  session_start();
  $connect = false ;
  if(isset($_SESSION['user'])){
	  $connect = true;
  }
 
?>

 <html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
        
        ul.menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        ul.menu li {
            float: left;
        }

        ul.menu li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }


        form.search {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        form.search select, 
        form.search input[type="search"] {
            margin-right: 5px;
            padding: 5px;
            font-size: 14px;
            width: 170px; 
        }
		form.search select{
			width: 80px;
		}

        form.search button {
            padding: 6px 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        form.search button:hover {
            background-color: darkblue;
        }
    </style>
	</head>
	<body>
          <ul class="Menu">
		  <?php 
		     if($connect){
				 ?>
		    <li id="Bouton"><a href="secretaire_place.php">Accueil</a></li>
			<li id="bouton"><a href="ajouter_dossier_patient.php">Ajoute dossier patient</a></li>
			<li id="bouton"><a href="gerer_dossiers_patientsS.php">Gerer dossier patient</a></li>
			<li id="Bouton"><a href="liste_patientS.php">listes patients</a></li>
			<li id="Bouton"><a href="liste_rendez_vous.php">liste de rendez_vous prise par patient</a></li>
			<li id="Bouton"><a href="liste_rendez_vous_dispo.php">liste de disponibilites de medecin</a></li>
			<li>
            <form action="recherches.php" method="GET" class="search">
                <select name="categorie" id="categorie">
                    <option value="nom_patient">Nom</option>
                    <option value="prenom_patient">Prénom</option>
                    <option value="num_national">Numéro National</option>
                    <option value="num_telephone">Numéro Téléphone</option>
                    <option value="email">Email</option>
                </select>
                <input type="search" name="critere" placeholder="Entrez le critère de recherche">
                <button type="submit">Rechercher</button>
            </form>
        </li>
			<li id="Bouton"><a href="deconnexion.php">Deconnexion</a></li>
			  <?php
			 }else{
				  header ("location:connexionpagesecretaire.php");
			 }
		 ?>
		</ul>
		
	</body>
	</html>