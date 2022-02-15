<?php
session_start();
require 'class.php';
    
    $id = $_GET['id'] ?? "";
    $contenu = $_GET['contenu'] ?? ""; 
    $auteur = $_GET['auteur'] ?? "";
    $categorie = $_GET['categorie'] ?? "";

    $auteurs = $_SESSION['id'];


    $A = $pdo->query("SELECT id From publications where id= ' " .$id. "' " );
    $A->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Publication');
    $B = $A->fetch();

    if ($B == TRUE) {

       $A = $pdo->query("UPDATE publications  SET contenu = '".$contenu."', auteur = '".$auteurs."', categorie = '".$categorie."' WHERE id = '".$id."' ");

 
    }
    else 
    {
        $A = $pdo->query("INSERT INTO publications VALUES ('".$id."','".$contenu."','".$auteurs. "', '". $categorie ."')");    

        
    }
           header('Location: publication.php');

?>