<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <link rel = "stylesheet" href = "style.css" media = "screen and (min-width:769px)"/>
        <link rel = "stylesheet" href = "mobile.css" media = "screen and (max-width: 480px)"/>
        <link rel = "stylesheet" href = "tablet.css" media = "screen and (min-width:481px) and (max-width:768px)"/>
    </head>
    <body>
        <?php
            session_start();
            $username = $_SESSION["username"];

            if(!isset($username)){
                header("Location: loginpage.php");
            }
        ?>

        <div class="topnav">
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
            </nav>
        </div>

        <div class = "header">
            <h1>Welcome <?= $username?></h1>
        </div>

        <h2>Order History</h2>
    </body>
</html>