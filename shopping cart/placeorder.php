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
        unset($_SESSION['cart'])
    ?>


    <div class="placeorder content-wrapper">
        <h1>Your Order Has Been Placed</h1>
        <p>Thank you for ordering with us! We'll contact you by email with your order details</p>
    </div>

    <?=template_footer()?>
</body>
</html>