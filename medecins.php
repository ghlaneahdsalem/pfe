<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('administrateur.php'); ?>
	<br><br>
	<h2 align="center"> Les Medecins </h2>
	
	<div>

	<table class="table table=striped table-hover" id="grande_boite" border="1px">
  <tr>
  <th>id</th>
  <th>civilite</th>
  <th>nom</th>
  <th> prenom</th>
  <th> specialite </th>
  <th>Email</th>
  <th> image </th>
  <th> Action <th>
  </tr>


  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM medecin')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['id'] ?></td>
            <td><?php echo $value['civilite'] ?></td>
            <td><?php echo $value['nom'] ?></td>
			<td><?php echo $value['prenom'] ?></td>
			<th><?php echo $value['specialite'] ?> </td>
			<td><?php echo $value['Email'] ?></td>
			<td><img src="<?php echo $value['image'] ?>" width="100" ></td>
			<td>
			<a href="modifier_medecin.php?id=<?php echo $value['id']?>" class="btn"><button class="filled-btn">modifier</button></a>
			<a href="supprimer_medecin.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer ');" class="btn">
			<button class="sup-btn">supprimer</button></a>
		<?php
		}
?>
</td>
  </table>
 </div>
		</body>
	</html>