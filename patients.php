 <html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('administrateur.php'); ?>
	<br><br>
	<h2 align="center"> les patients </h2>
	<div>
	
	<table class="table table=striped table-hover" id="grande_boite" border="1px">
	
  <tr>
  <th>id</th>
  <th>civilite</th>
  <th>nom</th>
  <th> prenom</th>
  <th>Date_Naissance</th>
  <th>lieu_naissance</th>
  <th>num_carte_national </th>
  <th> image </th>
   <th> Action </th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM patient')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['id'] ?></td>
            <td><?php echo $value['civilite'] ?></td>
            <td><?php echo $value['nom'] ?></td>
			<td><?php echo $value['prenom'] ?></td>
			<td><?php echo $value['Date_Naissance'] ?></td>
			<td><?php echo $value['lieu_naissance'] ?></td>
			<td><?php echo $value['num_carte_national'] ?></td>
			<td><img src="<?php echo $value['image'] ?>" width="50" ></td>
			<td><a href="modifier_patient.php?id=<?php echo $value['id']?>" class="btn"><button class="filled-btn">modifier</button></a>
			<a href="supprimer_patientA.php?id=<?php echo $value['id']?>" class="btn"><button class="sup-btn">supptimer</button></a></td>
			
		<?php
		}
?>
</tbody>
  </table>
 </div>
		</body>
	</html>