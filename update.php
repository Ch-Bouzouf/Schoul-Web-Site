<?php require 'database.php'; $id = null; if ( !empty($_GET['id'])) { $id = $_REQUEST['id']; } if ( null==$id ) { header("Location: admin.php"); } if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

                 $pdo=Database::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $name = "";$firstname = "";$tel = "";$email = "";$filiere = "";$fichier = "";$sexe = "";$url = "";
                $sql = "UPDATE etudiant SET nom = ?,prenom = ?,tel = ?, email = ?, filiere = ?, fichier = ?, etude = ?, url = ? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($name,$firstname, $tel, $email,$filiere,$fichier, $sexe, $url,$id));
                Database::disconnect();
                header("Location: admin.php");
             
           }else {

                 $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM etudiant where id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $name = $data['nom'];
                $firstname = $data['prenom'];
                $age = $data['age'];
                $tel = $data['tel'];
                $email = $data['email'];
                $filiere = $data['filiere'];
                $fichier = $data['fichier'];
                $sexe = $data['etude'];
                Database::disconnect();
            }
        
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Etudiant-Update</title>
        	<link href="style/inscription.css" type="text/css" rel="stylesheet">
         <p><img class="p1"  src="style/img/insea.jpg"></p>
        
    </head>
    <body>
     

<br />
<div class="container">

<br />


<br />
<div class="form1"><h1> Modifier un enregistrement </h1></div>
<p>

</div>
<p>

<br />
<form method="post" action="update.php?id=<?php echo $id ;?>">

<br />
<div class="control-group <?php echo!empty($nameError) ? 'error' : ''; ?>">
                    <label class="control-label">Nom:</label>

<br />
<div class="controls">
                        <input name="nom" type="text"  placeholder="nom" value="<?php echo!empty($name) ? $name : ''; ?>">
                        <?php if (!empty($nameError)): ?>
                            <span class="help-inline"><?php echo $nameError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group<?php echo!empty($firstnameError) ? 'error' : ''; ?>">
                    <label class="control-label">Prenom:</label>

<br />
<div class="controls">
                        <input type="text" name="prenom" value="<?php echo!empty($firstname) ? $firstname : ''; ?>">
                        <?php if (!empty($firstnameError)): ?>
                            <span class="help-inline"><?php echo $firstnameError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>


<br />
<div class="control-group<?php echo!empty($ageError) ? 'error' : ''; ?>">
                    <label class="control-label">Date de naissance:</label>

<br />
<div class="controls">
                        <input type="date" name="age" value="<?php echo!empty($age) ? $age : ''; ?>">
                        <?php if (!empty($ageError)): ?>
                            <span class="help-inline"><?php echo $ageError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group <?php echo!empty($emailError) ? 'error' : ''; ?>">
                    <label class="control-label">Email Address:</label>

<br />
<div class="controls">
                        <input name="email" type="text" placeholder="Email Address" value="<?php echo!empty($email) ? $email : ''; ?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo $emailError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group <?php echo!empty($telError) ? 'error' : ''; ?>">
                    <label class="control-label">Telephone:</label>

<br />
<div class="controls">
                        <input name="tel" type="text" placeholder="Telephone" value="<?php echo!empty($tel) ? $tel : ''; ?>">
                        <?php if (!empty($telError)): ?>
                            <span class="help-inline"><?php echo $telError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



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
<p>
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
<p>
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
<p>

</div>
<p>




<div class="form-actions">
                    <input type="submit" class="btn-success" name="submit" value="MODIFIER">
                    <a class="btn" href="admin.php">Retour</a>
</div>
<p>

            </form>
<p>



</div>
<p>


    </body>
</html>