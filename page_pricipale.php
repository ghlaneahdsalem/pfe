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
		    <li id="Bouton"><a href="page_acceuil.php">Accueil</a></li>
			<li id="Bouton"><a href="disponibilite_de_medecin.php">les medecins</a></li>
			<li id="Bouton"><a href="prise_rendezvous.php">prise randez_vous</a></li>
			<li id="Bouton"><a href="mes_rendezvous.php">mes randez_vous</a></li>
			<li>
			<br>
            <form action="search.php" method="GET" class="search">
                <select name="categorie" id="categorie">
				<option></option>
				<option value="Id">Id</option>
                    <option value="nom_medecin">Nom</option>
                    <option value="specialite">specialite</option>
                </select>
                <input type="search" name="critere" placeholder="Entrez le critère de recherche">
                <button type="submit">Rechercher</button>
            </form>
        </li>
		<li id="Bouton"><a href="deconnexion.php">Deconnexion</a></li>
		 <?php
			 }else{
				 header("location:connexionpage.php");
				 
			 }
		 ?>
		</ul>
		
	</body>
	</html>