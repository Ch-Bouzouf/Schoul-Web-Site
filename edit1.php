<?php require('database.php');  
    $email = !empty($_GET['email']) ? $_GET['email'] : '';
    $pdo = Database ::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM etudiant where email = $email ";
    $q = $pdo->prepare($sql);
    $q->execute(array($email));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();





?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        	<link href="style/affich.css" rel="stylesheet">
        
    </head>

    <body>

<br />
<div class="container">
<img src="style/img/insea.jpg" class="mce-object"  />

<br />


<br />


<br />
<div class="form1"><h1> Ma fiche </h1></div>
<p>


<p>






<div class="form">
                        <label class="control-label">image:</label>


<div class="controls">
                            <label class="checkbox">
                              <img class="profile" src="Photo/<?php echo $data['img']; ?>"/>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form">
                        <label class="control-label">Nom:</label>


<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nom']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />

<div class="form">
                        <label class="control-label">Prenom:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['prenom']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form">
                        <label class="control-label">Email Address:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form">
                        <label class="control-label">N°:Telephone:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tel']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form">
                        <label class="control-label">Filiere:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['filiere']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form">
                        <label class="control-label">Sex:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['etude']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form">
                        <label class="control-label">Adresse:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['url']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form">
                        <label class="control-label">Attesttation de reussite:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <iframe src="attestation/<?php echo $data['fichier']; ?>"></iframe> 
                            </label>
</div>
<p>

</div>
<p>

<br>

<br>
<br>


<div class="form-actions">
                        <a class="btn" href="connexion.php">Retour</a>
</div>
<p>



</div>
<p>

</div>
<p>


</div>
<p>
<!-- /container -->
    </body>
</html>