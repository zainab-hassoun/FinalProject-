<?php
   $id= $_GET['id'];
   $con=mysqli_connect("localhost","root","1234","loginproject");
   $result = mysqli_query($con,"DELETE From addtocart where id='$id'");
      header("location:cart.php");
?>