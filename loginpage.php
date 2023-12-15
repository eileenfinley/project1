<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "loginstyle.css" />
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
                array_push($error, "Username already exists");
            }

            if(count($error)>0){
                foreach($error as $error){
                    echo("<div class = 'alert alert-invalid'>$error</div>");
                }   
            }else{
                require_once "database.php";
                $sql = "INSERT INTO phplogin (username, pswrd) VALUES ( ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);

                if($prepareStmt){
                    session_start();
                    mysqli_stmt_bind_param($stmt, "ss", $username, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "successful";
                    $_SESSION["username"] = $username;
                    $id = $_SESSION['id'];
                    header("location: profile.php");
                }else{
                    die("Something went wrong");
                }
            }
        }
    ?>    

    <div class = "main">
        <div class = "signup">
            <form action = "loginpage.php" method = "post" id = "form" onsubmit = "return validateForm()">
                <label>Sign up</label>
                <input type = "text" name = "user" id = "user" placeholder = "Name" class = "validate" /> 
                <span id="usernameError" class="error"></span><br>
                <input type = "password" name = "pass" id = "pass" placeholder="Password" class = "validate"/>  
                <span id="passwordError" class="error"></span><br>  
                <input type = "submit" name = "submit">
                <p>Already have a login? <a href = "oldUser.php">Click here</a></p> 
            </form>     
        </div>
        <script src="formvalidate.js"></script>
    </div>
    

   
</body>
</html>