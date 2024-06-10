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
	$id = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM patient WHERE id = ?");
    $sql->execute([$id]);
    $data = $sql->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['modifier'])){
      $civilite = $_POST['civilite'];
	  $nom = !empty($_POST['nom']) ? $_POST['nom'] : $data['nom'];
	  $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : $data['prenom'];
      $Date_Naissance = !empty($_POST['Date_Naissance']) ? $_POST['Date_Naissance'] : $data['Date_Naissance'];
	  $lieu_naissance = !empty($_POST['lieu_naissance']) ? $_POST['lieu_naissance'] : $data['lieu_naissance'];
	  $num_carte_national = !empty($_POST['num_carte_national']) ? $_POST['num_carte_national'] : $data['num_carte_national'];
	  $filename = $data['image'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], '' . $filename);
        }
	    if((!empty($nom)) && (!empty($prenom)) ){
		  
			   $query = "UPDATE patient SET civilite=? , nom=? , prenom=? , Date_Naissance=? , lieu_naissance=? , num_carte_national=? , image=? WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$civilite,$nom,$prenom,$Date_Naissance,$lieu_naissance,$num_carte_national,$filename,$id]);
	   header ("location:patients.php");}
	}
?>
 <div id="petite_boite">
 <h2 align="center"> modifier patient</h2>
    <form  method="post" enctype="multipart/form-data">
        <label class="form-label" >civilite</label>
        <select class="form-control" name="civilite" >
		<option value="" <?php if ($data['civilite'] == '') echo 'selected'; ?>  ></option>
		<option value="Homme" <?php if ($data['civilite'] == 'Homme') echo 'selected'; ?>>Homme</option>
		<option value="Femme" <?php if ($data['civilite'] == 'Femme') echo 'selected'; ?>>Femme</option>
		<option value="Enfant" <?php if ($data['civilite'] == 'Enfant') echo 'selected'; ?>>Enfant</option>
		</select>
        <br>
        <label class="form-label">nom</label>
		<input type="text" class="form-control" name="nom" value="<?php echo htmlspecialchars($data['nom']); ?>"/> 
		<br>
		<label class="form-label">prenom</label>
		<input type="text" class="form-control" name="prenom" value="<?php echo htmlspecialchars($data['prenom']); ?>">
		<br>
		<label class="form-label">Date_Naissance</label>
		<input type="date" class="form-control" name="Date_Naissance" value="<?php echo htmlspecialchars($data['Date_Naissance']); ?>">
		<br>
		<label class="form-label">lieu_naissance</label>
		<input type="text" class="form-control" name="lieu_naissance" value="<?php echo htmlspecialchars($data['lieu_naissance']); ?>">
		<br>
		<label class="form-label">num_carte_national</label>
		<input type="text" class="form-control" name="num_carte_national" value="<?php echo htmlspecialchars($data['num_carte_national']); ?>">
		<br>
		<label class="form-label">image</label>
		<input type="file" class="form-control" name="image">
		<br>
        <input type="submit" class="btn btn-primary my-2"name="modifier" value="modifier patient">	
    </form>
	</div>
	</body>
	</html>
	</body>
	</html>