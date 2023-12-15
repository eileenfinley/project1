<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>functions</title>
    <script src="https://kit.fontawesome.com/0489b81b60.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    function pdo_connect_mysql() {
        // Update the details below with your MySQL details
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = 'root';
        $DATABASE_NAME = 'database';
        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }
    // Template header, feel free to customize this
    function template_header($title) {
    // Get the number of items in the shopping cart, which will be displayed in the header.
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="shoppingcartstyle.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
            <header>
                <div class="topnav">
                <header>
                    <nav>
                            <a class = "active" href="index.html">Home</a>
                            <a href="page1.html">History</a>
                            <a href="page2.html">Basics</a>
                            <a href="page3.html">Terminology</a>
                            <a href="page4.html">Truman Ultimate</a>
                                <div class="dropdown">
                                    <button class="dropbtn"><a href="page5.html">Playbook</a> </button>
                                    <div class="dropdown-content">
                                        <a href="page6.html">Bowtie</a>
                                        <a href="page7.html">Handle Motion</a>
                                        <a href="page8.html">Endzone</a>
                                    </div>
                                </div>
                            <a href="page9.html">More Information</a>
                            <a href = "index.php">Shop Here</a>
                            <a href = "logout.php">Logout</a>
                            <div class="link-icons">
                                <a href = "profile.php">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <a href="index.php?page=cart">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>$num_items_in_cart</span>
                                </a>
                            </div>
                    </nav>                
                </header>
                <style>
                .topnav a{color: white; text-decoration: none;};
              </style>
            </div>
            </header>
            <main>
    EOT;
    }
    // Template footer
    function template_footer() {
        $year = date('Y');
        echo <<<EOT
                </main>
                <footer>
                    <div class="content-wrapper">
                        <p>&copy; $year, Shopping Cart System</p>
                    </div>
                </footer>
            </body>
        </html>
        EOT;
    }
    ?>
</body>
</html>