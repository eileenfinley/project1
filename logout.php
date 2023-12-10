<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    <?php
        include("database.php");

        session_start();
        
        echo"You've been logged out";
        $sql = "DELETE FROM recentorders";

        if ($conn->query($sql) === TRUE) {
            echo "All rows deleted successfully.";
        } else {
            echo "Error deleting rows: " . $conn->error;
        }

        header("Location: index.html");

        session_destroy();
    ?>
</body>
</html>