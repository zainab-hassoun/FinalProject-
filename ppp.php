
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
        background-image:url('https://cdn.shopify.com/s/files/1/0595/5262/8886/files/IRY_Jewelry_shop.jpg?v=1633184471');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
   .icon1 {
    font-size: 14px;
    margin-right: 5px;
    float: right;
}
.iconcart {
    font-size: 14px;
    color: #000;
    float: right;
    margin-right: 5px;
}
    ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
  }
  
  li {
	float: left;
  }
  
  li a {
	display: block;
	color: #f5ebe0;
	text-align: center;
	padding: 16px 30px;
	text-decoration: none;
  
   background-color:#fff;
   border-radius: 40%;
  }
  
.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height:70vh;
    
}
.screen {
        background-image:url('image/img555.jpg');
        position: relative;
        height: 505px;
        width: 400px;
        box-shadow: 0px 0px 24px ;
       top:10px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}
.login {
	width: 320px;
	padding: 50px;
	padding-top: 5px;
}
.login__field {
	padding: 20px 1px;	
	position: relative;	
   
}
.login__icon {
	position: absolute;
	top: 20px;
	color: #9d8189;
}
.login__input {
	border: none;
	border-bottom: 2px solid #9d8189;
	background: none;
    color:#9d8189;
	padding: 15px;
	padding-left: 2px;
	font-weight: 700;
	font-family: cursive;
	width: 35%;
	transition: .2s;
}
.login__input1 {
	border: none;
	border-bottom: 2px solid #9d8189;
	background: none;
    color:#9d8189;
	padding: 15px;
	padding-left: 2px;
	font-weight: 700;
	font-family: cursive;
	width: 60%;
	transition: .2s;
}
.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #9d8189;
}
.login__input1:active,
.login__input1:focus,
.login__input1:hover {
	outline: none;
	border-bottom-color: #9d8189;
}
.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px ;
	padding: 16px 20px;
	border-radius: 36px;
	border: 1px solid #9d8189;
	text-transform: uppercase;
	font-weight: 700;
	align-items: center;
	width:130px;
	color: #9d8189;
	box-shadow: 0px 2px 2px #9d8189;
	cursor: pointer;
	transition: .2s;
}
.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #9d8189;
	outline: none;
}
.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #9d8189;
}
.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color:#9d8189;
}
.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
    color:#9d8189;
}
.social-login__icon {
	padding: 20px 10px;
	color:#9d8189;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #9d8189;
}
.a{
	text-align:left;
	margin:10px;
	color:#772d8b
}
.fo{
	margin:20px;
}
.pay{
    color:#9d8189
}
.auth-link{
    text-align:center;
    color:#9d8189;
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
<ul>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189;font-family: serif;" href="contact.php">Contact</a></li> 
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
  <li style="padding:15px;" class="icon1"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
  <li style="padding:15px;" class="icon1"><a  style="color:#9d8189;font-family:serif;" href="heart.php" ><i class="fa-regular fa-heart"></i></a></li> 
  <span class='badge'>
  <li style="padding:15px;" class="iconcart"><a style="color:#9d8189;font-family:serif;"  href="cart.php" ><i class="fa-solid fa-cart-shopping"> 
  <?php
  if(isset($_SESSION['email'])){
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
    }
    ?>
     </i></a></li> 
</span>

</ul><body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form action="" class="login" method="post">
                <h2 class="auth-link"> Payment Form</h2>
                    <div class="login__row">
                        <div class="login__field">
                            <i style="color:#9d8189" class="fa fa-user icon"></i>
                            <input type="text" name="Account" class="login__input" placeholder="Account" required="required">
                            <i  style="color:#9d8189" class="fa fa-user icon"></i>
                            <input type="tel" placeholder="Card CVC" class="login__input" name="cvv" required class="name">
                        </div>
                    </div>
                    <div class="login__row">
                    <div class="login__field">
                        <i style="color:#9d8189" class="fa fa-envelope icon"></i>
                        <input type="text" name="date" class="login__input" placeholder="MM/YY" class="dob">
                        <i style="color:#9d8189" class="fa fa-envelope icon"></i>
                            <input type="email" name="email" class="login__input" placeholder="Email Address" required class="name">
                           
                        </div>
                        </div>
                        <div class="login__field">
                        <i style="color:#9d8189" class="fa fa-credit-card icon"></i>
                            <input type="tel" placeholder="Card Number" class="login__input1" name="cardnumber" required class="name">
                        </div>
                        <div class="pay">
    <input type="radio" name="pay" id="bc1" checked class="a" name="CreditCard">
    <label for="bc1" style="margin-right:2px;"><span><i class="fa fa-cc-visa"></i> Credit Card</span></label>
    <input type="radio" name="pay" id="bc2" class="a" name="Paypal">
    <label for="bc2"><span><i class="fa fa-cc-paypal"></i> Paypal</span></label>
</div>

                    
                    <button class="button login__submit" name="submit">
                        <span class="button__text" style="font-family: cursive;">
                            PAY NOW
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>


</body>
</html>

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