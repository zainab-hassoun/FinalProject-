
<?php 
session_start();
$con=mysqli_connect("localhost","root","1234","loginproject");
//check if user is logged in
if(isset($_SESSION['email'])){
    $username = $_SESSION['email'];
}else{
    //redirect to login page if user is not logged in
    header("Location:login.php");
    exit();
}
?><?php

$user=$_SESSION['email'];
$con=mysqli_connect("localhost","root","1234","loginproject");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['submit'])){
    include 'testBuyCart.php';
    $uname=$_POST['fullname'];
    $email=$_POST['email'];
    $cardNumber=$_POST['cardnumber'];
    $CVV=$_POST['cvv'];
    $date=$_POST['date'];
    $sql="INSERT INTO payment VALUES ('$cardNumber','$uname',' $date',' $CVV','$email')";
    $result=mysqli_query($con,$sql);
    if($result){
        header('Location:pay.php');
    }
    else{
        echo "error";
     
    }
}
?>
<style>
 
    body {
    background: linear-gradient(#f5ebe0) ;		
    background-image:url('https://cdn.shopify.com/s/files/1/0595/5262/8886/files/IRY_Jewelry_shop.jpg?v=1633184471');
   
    background-position: center;
    background-repeat: no-repeat;
    background-size:cover;
    }
    ul {
    list-style-type: none;
    margin-top: 10px;
    padding: 0;
    height:60px;
    overflow: hidden;
    font-family: 'Roboto', sans-serif;
    }
    
    li {
    float: left;
    
    }
   
    li a {
    display: block;
    
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    background-color: #fff;
    color: #000;
    }
    .icon1{
       
    float: right;
    
    }
    .cart-icon {
        font-size: 24px;
        margin-right: 5px;
    }
    
    .iconcart {
        font-size: 14px;
        font-weight: bold;
     
        color: #000;
        padding: 4px;
        padding: 14px 16px;
    text-decoration: none;
        margin-left: 530px;
        display: block;
    }
  .wrapper{
    background-image:url('image/img555.jpg');
    width: 500px;
    height:700px;
    padding: 25px;
    margin: 50px auto 0;
    
    box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
  }
  .wrapper h2{
   
    color: #9d8189;
    font-size: 24px;
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
    border: 3px dotted #9d8189;
  }
  
  h4 {
            padding-bottom: 2px;
            color: #9d8189;
        }

        .input-group {
            margin-bottom: 8px;
            width: 90%;
            position: relative;
            display: flex;
            flex-direction: row;
            padding: 2px;
        }

        .input-box {
            width: 100%;
            margin-right: 12px;
            position: relative;
        }

        .input-box:last-child {
            margin-right: 0;
        }

  .name{
    padding: 14px 10px 10px 100px;
    width: 100%;
    background-color: #fcfcfc;
    border: 1px solid ;
    outline: none;
    letter-spacing: 1px;
    transition: 0.3s;
    border-radius: 3px;
    color: #9d8189;
  }
  .name:focus, .dob:focus{
    -webkit-box-shadow:0 0 2px 1px #9d8189;
    -moz-box-shadow:0 0 2px 1px #9d8189;
    box-shadow: 0 0 2px 1px #9d8189;
    border: 1px solid #9d8189;
  }
  .input-box .icon{
    width: 48px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 0px;
    left: 0px;
    bottom: 0px;
    color: #333;
    background-color: #f1f1f1;
    border-radius: 2px 0 0 2px;
    transition: 0.3s;
    font-size: 20px;
    pointer-events: none;
    border: 1px solid #9d8189;
    border-right: none;
  }
  .name:focus + .icon{
    background-color: #9d8189;
    color: #fff;
    border-right: 1px solid #9d8189;
    border: none;
    transition: 1s;
  }
  .dob{
    width: 450px;
    padding: 14px;
    text-align: center;
    background-color: #fcfcfc;
    transition: 0.3s;
    outline: none;
    border: 1px solid #9d8189;
    border-radius: 3px;
  }
  .radio{
    display: none;
  }
  .input-box label{
    width: 100%;
    padding: 13px;
    background-color: #fcfcfc;
    display: inline-block;

    text-align: center;
    border: 1px solid #9d8189;
  }
  .input-box label:first-of-type{
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
    border-right: none;
  }
  .input-box label:last-of-type{
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
  }
  .radio:checked + label{
    background-color: #9d8189;
    color: #fff;
    transition: 0.5s;
  }
  .input-box select{
    display: inline-block;
    width: 50%;
    padding: 12px;
    background-color: #fcfcfc;

    text-align: center;
    font-size: 16px;
    outline: none;
    border: 1px solid #9d8189;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .input-box select:focus{
    background-color: #9d8189;
    color: #fff;
    text-align: center;
  }
  button{
    width: 100%;
    background: transparent;
    border: none;
    background: #9d8189;
    color: #fff;
    padding: 15px;
    border-radius: 4px;
    font-size: 16px;
    transition: all 0.35s ease;
  }
  section{
    margin: 50px;
    }
    .aa{
    margin: 10px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <body>
	<section>
<ul>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189;font-family: serif;" href="contact.php">Contact</a></li> 
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
  <li style="padding:15px;" class="icon1"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
  <li style="padding:15px;" class="icon1"><a  style="color:#9d8189;font-family:serif;" href="heart.php" ><i class="fa-regular fa-heart"></i></a></li> 
  <span class='badge'>
  <li style="padding:15px;" class="iconcart"><a style="color:#9d8189;font-family:serif;"  href="cart.php" ><i class="fa-solid fa-cart-shopping"> 
  <?php
        $ss = $_SESSION['email'];
        $count = 0;
        $con = mysqli_connect("localhost", "root", "1234", "loginproject");

        if ($con) {
            $result = mysqli_query($con, "SELECT * FROM addtocart WHERE user_id='$ss'");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['image']) {
                        $count++;
                    }
                }
            }

            $_SESSION['cnt'] = $count;
            echo $_SESSION['cnt'];
        } else {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    ?>
     </i></a></li> 
</span>
  <center></section>

    <div class="wrapper">
        <h2>Payment Form</h2>
    <form  action="" method="post">
            <h4>Account</h4>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" name="fullname" placeholder="Full Name" required class="name">
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="email" name="email"placeholder="Email Adress" required class="name">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <h4>Valid Thru </h4>
                    <input type="text"name="date" placeholder="MM/YY" class="dob">
                </div>
            </div>
            <div class="input-group">
                <div >
                    <h4>Payment Details</h4>
                    <input type="radio" name="pay" id="bc1" checked class="aa" name="CreditCard">
                    <label for="bc1"><span><i class="fa fa-cc-visa"></i> Credit Card</span></label>
                    <input type="radio" name="pay" id="bc2" class="aa" name="Paypal">
                    <label for="bc2"><span><i class="fa fa-cc-paypal"></i> Paypal</span></label>
                </div>
            </div><br/>
            <div class="input-group">
                <div class="input-box">
                    <input type="tel" placeholder="Card Number" name="cardnumber" required class="name">
                    <i class="fa fa-credit-card icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="tel" placeholder="Card CVC"name="cvv" required class="name">
                    <i class="fa fa-user icon"></i>
                </div>
               
            </div>
            <!-- <a href="testBuyCart.php?user_id=<?php //echo $user;?> "style="color:#f5ebe0;"><button type="button" width="50px">sure Buy</button></a> -->
            
            <div class="input-group">
                <div class="input-box">
                <button type="submit" name="submit">
                     PAY NOW</button>   
                </div>
                </center>
                <?php


$con = mysqli_connect("localhost","root","1234","loginproject");
if(isset($_POST['submit'])){
    // check if user is logged in
    if(isset($_SESSION['email'])){
        $user = $_SESSION['email'];
        // retrieve all the products from the addtocart table for the logged in user
        $check_product = mysqli_query($con,"SELECT * FROM addtocart WHERE user_id='$user'");
        $check = mysqli_query($con,"DELETE FROM addtocart WHERE user_id='$user'");
        if(mysqli_num_rows($check_product) > 0){
            // loop through all the products in the addtocart table
            while($row = mysqli_fetch_assoc($check_product)){
                $product_id = $row['id'];
                $quantity = $row['quantity'];
                // retrieve the corresponding product from the tblproduct table
                $query = "SELECT * FROM tblproduct WHERE id='$product_id'"; 
                $result = mysqli_query($con, $query); 
                if(mysqli_num_rows($result) > 0){
                    $product = mysqli_fetch_assoc($result);
                    $new_quantity = $product['amount'] - $quantity;
                    // update the tblproduct table with the new quantity
                    $update_query = "UPDATE tblproduct SET amount='$new_quantity' WHERE id='$product_id'";
                    $update_result = mysqli_query($con, $update_query);
                    if($update_result){
                        echo "Purchase successful!";
                    }else{
                        echo "Failed to update product information.";
                    }
                }else{
                    echo "Product not found.";
                }
            }
        }else{
            echo "No products found in the cart.";
        }
    }else{
        echo "User is not logged in.";
    }
}
?>
        </form>
    </div>    
</body>
</html>