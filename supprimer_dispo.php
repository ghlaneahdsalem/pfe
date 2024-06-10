<?php
  require_once('db.php');
  $id = $_GET['id'];
  $sqlstate = $pdo->prepare(query: 'DELETE FROM rendez_vous WHERE id=?');
   $supprime = $sqlstate->execute([$id]);
   header ("location:mes_disponibilites.php");
   ?>