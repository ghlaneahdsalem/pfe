<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('medecin_place.php'); ?>
	<?php
	$id = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM rendez_vous WHERE id = ?");
    $sql->execute([$id]);
    $data = $sql->fetch(PDO::FETCH_ASSOC);
	
    if(isset($_POST['modifier'])){
      $date = !empty($_POST['date']) ? $_POST['date'] : $data['date'];
	  $heure_debut = !empty($_POST['heure_debut']) ? $_POST['heure_debut'] : $data['heure_debut'];
	  $heure_fin = !empty($_POST['heure_fin']) ? $_POST['heure_fin'] : $data['heure_fin'];
	   $jour = !empty($_POST['jour']) ? $_POST['jour'] : $data['jour'];
	    $disponibilite = !empty($_POST['disponibilite']) ? $_POST['disponibilite'] : $data['disponibilite'];
		$nom_medecin=!empty($_POST['nom_medecin']) ? $_POST['nom_medecin'] : $data['nom_medecin'];
		$specialite=!empty($_POST['specialite']) ? $_POST['specialite'] : $data['specialite'];
	    if((!empty($date)) && (!empty($heure_debut)) && (!empty($heure_fin)) && (!empty($disponibilite))){
		  
			   $query = "UPDATE rendez_vous SET nom_medecin=?, specialite=?, date=? , heure_debut=?, heure_fin=? , jour=? , disponibilite=? WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$nom_medecin,$specialite,$date,$heure_debut,$heure_fin,$jour,$disponibilite,$id]);
	   header ("location:mes_disponibilites.php");
	   exit;
	   }
	}
?>
<div id="petite_boite">
<h2 align="center"> modifier disponibilite</h2>
    <form  method="post" enctype="multipart/form-data">
        <label class="form-label" >date</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($data['date']); ?>" />
        <br>
        <label class="form-label">heure_debut</label>
		<input type="time" class="form-control" name="heure_debut" value="<?php echo htmlspecialchars($data['heure_debut']); ?>" /> 
		<br>
		<label class="form-label">heure_fin</label>
		<input type="time" class="form-control" name="heure_fin" value="<?php echo htmlspecialchars($data['heure_fin']); ?>"/> 
		<br>
		<label class="form-label">jour</label>
		<input type="text" class="form-control" name="jour" value="<?php echo htmlspecialchars($data['jour']); ?>"/>
		<br>
		<label class="form-label">disponibilite</label>
		<select class="form-control" name="disponibilite" />
		<option value="oui" <?php if ($data['disponibilite'] == 'oui') echo 'selected'; ?>>oui</option>
		<option value="non" <?php if ($data['disponibilite'] == 'non') echo 'selected'; ?>>non</option>
</select>
<br>
        <label class="form-label">nom_medecin</label>
		<input type="text" class="form-control" name="nom_medecin" value="<?php echo htmlspecialchars($data['nom_medecin']); ?>"/> 
		<br>
		<label class="form-label">specialite</label>
		<input type="text" class="form-control" name="specialite" value="<?php echo htmlspecialchars($data['specialite']); ?>"/> 
		<br>
        <input type="submit" class="btn btn-primary my-2"name="modifier" value="modifier disponibilite">	
    </form>
	</div>
	</body>
	</html>
	</body>
	</html>