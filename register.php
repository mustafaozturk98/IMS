<?php
session_start();
if(isset($_SESSION['reg_user'])); 
 $error_message= '';

if($_POST){

    include_once('connection.php'); 

   $firstname= $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $password= $_POST['password'];
   $email= $_POST['email'];
   
   $query = "INSERT INTO user(first_name,last_name,password,email) VALUES('$firstname', '$lastname','$password','$email')";
   $stmt= $conn->prepare($query);
    $stmt->execute();

   if($stmt->rowCount() > 0){
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user=$stmt->fetchAll()[0];
        $_SESSION['reg_user']=$user;

    header('Location:dashboard.php');

   }else $error_message = 'Please make sure that username and password are correct.';
   
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registerpage-Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body id=registerBody>
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
                   <form action="register.php" method="POST">
                    <div class="loginInputsContainer">
                        <label for="">Firstname</label>
                        <input placeholder="Enter Firstname" name="firstname" type="text" />
                    </div>
                    <div class="loginInputsContainer">
                        <label for="">Lastname</label>
                        <input placeholder="Enter Lastname" name="lastname" type="text" />
                    </div>
                    <div class="loginInputsContainer">
                        <label for="">Password</label>
                        <input placeholder="Enter Password" name="password" type="password" />
                    </div>
                    <div class="loginInputsContainer">
                        <label for="">E-mail</label>
                        <input placeholder="abc@gmail.com" name="email" type="text" />
                    </div>
                    <div class="loginButtonContainer">
                        <button>
                            register
                        </button>
                    </div>
                    <div class="signup"><p>Already have an account? <a href="Login.php">log in</a></p></div>
                   </form>
                   
               </div>
            </div>
    </body>
</html>