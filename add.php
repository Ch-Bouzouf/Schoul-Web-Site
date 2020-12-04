<?php 
require 'database.php'; 
use PHPMailer\PHPMailer\PHPMailer;
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

  
    // Saisie des erreurs de validation
    $nameError = null;
    $firstnameError = null;
    $ageError = null;
    $emailError = null;
    $telError = null;
    $filiereError = null;
    $sexeError = null;
    $fichierError = null;
    $imgError = null;
    $passwordError = null;
    $repeatpasswordError = null;
    $CINError = null;

    
    $name=!empty($_POST['nom']) ? $_POST['nom'] : '';
    $firstname = !empty($_POST['prenom']) ? $_POST['prenom'] : '';
    $age = !empty($_POST['age']) ? $_POST['age'] : '';
    $tel = !empty($_POST['tel']) ? $_POST['tel'] : '';
    $email = !empty($_POST['email']) ? $_POST['email'] : '';
    $filiere = !empty($_POST['filiere']) ? $_POST['filiere'] : '';
    $sexe = !empty($_POST['sexe']) ? $_POST['sexe'] : '';
    $url = !empty($_POST['url']) ? $_POST['url'] : '';
    $password=!empty($_POST['password']) ? $_POST['password'] : '';
    $repeatpassword=!empty($_POST["repeatpassword"]) ? $_POST['repeatpassword'] : '';
    $CIN=!empty($_POST['cin']) ? $_POST['cin'] : '';
      
    $image = $_FILES['image']['name'];
    $fichier1 = $_FILES['image']['tmp_name'];
    $chemin_destination1 = 'Photo/'.$image;
    
    move_uploaded_file($fichier1 , $chemin_destination1 );



    $fichier = $_FILES['fichier']['name'];
    $fichier2 = $_FILES['fichier']['tmp_name'];
    $chemin_destination2 = 'attestation/'.$fichier;
    
    move_uploaded_file($fichier2 , $chemin_destination2 );









     $valid = true;

       if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
     if (empty($age)) {
            $ageError = 'Please enter a date';
            $valid = false;
        }

    if (empty($tel)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
    if (empty($password)) {
            $passwordError = 'Please enter the password';
            $valid = false;
        }
    if (empty($repeatpassword)) {
            $repeatpasswordError = 'Please repeat the password';
            $valid = false;
        }

        
    
    
   if($password==$repeatpassword)
 {    
    if ($valid) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $sql = "INSERT INTO etudiant (nom,prenom,age,tel, email, filiere ,fichier, etude, url,img,vkey,cin) values(?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($name,$firstname,$age,$tel,$email,$filiere,$fichier,$sexe,$url, $image,$password,$CIN));

    Database::disconnect();        
     
   
// Create the email and send the message
     
   
$subject = "vous etes maintenant inscit a l'insea";
$body = " Cliquez sur lien pour voir votre fiche : http://localhost/PHP/Projet/startbootstrap-clean-blog-gh-pages/connexion.php ";
$mail = new PHPMailer();

//SMTP Settings
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "bouzouf.projet.php@gmail.com"; //enter you email address
$mail->Password = 'insea123'; //enter you email password
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
$mail->SMTPDebug = 2; //Alternative to above constant

//Email Settings
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->setFrom('bouzouf.projet.php@gmail.com','INSEA');
$mail->addAddress($email); //enter you email address
$mail->Subject = $subject;
$mail->Body = $body;

if ($mail->send()) {
$status = "success";
$response = "Message envoyee avec success";
echo "Message envoyee avec succes".$email; 
} 







     ///
         echo "Inscription reussite";  

    }
}
   else{
            echo "les deux mots de passe doivent être identiques";}
}            

   
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>INSCRIPTION</title>

  <!-- Bootstrap core CSS -->
  <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="style/css/clean-blog.min.css" rel="stylesheet">
  <link href="style/inscription.css" type="text/css" rel="stylesheet">

</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="http://www.insea.ac.ma/"><img class="img-fluid" src="style/img/logo.png" ></a>
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
            <a class="nav-link" href="connexion.php">Connexion</a>
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



<br />
<div class="container">
   


<br>



</div>

<br>
<br>
<br>
<form    method="post" enctype="multipart/form-data" action="add.php">
    <h1> Remplir ce formulaire</h1>

<br />
<div class="control-group" <?php echo !empty($nameError)?'error':'';?>>
                        <label class="control-label">Nom : </label>

<br />
<div class="controls">
                            <input name="nom" type="text"  placeholder="Nom" value="<?php echo !empty($name)?$name:'';?>" required>
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
</div>


</div>

<br />
<div class="control-group"<?php echo !empty($firstnameError)?'error':'';?>>
                    <label class="control-label">Prenom : </label>

<br />
<div class="controls">
                            <input type="text" name="prenom" placeholder="Prenom" value="<?php echo !empty($firstname)?$firstname:''; ?>" required >
                            <?php if(!empty($firstnameError)):?>
                            <span class="help-inline"><?php echo $firstnameError ;?></span>
                            <?php endif;?>
