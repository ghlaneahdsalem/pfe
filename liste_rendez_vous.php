 <html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('secretaire_place.php'); ?>
	<br><br>
	<div>
	<h2 align="center"> Les rendez-vous Prise Par patient </h2>
	<table class="table table=striped table-hover" id="grande_boite" border="1px">
  <tr border="1px">
  <th>date</th>
  <th>heure</th>
  <th> nom_medecin </th>
  <th>specialite</th>
  <th> nom_patient </th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM prise_rendezvous')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['date'] ?></td>
            <td><?php echo $value['Heure'] ?></td>
			<td><?php echo $value['nom_medecin'] ?></td>
			<td><?php echo $value['specialite'] ?></td>
			<td><?php echo $value['nom_patient'] ?></td>
			</tr>
		<?php
		}
?>
</tbody>
  </table>
 </div>
		</body>
	</html>