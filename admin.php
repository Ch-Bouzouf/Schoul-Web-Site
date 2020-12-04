<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/php; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>La Liste des etudiants </title>

         <!-- Bootstrap core CSS -->
  <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->

   <link href="style/pourindex.css" type="text/css" rel="stylesheet">

        

        	
        
        

    </head>
<body>
        


<div class="header"></div>
<p><img class="p1"  src="style/img/insea.jpg"></p>
<br />
<p><h2>La Liste des etudiants </h2></p>


<br />

<div class="container">




</div>
<p>


<br />

                
                    <a href="connexion.php" class="btn btn-danger"> Deconnexion </a>
                


<table class="table table-striped table-hover table-bordered" style="width: auto; margin-left: 30px;margin-right:30px; background-color: #f8f9fa;">

<thead class="thead-dark">


<th scope="col">Nom</th>
<p>



<th scope="col">Prenom</th>
<p>

<th scope="col">CIN</th>
<p>




<th scope="col">Date de naissance</th>
<p>



<th scope="col">N°:de telephone</th>
<p>



<th scope="col">Email</th>
<p>



<th scope="col">Filiere</th>
<p>




<th scope="col">Sexe</th>
<p>



<th scope="col">Adress</th>
<p>



<th scope="col">Action</th>
<p>

</thead>
<p>


<br />
<tbody> 
                        <?php include 'database.php'; 
                         $pdo = Database::connect(); 
                         $sql = 'SELECT * FROM etudiant ORDER BY id DESC'; 

                         foreach ( $pdo->query($sql) as $row){ //on cree les lignes du tableau avec chaque valeur retournée
                          
                             echo '<tr>';
                             echo'<td>' . $row[1] . '</td><p>';
                             echo'<td>' . $row[2] . '</td><p>';
                             echo'<td>' . $row[12] . '</td><p>';
                             echo'<td>' . $row[3] . '</td><p>';
                             echo'<td>' . $row[4] . '</td><p>';
                             echo'<td>' . $row[5] . '</td><p>';
                             echo'<td>' . $row[6] . '</td><p>';
                             echo'<td>' . $row[8] . '</td><p>';
                             echo'<td>' . $row[9] . '</td><p>';
                           
                           
                            echo'<td>';
echo'<p>';
                            echo ' <a class="btn btn-success" href="edit.php?id=' . $row[0] . '"> Lire </a>';// un autre td pour le bouton d'edition
                            
echo'<p>';


                            echo '<a class="btn btn-success" href="update.php?id=' . $row[0] . '"> Modifier </a>';// un autre td pour le bouton d'update
                            
echo'<p>';

                            echo '<a class="btn btn-danger" href="delete.php?id=' . $row[0] . ' "> Supprimer </a>';// un autre td pour le bouton de suppression
                            echo '</td>

';
                            echo '</tr>
<p>
';
    
             
}
    Database::disconnect(); //on se deconnecte de la base
                        

                        ?>  

</tbody>
<p>

</table>
<p>

</div>
<p>


</div>
<p>


</div>
<p>

    </body>
 <!-- Bootstrap core JavaScript -->
  <script src="style/vendor/jquery/jquery.min.js"></script>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="style/js/jqBootstrapValidation.js"></script>
  <script src="style/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="style/js/clean-blog.min.js"></script>   
</html>