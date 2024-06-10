<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('administrateur.php'); ?>
	<br><br><br>
	<h2 align="center"> Les Utilisateurs</h2>
	<table class="table table=striped table-hover" id="grande_boite" border="1px">
  <tr border="red">
  <th>id</th>
  <th>login</th>
  <th>password</th>
  <th> usertype </th>
   <th> Actions </th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM utilisateurs')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['id'] ?></td>
            <td><?php echo $value['login'] ?></td>
            <td><?php echo $value['password'] ?></td>
			<td><?php echo $value['usertype'] ?></td>
			<td >
			<a  href="modifier_utilisateur.php?id=<?php echo $value['id']?>" class="btn btn-primary"><button class="filled-btn">modifier</button></a>
			<a href="supprimer_utilisateur.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer ');" class="btn btn-danger ">
			<button class="sup-btn">supprimer</button></a>
			<?php
		}
?>
</td>
</tr>

  </table>
  
	
	</body>
	</html>