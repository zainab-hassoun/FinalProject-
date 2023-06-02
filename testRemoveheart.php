<?php
session_start();
   $id= $_GET['id'];
   
   $con=mysqli_connect("localhost","root","1234","loginproject");

   $result = mysqli_query($con,"DELETE From addtoheart where id='$id'");
   mysqli_close($con);
   $_SESSION['deletedProductId'] = $id;
      header("location:heart.php");
?>

