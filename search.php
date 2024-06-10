<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Résultats de recherche | Cabinet médical</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php include('page_pricipale.php'); ?>
<br><br><br><br>
<div>
<h2 align="center">Résultats de recherche</h2>
    <table class="table table=striped table-hover" id="grande_boite" border="1px">
        <thead>
  <tr border="1px" >
  <th> nom_medecin </th>
  <th> specialite </th>
  <th>date</th>
  <th>heure_dabut</th>
  <th>heure_fin</th>
  <th> disponibilite </th>
  </tr>
  </thead>
  <tbody>
        <?php
        require_once('db.php');

        if (isset($_GET['categorie'])&& isset($_GET['critere'])) {
            $categorie = $_GET['categorie'];
            $critere = $_GET['critere'];

            // Utiliser des requêtes préparées pour éviter les injections SQL
            $stmt = $pdo->prepare("SELECT * FROM rendez_vous WHERE $categorie LIKE ?");
            $stmt->execute(['%' . $critere . '%']);
            $values = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($values as $value) {
                ?>
                <tr>
			<td><?php echo $value['nom_medecin'] ?></td>
			<td><?php echo $value['specialite'] ?></td>
			<td><?php echo $value['date'] ?></td>
            <td><?php echo $value['heure_debut'] ?></td>
			<td><?php echo $value['heure_fin'] ?></td>
			<td><?php echo $value['disponibilite'] ?></td>
			</tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='24'>Veuillez entrer des critères de recherche.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
