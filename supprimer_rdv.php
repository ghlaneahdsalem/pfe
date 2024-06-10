<?php
  require_once('db.php');
  $id = $_GET['id'];
  $sqlstate = $pdo->prepare(query: 'DELETE FROM prise_rendezvous WHERE id=?');
   $supprime = $sqlstate->execute([$id]);
   header ("location:mes_rendezvous.php");
   ?>