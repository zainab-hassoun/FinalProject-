<?php header('Refresh:20;URL = login.php');?>

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
       <?php echo'
    <div class="container">
	   <div class="screen">
		<div class="screen__content">
            <h1>Enter the temporary password that you received on the email !!</h1>
              <form actio  n="" method="post" class="login">
			<div class="login__field">	
			<i style="color:#9d8189"  class="bi bi-people-fill"></i>
			<input type="text" name="pass_ra" class="login__input" placeholder="SMS/Old password">
		</div>
        
				<button class="button login__submit" name="submit">
					<span class="button__text" style="	font-family: cursive;" >
					Send Reset Instructions </span>
        </form>
        </div>
        </div>
        ';?>
<?php
session_start();
if (isset($_POST['submit'])) {
$user=$_SESSION['email'];
$con=mysqli_connect("localhost","root","1234","loginproject");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the email address or username and new password from the form
  $pass_ra = $_POST['pass_ra'];
  $sql = "SELECT * FROM user WHERE  Username='$user'";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result))
	{
    

		if($pass_ra==$row['Password_u']){
       header('Location: http://localhost/php_program/project/resetpass.php');
  }
}
}


}?>