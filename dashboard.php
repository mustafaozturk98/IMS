<?php
include('connection.php');
session_start();
if(!isset($_SESSION['user'])) header('location: login.php');
$user=($_SESSION['user']);
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard-Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script src="https://kit.fontawesome.com/d3339d24a8.js" crossorigin="anonymous"></script>
    </head>
    <body id=dashboardBody>
        <div class=>
            <div id="dashboardMainContainer">
            <div class="dashboard_sidebar">
                <h3 class="dashboard_logo">IMS</h3>
                <div class="dashboard_sidebar_user">
                    <img src="Images/user.png" alt="User image.">
                    <span><?= $user['first_name']. ' ' . $user['last_name']?></span>
                </div>
                <div class="dashboard_sidebar_menus">
                    <ul class="dashboard_menu_list">
                        <li>
                            <a href=""><i class="fas fa-plus-square"> </i>add Item</a>
                        </li>
            
                        <li>
                            <a href=""><i class="fas fa-minus-square"></i>delete item</a>
                        </li>
                        <li>
                            <a href=""><i class="fas fa-edit"></i>update item</a>
                        </li>
                        <li>
                            <a href=""><i class="fas fa-luggage-cart"></i>item lists</a>
                        </li>
                    </ul>
                </div>
                
            </div>
      
            <div class="dashboard_content_container">
                <div class="dashboard_topNav">
                 
                    <a href="logout.php" id="logoutBtn"><i class="fa fa-power-off"></i>Log-out</a> 
                    
                </div>
                <div class="dashboard_content">
                    <div class="dashboard_content_main">
                    <div class="LoginBody">
                   <form action="additem.php", method="POST">
                    <form action="delete.php",method="POST">
                    <div class="loginInputsContainer">
                        <label for="">Item Number</label>
                        <input placeholder="" name="itemNumber" type="text" />
                    </div>
                    <div class="loginInputsContainer">
                        <label for="">Item Name</label>
                        <input placeholder="" name="itemName" type="text" />
                    </div>
                    <div class="loginInputsContainer">
                        <label for="">Quantity</label>
                        <input placeholder="0" name="Quantity" type="text" />
                    </div>
                    <div class="loginInputsContainer">
                        <label for="">Discount %</label>
                        <input placeholder="0" name="Discount" type="number" />
                    </div>
                    <div class="loginInputsContainer">
                        <label for="">Unit Price</label>
                        <input placeholder="0" name="UnitPrice" type="text"  />
                    </div>
        
                    <div class="loginButtonContainer">
                        <button>
                            add item
                        </button>
                        
                        <button>
                            Delete
                        </button>
                        <button>
                            Update
                        </button>
                    </div>
                    </div>
                
                
                
                </div>
                
                
                <div></div>
            </div>
        </div>
    </div>
    </body>
</html>

