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
    $sql = $pdo->prepare("SELECT * FROM medecin WHERE id = ?");
    $sql->execute([$id]);
    $data = $sql->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['modifier'])){
      $civilite = $_POST['civilite'];
	  $nom = !empty($_POST['nom']) ? $_POST['nom'] : $data['nom'];
	   $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : $data['prenom'];
	   $specialite = !empty($_POST['specialite']) ? $_POST['specialite'] : $data['specialite'];
		$Email = !empty($_POST['Email']) ? $_POST['Email'] : $data['Email'];
		$filename = $data['image'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], '' . $filename);
        }
	    if((!empty($civilite)) && (!empty($nom)) && (!empty($prenom))){
		   if(!empty($filename)){
			   $query = "UPDATE medecin SET civilite=? , nom=? , prenom=? , specialite=? , Email=? , image=? WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$civilite,$nom,$prenom,$specialite,$Email,$filename,$id]);
	   
	   }
	   else{
		     $query = "UPDATE medecin SET civilite=? , nom=? , specialite=? , Email=? , prenom=?  WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$civilite,$nom,$specialite,$Email,$prenom,$id]);
	   
	   }
	   header ("location:medecins.php");}
	   else{
		   ?>
		  <div class="alert alert-danger" role="alert">
         civilite , nom, prenom sont obligatoire!
         </div>
		<?php
	   }
	}
?>
 <div id="petite_boite">
 <h2 align="center"> modifier medecin</h2>
    <form  method="post" enctype="multipart/form-data">
        <label class="form-label" >civilite</label>
        <select class="form-control" name="civilite"  >
		<option value="" <?php if ($data['civilite'] == '') echo 'selected'; ?> ></option>
		<option value="Homme" <?php if ($data['civilite'] == 'Homme') echo 'selected'; ?>>Homme</option>
		<option value="Femme" <?php if ($data['civilite'] == 'Femme') echo 'selected'; ?>>Femme</option>
		</select>
        <br>
        <label class="form-label">nom</label>
		<input type="text" class="form-control" name="nom" value="<?php echo htmlspecialchars($data['nom']); ?>"/> 
		<br>
		<label class="form-label">prenom</label>
		<input type="text" class="form-control" name="prenom" value="<?php echo htmlspecialchars($data['prenom']); ?>"/>
		<br>
		<label class="form-label">specialite</label>
		<input type="text" class="form-control" name="specialite" value="<?php echo htmlspecialchars($data['specialite']); ?>"/>
		<label class="form-label">Email</label>
		<input type="text" class="form-control" name="Email" value="<?php echo htmlspecialchars($data['Email']); ?>"/>
		<br>
		<label class="form-label">image</label>
		<input type="file" class="form-control" name="image"/>
		
        <input type="submit" class="btn btn-primary my-2"name="modifier" value="modifier medecin">	
    </form>
	</div>
	</body>
	</html>
	</body>
	</html>