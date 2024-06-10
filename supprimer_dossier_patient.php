 <?php
  require_once('db.php');
  $id = $_GET['id'];
  $sqlstate = $pdo->prepare(query: 'DELETE FROM dossiers_patients WHERE id=?');
   $supprime = $sqlstate->execute([$id]);
   header ("location:gerer_dossiers_patients.php");
   ?>