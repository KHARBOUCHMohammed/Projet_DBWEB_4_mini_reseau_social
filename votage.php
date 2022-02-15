<?php
session_start();
require 'class.php';

    //$id = $_GET['id'] ?? "";
   // $utilisateur = $_GET['ida'] ?? ""; 
$publication = $_GET['idp'] ?? "";
$utilisateur = $_SESSION['id'];


$A = $pdo->query("SELECT utilisateur, publication From votes where utilisateur= ' " .$utilisateur. "' and publication= ' " .$publication. "' ");
$A->setFetchMode(PDO::FETCH_CLASS, 'Publication');
$B = $A->fetch();

if ($B == false ) {
    $A = $pdo->query("INSERT INTO votes(utilisateur,publication) VALUES ('".$utilisateur."','".$publication. "')");     
}
else 
{
  
    $A = $pdo->query("DELETE FROM  votes where utilisateur= ' " .$utilisateur. "' and publication= ' " .$publication. "' "); 
    
    echo "<script>alert(\"already voted \")</script>";
    
}
echo "<script>alert(\"return to publication page</a> \")</script>";


header("Location: " . $_SERVER["HTTP_REFERER"]);

?>
<br><br>
<!--<a href="publication.php"> <center><button class="w3-btn w3-white w3-border w3-border-red w3-round-large"> Retrour </button></center></a>-->