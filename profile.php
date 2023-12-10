<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <link rel = "stylesheet" href = "style.css" media = "screen and (min-width:769px)"/>
        <link rel = "stylesheet" href = "mobile.css" media = "screen and (max-width: 480px)"/>
        <link rel = "stylesheet" href = "tablet.css" media = "screen and (min-width:481px) and (max-width:768px)"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
        <?php
            session_start();
            include("database.php");
            $username = $_SESSION["username"];

            $sql = " SELECT * FROM recentorders";
            $result = $conn->query($sql);

            $sql2 = "SELECT * FROM orderinformation";
            $result2 = $conn->query($sql2);

            if(!isset($username)){
                header("Location: loginpage.php");
            }
        ?>

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
                            </a>
                        </div>
                </nav>                
            </header>
        </div>

        <div class = "header">
            <h1>Welcome <?= $username?></h1>
        </div>

        <h2>Order History</h2>
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
            <?php 
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['product_id'];?></td>
                <td><?php echo $rows['quantity'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>

        <h2>User Information</h2>
        <table>
            <tr>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Credit Card</th>
            </tr>
            <?php 
                while($rows=$result2->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['user_address'];?></td>
                <td><?php echo $rows['user_city'];?></td>
                <td><?php echo $rows['user_state'];?></td>
                <td><?php echo $rows['credit_card'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>

        
            
    </body>
</html>