<?php
require_once "config.php";
$incorrect="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = mysqli_real_escape_string($mysqli, $_REQUEST['username']);
    $password = mysqli_real_escape_string($mysqli, $_REQUEST['password']);

$sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
    if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
            header("location: index.php");
            exit();
        } else{
                $incorrect= '<div class="alert alert-danger"><em>Incorrect credentials!</em></div>';
            }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

}
    $mysqli->close();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      
        
       
       #logo{ 
       position: center; 
       border-radius: 50%;
       top:0; 
       left:0; 
       } 

       .wrapper{
        position: center;

       }
       
       body{
       background-image: url(purple.jpg);
       background-position: center;
       .wrapper{ width: 360px; padding: 20px; }
       }
       
       #form{
       background-color: #f1a3ad;
       width:27%;
       border-radius: 4px;
       margin:120px auto;
       padding:px;
       
       }

       body{
       background-image: url("img/make5.jpg");
       backdrop-filter: blur(5px);
       }

       img {
  border-radius: 50%;
  position: center;
}

img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

.h2 {
    font-family: 'Brush Script MT', calligrapher;
    font-style: bold;
}

       
       #btn{
       color:rgb(255, 255, 255);
       background-color: rgb(189, 22, 22);
       padding:10px;
       font-size: large;
       border-radius: 10px;
       }
       
       @media screen and (max-width: 570px) {
       #form {
         width: 65%;
         margin-left:none;
         padding:40px;
       }
       
       
       
       }

       </style>
</head>
<body>
    <div id="form">
    <div class="wrapper">
    <center><a href="index.html">
  <img src="img/ag.png" alt="ag">
</a> </center>
    
<h2 class="h2">Login here</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
            <li>
                <a href="index.html">
                    <i class="fas fa-sign out"></i>
                    Back to home
                </a>
            </li>
        </form>

    </div>
</body>
</html>