<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "loginstyle.css" />
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
                        echo("<div class = 'alert alert-invalid'>Password invalid</div>");
                    }
                }else{
                    echo("<div class = 'alert alert-invalid'>Username invalid</div>");
                }
            }
        ?>

        
        <div class = "main">
            <div class = "signup">
            <form action = "oldUser.php" method = "post" id = "submit">
                <label>Login</label>
                <input type = "text" name = "user" id = "user" placeholder = "Username"/>
                <input type = "password" name = "pass" id = "pass" placeholder = "Password"/>
                <input type = "submit" name = "login">
            </form>
            </div>
        </div>  

    </body>   
</html>