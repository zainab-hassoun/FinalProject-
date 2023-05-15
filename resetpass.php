<html>
<link rel="stylesheet" href="css/resetpass.css">
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

      
    <div class="container">
	
	<div class="screen">
   
		<div class="screen__content">
 <h1>Reset Password!!</h1>
			<form action="" method="post" class="login">
		
                <div class="login__field">
					<i style="color:#9d8189"  class="bi bi-lock-fill"></i>
					<input type="password" name="password" class="login__input" placeholder="Password">
				</div>
                <div class="login__field">
					<i style="color:#9d8189"  class="bi bi-lock-fill"></i>
			<input type="password" name="passwordc" class="login__input" placeholder="Confirm Password">
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
<?php
session_start();
$user=$_SESSION['email'];
$con=mysqli_connect("localhost","root","1234","loginproject");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
if (isset($_POST['submit']) ) {
$sql = "SELECT * FROM user where  Username='".$user."'";
 $result = mysqli_query($con, $sql);
 $repass =$_POST['password'];
$password2 = $_POST['passwordc'];
while($row = mysqli_fetch_array($result)){
		// Check if the form has been submi
		$PASS=$row['Password'];
		$PASS1=$row['pass1'];
		$PASS2=$row['pass2'];
//$pass='NULL';
}	
// if($row['isblocked']==0)
// $result1 = mysqli_query($con,"UPDATE user set Password_u= 'NULL' WHERE Username='$email'");
if($repass!=$PASS1 && $repass!=$PASS2 && $repass!=$PASS){
if($repass== $password2){

	$result1 = mysqli_query($con,"UPDATE user set  pass2='".$PASS1."',pass1='".$PASS."',Password='".$repass."',isblocked='0' where Username='".$user."'");
	///$result1 = mysqli_query($con,"UPDATE user set Password='$repass' pass3='$PASS2' and pass2='$PASS1' and pass1='$PASS' and isblocked='0' where Username=$user");
	header('location:login.php');
}
}
}
else
{
echo "You have to enter a password that was not in the last 3 passwords ";
}	
?>

</form>
	

</body>
</html>