<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
            $username = $_POST["user"];
            $password = $_POST["pass"];

            $error = array();

            if(empty($username) OR empty($password)){
                array_push($error,"Fill in all fields");
            }

            if(count($error)==1){
                foreach($error as $error){
                    echo "". $error ."";
                }   
            }else{
                require_once "database.php";
                $sql = "INSERT INTO phplogin (username, pswrd) VALUES ( ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);

                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
                    mysqli_stmt_execute($stmt);
                    echo "successful";
                }else{
                    die("Something went wrong");
                }
            }
        }
    ?>    

    <form action = "loginpage.php" method = "post">
        Name <input type = "text" name = "user"/>
        Pass <input type = "text" name = "pass" />
        <input type = "submit" name = "submit">
    </form>
</body>
</html>