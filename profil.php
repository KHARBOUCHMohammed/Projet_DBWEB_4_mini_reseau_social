<?php 
include 'heading.php';

?>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
<table class="w3-table-all w3-centered">

    <tr>
        <th>id_publication</th>
        <th>Pseudo</th>
        <th>Contenu</th>
        <th>Categorie</th>
        <!--  <th> voteur </th>-->
        <?php if(isset($_SESSION["user"])):?>    <th>Votage</th> <?php endif?>
    </tr>



    <?php
    if (isset($_GET['id']))
        $id=$_GET['id'];
    
    $A = $pdo->query("SELECT publications.auteur as auteur, publications.id as id ,contenu as contenu ,pseudo as pseudo ,categorie as categorie ,publications.id from publications INNER JOIN utilisateurs ON publications.auteur=utilisateurs.id WHERE utilisateurs.id=$id ORDER BY categorie;");
    
    $A->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Publication');
    
    while ($B = $A->fetch()):

        $ps=$B->pseudo;
        if (isset($_SESSION['user'])) {
            $test = False;
            $likers = $pdo->query('SELECT id, pseudo, naissance from utilisateurs INNER JOIN (SELECT publications.id as publication ,contenu,utilisateur as VotéePar FROM publications INNER JOIN votes ON votes.publication=publications.id) AS R ON utilisateurs.id=R.VotéePar WHERE publication='.$B->id.';')->fetchAll(PDO::FETCH_CLASS, "Utilisateur");
            foreach($likers as $liker)
            {
                if($liker->id == $_SESSION['id'])
                {
                    $test = True;
                }
            }
        }


        $cat=$pdo->query("SELECT categorie as cat from categories where categories.id='".$B->categorie."';");
        $cat->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Publication');
        $cat1=$cat->fetch();

        ?>
        
        <tr >
            <td><p class='zoom'><?php echo $B->id ?> </p></td>



            <td><p class='zoom'><?php  echo $ps; ?>  </p></td>



            <td><p class='zoom'><?php echo $B->contenu?></p></td>
            <td ><p class='zoom'><?php echo  $cat1->cat ?></p>
            </td>

            
            <?php if(isset($_SESSION["user"])):?>


                <td>  <a href="votage.php?idp=<?php echo $B->id;?>&ida=<?php echo $_SESSION['id']; ?>">
                   

                   <?php if(isset($_SESSION["user"]))
                   {
                     if($test)
                     {
                        echo " <a href='votage.php?idp=".$B->id."&ida=".$_SESSION['id']."'><button class='w3-button w3-blue w3-round-xxlarge w3-border w3-border-cyan'>Deja Voté</button></td>";
                    }
                    else
                    {
                        echo " <a href='votage.php?idp=".$B->id."&ida=".$_SESSION['id']."'><button class='w3-button w3-white w3-round-xxlarge w3-border w3-border-orange'>Vote</button></a></td>";
                    }
                    
                } ?>

            <?php endif;?>          
        <?php endwhile; ?>


    </tr>
</table>

<br><br>
<a href="publication.php"> <center><button class="w3-btn w3-white w3-border w3-border-black w3-round-large"> Retrour </button></center></a>

<br>
<?php include('ess.php'); ?>

</body>

</html>