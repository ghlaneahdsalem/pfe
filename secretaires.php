<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('administrateur.php'); ?>
	
	<br><br><br>
	<h2 align="center"> Les Secretaires </h2>
	<table class="table table=striped table-hover" id="grande_boite" border="1px">
  <tr>
  <th>id</th>
  <th>civilite</th>
  <th>nom</th>
  <th> prenom</th>
  <th> image </th>
  <th> Action </th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM secretaire')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['id'] ?></td>
            <td><?php echo $value['civilite'] ?></td>
            <td><?php echo $value['nom'] ?></td>
			<td><?php echo $value['prenom'] ?></td>
			<td><img src="<?php echo $value['image'] ?>" width="50" ></td>
			<td >
			<a href="modifier_secretaire.php?id=<?php echo $value['id']?>" class="btn btn-primary"><button class="filled-btn"  >modifier</button></a>
			<a href="supprimer_secretaire.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer ');" class="btn btn-danger "><button class="sup-btn"  >
			supprimer</button></a>
			<?php
		}
?>
</tbody>
  </table>

	</body>
	</html>