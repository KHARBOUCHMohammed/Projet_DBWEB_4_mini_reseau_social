<?php
include 'heading.php';
?>



<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 


<div class="w3-row-padding w3-padding-64 w3-container">
	
	<table class="w3-table-all" style="text-align: center;" >
		<thead>
			<tr>
				<th>ID</th>
				<th><center>Contenu</center></th>
				<th>Auteur</th>
				<th>Catégorie</th>
				
			</tr>
		</thead>

		<?php

		$A = $pdo->query('SELECT publications.id as id  , contenu as contenu , auteur as auteur, categories.categorie as categorie from publications join categories on publications.categorie = categories.id  where publications.categorie = '.$_GET['categorie'].' ;
			');		
		$A->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Publication');

		while ($B = $A->fetch()):
			$A0 = $pdo->query('SELECT  pseudo as ps  from publications join utilisateurs on publications.auteur = utilisateurs.id  where publications.auteur = '.$B->auteur.' ;
				');		
			$A0->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Publication');

			$B0=$A0->fetch();
			?>

			<tr>
				<td>
					<?php echo $B->id; ?>
				</td>
				<td><center><?php echo $B->contenu; ?></center></td>
				<td><?php echo $B0->ps; ?></td>
				<td>
					<?php echo $B->categorie; ?>

				</td>


			<?php endwhile; ?>
		</tbody>
	</table>


	<br><br>
	<a href="publication.php"> <center><button class="w3-btn w3-white w3-border w3-border-red w3-round-large"> Retrour </button></center></a>


	<?php include('ess.php'); ?>
</div>



