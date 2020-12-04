<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<title>INSEA</title>
	 <!-- Bootstrap core CSS -->
  <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="style/css/clean-blog.min.css" rel="stylesheet">
  <link href="style/accuil.css" rel="stylesheet" type="text/css">
	

</head>
<header class="masthead" style="background-image: url('style/img/insea1.jpg')">
<div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="http://www.insea.ac.ma/"><img class="img-fluid" style="filter: alpha(opacity=100) " src="style/img/logo.png" ></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li> 
           <li class="nav-item">
            <a class="nav-link" href="connexion.php">connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>




<p>


</p>

<br />


<table>
<BODY>
	<div class="row">
  <div class="col-md-6">
<TR><TD>

	<form  class="form-horizontal"  method="post" action="connexion.php">
	<div class="admin" >
	<p><h3> Espace Admin </h3></p>
		<p> Nom d'utilisateur : <input type="text" name="pseudo" placeholder="nom d'utilisatur"    required ></p>
		<p>   mot de passe   :   <br>   <input type="password" name="mdp" placeholder="mot de passe"   required ></p>
		<button type="submit" class="btn btn-primary" id="sendMessageButton" value='CONNEXION' >connexion</button>
             

	


	<?php
	
	include_once 'database.php'; 
    $pdo = Database::connect();  
	 if(isset($_POST['pseudo']) AND isset($_POST['mdp'])){
           
           $username = $_POST['pseudo']; 
           $password = $_POST['mdp'];

            $sql = "SELECT * FROM admin where pseudo = '".$username."' AND mdp ='".$password."'" ;

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            if($stmt->rowCount() == 1){ 

 
                header("Location: admin.php");
                     
                }
        
              
               else{
                	  echo "<p style='color:red'>Utilisateur ou mot de passe incorrect </p>";
                      } // utilisateur ou mot de passe incorrect
        
             
             Database::disconnect();
       } 
           

   ?>

  </form> 

</TD>
</div>
 
  <div class="col-md-6">
  
	<TD>
		<form  class="form-horizontal"  method="post" action="connexion.php">
		<div class="utilisateur">
		<p><h3> Espace Etudiant </h3></p>
		<p> Email : <input type="text" name=" email" placeholder="L'adresse mail" required></p>
		<p> mot de passe : <input type="password" name="vkey" placeholder="mot de passe" required></p>
		<button type="submit" class="btn btn-primary" id="sendMessageButton" value='CONNEXION' >connexion</button>
		
<br>


		<?php
	
	include_once 'database.php'; 
    $pdo = Database::connect();  
	 if(isset($_POST['email']) AND isset($_POST['vkey'])){
           
           $email = $_POST['email']; 
           $password = $_POST['vkey'];

            $sql = "SELECT * FROM etudiant where email = '".$email."' AND vkey ='".$password."'" ;

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            if($stmt->rowCount() == 1){ 
           

                header("Location: edit1.php?email='".$email."'");
                     
                }
        
              
               else{
                	  echo "<p style='color:red'>Adresse mail ou mot de passe incorrect </p>";
                      } // utilisateur ou mot de passe incorrect
        
             
             Database::disconnect();
       }  
          

   ?>
<br/>
<p> Vous n'etes pas inscrit ? <a class="btn-success" href="add.php"> S'inscrire</a></p>
	 </form>   
		
	</TD>
</div>
</TR>


</BODY>
</table>
</header>


</body>
  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://www.linkedin.com/school/institut-national-de-statistique-et-d-economie-appliquee-insea/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.facebook.com/sharer.php?u=http://www.insea.ac.ma/&title=INSEA">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://twitter.com/home?status=http://www.insea.ac.ma/&title=INSEA">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Créé par chaymae BOUZOUF 2020</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="style/vendor/jquery/jquery.min.js"></script>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="style/js/clean-blog.min.js"></script>
</html>