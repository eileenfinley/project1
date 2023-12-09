<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order placing</title>
</head>
<body>
    <?=template_header('Place Order')?>

    <?php
        include('database.php');
        include('cart.php');
        $username = $_SESSION["username"];
        
        foreach($products as $product) {
            $product_name = $product['name'];
            $quantity = (int)$products_in_cart[$product['id']];
            $sql = "INSERT INTO recentorders (user_id, product_id, quantity) VALUES ('$username', '$product_name', $quantity)";
            if ($conn->query($sql) === TRUE) {
                echo " ";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        unset($_SESSION['cart'])
    ?>


    <div class="placeorder content-wrapper">
        <h1>Your Order Has Been Placed</h1>
        <p>Thank you for ordering with us! We'll contact you by email with your order details
            <br>Thank you, <?= $username?>
        </p>
    </div>

    <?=template_footer()?>
</body>
</html>