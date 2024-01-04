<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/logo_cni.png" rel="icon">
  <title>Ajouter admin</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>
<?php
        include("../connexion/connexion.php");
        session_start();
        $valid="";
    if (!isset($_SESSION['role']) ||  ($_SESSION['role']) != "superadmin") {

        header('location: ../index.php');
    }
        
if(isset($_POST['ajouter']))
{
      $nom=$_POST["nom"];
      $prenom=$_POST["prenom"];
      $cin=$_POST["cin"];
      $username=$_POST["username"];
      $password=$_POST["password"];
      $password1=$_POST["password1"];
      $motdepassecrypt = hash("sha512", $password);
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
           

            $sql = "INSERT INTO login (`username`,`password`,`roleuser`) values ('$username','$motdepassecrypt','admin')";
           
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();

      
            $sql2 =  "INSERT INTO admin (`id_login`,`nom_admin`,`prenom_admin`,`cin_admin`)
            values ('$last_id','$nom','$prenom','$cin' )";
            $conn->exec($sql2);
            echo '<script>alert("Admin ajouté avec succées")</script>';
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
     aria-label='close'>&times;</a><b>Admin ajouté avec succées</b>
     </div>";
}


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
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION["username"]; echo(" ");  ?></span>
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
            <h1 class="h3 mb-0 text-gray-800">Liste des admins :</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Admins</li>
              <li class="breadcrumb-item active" aria-current="page">Liste des admins</li>
            </ol>
          </div>

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
                        <th>Code admin</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>CIN</th>
                        <th>Username</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Code admin</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>CIN</th>
                        <th>Username</th>
                        <th>Supprimer</th>
                      </tr>
                    </tfoot>
                    <tbody>
                     
        <?php
        $result = $bdd->query("SELECT * FROM login, `admin` where roleuser = 'admin' and  `admin`.id_login= login.id_login ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($result as $row) {               
                     ?>
                     <tr>
                       <td><?php echo ($row['id_admin'])?></td>
                       <td><?php echo ($row['nom_admin'])?></td>
                       <td><?php echo ($row['prenom_admin'])?></td>
                       <td><?php echo ($row['cin_admin'])?></td>
                       <td><?php echo ($row['username'])?></td>
                       <td><a name="delete" class="btn btn-danger" href="supprimeradmin.php?Codeuser=<?= $row['Codeuser']?>">supprimer</a></td>
                        </tr> 
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
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
  <script src="../js/ruang-admin.min.js"></script>

</body>

</html>