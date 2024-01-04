
<?php
 include("../connexion/connexion.php");
 session_start();
 if (!isset($_SESSION['role']) ||  ($_SESSION['role']) != "client") {

     header('location:../index.php');
 }

 $cycle=$_SESSION["nom_cycle"] ;
 $numParticipant=$_SESSION["numero_participant"];
$id=$_SESSION['id'];
$username = $_SESSION['username'];




if (isset($_GET['theme'])) 
{
   $cycle = $_GET['theme'];
   
        // connexion à la base de données
		$servername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "gestioncycle";

		try {

		$conn = new PDO("mysql:host=$servername;dbname=gestioncycle", $dbusername, $dbpassword);
        
        $sql3 = "INSERT INTO inscription_cycle (`Numero_Participant`,`nom_cycle`) values ('$numParticipant','$cycle') ";		
        $conn->exec($sql3);
        
        header('Location:listeCycle.php');
		} catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    
}



