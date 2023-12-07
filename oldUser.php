<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Login</title>
    </head>
    <body>
        <?php
            include("database.php");

            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){
                $username = $_POST["user"];
                $password = $_POST["pass"];

                $sql = "SELECT * FROM phplogin WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);

                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if($user){
                    if(password_verify($password, $user["pswrd"])){
                        session_start();
                       $_SESSION["username"] = $user["username"];
                        header("Location: profile.php");
                    }else{
                        echo("Password does not match");
                    }
                }else{
                    echo("Username does not match");
                }
            }
        ?>
        
        <form action = "oldUser.php" method = "post">
            Name <input type = "text" name = "user"/>
            Pass <input type = "password" name = "pass" />
            <input type = "submit" name = "login">
        </form>
    </body>
</html>