<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        }  
        ?>
        <link rel="stylesheet" href="css/loginmanger.css">
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
		
			<form action=" " class="login" method="post">
				<div class="login__field">
					<i style="color:#9d8189"  class="bi bi-people-fill"></i>
					<input type="text" name="username" class="login__input" placeholder="User name / Email" required ="required" >
				</div>
				<div  class="login__field">
                <i  style="color:#9d8189" class="bi bi-lock-fill"></i>
					<input type="password" name="password" class="login__input" placeholder="Password" required="required">
				</div> 
		<br>
         
				<button class="button login__submit" name="submit">
					<span class="button__text" style="	font-family: cursive;" >
					Log In </span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
                <?php
//testloginmanger
if(isset($_POST['submit'])){
$con = mysqli_connect("localhost","root","1234","loginproject");
$sql="SELECT * FROM `manger`" ;
$result = mysqli_query($con,$sql);
$users=$_POST['username'];
$pas=$_POST['password'];
while($row = mysqli_fetch_array($result)){
	if($row['email']==$users&&$row['Password']==$pas){
		
		  header('location:manger.php');
		  break;
	}
	else {
		echo "error";
	}
	}
}

?>