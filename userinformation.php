<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information</title>
</head>
<body>
    <?php
        include("database.php");

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
            $address = $_POST('address');
            $city = $_POST('city');
            $state = $_POST('state');
            $creditCard = $_POST('cc');

            $sql = "INSERT INTO orderinformation (user_address, user_city, user_state, credit_card) VALUES (?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $address, $city, $state, $creditCard);

            if ($stmt->execute()) {
                echo "User address inserted successfully!";
            } else {
                echo "Error inserting user address: " . $stmt->error;
            }
        }
    ?>

    <form action = "userinformation.php" method = "post">
        Address <input type = "text" name = "address"/>
        City <input type = "text" name = "city"/>
        State <input type = "text" name = "state"/>
        Credit Card Number <input type = "text" name = "cc" />
        <input type = "submit" name = "submit">
    </form>
</body>
</html>