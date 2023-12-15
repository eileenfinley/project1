<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "loginstyle.css" />
    <script type = "text/javascript" src="formvalidate.js"></script>            
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
                echo("<div class = 'alert alert-invalid'>Fill in all fields</div>");
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
                    $_SESSION["username"] = $user["username"];
                    $id = $_SESSION['id'];
                    header("Location: profile.php");
                }else{
                    die("Something went wrong");
                }
            }
        }
    ?>    

    <!--<div class = "main">
        <div class = "signup">
            <form action = "loginpage.php" method = "post" id = "form" >
                <label>Sign up</label>
                <div class = "form-control">
                    <input type = "text" name = "user" id = "user" placeholder = "Name" />
                    <small>Error Message</small>               
                </div>
                <div class = "form-control">
                     <input type = "password" name = "pass" id = "pass" placeholder="Password" />
                    <small>Error Message</small>               
                </div>
                <input type = "submit" name = "submit">
                <p>Already have a login? <a href = "oldUser.php">Click here</a></p> 
            </form>     
            <script type = "text/javascript" src="formvalidate.js"></script>            
        </div>
    </div>-->

    <!--<div class = "main">
        <div class = "signup">
            <form action = "loginpage.php" method = "post" id = "form" onsubmit="return validateForm(event)">
                <label>Sign up</label>
                <div class = "form-control">
                    <input type = "text" name = "user" id = "user" placeholder = "Name" class = "validate" />
                    <span id="usernameError" class="error"></span><br>             
                </div>
                <div class = "form-control">
                     <input type = "password" name = "pass" id = "pass" placeholder="Password" class = "validate"/>
                     <span id="passwordError" class="error"></span><br>              
                </div>
                <input type = "submit" name = "submit">
                <p>Already have a login? <a href = "oldUser.php">Click here</a></p> 
            </form>     
        </div>
    </div>-->

   <div class = "main">
        <div class = "signup">
            <form action = "loginpage.php" method = "post" id = "form">
                <label>Sign up</label>
                <input type = "text" name = "user" id = "user" placeholder = "Name" class = "validate" /> 
                <input type = "password" name = "pass" id = "pass" placeholder="Password" class = "validate"/>    
                <input type = "submit" name = "submit">
                <p>Already have a login? <a href = "oldUser.php">Click here</a></p> 
            </form>     
        </div>
    </div>

    

   
</body>
</html>