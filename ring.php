
        <?php  
    session_start();
    $con = mysqli_connect("localhost", "root", "1234", "loginproject");
    if (!$con) {
        die(mysqli_error($con));
    } 

    $query = "SELECT * FROM tblproduct";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die(mysqli_error($con));
    }

    // rest of the code
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/userhome.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
      body{		
        background-image:url('image/imgpro22.jpg');
         
        background-position: center;
        background-repeat: no-repeat;
        background-size:cover;
        }
   h1{
 font-size: 30px;
 color: #fff;
 text-transform: uppercase;
 font-weight: 300;
 text-align: center;
 margin-bottom: 15px;
}
::-webkit-scrollbar {
   width: 6px;
} 
::-webkit-scrollbar-track {
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
p{
 font-family: Georgia, serif;
 color:#9d8189;
text-align:center;
font-size:30px;
 
}
button{
    background:#9d8189;
border:none;
border-radius: 25px;
  border: 2px solid #9d8189;
  padding: 20px;
  width: 180px;
  height: 60px;
display: inline-block;
border-width: 0;
box-shadow: rgba(25, 25, 25, 0.04) 0 0 1px 0, rgba(0, 0, 0, 0.1) 0 5px 10px 0;
cursor: pointer;
font-family: Arial, sans-serif;
font-size: 1em;
height: 50px;
padding: 0 25px;
color:#f5ebe0;
transition: all 200ms;
  
}
.input1{
background:#9d8189;
border:none;
border-radius: 25px;
  border: 1.5px solid #9d8189;
  padding: 20px;
  width: 100px;
  height: 40px;
display: inline-block;
border-width: 0;
box-shadow: rgba(25, 25, 25, 0.04) 0 0 1px 0, rgba(0, 0, 0, 0.1) 0 3px 7px 0;
cursor: pointer;
font-family: Arial, sans-serif;
font-size: 1em;
height: 50px;
padding: 0 25px;
color:#f5ebe0;
transition: all 200ms;
}
.input2{
 
    border-radius: 25px;
  border: 1.5px solid #9d8189;
  padding: 20px;
  width: 100px;
  height: 40px;
}

.image-container {
  position: relative;
}

.image-wrapper {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-caption {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.5);
  color:#ffb09c;
  padding: 10px;
  font-weight: bold;
}


.heart-icon {
  position: absolute;
  top: 10px;
  left: 10px;
  z-index: 1;

}
.heart-icon.clicked i {
  color:red;
}
.cart-icon {
        font-size: 24px;
        margin-right: 5px;
    }
    
    .iconcart {
        font-size: 14px;
        font-weight: bold;
        background-color: #fff;
        color: #000;
        padding: 5px;
        border-radius: 25%;
        margin-left: 640px;
    }
</style>
<body>
<br>
<ul>
  <li><a href="homeuser.php"><img src="image/img231.jpg" width="120px"   /></a></li>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189;font-family: serif;" href="contact.php">Contact</a></li> 
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li>
   
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="heart.php" ><i class="fa-regular fa-heart"></i></a></li> 
  <span class='badge '>
<li style="padding:15px;" class="iconcart"><a style="color:#9d8189;font-family:serif;"  href="cart.php" ><i class="fa-solid fa-cart-shopping"> 

    <?php
    if(isset($_SESSION['email'])){
        $ss = $_SESSION['email'];
        $count = 0;
        $con = mysqli_connect("localhost", "root", "1234", "loginproject");

        if ($con) {
            $result = mysqli_query($con, "SELECT * FROM addtocart WHERE user_id='$ss'");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['image']) {
                        $count++;
                    }
                }
            }

            $_SESSION['cnt'] = $count;
            echo $_SESSION['cnt'];
        } else {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
      }
    ?>
    </i></a></li> 
