<html>
<link rel="stylesheet" href="css/forgotpassword.css">
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
    <body>
		
       <?php echo'
    <div class="container">
	
	<div class="screen">
   
		<div class="screen__content">
 <h1>Forgot Password?</h1>
		<nav class="auth-nav">
       <p> Enter the email address you used when you joined and we’ll send you instructions to reset your password.<br/>
             For security reasons, we do NOT store your password. So rest assured that we will never send your password via email.</p>
     </nav>
			<form action="" method="post" class="login">
				<div class="login__field">
				
					<i style="color:#9d8189"  class="bi bi-people-fill"></i>
					<input type="text" name="email" class="login__input" placeholder="Email">
				</div>
				<button class="button login__submit" name="submit">
					<span class="button__text" style="	font-family: cursive;" >
					Send Reset Instructions </span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
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

</form>'?>
<?php
if(isset($_POST['submit'])){
$con=mysqli_connect("localhost","root","1234","loginproject");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $sql="SELECT *FROM password_f";
    $result=mysqli_query($con,$sql);
    if($result){
		///echo '<script>alert("update a password on the mail!")</script>';
		header('location:pass_ran.php');
    }
    else{
        echo "you have enter incorrect password";
     
    }
}
$_SESSION['emaill']=$_POST['email'];
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$_SESSION['randpassword'] = randomPassword();
$to =$_SESSION['emaill'];//session function to the email 
$subject = 'New password';
$message = "Hello your new password is: \n" .$_SESSION['randpassword'].
"\nLogin: http://localhost/php_program/project/pass_ran.php";
$headers = "From:zainabhassoun123@gmail.com ";
$mail_sent = mail($to, $subject, $message, $headers);
if($mail_sent == true){
	$result = mysqli_query($con,"UPDATE user set Password_u= '".$_SESSION['randpassword']."' WHERE Username='$email'");
	echo "your new password sending to your mail";
	
	header('Refresh: 2;url=login.php');
}
}


?>
</body>
</html>