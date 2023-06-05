
<?php
session_start();
 $con=mysqli_connect("localhost","root","1234","loginproject");

 if(isset($_POST['remove'])){
 $user=$_SESSION['email']; 
 $result = mysqli_query($con,"DELETE FROM addtocart WHERE user_id='$user'");
 if($result){
     echo "All items have been deleted from the cart.";
 }else{
     echo "Error deleting items from cart";
 }
}

?>
<link rel="stylesheet" href="css/userhome.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
     body{		
        background-image:url('image/img22.jpg');
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size:cover;
        }
        
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css");

  
.container {
  width: 80%;
  max-width: 1200px;
  margin: 0 auto;
}

.container * {
  box-sizing: border-box;
}

.flex-outer,
.flex-inner {
  list-style-type: none;
  padding: 0;
}

.flex-outer {
  max-width: 800px;
  margin: 0 auto;
}



.flex-inner {
  padding: 0 8px;
  justify-content: space-between;  
}

.flex-outer > li:not(:last-child) {
  margin-bottom: 20px;
}


.flex-outer > li > label,
.flex-outer li p {
  flex: 1 0 120px;
  max-width: 220px;
}

.flex-outer > li > label + *,
.flex-inner {
  flex: 1 0 220px;
}



.flex-outer  button {
  margin-left: auto;
  padding: 8px 16px;
  border: none;
  background: #333;
  color: #f2f2f2;
  text-transform: uppercase;
  letter-spacing: .09em;
  border-radius: 2px;
}




button{
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
input{
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
        margin-left: 600px;
    }
</style>
    <body >
    <section>
<ul>
  <li><a href="homeuser.php"><img src="image/img231.jpg" width="120px"   /></a></li>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189;font-family: serif;" href="contact.php">Contact</a></li> 
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="logout.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
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
</section>
</br></br>
  
</br>
<div class="row itemsBlock"  >
    <?php 
   if(isset($_SESSION['email'])){
    $ss = $_SESSION['email'];
    $sumprice=0;
    $total=0;
    $con=mysqli_connect("localhost","root","1234","loginproject");
    $result = mysqli_query($con,"select * From addtoheart where user_id='$ss'");
 
    if(mysqli_num_rows( $result)>0){
    while($row = mysqli_fetch_array($result)) { 
    
     
      
        ?>
      <div class="col-3 col-3 col-3 col-3">
  <form action="" method="post">
    <img src="<?php echo $row['image']; ?>" alt="" class="card-img-top">
    <div class="card-body">
      <h3 class="card-title" style="color:#9d8189;font-family: serif;"><?php echo $row['name']; ?></h3>
      <p class="card-text"><h6 style="color:#9d8189;font-family: serif;"> Price: <?php echo $row['price']?>$</h6></p>
      <span class="heart-icon" tabindex="0" data-toggle="tooltip" title="Tooltip on top">
        <a href="#" style="color:#9d8189;" onclick="toggleHeart(<?php echo $row['id']; ?>)">
          <i class="far fa-heart" id="heart-icon-<?php echo $row['id']; ?>"></i>
        </a>
      </span>
      <a href="#" style="color:#f5ebe0;" onclick="deleteProduct(<?php echo $row['id']; ?>); return false;">
        <button type="button">Delete</button>
      </a>
    </div>
  </form>
</div>

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
    xhr.open("GET", "testRemoveheart.php?id=" + productId, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Request successful, do something if needed
        var heartIcon = document.getElementById("heart-icon-" + productId);
        heartIcon.classList.remove("fas");
        heartIcon.classList.add("far");
        removeFromHeart(productId);
        // Remove the product from the DOM
        var productElement = document.querySelector("#heart-icon-" + productId).closest(".col-3");
        productElement.parentNode.removeChild(productElement);
      }
    };
    xhr.send();
  }
</script>

<?php }
    }
} ?>

    </center>
    <section>
  
</form>

    </section>
    </body>
</html> 
