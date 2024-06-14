<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('page_pricipale.php'); ?>
	<br><br><br><br>
	<div>
	<h2 align="center"> Les Medecins </h2>
	<table class="table table=striped table-hover" id="grande_boite" border="1px">
  <tr border="1px">
   <th> Email</th>
  <th> nom_medecin </th>
  <th> specialite </th>
  <th>date</th>
  <th>heure_dabut</th>
  <th>heure_fin</th>
  
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM rendez_vous')->fetchAll(  PDO::FETCH_ASSOC);
		$val = $pdo->query(  'SELECT Email FROM medecin')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($val as $valuee){
		?><tr> <td><?php echo $valuee['Email'] ?></td> <?php
		foreach($values as $value){
			?>
			
			<td><?php echo $value['nom_medecin'] ?></td>
			<td><?php echo $value['specialite'] ?></td>
			<td><?php echo $value['date'] ?></td>
            <td><?php echo $value['heure_debut'] ?></td>
			<td><?php echo $value['heure_fin'] ?></td>
			</tr>
		<?php
		}
		}
		
?>
</tbody>
  </table>
 </div>
		</body>
	</html>