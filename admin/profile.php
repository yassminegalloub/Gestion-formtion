<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Content-Language" content="ar-tn">
  <link href="../img/logo/logo_cni.png" rel="icon">
  <title>Mon Profile</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
</head>
 <?php
        include("../connexion/connexion.php");
        session_start();
        $valid="";
        if (!isset($_SESSION['role']) ||  ($_SESSION['role']) != "admin") {

            header('location: ../index.php');
        }
        if(isset($_POST['modifier'])){
            $mot = $_SESSION["motdepasse"];
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];

            $cin=$_POST["cin"];
          
            $username=$_POST["username"];
            $motdepasse=$_POST["password"];
            $id = $_POST["id"];
            $motdepassecrypt = hash("sha512", $motdepasse);
            if ($motdepassecrypt != $mot)
            {
              $valid= "<div class='alert alert-danger'>
              <a href='#' class='close' 
              data-dismiss='alert'
              aria-label='close'>&times;</a><b>Votre Mot de passe incorrect essayer une autre fois</b>
              </div>";
            }
            else
            {  
               $insert = $bdd->query("UPDATE login SET username='$username'WHERE id_login = '$id'");
            $insert1 = $bdd->query("UPDATE admin SET nom_admin='$nom',prenom_admin='$prenom', cin_admin='$cin'WHERE id_login = '$id'");
            $valid= "<div class='alert alert-success'>
            <a href='#' class='close' 
            data-dismiss='alert'
            aria-label='close'>&times;</a><b>Données modifiée avec succées</b>
            </div>";
            }
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
        <div id="nom_app" class="sidebar-brand-text mx-3">Gestion de formation</div>
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
          <span id="nav1">PARTICIPANTS</span>
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
          <span id="nav2">CYCLES</span>
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
          <span id="nav3">FORMATEURS</span>
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
            <h1 class="h3 mb-0 text-gray-800">Mon profile</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">profil</li>
              <li class="breadcrumb-item active" aria-current="page">mon prfile</li>
            </ol>
          </div>

         <div >
            <div class="col-lg-6 " >
              <!-- Form Basic -->
             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Mes coordonnées </h6>
                </div>
                <div class="card-body">
                  <?php
                   $id=$_SESSION['id'];
                   $username = $_SESSION['username'];
                         try{
                             
                       $sth = $bdd->prepare("SELECT username, password FROM login WHERE id_login='$id'");
                             $sth->execute();
                       
                            
                        
                             
                       $sth2 = $bdd->prepare("SELECT  nom_admin, prenom_admin, cin_admin FROM admin WHERE id_login='$id'");
                             $sth2->execute();
                 
                             
                       
                            
                             $result = $sth2->fetchAll();
                             foreach ($result as $row) {
                         $res = $sth->fetchAll();
                             foreach ($res as $rows) {?>
                  <form method="POST" action="">
                  <div class="row">
                       <div class="col-md-12"><?php echo $valid ; ?></div>
                    </div>
                    <div class="form-group row">
                      <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                      <div class="col-sm-9">
                        <input type="text" name="nom" class="form-control" id="nom" value="<?php echo( $row['nom_admin']) ?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                      <div class="col-sm-9">
                        <input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo( $row['prenom_admin']) ?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="prenom" class="col-sm-3 col-form-label">CIN</label>
                      <div class="col-sm-9">
                        <input type="text" name="cin" class="form-control" id="prenom" value="<?php echo( $row['cin_admin']) ?>" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text"  name="username" class="form-control" id="email" value="<?php echo( $rows['username']) ?>" required>
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label for="motdepasse" class="col-sm-3 col-form-label">Mot de passe</label><i class="fal fa-lock-alt"></i>
                      <div class="col-sm-9">
                        <input type="password"  name="password" class="form-control" id="motdepasse" placeholder="votre mot de passe pour confirmer les modifications" required>
                        <input type="text"  name="id" class="form-control" value="<?php echo( $_SESSION["id"])?>" hidden>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                      </div>
                    </div>
                  </form>
                  <?php
                    }
                  } 
                  }catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
             ?>
                </div>
              </div>
            </div>

        
          </div>
          <!--Row-->

        
          <!-- Modal Logout -->
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
              <b><a href="" target="_blank">GALLOUB YASSMINE</a></b>
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
  <script src="../js/ruang-admin.min.js"></script>

</body>

</html>