<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('secretaire_place.php'); ?>
	<div>
	<table class="table table=striped table-hover" id="grande_boite">
  <tr>
  <th>id</th>
  <th>date</th>
  <th>jour</th>
  <th>heure_debut</th>
  <th> heure_fin </th>
  <th> nom_patient </th>
  <th> Action </th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM rendezvous_confirmee')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td> <?php echo $value['id'] ?> </td>
			<td> <?php echo $value['date'] ?> </td>
            <td> <?php echo $value['jour'] ?> </td>
            <td> <?php echo $value['heure_debut'] ?> </td>
			<td> <?php echo $value['heure_fin'] ?> </td>
			<td> <?php echo $value['nom_patient'] ?> </td>
			<td>
			<a href="modifier_rendez_vous.php?id=<?php echo $value['id']?>" class="btn">modifier</a>
			<a href="supprimer_rendez_vous.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer');" class="btn">supprimer</a></td>
			</tr>
		<?php
		}
?>
</tbody>
  </table>
 </div>
		</body>
	</html>