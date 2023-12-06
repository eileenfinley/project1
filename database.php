<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php</title>
</head>
<body>
    <?php
        $host = "localhost";
        $data_username = "root";
        $data_password = "root";
        $database = "database";

        // Create connection
        $conn = new mysqli($host, $data_username, $data_password, $database);

        if ($conn->connect_error) {
            echo 'Errno: '.$mysqli->connect_errno;
            echo '<br>';
            echo 'Error: '.$mysqli->connect_error;
            exit();
        }
    ?>    
</body>
</html>
