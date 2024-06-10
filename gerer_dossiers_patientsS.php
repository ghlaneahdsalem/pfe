<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('secretaire_place.php'); ?>
	<br><br><br>
	<h2 align="center"> Les Dossiers De Patients</h2>
	<div>
	
		<form method="post" enctype="multipart/form-data">
	<table class="table table=striped table-hover" id="grande_boite">
 
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM dossiers_patients')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<th><strong>id :</strong></th>
			<td><?php echo $value['id'] ?></td></tr>
			<tr>
				<th><strong>nom_patient :</strong></th>
			<td><?php echo $value['nom_patient'] ?></td></tr>
			<tr>
			<th><strong>prenom_patient :</strong></th>
            <td><?php echo $value['prenom_patient'] ?></td></tr>
			<tr>
				 <th><strong>num_national :</strong></th>
            <td><?php echo $value['num_national'] ?></td></tr>
			<tr>
			<th><strong>numero telephone : </strong></th>
			<td><?php echo $value['num_telephone'] ?></td></tr>
			<tr>
			<th><strong>Email :</strong></th>
			<td><?php echo $value['email'] ?></td></tr>
			<tr>
			<th><strong>date_naissance :</strong></th>
			<td><?php echo $value['date_naissance'] ?></td></tr>
			<tr>
			<th><strong>Adresse :</strong></th>
			<td><?php echo $value['Adresse'] ?></td></tr>
			<tr>
			<th><strong>taille_patient :</strong></th>
			<td><?php echo $value['taille_patient'] ?></td></tr>
			<tr>
			<th><strong>poids_patient :</strong></th>
			<td><?php echo $value['poids_patient'] ?></td></tr>
			<tr>
			<th><strong> pathologie :</strong></th>
			<td><?php echo $value['pathologie'] ?></td></tr>
			<tr>
			<th><strong>allergie</strong></th>
			<td><?php echo $value['allergie'] ?></td></tr>
			<tr>
			<th><strong>medicament :</strong> </th>
			<td><?php echo $value['medicament'] ?></td></tr>
			<tr>
			<th><strong>motif de consultation</strong></th>
			<td><?php echo $value['motif_de_consultation'] ?></td></tr>
			<tr>
			<th><strong>mutuelle:</strong></th>
			<td><?php echo $value['mutuelle'] ?></td></tr>
			<tr>
			<th><strong>les analyses :</strong></th>
			<td><?php echo $value['photo_analyse'] ?></td></tr>
			<tr>
			<th><strong>type Imagerie medicale:</strong></th>
			<td><?php echo $value['photo_imagerie_medicale'] ?></td></tr>
			<tr>
			<th><strong>les ordonnances:</strong></th>
			<td><?php echo $value['ordonances'] ?></td></tr>
			<tr>
			<th><strong>date_consultation:</strong></th>
			<td><?php echo $value['date_consultation'] ?></td></tr>
			<tr>
			<th><strong>jour_consultation :</strong></th>
			<td><?php echo $value['jour_consultation'] ?></td></tr>
			<tr>
			<th><strong>descrip_maladie_patient :</strong></th>
			<td><?php echo $value['descrip_maladie_patient'] ?></td></tr>
			<tr>
			<th><strong>action:</strong></th>
			<td>
			<button class="filled-btn"><a href="modifier_dossier_patient.php?id=<?php echo $value['id']?>" class="btn">modifier</a></button>
			<button class="sup-btn"><a href="supprimer_dossier_patient.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer');" class="btn">
			supprimer</a></button></td>
			</tr >
			<br><br>
			
		<?php
		}
?>

 
  </table>
  
  </form>
 </div>
		</body>
	</html>