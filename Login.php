<?php
session_start();
if(isset($_SESSION['user'])) header('location:dashboard.php');
 $error_message= '';

if($_POST){

    include_once('connection.php'); 

   $username= $_POST['username'];
   $password= $_POST['password'];
   
    $query = 'SELECT * FROM user WHERE user.email="'.$username.'" AND user.password="'.$password.'"';
   $stmt= $conn->prepare($query);
    $stmt->execute();

   if($stmt->rowCount() > 0){
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user=$stmt->fetchAll()[0];
        $_SESSION['user']=$user;

    header('Location:dashboard.php');

   }else $error_message = 'Please make sure that username and password are correct.';
   
}
   


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Loginpage-Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body id=loginBody>
        <?php
        if(!empty($error_message)) {
        ?>
        <div id="errorMessage">
           <strong>Error:</strong> <p>Error: <?= $error_message  ?></p>
        </div>
        <?php } ?>
        <div class="container">
        <div class="loginHeader">
            <h1>IMS</h1>
            <p> Inventory Management System </p>
               </div>
               <div class="LoginBody">
                   <form action="login.php" method="POST">
                    <div class="loginInputsContainer">
                        <label for="">Username</label>
                        <input placeholder="Username" name="username" type="text" />
                    </div>
                    <div class="loginInputsContainer">
                        <label for="">Password</label>
                        <input placeholder="Password" name="password" type="password" />
                    </div>
                    <div class="loginButtonContainer">
                        <button>
                            Login
                        </button>
                    </div>
                    <div class="signup"><p>Don't have an account? <a href="register.php">Sign up</a></p></div>
                   </form>
                   
               </div>
            </div>
    </body>
</html>