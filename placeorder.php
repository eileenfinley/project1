<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order placing</title>
</head>
<body>
    <?php
        include('database.php');
        //require('cart.php');
        session_start();

        $username = $_SESSION["username"];
        $products = $_SESSION['products'];
        $product = $_SESSION['product'];
        
        foreach($products as $product) {
            //$product_name = $product['name'];
            //$quantity = (int)$products_in_cart[$product['id']];
            $product_name = $_SESSION['product_name'];
            $quantity = $_SESSION['quantity'];
            $sql = "INSERT INTO recentorders (user_id, product_id, quantity) VALUES ('$username', '$product_name', $quantity)";
            $conn->query($sql);
        }


        header("location: userinformation.php");
        unset($_SESSION['cart']);
    ?>

    <!--<div class = "user"> 
        <div class = "information">
            <form action = "userinformation.php" method = "post">
                <label>Shipping Information</label>
                <input type = "text" name = "address" placeholder= "Address" required/>
                <input type = "text" name = "city" placeholder = "City" required/>
                <input type = "text" name = "state" placeholder="State" required/>
                <input type = "text" name = "cc" placeholder="Credit Card Number" required/>
                <input type = "submit" name = "submit">
                <p>Already submitted information? <a href = "index.php">Click here to back out</a></p> 
            </form>   
        </div>
 
    </div>-->
</body>
</html>