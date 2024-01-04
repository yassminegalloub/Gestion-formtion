<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/logo_cni.png" rel="icon">
  <title>Ajouter Participant</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<?php
        include("../connexion/connexion.php");
        session_start();
        $valid="";
?>
<?php
if(isset($_POST['ajouter']))
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
		echo ("<script type='text/javascript'>alert('username deja utilisé');</script>");
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

       $sql3 = "INSERT INTO inscription_cycle (`Numero_Participant`,`nom_cycle`) values ('$last_id2','$cycle')";		
			 $conn->exec($sql3);
 
			 $conn = null;
			} catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			  }
	          
	     }
	     else 
	     {
	        echo ("<script type='text/javascript'>alert('les mots de passe doivent être identiques');</script>");
	     }
      }
      $valid= "<div class='alert alert-success'>
      <a href='#' class='close' 
      data-dismiss='alert'
      aria-label='close'>&times;</a><b>Participant ajouté avec succées</b>
      </div>";
}


?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
     <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
        <div class="sidebar-brand-icon">
        <img src="../img/logo/logo_cni.png">
        </div>
        <div class="sidebar-brand-text mx-3">Gestion de formation</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Statistiques</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>PARTICIPANTS</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="feuillePresence.php">Liste des  Participants</a>
            <a class="collapse-item" href="AjouterParticipant.php">Ajouter Participant</a>

            
          </div>
        </div>
      </li>
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>CYCLES</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="listeCycle.php">Liste des Cycle</a>
            <a class="collapse-item" href="ajouterCycle.php">Ajouter Cycle</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>FORMATEURS</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="listeformateur.php">liste de formateur</a>
            <a class="collapse-item" href="ajouterformateur.php">ajouter formateur</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
         <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="../img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION["username"]; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="../connexion/deconnexion.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Déconnexion
                </a>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajouter participant</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Participants</li>
              <li class="breadcrumb-item active" aria-current="page">Ajouter participant</li>
            </ol>
          </div>

          <div >
            <div class="col-lg-8 " >
              <!-- Form Basic -->
             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="panel panel-danger">
                  <h6 class="m-0 font-weight-bold text-primary">Ajouter participant</h6>
                 </div>
                </div>

                <div class="card-body">

                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row">
                       <div class="col-md-12"><?php echo $valid ; ?></div>
                    </div>  
                    <div class="form-group row">
                         <label for="model" class="col-sm-3 col-form-label">Nom et Prenom :</label>
                      <div class="col-sm-9">
                         <input type="text" name="nom_prenom" class="form-control" id="nom_prenom" placeholder="Nom et Prenom" required>
                      </div>
                    </div>
                     <div class="form-group row">
                         <label for="model" class="col-sm-3 col-form-label">CIN :</label>
                      <div class="col-sm-9">
                         <input type="text" name="cin" class="form-control" id="cin" placeholder="cin" required>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                         <label for="model" class="col-sm-3 col-form-label"> Le Service ou direction :</label>
                      <div class="col-sm-9">
                         <input type="text" name="service" class="form-control" id="service" placeholder="service ou direction" required>
                      </div>
                    </div>
                    <div class="form-group row">
                         <label for="model" class="col-sm-3 col-form-label">L'entreprise</label>
                      <div class="col-sm-9">
                         <input type="text" name="entreprise" class="form-control" id="entreprise" placeholder="entreprise" required>
                      </div>
                    </div>
                    <?php
                       $result = $bdd->query("SELECT * FROM cycle");
                       $result->setFetchMode(PDO::FETCH_ASSOC);
                            ?>
                    <div class="input-group mb-3">
                       <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Choisir un cycle</label>
                       </div>
                       <select class="custom-select" id="inputGroupSelect01" name="cycle">
                         <?php foreach ($result as $row) {  ?> 
                          <option value="<?php echo ($row['theme'])?>" ><?php echo ($row['theme'])?></option>
                        <?php } ?>
                       </select>
                    </div>
                    <div class="form-group row">
                         <label for="model" class="col-sm-3 col-form-label">Le Nom d'utilisateur</label>
                      <div class="col-sm-9">
                         <input type="text" name="username" class="form-control" id="username" placeholder="nom d'utilisateur" required>
                      </div>
                    </div>
                    <div class="col-auto">
                    <div class="form-group row">
    
                    <div class="form-group row">
                         <label for="model" class="col-sm-3 col-form-label">le mot de passe</label>
                      <div class="col-sm-9">
                         <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" required>
                      </div>
                    </div>

                    <div class="form-group row">
                         <label for="model" class="col-sm-3 col-form-label">Repeter le password</label>
                      <div class="col-sm-9">
                         <input type="password" name="password1" class="form-control" id="password1" placeholder="Repeter mot de passe" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
                        <button type="reset" name="annuler" class="btn btn-secondary">Annuler</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://www.linkedin.com/in/mohammed-aziz-laabidi-0281731b5/" target="_blank">GALLOUB YASSMINE</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="..js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

</html>