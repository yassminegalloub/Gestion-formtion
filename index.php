<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="authentification/fonts/icomoon/style.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">


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
?>
<?php
$valid="";
 if(isset($_POST['connexion'])){
 $username=$_POST["username"];
 $password=$_POST["password"];
 $crypt_pass = hash("sha512", $password);
 include("connexion/connexion.php");
 
//$req=("SELECT * FROM login, participant WHERE login.id_login=participant.id_login OR username ='$username' ");
$req=("SELECT * FROM login  WHERE username ='$username' ");
$response = $bdd->query($req);
$state = $response->rowCount();
$data = $response->fetch();



             if ($state != 0)
             {   
                  $_SESSION["numero_participant"] =  $data['Numero_Participant'];
                  $_SESSION["id"] =  $data['id_login'];
				          $_SESSION["motdepasse"] =  $data['password'];
				          $_SESSION["username"] =  $data['username'];
				          $_SESSION["role"] =  $data['roleuser'];
                  if( $crypt_pass == $data['password'])
                  { 
                       if ($data ['roleuser']=="superadmin")
                       {
                          header('location: superadmin/listeadmins.php');
                       }
                       elseif ($data ['roleuser']=="admin")  
                       {
                          header('location: admin/feuillePresence.php ');
                       }
                       else header('location: client/listeCycle.php ');
                  }
                  else
                  {
                        
                      $valid= "<div class='alert alert-danger'>
                        <a href='#' class='close' 
                        data-dismiss='alert'
                        aria-label='close'>&times;</a><b>Mot de passe incorrecte </b>
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
              <h1>Authentifiez-vous </h1>
            </div>
            <form action="#" method="post">
            <div class="row">
              <div class="col-md-12"><?php echo $valid ; ?></div>
            </div>
            <div class="form-group first">
              <div class="wrap-input100 validate-input m-b-23">
              <input type="text" name="username" class="form-control" id="username" placeholder="Username">
              </div>
            </div>
            <div class="form-group last mb-4">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password"> 
            </div>
                <input type="submit" name="connexion" value="connecter" class="btn btn-block btn-primary">
              <div class="flex-sb-m w-full p-t-3 p-b-32">
						<div >
							<a href="inscritParticipant.php" class="btn btn-link" style="text-decoration: none">
							&mdash;Vous n'avez pas un compte? créer votre compte&mdash;
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