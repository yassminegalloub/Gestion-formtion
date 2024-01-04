<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Modifier les coordonnes des clients</title>
</head>
<body>
<?php
 include("../connexion/connexion.php");

 


 if (isset($_GET['Numero_Participant'])) 
{
   $num = $_GET['Numero_Participant'];

 $valid="";

        // connexion à la base de données
		$servername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "gestionCycle";

		try {

		  $conn = new PDO("mysql:host=$servername;dbname=gestionCycle", $dbusername, $dbpassword);
          
          

          $sql = " DELETE FROM participant WHERE Numero_Participant='$num' ";
          $sth = $conn->prepare($sql);
             $sth->execute();

          

                $sql3 = " DELETE FROM inscription_cycle  WHERE  Numero_Participant='$num' ";
                $sth3 = $conn->prepare($sql3);
                   $sth3->execute();

		  
		  require('feuillePresence.php');
		  

		} catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    
}



?>
</body>
</html>