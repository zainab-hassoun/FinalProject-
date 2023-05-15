<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        } 
      ?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/jewstore.css">
<link rel="stylesheet" href="css/navbar.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
   

</style>
<body style="background: #f5ebe0">

<center>
<a href="homeuser.php"><img src="image/img10.png" width="90px"  style="padding:px; margin:1px" /></a>
</center>
	 <section>
  <ul>
<li><a href="homeuser.php">Home</a></li>
<li><a href=jewelrystors.php>Show the Jewelrys</a></li> 
<li><a href=contact.php>Contact</a></li> 
<li><a href=statususer.php>Status <i class="bi bi-clock-history"></i></a></li> 
 <li class="icon"><a href="cart.php" ><i class="fa-solid fa-cart-shopping"></i></a></li> 
<li class="icon"><a href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li> 
</ul>
</section> 

<div class="row itemsBlock"  >
 <?php
 $sql="SELECT * FROM `tblproduct`";
 $result=mysqli_query($con,$sql);
 if(mysqli_num_rows( $result)>0){
while($row=mysqli_fetch_assoc($result)){
 $id=$row['id'];
 $name=$row['name_p'];
 $img=$row['image'];
 $price=$row['price'];
 
 ?>
 <div class="col-3 col-3 col-3 col-3 ">

 <form action="" method="post">
      <img class="card-img-top" src="<?php echo $img?>"name="image"></br>
      <?php
    if($row['amount']==0){
     echo '<div><h2 style="color:red; text-align:center; font-family:Fantasy; ">
      SOLD OUT
      </h2></div>';
    }
?>
      <div class="card-body">
      <h3 class="card-title" align="center" ><?php echo $row['name_p']?></h3>
          <p class="card-text" ><?php echo $price?>$</p>
      <input type="number" name="update_qnt" style="height:40px" value="1" min="0" max="<?php echo $row['amount']?>" />
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
      <input type="submit" name="update" value="Update"  class="input"/>
          <a href="inserttocart.php?id=<?php echo $row['id']; ?>"  style="color:#f5ebe0;"><button type="button" name="addtocart">Add To Cart</a></button> 
        </div>
        <?php
       $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!empty($_POST['update_qnt'])) {
          $quantity = $_POST['update_qnt']; 
          $product_id = $_POST['id'];
          $result= mysqli_query($con, "UPDATE addtocart SET quantity='$quantity' WHERE id ='$product_id'");
          header("location:Cart.php");
     }
    ?>
    
        </form>
     </div>
     <?php
}} 
?>
</div>
				</tbody>
</section>
    </body>
</html>