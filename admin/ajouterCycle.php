<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo/logo_cni.png" rel="icon">
  <title>Ajouter Cycle </title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>
<?php
        include("../connexion/connexion.php");
        session_start();
        $image="";
        $valid="";
    if(isset($_POST['ajouter'])){
      $numaction=$_POST["numaction"];
     
      $theme=$_POST["theme"];
      $model=$_POST["model"];
      $lieu=$_POST["lieu"];
      $nomprenom_formateur=$_POST["formateur"];
      $gouvernorat=$_POST["gouvernorat"];
      $numsalle=$_POST["numsalle"];
      $datedebut=$_POST["datedebut"];
      $datefin=$_POST["datefin"];
      $horairedebut=$_POST["horairedebut"];
      $horairefin=$_POST["horairefin"];
      $pausedebut=$_POST["pausedebut"];
      $pausefin=$_POST["pausefin"];
      $image=$_FILES['img']['name'];
      $upload="../image/".$image ;
      move_uploaded_file($_FILES['img']['tmp_name'], $upload);
        
       $insert = $bdd->query("INSERT INTO `cycle` (`Numero_cycle`,  `theme`, `modele`,`lieu` ,`gouvernorat`, 
       `numsalle` ,`debut_periode`,`fin_periode` ,`debut_horaire`,`fin_horaire` ,`debut_pause`,`fin_pause`,`image`,`nomprenom_formateur`)
       VALUES ('$numaction', '$theme', '$model', '$lieu', '$gouvernorat',
       '$numsalle', '$datedebut', '$datefin', '$horairedebut', '$horairefin', '$pausedebut', '$pausefin', '$image' , '$nomprenom_formateur');");
  
       $valid= "<div class='alert alert-success'>
       <a href='#' class='close' 
       data-dismiss='alert'
       aria-label='close'>&times;</a><b>Cycle ajouté avec succées</b>
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
            <h1 class="h3 mb-0 text-gray-800">Ajouter cycle</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Cycles</li>
              <li class="breadcrumb-item active" aria-current="page">Ajouter cycle</li>
            </ol>
          </div>


         <div >
            <div class="col-lg-8 " >
              <!-- Form Basic -->
             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="panel panel-danger">
                  <h6 class="m-0 font-weight-bold text-primary">Ajouter Cycle</h6>
                 </div>
                </div>

                <div class="card-body">

                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row">
                       <div class="col-md-12"><?php echo $valid ; ?></div>
                    </div>
                    <div class="form-group row">
                          <label for="nomproduit" class="col-sm-3 col-form-label">N° Action</label>
                        <div class="col-sm-9">
                          <input type="number" name="numaction" class="form-control" id="numaction" placeholder="Numero Action" required>
                        </div>
                    </div>

                     
                    <div class="form-group row">
                         <label for="theme" class="col-sm-3 col-form-label">Theme de formation</label>
                      <div class="col-sm-9">
                         <input type="text" name="theme" class="form-control" id="theme" placeholder=" Theme de formation" required>
                      </div>
                    </div>


                    <div class="form-group row">
                         <label for="model" class="col-sm-3 col-form-label">Model de formation</label>
                      <div class="col-sm-9">
                         <input type="text" name="model" class="form-control" id="model" placeholder="Model de formation" required>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="model" class="col-sm-3 col-form-label">Lieu de formation</label>

                      <div class="col-sm-9">
                         <input type="text" name="lieu" class="form-control" id="lieu" placeholder="Lieu de deroulement" required>
                      </div>
                    </div>
                    <div class="form-group row">
                    <label for="model" class="col-sm-3 col-form-label">Gouvernorat</label>
                      <div class="col-sm-9">
                        <select class="form-control mb-6" name="gouvernorat" required>
                             <option selected>Tunis</option>
                             <option>Nabeul</option>
                             <option>Zaghouan</option>
                             <option>Bizete</option>
                        </select>
                       </div>
                      </div>
                      <div class="form-group row">
                         <label for="numsalle" class="col-sm-3 col-form-label">N° de salle</label>
                        <div class="col-sm-6">
                           <select class="form-control mb-6" name="numsalle" required>
                           <option selected>---</option>
                             <option >01</option>
                             <option>02</option>
                             <option>03</option>
                             <option>04</option>
                           </select>
                        </div>
                      </div>
                  

                    <div class="form-row">
                     <div class="col-md-6">
                        <div class="form-group">
                        <label class="small mb-1" for="inputDate">Periode: Du</label>
                        <input class="form-control py-4" id="inputDate" type="date" name="datedebut" value="datedebut"  required />
                        </div>
                     </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="small mb-1" for="inputDate">Au</label>
                        <input class="form-control py-4" id="inputDate" type="date" name="datefin"  value="datefin" required />
                    </div>
                    </div>           
                    </div>


                    <div class="form-row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="small mb-1" for="inputtime">Horaire: De</label>
                          <input class="form-control py-4" id="inputtime" type="time" name="horairedebut" value="horairedebut"  required />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="small mb-1" for="inputtime">À</label>
                          <input class="form-control py-4" id="inputtime" type="time" name="horairefin"  value="horairefin" required />
                        </div>
                      </div>
                  
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="small mb-1" for="inputtime">Pause: De</label>
                          <input class="form-control py-4" id="inputtimepause" type="time" name="pausedebut" value="pausedebut"  required />
                        </div>
                       </div>
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="small mb-1" for="inputtime">À</label>
                        <input class="form-control py-4" id="inputtimepause" type="time" name="pausefin"  value="pausefin" required />
                      </div>
                    </div> 
                  </div>
                  <div class="input-group mb-3">
           <div class="input-group-prepend">
              </div>
                <div class="custom-file">
               <input type="file" name="img" class="custom-file-input" id="img">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
               </div>
               <?php
                       $result = $bdd->query("SELECT * FROM formateur");
                       $result->setFetchMode(PDO::FETCH_ASSOC);
                            ?>
                      <div class="form-group row">     
			              <div class="input-group mb-8">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="formateur">Choisir le formateur de cycle: </label>
                         </div>

                        <select class="custom-select" aria-label="Default select example" name="formateur" >
                        <?php foreach ($result as $row) {  ?> 
                              
                              
                             <option value="<?php echo ($row['nom'].$row['prenom'])?>" ><?php echo ($row['nom']." ".$row['prenom'] )?></option>
                             <?php } ?>
                        </select>
                    </div>	
                        </div>
                   

                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
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