<html>
<link rel="stylesheet" href="css/signup.css">
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

</style>
    <body >

    <div class="container">
	<div class="screen">
		<div class="screen__content">
		<nav class="auth-nav">
	                <p class="auth-link">
                        Already a member? <a href="login.php">Log In</a>
                       </p>
                     </nav>
			<form class="login" action="" method="post">
				<div  class="login__field">
					<i style="color:#9d8189; font-family: cursive;"  class="bi bi-people-fill"></i>
					<input type="text" class="login__input" name="email" placeholder="Username" required >
				</div>
				
				<div  class="login__field">
                <i  style="color:#9d8189; font-family: cursive;" class="bi bi-phone-fill"></i>
					<input type="phone" style=" font-family: cursive;"  class="login__input" placeholder="phone" name="phone" required >
				</div>
				<div  class="login__field">
                <i  style="color:#9d8189" class="bi bi-lock-fill"></i>
					<input type="password" name="password" class="login__input" placeholder="Password" required >
				</div>  
				<button class="button login__submit"  name='submit'>
					<span class="button__text" style=" font-family: cursive;" name='submit'>Create Account</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
				<?php

$con=mysqli_connect("localhost","root","1234","loginproject");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['submit'])){
    $uname=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
	$pass1='NULL';
	$pass2='NULL';
	
	$passra='NULL';
	$result=mysqli_query($con,"INSERT INTO user VALUES('$uname','$password','$pass1','$pass2','$phone','0','$passra')");
	//print_r($result);
	if($result){
	header('Location: http://localhost/php_program/project/login.php');
	}
	else{
	echo "you have enter incorrect password";

	}
}
?>
				
			</form>
			<div class="social-login"><br/>
				<h3 style="font-family: cursive;">log in via</h3><br>
				<div class="col-lg-8"  >
        <a href=""  target="_blank"><i style="color:#9d8189" class="bi bi-facebook"></i></a>
        &nbsp;
        <a href="" target="_blank"><i style="color:#9d8189" class="bi bi-whatsapp"></i></a>
        &nbsp;
        <a href="" target="_blank"><i style="color:#9d8189" class="bi bi-instagram"></i></a>
        &nbsp;
        <a href="" target="_blank"><i  style="color:#9d8189" class="bi bi-twitter"></i></a>
        &nbsp;
    </div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen_backgroundshape screenbackground_shape4"></span>
			<span class="screen_backgroundshape screenbackground_shape3"></span>		
			<span class="screen_backgroundshape screenbackground_shape2"></span>
			<span class="screen_backgroundshape screenbackground_shape1"></span>
		</div>		
	</div>
</div>

</body>
</html>