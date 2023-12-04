
   <html lang="en">
   <head>
        <title>php</title>
    </head>
<body>
<?php
   $connString = "mysql:host=localhost;port=8080;dbname=database";

   $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'database';

    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);


   if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["username"])) {
    $usr_name = $_GET["username"];
    echo "Welcome $usr_name <br>";
    } else {
    header("Location: error.php");
    }
    if (isset($_GET["password"])) {
    $pass = $_GET["password"];
    } else {
    header("Location: error.php");
    }
}
    
    $user = "root";
    $pwd = "root";

    try {
        // creating a php database object
        $pdo = new PDO($connString, $user, $pwd);
        // exception handling parameters
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // creating the query to get rows of data from the table
        $sql = "INSERT INTO phplogin SET username= $user, password= $pwd";
        $count = $pdo->exec($sql); // committing the query
        echo "$count row added in the table";
        // closing the connection object
        $pdo = null;
    } 
    catch (PDOException $e) { // exception handling
        echo "Database connection unsuccessful";
        die($e->getMessage());
    }
?>
</body>
   </html>
