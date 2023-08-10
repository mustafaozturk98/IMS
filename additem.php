<?php
session_start();
if(isset($_SESSION['add_item'])); 
 $error_message= '';

if($_POST){

    include_once('connection.php'); 

    $itemNumber = $_POST['itemNumber'];
    $itemName = $_POST['itemName'];
    $discount = $_POST['Discount'];
    $quantity = $_POST['Quantity'];
    $unitPrice = $_POST['UnitPrice'];
   
  //  $description = $_POST['itemDetailsDescription'];
   
   $query = "INSERT INTO item(itemNumber,itemName,discount,quantity,unitPrice) VALUES('$itemNumber', '$itemName','$discount','$quantity','$unitPrice')";
   $stmt= $conn->prepare($query);
    $stmt->execute();

   if($stmt->rowCount() > 0){
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user=$stmt->fetchAll()[0];
        $_SESSION['add_item']=$item;

    header('Location:dashboard.php');

   }else $error_message = 'Please make sure that username and password are correct.';
   
}