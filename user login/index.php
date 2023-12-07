<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <?php
        session_start();
        // Include functions and connect to the database using PDO MySQL
        include 'functions.php';
        $pdo = pdo_connect_mysql();
        // Page is set to home (home.php) by default, so when the visitor visits, that will be the page they see.
        $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
        // Include and show the requested page
        include $page . '.php';
    ?>
</body>
</html>