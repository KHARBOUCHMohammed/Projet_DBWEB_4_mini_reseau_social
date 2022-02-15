<?php
session_start();
require 'class.php';

$pseu =$_GET['IDLOGIN'];


$A = $pdo->query("SELECT id as id, pseudo as pseudo  from utilisateurs WHERE id ='".(int)$pseu."'");

			//echo "succes";


$A->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Utilisateur');

$B = $A->fetch();


if ($_GET['pseudo'] == $B->pseudo && $_GET['IDLOGIN'] == $B->id){

	$_SESSION['user']=$B->pseudo;
	$_SESSION['id']=$B->id;	
		//header('location : ess.php')	;
}

else if ($_GET['pseudo'] != $B->pseudo || $_GET['IDLOGIN'] != $B->id){

	echo "<script>alert(\"vous n'êtes pas inscrit dans la BDD \")</script>";
}



header("Location: " . $_SERVER["HTTP_REFERER"]);     
?>



