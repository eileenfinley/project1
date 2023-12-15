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
        require('cart.php');
        $username = $_SESSION["username"];

        
        foreach($products as $product) {
            $product_name = $product['name'];
            $quantity = (int)$products_in_cart[$product['id']];
            $sql = "INSERT INTO recentorders (user_id, product_id, quantity) VALUES ('$username', '$product_name', $quantity)";
            $conn->query($sql);
        }

        header("Location: userinformation.php");

        unset($_SESSION['cart']);
    ?>
</body>
</html>