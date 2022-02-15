<div>
	<?php

	include 'heading.php';
	?>

</div>


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 


<div class="w3-row-padding w3-padding-64 w3-container">
	
	<table class="w3-table-all" style="text-align: center;" >
		<thead>
			<tr>
				<th>ID_auteur</th>
				<th>pseudo</th>
				<th><center> naissance </center></th>
				<th><center> nbre de poste </center></th>
				

			</tr>
		</thead>

		<?php
		$A = $pdo->query('SELECT  utilisateurs.id as id, pseudo as pseudo, naissance as  naissance from  utilisateurs ;
			');		
		$A->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur');
		while ($B = $A->fetch()):

			
			$ps1=$B->pseudo;
			$id=$B->id;



			
			$E=$pdo->query("SELECT COUNT(*) as ct   FROM publications JOIN utilisateurs on utilisateurs.id=publications.auteur WHERE utilisateurs.id='".$id."';");
			$E->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur');
			$F = $E->fetch();
			
			

			?>

			<tr>
				<td><p class='zoom'>
					<?php echo $B->id; ?></p>
				</td>
				<td><p class='zoom' ><?php  
				

				if($F->ct >0) {  ?>


					<p1 class='blue'>	<?php echo $B->pseudo; 
				} 

				

				else {
					echo $B->pseudo;
				}

				?>
				
				
			</p></td>





			<td><center> <p class='zoom'> <?php echo $B->naissance; ?></p> </center> </td>



			<td><p class='zoom'> <center>
				<?php echo $F->ct; ?></p></center>
			</td>


		</tr>

	<?php endwhile; ?>

</tbody>
</table>

<br><br>
<a href="publication.php"> <center><button class="w3-btn w3-white w3-border w3-border-black w3-round-large"> Retrour </button></center></a>


<?php include('ess.php'); ?>

</div>

