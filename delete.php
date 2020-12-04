<?php require 'database.php'; $id=0; if(!empty($_GET['id'])){ $id=$_REQUEST['id']; } if(!empty($_POST)){ $id= $_POST['id']; $pdo=Database::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "DELETE FROM etudiant  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: admin.php");
    
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    	<link href="style/inscription.css" rel="stylesheet">
    <img class="p1"   src="style/img/insea.jpg" />
</head>
 
<body>

<br />
<div class="container">
     

<br />


<br />


<br />
<div class="form1"><h1>Supprimer un etudiant</h1></div>
<p>


<p>

                     
<br />
<form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      
Etes vous sure ?

<br />
<div class="form-actions">
                          <button type="submit" class="btn btn-danger"> OUI </button>
                          <br>
                          <br>
                          <a class="btn" href="admin.php">Non</a>
</div>
<p>

                    </form>
<p>
</div>
<p>

                 
</div>
<p>
<!-- /container -->
  </body>
</html>