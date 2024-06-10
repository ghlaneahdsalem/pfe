<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('page_pricipale.php'); ?>
	<br><br><br>
	<h2 align="center"> Mes Rendez-Vous </h2>
	
	<table class="table table=striped table-hover" id="grande_boite" border="1px">
  <tr border="red">
  <th>Date</th>
  <th>Heure</th>
  <th>nom_medecin</th>
  <th> specialite </th>
   <th> nom_patient </th>
   <th> Actions </th>
  </tr>
  </thead>
  <tbody>
  <?php
   $nom_patient = "";
     if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'patient') {
    $nom_patient = htmlspecialchars($_SESSION['user']['login']);
      }
        require_once('db.php');
        $sql = $pdo->prepare(  'SELECT * FROM prise_rendezvous WHERE  nom_patient = ?');
		$sql->execute([$nom_patient]);
		$values = $sql->fetchAll(PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo htmlspecialchars($value['date']); ?></td>
            <td><?php echo htmlspecialchars($value['Heure']); ?></td>
            <td><?php echo htmlspecialchars($value['nom_medecin']); ?></td>
			<td><?php echo htmlspecialchars($value['specialite']); ?></td>
			<td><?php echo htmlspecialchars($value['nom_patient']); ?></td>
			<td >
			<a  href="modifier_rdv.php?id=<?php echo $value['id']?>" class="btn btn-primary"><button class="filled-btn">modifier</button></a>
			<a href="supprimer_rdv.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer ');" class="btn btn-danger ">
			<button class="sup-btn">supprimer</button></a>
			<?php
		}
?>
</td>
</tr>

  </table>
  
	
	</body>
	</html>