<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "loginstyle.css" media = "screen and (min-width:769px)"/>
    <title>information</title>
</head>
<body>
    <?php
        include("database.php");
        session_start();

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $creditCard = $_POST['cc'];
            $username = $_SESSION["username"];

            if($address && $city && $state && $creditCard){
                $sql = "INSERT INTO orderinformation (username, user_address, user_city, user_state, credit_card) VALUES (?, ?, ?, ?, ?)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $username, $address, $city, $state, $creditCard);

                if ($stmt->execute()) {
                    header("Location: index.php");
                } else {
                    echo "Error inserting user address: " . $stmt->error;
                }               
            }else{
                echo("<div class = 'alert alert-invalid-info'>Please fill in all fields</div>");
            }


        }
    ?>

</body>
</html>