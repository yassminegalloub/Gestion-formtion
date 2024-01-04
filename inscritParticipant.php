<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="authentification/fonts/icomoon/style.css">

    <link rel="stylesheet" href="authentification/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="authentification/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="authentification/css/style.css">

    <title>Login</title>
    <meta charset="UTF-8">
    <link href="img/logo/logo_cni.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <?php
 session_start();
  include("connexion/connexion.php");
  $valid="";
?>
<?php
 if(isset($_POST['connexion'])){
 $username=$_POST["username"];
 $password=$_POST["password"];
 $crypt_pass = hash("sha512", $password);
 include("connexion/connexion.php");
$req=("SELECT * FROM login WHERE username ='$username'");
$response = $bdd->query($req);
$state = $response->rowCount();
$data = $response->fetch();
             if ($state != 0)
             {    $_SESSION["username"] =  $data['username'];
                 
                 
                  if( $crypt_pass == $data['password'])
                   { 
                     if ($data ['roleuser']=="superadmin")
                     {
                        header('location: superadmin/superadmin.php');
                     }
                    elseif ($data ['roleuser']=="admin")  {
                        header('location: admin/admin.php ');
                        
                    }
                    else header('location: client/client.php ');
                    }
                     else
                     {
                      $valid= "<div class='alert alert-danger'>
                      <a href='#' class='close' 
                      data-dismiss='alert'
                      aria-label='close'>&times;</a><b>Mot de passe incorrect</b>
                      </div>";
                     }
                   }
                   else
                   {
                      $valid= "<div class='alert alert-danger'>
                      <a href='#' class='close' 
                      data-dismiss='alert'
                      aria-label='close'>&times;</a><b>Username incorrecte</b>
                      </div>";
                   }
                }
?>
<?php
if(isset($_POST['inscrire']))
{
      $nom_prenom=$_POST["nom_prenom"];
      $cin=$_POST["cin"];
	  $service=$_POST["service"];
	  $entreprise=$_POST["entreprise"];
	  $cycle=$_POST["cycle"];
	  $username=$_POST["username"];
      $password=$_POST["password"];
      $password1=$_POST["password1"];
      $passwordcrypt = hash("sha512", $password);
      $req=("SELECT * FROM login WHERE username ='$username'");
      $response = $bdd->query($req);
      $state = $response->rowCount();
      $data = $response->fetch();
	  if ($state != 0)
      {
        $valid= "<div class='alert alert-danger'>
        <a href='#' class='close' 
        data-dismiss='alert'
        aria-label='close'>&times;</a><b>Username dejà utilisé</b>
        </div>";
      }
      else
      {  
         if ($password1 == $password)
         {
             try {
			 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
            

			 $sql = "INSERT INTO login (`username`,`password`,`roleuser`) values ('$username','$passwordcrypt','client')";		
			 $conn->exec($sql);
			 $last_id = $conn->lastInsertId();
			 
			 $sql2 =  "INSERT INTO participant (`id_login`, `nom_prenom`, `cin`, `service`, `entreprise`)
			 values ('$last_id', '$nom_prenom', '$cin','$service','$entreprise' )";
			 $conn->exec($sql2);
       $last_id2 = $conn->lastInsertId();

       $sql3 = "INSERT INTO inscription_cycle (`Numero_Participant`,`Nom_cycle`) values ('$last_id2','$cycle')";		
			 $conn->exec($sql3);

			 $conn = null;
			} catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			  }
	           header('Location: index.php');
	     }
	     else 
	     {
        $valid= "<div class='alert alert-danger'>
        <a href='#' class='close' 
        data-dismiss='alert'
        aria-label='close'>&times;</a><b>Les mot de passe doivent etre identiques</b>
        </div>";
	     }
      }
}


?>
  <body>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="authentification/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
			  
              <h1>Inscrivez-vous </h1>
            </div>
            <form action="#" method="post">
            <div class="row">
              <div class="col-md-12"><?php echo $valid ; ?></div>
            </div>
            <div class="form-group first">
     
                <input type="text" name="nom_prenom" class="form-control" id="nom_prenom" placeholder="Nom et Prenom">
                
            </div>

			      <div class="form-group ">
                
                <input type="text" name="cin" class="form-control" id="cin" placeholder="cin">

            </div>
			      <div class="form-group ">
                
                <input type="text" name="service" class="form-control" id="service" placeholder="Service/Direction">

            </div>

			      <div class="form-group ">
                
                <input type="text" name="entreprise" class="form-control" id="entreprise" placeholder="Entreprise">

            </div>
			  
                        <?php
                       $result = $bdd->query("SELECT * FROM cycle");
                       $result->setFetchMode(PDO::FETCH_ASSOC);
                            ?>
                           
			              <div class="input-group mb-8">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="cycle">Choisir un cycle</label>
                         </div>
                        <select class="custom-select" aria-label="Default select example" name="cycle" >
						     
						        	     <?php foreach ($result as $row) {  ?> 
                             <option value="<?php echo ($row['theme'])?>" ><?php echo ($row['theme'])?></option>
                            <?php } ?>
                        </select>
                    </div>	
            <div class="form-group ">
                
                <input type="text" class="form-control" name="username" id="username" placeholder="username">

            </div>
            <div class="form-group">
               
                <input type="password" class="form-control" name="password" id="password" placeholder="Password ">
                
            </div>

			      <div class="form-group last mb-4">
                
                <input type="password" class="form-control" name="password1" id="password1" placeholder="Password again">
                
            </div>
              
                <input type="submit" name="inscrire" value="S'inscrire" class="btn btn-block btn-primary">
            <div class="flex-sb-m w-full p-t-3 p-b-32">
              
							<a href="index.php" class="btn btn-link" style="text-decoration: none">
							&mdash;J'ai deja un compte  &mdash;
							</a>
						</div>
					</div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  
    <script src="authentification/js/jquery-3.3.1.min.js"></script>
    <script src="authentification/js/popper.min.js"></script>
    <script src="authentification/js/bootstrap.min.js"></script>
    <script src="authentification/js/main.js"></script>
  </body>
</html>