<?php
    session_start();
    $con=mysqli_connect("localhost","root","1234","loginproject");
    
    $user=$_SESSION['email']; 
    $query = "SELECT * FROM addtocart WHERE  user_id='$user'"; 
    $result= mysqli_query($con, $query);  
    while($row = mysqli_fetch_array($result)){
               $Cid=$row['id'];
               $Cname=$row['name'];
               $Cimg=$row['image'];
               $Cqua=$row['quantity'];
               $Cprice=$row['price'];
               $result1 = mysqli_query($con,"INSERT INTO `payment1` VALUES('$Cid','$Cname','$Cimg','$Cqua','$Cprice','$user')" );
               header('location:payment.php');
           }

        
?>

