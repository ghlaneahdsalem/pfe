<?php
  require_once('db.php');
  $id = $_GET['id'];
  $sqlstate = $pdo->prepare(query: 'DELETE FROM rendezvous_confirmee WHERE id=?');
   $supprime = $sqlstate->execute([$id]);
   header ("location:liste_rendez_vous_confirme.php");
   ?>