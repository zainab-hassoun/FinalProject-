<?php
   $id= $_GET['id'];
   $con=mysqli_connect("localhost","root","1234","loginproject");
   $result = mysqli_query($con,"DELETE From addheart where id='$id'");
      header("location:heart.php");
?>