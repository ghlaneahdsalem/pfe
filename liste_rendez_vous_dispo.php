<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('secretaire_place.php'); ?>
	<br><br><br>
	<h2 align="center"> Les disponibilites de Medecin </h2>
	<div>
	
	<table class="table table=striped table-hover" id="grande_boite" border="1px">
  <tr border="1px">
  <th>id</th>
  <th>date</th>
  <th>heure_debut</th>
  <th>heure_fin</th>
  <th> nom_medecin </th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM rendez_vous')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['id'] ?></td>
			<td><?php echo $value['date'] ?></td>
            <td><?php echo $value['heure_debut'] ?></td>
			<td><?php echo $value['heure_fin'] ?></td>
			<td><?php echo $value['nom_medecin'] ?></td>
			</tr>
		<?php
		}
?>
</tbody>
  </table>
 </div>
		</body>
	</html>