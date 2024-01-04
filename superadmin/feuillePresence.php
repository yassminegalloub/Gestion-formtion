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
  <title>Feuille de presence</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
</head>
 <?php
        include("../connexion/connexion.php");
        session_start();
    if (!isset($_SESSION['role'])   )
    //($_SESSION['role']) != "admin") 
    {

        header('location:../index.php');
    }
    $id= $_SESSION["id"]
        
        ?>
<body id="page-top">
  <div id="wrapper">
  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="superadmin.php">
        <div class="sidebar-brand-icon">
        <img src="../img/logo/logo_cni.png">
        </div>
        <div class="sidebar-brand-text mx-3">Centre de formation</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="superadmin.php">
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
            <a class="collapse-item" href="feuillePresence.php">liste des participant</a>
            <a class="collapse-item" href="AjouterParticipant.php">ajouter participant</a>
        
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>ADMINS</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="listeadmins.php">liste des admins</a>
            <a class="collapse-item" href="ajouteradmin.php">ajouter admin</a>
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
            <a class="collapse-item" href="listeCycle.php">liste des cycle</a>
            <a class="collapse-item" href="ajouterCycle.php">ajouter cycle</a>
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

            <a class="collapse-item" href="listeformateur.php">liste des formateurs</a>
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
            <h1 class="h3 mb-0 text-gray-800" id="titre">Feuille de présence des participants:</h1>
            <ol class="breadcrumb">
              <li id="home" class="breadcrumb-item"><a href="./">Home</a></li>
              <li id="participant" class="breadcrumb-item">Participants</li>
              <li id="listparticipant" class="breadcrumb-item active" aria-current="page">Liste des participants</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th id="demo0" >N° participant</th>
                        <th id="demo1">Nom et Prenom</th>
                        <th id="demo2">N° CIN</th>
                        <th id="demo3">Direction/Service</th>
                        <th id="demo4">Entreprise</th>
                        <th id="demo5">Cycle de formation</th>
                        <th>Supprimer</th>
                        
                        
                      </tr>
                    </thead>
                   
                   
                    <tbody>
                       
        <?php
        $result = $bdd->query("SELECT * FROM participant, inscription_cycle where participant.Numero_Participant = inscription_cycle.Numero_Participant");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($result as $row) {               
                     ?>
                     <tr>
                       <td><?php echo ($row['Numero_Participant'])?></td>
                       <td><?php echo ($row['nom_prenom'])?></td>
                       <td><?php echo ($row['cin'])?></td>
                       <td><?php echo ($row['service'])?></td>
                       <td><?php echo ($row['entreprise'])?></td>
                       <td><?php echo ($row['nom_cycle'])?></td>
                      <td><a name="delete" class="btn btn-danger" href="supprimerParticipant.php?Numero_Participant=<?= $row['Numero_Participant']?>">Supprimer</a></td>
                       
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                  </table>
                  <button id="btn" type="button" class="btn btn-primary">Essayer en arabe <i class="fas fa-language"></i></button>
                  <script>
        document.getElementById('btn').onclick = function() {
          document.getElementById('nom_app').innerHTML = 'إدارة التدريب';
          document.getElementById('titre').innerHTML = 'بطاقة حضور المشاركين';
          document.getElementById('home').innerHTML = 'الصفحة الرئيسية';
          document.getElementById('participant').innerHTML = 'المشاركين';
          document.getElementById('listparticipant').innerHTML = 'قائمة المشاركين ';
          document.getElementById('nav3').innerHTML ='مدرب';
          document.getElementById('nav2').innerHTML ='دورة';
          document.getElementById('nav1').innerHTML= 'المشاركين';
          document.getElementById('demo0').innerHTML = 'عدد المشارك';
            document.getElementById('demo1').innerHTML = 'الإسم و اللقب';
            document.getElementById('demo2').innerHTML = 'رقم بطاقة تعريف';
            document.getElementById('demo3').innerHTML = 'قسم أو إدارة';
            document.getElementById('demo4').innerHTML = 'المؤسسة';
            document.getElementById('demo5').innerHTML = 'دورة تدريبية';
            document.getElementById('btn').innerHTML ='ترجمة بالعربية';
        }
    </script>
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