</div>


</div>

<br />
<div class="control-group"<?php echo !empty($CINError)?'error':'';?>>
                    <label class="control-label">CIN : </label>

<br />


<br />
<div class="controls">
                            <input type="text" name="cin" placeholder="CIN" value="<?php echo !empty($CIN)?$CIN:''; ?>" required >
                            <?php if(!empty($CINError)):?>
                            <span class="help-inline"><?php echo $CINError ;?></span>
                            <?php endif;?>
</div>


</div>



<br />
<div class="control-group"<?php echo !empty($ageError)?'error':'';?>>
                    <label class="control-label">Date de naissance :</label>

<br />
<div class="controls">
                            <input type="date" name="age" placeholder="Date de naissance" value="<?php echo !empty($age)?$age:''; ?>" required >
                            <?php if(!empty($ageError)):?>
                            <span class="help-inline"><?php echo $ageError ;?></span>
                            <?php endif;?>
</div>


</div>


                 

<br />
<div class="control-group" <?php echo !empty($emailError)?'error':'';?>>
                        <label class="control-label">L'address email :</label>

<br />
<div class="controls">
                            <input name="email" type="text" placeholder="L'Adresse email" value="<?php echo !empty($email)?$email:'';?>" reqired >
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
</div>

<br />
</div>
                        <label> Mot de passe : </label>
                        <br /> 
            <input type="password" name="password" placeholder="Mot de passe" value="<?php echo !empty($password)?$password:'';?>" required> 
                <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif;?>

<br />             
            <label>Repeter le mot de passe:</label>
            <br /> 
            <input type="password" name="repeatpassword" placeholder="Mot de passe" value="<?php echo !empty($repeatpassword)?$repeatpassword:'';?>" required>
              <?php if (!empty($repeatpasswordError)): ?>
                                <span class="help-inline"><?php echo $repeatpasswordError;?></span>
                            <?php endif;?>


                

<br />
<div class="control-group"<?php echo !empty($telError)?'error':'';?>>
                        <label class="control-label">Telephone :</label>

<br />
<div class="controls">
                            <input name="tel" type="text" placeholder="Telephone" value="<?php echo !empty($tel) ? $tel:'';?>" required >
                            <?php if (!empty($telError)): ?>
                                <span class="help-inline"><?php echo $telError;?></span>
                            <?php endif;?>
</div>
<p>

</div>


                

<br />
<div class="control-group">
                <label class="control-label">La Filere :</label>
                <br />
                 <select name="filiere" value="<?php echo !empty($filiere) ? $filiere:'' ;?>">

<option value='DSE' >DSE</option>

<option value='DS' >DS</option>

<option value='AF'>AF</option>

<option value='SE'>SE</option>

<option value='SD'>SD</option>

<option value='ROAD'>ROAD</option>

</select>
                     <?php if (!empty($filiereError)): ?>
                                <span class="help-inline"><?php echo $filiereError;?></span>
                            <?php endif;?>
</div>


                

<br />
<div class="control-group<?php echo !empty($sexeError)?'error':'';?>">
                    <label class="control-label">Sexe :</label>

<br />
   <div class="controls">

                    <select name="sexe" value="<?php echo !empty($sexe) ? $sexe:'' ;?>">

                        <option value='Homme' >Homme</option>
                        <option value='Femme' >Femme</option>
                    </select>     

                    
                       
</div>


                     <?php if (!empty($sexeError)): ?>
                                <span class="help-inline"><?php echo $sexeError;?></span>
                            <?php endif;?>
</div>


                 

<br />
<div class="control-group  <?php echo !empty($urlError)?'error':'';?>">
                    <label class="control-label">Adresse :</label>

<br />
<div class="controls">
                       <textarea rows="4" cols="30" name="url" value="<?php echo !empty($url)? $url:'' ; ?>"></textarea>
                        <?php if(!empty($urlError)):?>
                       <span class="help-inline"><?php echo $urlError ;?></span>
                       <?php endif;?>
</div>


</div>


                

<br />


<br />
                            
                                <label>Inserer votre photo:</label>
 <br />                                   
                            <input type="file" name="image" id="image"  required>
 <br>
 <br>
<br />
                                   <label>Inserer votre attestation de réussite (CNC, DEUG ou Licence):</label>
 <br />                                   
                            <input type="file" name="fichier" id="fichier" required>                            





 <br>
 <br>
<br />
<div class="form-actions">
                 <input type="submit" class="btn-success" name="Inscrir" value="INSCRIR">
                 <br>
                 
                 <a class="btn btn-danger" href="admin.php"> Retour </a>
</div>


            </form>

            
  </div>          
            
</div>


        
    </body>
      <!-- Bootstrap core JavaScript -->
  <script src="style/vendor/jquery/jquery.min.js"></script>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="style/js/clean-blog.min.js"></script>
</html>