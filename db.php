<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=PFE", "root", "");
    }
    catch (Exception $e) {
        die("Erreur : ".$e->getMessage());
    }
?>