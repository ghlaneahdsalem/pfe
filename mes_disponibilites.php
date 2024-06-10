<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('medecin_place.php'); ?>
	<br><br><br>
	<div>
	<h2 align="center">Les disponibilites</h2>
	<table class="table table=striped table-hover" id="grande_boite" border="1px">
  <tr>
  <th> id </th>
  <th>date</th>
  <th>heure_dabut</th>
  <th>heure_fin</th>
  <th> nom_medecin </th>
  <th> action</th>
  </tr>
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
			<td>
			<a href="modifier_dispo.php?id=<?php echo $value['id']?>" class="btn"><button class="filled-btn">modifier</button></a>
			<a href="supprimer_dispo.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer');" class="btn">
			<button class="sup-btn">supprimer</button></a></td>
			</tr>
		<?php
		}
?>
  </table>
 </div>
		</body>
	</html>