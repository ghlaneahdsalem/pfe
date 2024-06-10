<?php
  require_once('db.php');
  $id = $_GET['id'];
  $sqlstate = $pdo->prepare(query: 'DELETE FROM utilisateurs WHERE id=?');
   $supprime = $sqlstate->execute([$id]);
   header ("location:utilisateurs.php");
   ?>