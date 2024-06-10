<?php
  require_once('db.php');
  $id = $_GET['id'];
  $sqlstate = $pdo->prepare(query: 'DELETE FROM patient WHERE id=?');
   $supprime = $sqlstate->execute([$id]);
  header ("location:liste_patientS.php");
   ?>