<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <?php
        include("database.php");
        
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
            $username = $_POST["user"];
            $password = $_POST["pass"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $error = array();

            if(empty($username) OR empty($password)){
                array_push($error,"Fill in all fields");
            }

            $sql = "SELECT * FROM phplogin WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $rowNum = mysqli_num_rows($result);

            if($rowNum > 0){
                array_push($error, "username already exists");
            }

            if(count($error)>0){
                foreach($error as $error){
                    echo "". $error ."";
                }   
            }else{
                require_once "database.php";
                $sql = "INSERT INTO phplogin (username, pswrd) VALUES ( ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);

                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt, "ss", $username, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "successful";
                    header("Location: index.html");
                }else{
                    die("Something went wrong");
                }
            }
        }
    ?>    

    <form action = "loginpage.php" method = "post">
        Name <input type = "text" name = "user"/>
        Pass <input type = "password" name = "pass" />
        <input type = "submit" name = "submit">
    </form>

    <p>Already have a login? <a href = "oldUser.php">Click here</a></p>
</body>
</html>