<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/logo_cni.png" rel="icon">
  <title>Mes Cycles</title>
 

  
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>
<?php
include("../connexion/connexion.php");
session_start();
    if (!isset($_SESSION['role']) ||  ($_SESSION['role']) != "client") {

        header('location:../index.php');
    }
$id1=$_SESSION['id'];
$username = $_SESSION['username'];

  $pdoStat = $bdd->prepare('SELECT * FROM cycle WHERE Numero_cycle=:Numero_cycle');
  $pdoStat->bindValue(':Numero_cycle', $_GET['Numero_cycle'], PDO::PARAM_STR);
  $executeIsOk = $pdoStat->execute();



?>
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
         <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="client.php">
        <div class="sidebar-brand-icon">
        <img src="../img/logo/logo_cni.png">
        </div>
        <div class="sidebar-brand-text mx-3">Gestion de formation</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="client.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Espace client</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>CYCLES</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="listeCycle.php">Mes cycles</a>
           
            
          </div>
        </div>
      </li>
    
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
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION["username"]; 
                ?></span>
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
        <!-- Container Fluid -->
       
          
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Détails de cycle :</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Cycles</li>
              <li class="breadcrumb-item active" aria-current="page">Mes cycles</li>
            </ol>
          </div>
          
          <!-- row -->
          <div class="row">
            <?php
                   foreach ($pdoStat as $row) { ?>
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <table>

                  <?php echo '<tr><td colspan="2"><img  src="../image/'.$row['image'].'" height="300px" width="1200px"> </td></tr>';?> 
                  <tr>
                    <td ><p>Le nom du theme: </p><h6><b><?php echo($row['theme'] );?></b></h6></td>
                     <td><p> Type :</p><b>formation technique complémentaire</b></td>
                </tr>
              <tr>
                <td><p>Date debut: </p><b><?php echo(" ".$row['debut_periode']);?></b></td>
                <td><p>Date fin: </p><b><?php  echo $row["fin_periode"] ; ?></b></td>
              </tr>
              <tr>
                <td><p>Debut horaire: </p><b><?php echo(" ".$row['debut_horaire']);?></b></td>
                <td><p>Fin horaire: </p><b><?php  echo $row["fin_horaire"] ; ?></b></td>
              </tr>
              <tr>
                <td><p>Debut de pause: </p><b><?php echo($row['debut_pause']);?></b></td>
                 <td><p> Fin de pause: </p><b><?php echo $row["fin_pause"] ; ?></b></td>
                   </tr>
                   <tr>
                     <td><p>Salle de formation: </p><b><?php echo($row['numsalle']); ?></b></td>
                     <td><p>Modele formation: </p><b><?php echo($row['modele']); ?></b></td>
                   </tr>
                   <tr>
                     <td><p>Lieu de formation: </p><b><?php echo($row['lieu']); ?></b></td>
                     <td><p>Le formateur: </p><b><?php echo($row['nomprenom_formateur']); ?></b></td></tr>

                    <tr><td> <?php
                 $result1 = $bdd->query("SELECT nom_cycle FROM inscription_cycle, participant  where participant.Numero_Participant=inscription_cycle.Numero_participant and id_login='$id1'");
                 $result1->setFetchMode(PDO::FETCH_ASSOC);
                     foreach ($result1 as $data) {
                             if($data['nom_cycle']==$row['theme']){?>
                                <h4><span class="badge badge-primary">Déja inscrit</span></h4>
                            <?php } 
                            else{ ?>
                                <h4><span class="badge badge-danger">Non inscrit</span></h4>
                            <?php  } 
                    } ?></td>
                   </tr>
              </table>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <!-- Row -->
  
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
        <!-- Container Fluid -->
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
    </div>
  </div>
  <!-- scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/ruang-admin.min.js"></script>
</body>

</html>