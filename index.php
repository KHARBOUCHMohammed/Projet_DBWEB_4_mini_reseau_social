<?php session_start();
require 'class.php'
?>


<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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

<style>
	body {font-family: "Lato", sans-serif}
	.mySlides {display: none}
</style>
<body>

	<!-- Navbar -->
	<div class="w3-top">
		<div class="w3-bar w3-black w3-card">
			<a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
			<a href="index.php" class="w3-bar-item w3-button w3-padding-large"><?php if(isset($_SESSION['user'])) {echo "Bienvenue: ".$_SESSION['user'];}?></a>
			<a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
			<a href="utilisateurs.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">utilisateur</a>
			<a href="publication.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">publication</a>

				<?php if(isset($_SESSION['user'])): ?>
					
						<a href="deconnexion.php" style="float:right" class="w3-bar-item w3-button w3-padding-large w3-hide-small"  onclick=(window.location='deconnexion.php')>Deconnexion</a>
					<?php else: ?> 
			
<a  class="w3-bar-item w3-button w3-padding-large w3-hide-small"  style="float:right" data-toggle="modal" data-target="#loginModal" href="#"> Connexion</a></li>
				<?php endif; ?>
			<div class="w3-dropdown-hover w3-hide-small">
				
				<div class="w3-dropdown-content w3-bar-block w3-card-4">
					
				</div>
			</div>
			
		</div>
	</div>

	<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
	<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">

	</div>

	<!-- Page content -->
	<div class="w3-content" style="max-width:2000px;margin-top:46p
">

		<!-- Automatic Slideshow Images -->
		<div >
			<img src="image/la.jpg" style="width:100%">
			<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
				<h3> </h3>
				<p><b> </b></p>   
			</div>
		</div>
		<div class="mySlides w3-display-container w3-center">
			
			<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
				<h3>Mini projet L2 informatique</h3>
				<p><b>creer par Mohammed kharbouch.</b></p>    
			</div>
		</div>


		<!-- End Page Content -->

<!-- login  -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
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


		<!-- Image of location/map -->


		<!-- Footer -->
		<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
			<i class="fa fa-facebook-official w3-hover-opacity"></i>
			<i class="fa fa-instagram w3-hover-opacity"></i>
			<i class="fa fa-snapchat w3-hover-opacity"></i>
			<i class="fa fa-pinterest-p w3-hover-opacity"></i>
			<i class="fa fa-twitter w3-hover-opacity"></i>
			<i class="fa fa-linkedin w3-hover-opacity"></i>
			<p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
		</footer>

		<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
	var i;
	var x = document.getElementsByClassName("mySlides");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
	}
	myIndex++;
	if (myIndex > x.length) {myIndex = 1}    
		x[myIndex-1].style.display = "block";  
	setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
	var x = document.getElementById("navDemo");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
	} else { 
		x.className = x.className.replace(" w3-show", "");
	}
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}
</script>

</body>
</html>
