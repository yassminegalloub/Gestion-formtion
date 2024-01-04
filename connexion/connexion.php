<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gestionCycle";
    $bdd = new PDO("mysql:host=$servername;dbname=gestionCycle", $dbusername, $dbpassword);
   // $bdd = new PDO('mysql:host=localhost;dbname=GestionFormations;charset=utf8', 'root', '');
    ?>
</body>
</html>

