<div>
	<?php

	include 'heading.php';
	?>

</div>


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 

<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->


<div class="w3-row-padding w3-padding-64 w3-container">

	<table class="w3-table-all" style="text-align: center;" >
		<thead>
			<tr>
				<th>ID_auteur : nom </th>
				<th>ID_Publication</th>
				<th><center> Contenu </center></th>

				<th>Catégorie</th>

				<?php if(isset($_SESSION["user"])):?> <th>Votage</th> 
				<th>modification</th>
			<?php endif?>
		</tr>
	</thead>

	<?php
	$A = $pdo->query('SELECT utilisateurs.id as id, publications.id as id2, pseudo as ps, contenu as contenu, categorie as  categorie from publications join utilisateurs on
		publications.auteur = utilisateurs.id order by categorie  ;
		');		
	$A->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Publication');
	while ($B = $A->fetch()):





		if (isset($_SESSION['user'])) {

			$test = False;
			$likers = $pdo->query('SELECT id, pseudo, naissance from utilisateurs INNER JOIN (SELECT publications.id as publication ,contenu,utilisateur as VotéePar FROM publications INNER JOIN votes ON votes.publication=publications.id) AS R ON utilisateurs.id=R.VotéePar WHERE publication='.$B->id2.';')->fetchAll(PDO::FETCH_CLASS, "Utilisateur");
			foreach($likers as $liker)
			{
				if($liker->id == $_SESSION['id'])
				{
					$test = True;
				}
			}}
			$cat=$pdo->query("SELECT categorie as cat from categories where categories.id='".$B->categorie."';");
			$cat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Publication');
			$cat1=$cat->fetch();
			?>

			<tr>
				<td><p class='zoom'>
					<a href="profil.php?id=<?php echo $B->id; ?>"> <?php echo $B->id; //echo" : "; echo $B->ps; ?></a></p>
				</td>
				<td><p class='zoom'><?php echo $B->id2 ?></p></td>
				<td><center> <p class='zoom'> <?php echo $B->contenu; ?></p> </center> </td>

<!--	<td>
		
	<?php echo $B->auteur; ?></td>-->
	<td><p class='zoom'>
		<span>
			<a class="<?php echo $B->categorie; ?>" href="publicationsCategories.php?categorie=<?php echo $B->categorie; ?>">
				<?php echo $cat1->cat; ?>
			</a></a>
		</span>
	</td><p class='zoom'>
		<?php if(isset($_SESSION["user"]))
		{
			if($test)
			{
				echo "<td> <a href='votage.php?idp=".$B->id2."&ida=".$_SESSION['id']."'><button class='w3-button w3-blue w3-round-xxlarge w3-border w3-border-cyan'>Deja Voté</button></td>";
			}
			else
			{
				echo "<td>  <a href='votage.php?idp=".$B->id2."&ida=".$_SESSION['id']."'><button class='w3-button w3-white w3-round-xxlarge w3-border w3-border-orange'>Vote</button></a></td>";
			}

		} ?>

		<?php if(isset($_SESSION["id"])) {

			if ($B->id == $_SESSION["id"] ) {

				?>
				<td><center><a style="float:right" onclick="document.getElementById('id02').style.display='block'"><i  class="glyphicon glyphicon-refresh w3-spin w3-jumbo"></i><br> modifier la pub <?php echo $B->id2;?></center></a> </td>
			<?php }
			else {?>
				<td><?php	echo""; ?> </td>
			<?php	}

		} ?>
	</tr>

<div id="id02" class="w3-modal">
	<div class="w3-modal-content w3-animate-top w3-card-4">
		<header class="w3-container w3-teal"> 
			<span onclick="document.getElementById('id02').style.display='none'"  class="w3-button w3-display-topright">&times;</span>
			<center><h2>modifier votre publication</h2></center>
		</header>
		<div class="w3-container">
			<form  method= "get" action="transformation.php" id="id02" style=" text-align: center" ><br>
				<p>ID
					<input class="w3-input" type="text" name="id"   placeholder="Saisir ID de la publication...." <?php  //echo"value=".$B->id2.""; ?>>
				</p>
				<p>Contenu<br>
					<input class="w3-input" type="text" name="contenu" maxlength="100" id="Contenu" placeholder="saisir le Contenu de votre publications">
				</p>

				<p>Categorie<br>
					<select class="w3-input"  name="categorie" id="Categorie"  ">
						<option value="1">divers</option>
						<option value="2">news</option>
						<option value="3">sport</option>
						<option value="4">citation</option>
					</select>
				</p>


			</div>
			<footer class="w3-container w3-teal">
				<center> <button class="btn btn-primary"  name="submit" type="submit" value="Submit"> 
					<p> <span class="spinner-grow spinner-grow-sm"> </span>  Publier...</p></center>

				</button>
			</footer>
		</div>
	</div>
</center></footer></form></div></div></div>

<?php endwhile; ?>
</tbody>
</table>










<br><br>
<a href="index.php"> <center><button class="w3-btn w3-white w3-border w3-border-black w3-round-large"> Retrour </button></center></a>
<br>
<?php include('ess.php'); ?>

</div>

