<?php session_start();
require 'class.php'
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #111;
    }

    .active {
      background-color: #4CAF50;
    }
  </style>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>

  <ul>
   <li><a  class="navbar-brand"  href="index.php"> <i class="glyphicon glyphicon-home"></i>  Home</a></li>
   <li><a href="#"><?php if(isset($_SESSION['user'])) {echo "Bienvenue: ".$_SESSION['user'];}?>   </a></li>
   <?php if(isset($_SESSION['user'])): ?>
    
    <li><a  class="navbar-brand"  href="utilisateurs.php"> <i class="fa fa-user"></i>  utilsateurs</a></li>

    <li><a  class="navbar-brand" data-toggle="modal" data-target="#loginModal" href="#" onclick=(window.location='deconnexion.php')>  <span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>

    <li style="float:right"><a class="active" href="#about"  onclick="document.getElementById('id01').style.display='block'">+ Ajouter une publication</a></li>
    <?php else: ?> 
      <li><a  class="navbar-brand" data-toggle="modal" data-target="#loginModal" href="#"> connexion</a></li>
    <?php endif; ?>
    <!-- <li><a href=" "> llk </a></li>-->
    
  </ul>



  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'"  class="w3-button w3-display-topright">&times;</span>
        <center><h2>Ajouter ou modifier votre publication</h2></center>
      </header>
      <div class="w3-container">
        <form  method= "get" action="transformation.php" id="id01" style=" text-align: center" ><br>
         <p>ID
           <input class="w3-input" type="number" name="id" min=1  max=100 maxlength="2"   placeholder="saisir ID ">
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

<!-- login  -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
       
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form method="get" action="connexion.php" >
            <div class="form-group">
              <input type="login" class="form-control" name="pseudo"  placeholder="Pseudo">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="IDLOGIN"  placeholder="Mot de passe ....">
            </div>
            <button  type="submit" name="submit" value="valider"  class="btn btn-info btn-block btn-round"> <span class="spinner-grow spinner-grow-sm"> </span> Login</button>
            <div class="modal-footer d-flex justify-content-center">
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $(".zoom").mouseenter(
      function(){
        $(this).animate({ fontSize: "200%"},200);
      });
    $(".zoom").mouseleave(
      function(){
        $(this).animate({ fontSize: "100%"},200);
      });
  });
</script>
<!--
<script>
$(document).ready(function(){
  $("#p1").mouseenter(function(){
    $(this).css("color", "blue");
  });
});
</script>-->


<script>
 $(document).ready(function() {
  $(".blue").mouseenter(
    function() {
      $(this).removeClass("text-dark");
      $(this).addClass("text-primary");
    });
  $(".blue").mouseleave(
    function() {
      $(this).removeClass("text-primary");
      $(this).addClass("text-dark");
    });
});
</script>
</body>
</html>


