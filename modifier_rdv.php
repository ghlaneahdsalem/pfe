<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('page_pricipale.php'); ?>
	
	<?php
	$id = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM prise_rendezvous WHERE id = ?");
    $sql->execute([$id]);
    $data = $sql->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['modifier'])){
      $date = !empty($_POST['date']) ? $_POST['date'] : $data['date'];
	  $Heure = !empty($_POST['Heure']) ? $_POST['Heure'] : $data['Heure'];
	  $nom_medecin = !empty($_POST['nom_medecin']) ? $_POST['nom_medecin'] : $data['nom_medecin'];
	  $specialite = !empty($_POST['specialite']) ? $_POST['specialite'] : $data['specialite'];
	  $nom_patient = !empty($_POST['nom_patient']) ? $_POST['nom_patient'] : $data['nom_patient'];
	 
	    if((!empty($date)) && (!empty($Heure)) ){
		  
			   $query = "UPDATE prise_rendezvous SET date=? , Heure=? , nom_medecin=? , specialite=? , nom_patient=? WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$date,$Heure,$nom_medecin,$specialite,$nom_patient,$id]);
	   header ("location:mes_rendezvous.php");}
	}
?>
 <div id="petite_boite">
 <h2 align="center"> modifier rendez-vous</h2>
   <form  method="post" enctype="multipart/form-data" id="formulaire">
        <label class="form-label" >date</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($data['date']); ?>" />
        <br>
        <label class="form-label">heure</label>
		<input type="time" class="form-control" name="heure" value="<?php echo htmlspecialchars($data['Heure']); ?>" /> 
		<br>
		<label class="form-label">nom_medecin</label>
		<input type="text" class="form-control" name="nom_medecin" value="<?php echo htmlspecialchars($data['nom_medecin']); ?>"/>
		<br>
		<label class="form-label">specialite</label>
		<input type="text" class="form-control" name="specialite" value="<?php echo htmlspecialchars($data['specialite']); ?>"/>
		<br>
		<label class="form-label">nom_patient</label>
		<input type="text" class="form-control" name="nom_patient" value="<?php echo htmlspecialchars($data['nom_patient']); ?>"/>
		<br>	

        <input type="submit" class="btn btn-primary my-2"name="modifier" value="modifier rendez-vous">	
    </form>
	</div>
	</body>
	</html>
	</body>
	</html>