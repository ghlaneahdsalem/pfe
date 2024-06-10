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
    $sql = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $sql->execute([$id]);
    $data = $sql->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['modifier'])){
      $login = !empty($_POST['login']) ? $_POST['login'] : $data['login'];
	  $password = !empty($_POST['password']) ? $_POST['password'] : $data['password'];
	  $usertype = $_POST['usertype'];
	    if((!empty($login)) && (!empty($password)) && (!empty($usertype)) ){
		  
			   $query = "UPDATE utilisateurs SET login=? , password=? , usertype=? WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$login,$password,$usertype,$id]);
	   header ("location:utilisateurs.php");}
	}
?>
 <div id="petite_boite">
 <h2 align="center"> modifier utilisateurs</h2>
    <form  method="post" enctype="multipart/form-data">
        <label class="form-label" >login</label>
        <input type="text" name="login" value="<?php echo htmlspecialchars($data['login']); ?>" />
        <br>
        <label class="form-label">password</label>
		<input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($data['password']); ?>" /> 
		<br>
		<label class="form-label">usertype</label>
		<select class="form-control" name="usertype">
		<option value="" <?php if ($data['usertype'] == '') echo 'selected'; ?> ></option>
		<option value="Medecin" <?php if ($data['usertype'] == 'Medecin') echo 'selected'; ?>>Medecin</option>
		<option value="Secretaire" <?php if ($data['usertype'] == 'Secretaire') echo 'selected'; ?>>Secretaire</option>
		<option value="Patient" <?php if ($data['usertype'] == 'Patient') echo 'selected'; ?>>Patient</option>
		</select>
		<br>
        <input type="submit" class="btn btn-primary my-2"name="modifier" value="modifier utilisateurs">	
    </form>
	</div>
	</body>
	</html>
	</body>
	</html>