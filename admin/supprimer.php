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

 $valid="";

if (isset($_GET['Numero_cycle'])) 
{
   $id = $_GET['Numero_cycle'];
    if (empty($id))
    {
        echo '<script type="text/javascript"> alert ("ID Invalide !") </script>';
    } 
    else 
    {
        // connexion à la base de données
		$servername = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "GestionFormations";

		try {

		  $conn = new PDO("mysql:host=$servername;dbname=GestionFormations", $dbusername, $dbpassword);
          
          

          $sql = " DELETE FROM cycle  WHERE Numero_cycle='$id'";
          $sth = $conn->prepare($sql);
             $sth->execute();
		  
		  require('listeCycle.php');
		  

		} catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
}



?>
</body>
</html>