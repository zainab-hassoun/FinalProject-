<?php 
session_start();
$con=mysqli_connect("localhost","root","1234","loginproject");

if(isset($_SESSION['email'])){
    $username = $_SESSION['email'];
}else{
    // Redirect to login page if user is not logged in
    header("Location:login.php");
    exit();
}

?><?php  
session_start();
$con=mysqli_connect("localhost","root","1234","loginproject");
//check if user is logged in
if(isset($_SESSION['email'])){
    $username = $_SESSION['email'];
}else{
    //redirect to login page if user is not logged in
    header("Location:login.php");
    exit();
}
$id = $_GET['id'];
// Check if product id is valid
$check_product = mysqli_query($con,"SELECT * FROM party WHERE id = '$id'");
if(mysqli_num_rows($check_product)){
    $row = mysqli_fetch_array($check_product);
    $ImCart=$row['image'];
    $NCart=$row['name_p'];
    $PCart=$row['price'];
    $ICart=$row['id'];
    $ACart=1;
    $_SESSION['q']=$row['amount'];
    if($_SESSION['q']==0){
        
        echo '<script>alert("sold out!")</script>';
        header('location:party.php');
      }
    else{
    // check if the product already exists in the cart
    $check_cart = mysqli_query($con,"SELECT * FROM addtoheart WHERE id = '$id' AND user_id='$username' ");
    if(mysqli_num_rows($check_cart)>0){
        // if the product already exists, update the quantity
       while( $row= mysqli_fetch_array($check_cart) ){
        $quantity = $row['quantity'] + 1;
        if($quantity<=$_SESSION['q']){
        $update_quantity = mysqli_query($con,"UPDATE addtoheart SET quantity = '$quantity' WHERE id = '$id' AND user_id='$username'");
        }
        else{
            echo '<script>alert("Error the quantity is finshed !")</script>';
        }

    }
     }else{
        $sql="INSERT INTO addtoheart VALUES('$ICart','$NCart','$PCart','1','$ImCart','$username')";
        $result2=mysqli_query($con,$sql);
       
      }
       
 } header('location:heart.php');
}

  ?>
