<html>
<link rel="stylesheet" href="css/contact.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<style>
	body {
background: linear-gradient(#f5ebe0) ;		
background-image:url('https://cdn.shopify.com/s/files/1/0595/5262/8886/files/IRY_Jewelry_shop.jpg?v=1633184471');
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size:cover;
}
.screen {		
	
	background-image:url('image/img555.jpg');
	position: relative;	
	height: 450px;
	width: 360px;	
	box-shadow: 0px 0px 24px #9d8189;
	height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size:cover
}
ul {
list-style-type: none;
overflow: hidden;


}
li {
float: left;
font-size: 14px;
        font-weight: bold;
        background-color: #fff;
        color: #000;
        padding: 5px;
        border-radius: 25%;
        margin-left: 20px;
}
.icon{
   
float: right;
}
li a {
display: block;
text-align: center;
text-decoration: none;
}
.cart-icon {
        font-size: 24px;
        margin-right: 5px;
    }
    
    .iconcart {
        font-size: 14px;
        font-weight: bold;
        background-color: #fff;
        color: #000;
        padding: 5px;
        border-radius: 25%;
        margin-left: 730px;
    }
    .auth-link{
    text-align:center;
    color:#9d8189;
}
</style>
 <body >
	
<ul>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189;font-family: serif;" href="contact.php">Contact</a></li> 
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="heart.php" ><i class="fa-regular fa-heart"></i></a></li> 
  <span class='badge'>
  <li style="padding:15px;" class="iconcart"><a style="color:#9d8189;font-family:serif;"  href="cart.php" ><i class="fa-solid fa-cart-shopping"> 
    <?php
    session_start();
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
</span></ul>
 <div class="container">
	<div class="screen">
		<div class="screen__content">
		<nav class="auth-nav">
			<form action="" class="login" method="post" >
            <h2 class="auth-link">Contact</h2>
				<div class="login__field">
					<i style="color:#9d8189"  class="bi bi-people-fill"></i>
					<input type="text"  id="name"  name="name" class="login__input" placeholder="Your Name"  pattern=[A-Z\sa-z]{3,20} required>
				</div>
				<div  class="login__field">
                <i  style="color:#9d8189" class="bi bi-envelope-check-fill"></i>
					<input type="email" name="email"  class="login__input" placeholder="Your E-mail" >
				</div>  
                <div  class="login__field">
                <i  style="color:#9d8189" class="bi bi-telephone-outbound-fill"></i>
					<input type="phone" name="phone" class="login__input" placeholder="Your phone" >
				</div>  
                <div  class="login__field">
                <i  style="color:#9d8189" class="bi bi-chat-left-heart-fill"></i>
					<input type="text" name="message" class="login__input" placeholder="Write your message" required>
				</div>  
          
				<button class="button login__submit" name="submit">
					<span class="button__text" style="	font-family: cursive;" >
					submit </span>
				</button>				
		</div>
		<div class="screen__background">
			<span class="screen_backgroundshape screenbackground_shape4"></span>
			<span class="screen_backgroundshape screenbackground_shape3"></span>		
			<span class="screen_backgroundshape screenbackground_shape2"></span>
			<span class="screen_backgroundshape screenbackground_shape1"></span>
		</div>	
	</div>
</div>
</form>
<?php
$con=mysqli_connect("localhost","root","1234","loginproject");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
	$message=$_POST['message'];
    $sql="INSERT INTO contact VALUES ('$name','$email','$phone','$message')";
    $result=mysqli_query($con,$sql);
    if($result){
        header('Location: http://localhost/php_program/project/login.php');
    }
    else{
        echo "you have enter incorrect password";
    }
}
?>
</body>
</html>