</span>
</ul>
<br>
<div class="row itemsBlock">
 <?php
 $sql="SELECT * FROM `tblproduct`";
 $result1=mysqli_query($con,$sql);
 if(mysqli_num_rows( $result1)>0){
while($row=mysqli_fetch_assoc($result1)){
 $id=$row['id'];
 $name=$row['name_p'];
 $img=$row['image'];
 $price=$row['price'];
 ?>
<div class="col-3 col-3 col-3 col-3 ">
  <form action="" method="post">
    <div class="image-container">
      <img class="card-img-top" src="<?php echo $img?>" name="image">
      <?php
    if($row['amount']==0){
    echo '<div class="image-caption">SOLD OUT</div>';
    }
    ?>
<span class="heart-icon" tabindex="0" data-toggle="tooltip" title="Tooltip on top">
  <a href="#" style="color:#9d8189;" onclick="toggleHeart(<?php echo $row['id']; ?>)">
    <i class="far fa-heart" id="heart-icon-<?php echo $row['id']; ?>"></i>
  </a>
</span>

<script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>

<script>
function toggleHeart(productId) {
  var heartIcon = document.getElementById("heart-icon-" + productId);
  
  if (heartIcon.classList.contains("far")) {
    // Add to heart
    heartIcon.classList.remove("far");
    heartIcon.classList.add("fas");
    addToHeart(productId);
  } else {
    // Remove from heart
    heartIcon.classList.remove("fas");
    heartIcon.classList.add("far");
    removeFromHeart(productId);
  }
}

function addToHeart(productId) {
  // Make an AJAX request to the server-side script to add the product to the heart list
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "insertheartring.php?id=" + productId, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Request successful, do something if needed
    }
  };
  xhr.send();
  
  // Store heart status in local storage
  localStorage.setItem("heartStatus-" + productId, "fas");
}

function removeFromHeart(productId) {
  // Make an AJAX request to the server-side script to remove the product from the heart list
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "testRemoveheart.php?id=" + productId, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Request successful, do something if needed
    }
  };
  xhr.send();
  
  // Remove heart status from local storage
  localStorage.removeItem("heartStatus-" + productId);
}

document.addEventListener("DOMContentLoaded", function() {
  var productId = <?php echo $row['id']; ?>;
  var heartIcon = document.getElementById("heart-icon-" + productId);
  
  // Check heart status in local storage
  var heartStatus = localStorage.getItem("heartStatus-" + productId);
  
  if (heartStatus === "fas") {
    heartIcon.classList.remove("far");
    heartIcon.classList.add("fas");
  }
});

function deleteProduct(productId) {
  // Make an AJAX request to the server-side script to delete the product
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "heart.php?id=" + productId, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      // Request successful, do something if needed
      var heartIcon = document.getElementById("heart-icon-" + productId);
      heartIcon.classList.remove("fas");
      heartIcon.classList.add("far");
      removeFromHeart(productId);
    }
  };
  xhr.send();
}
</script>


</div>

      <div class="card-body">
      <h3 class="card-title" align="center" style="color:#9d8189;font-family: serif;" ><?php echo $row['name_p']?></h3>
      <p class="card-text" ><?php echo $price?>$</p>
      <input type="number" name="update_qnt" style="height:40px" value="1" min="0" max="<?php echo $row['amount']?>" class="input2"/>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
      <input type="submit" name="update" value="Update"  class="input1"/><br>
      <a href="inserttocart.php?id=<?php echo $row['id']; ?>"  style="color:#f5ebe0;"><br><button type="button" name="addtocart">Add To Cart</a></button> 
      </div>
      <?php

      $con=mysqli_connect("localhost","root","1234","loginproject");
      if(!empty($_POST['update_qnt'])) {
         $quantity = $_POST['update_qnt']; 
         $product_id = $_POST['id'];
        $result= mysqli_query($con, "UPDATE addtocart SET quantity='$quantity' WHERE id ='$product_id'");
          // header("location:ring.php");
     }
    ?>
        </form>
     </div>
     <?php
}
} 
?>
</div>
</section>
</body>
</html>