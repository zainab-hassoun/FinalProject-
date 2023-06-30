<?php
session_start();
 $con=mysqli_connect("localhost","root","1234","loginproject");
 $user=$_SESSION['email']; 
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

.lb-image {
    
    background-color: rgba(0, 0, 0, 0.8);
    width:350px;
    height: auto;
    margin:25px;
    
    /* Limit the maximum height of the image */
}
.img{
    width:370px;
    height: auto;
    margin:30px;
    border: 2px ;
    border-radius: 30px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);

}
.input2{
 
 border-radius: 25px;
 background-color:#fff;
border: 1.5px solid #9d8189;
padding: 20px;
width: 100px;
height: 40px;
}
.cart-icon {
        font-size: 24px;
        margin-right:20px;
    }
    
    .iconcart {
        font-size: 14px;
        font-weight: bold;
        background-color: #fff;
        
        padding: 5px;
        border-radius: 25%;
        margin-left: 620px;
    }
    .image-link{
        margin:10px;
    }
    .btn1{
        width:120px;
    }
    
</style>
    <body >
    <section>
<ul>
  <li><a href="homeuser.php"><img src="image/img231.jpg" width="120px"   /></a></li>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189;font-family: serif;" href="contact.php">Contact</a></li> 
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="heart.php" ><i class="fa-regular fa-heart"></i></a></li> 
  <span >
<li style="padding:15px;" class="iconcart"><a style="color:#9d8189;font-family:serif;"  href="cart.php" ><i class="fa-solid fa-cart-shopping"> 

    <?php
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
    ?>
    </i></a></li> 
</span>
</ul>
</section>
</br></br>
  
</br>
 <!-- /////////////////////////////////////////////////////////ring -->
 <?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM tblproduct WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name_p']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>

                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `tblproduct` WHERE type = '$type' AND id != '$id' AND amount > 0 LIMIT 3";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                     // שינוי: מספר המוצרים מוגבל ל-3

                     function getRandomProducts($products) {
                        shuffle($products);  // שימוש בפונקציה shuffle() לשינוי רנדומלי של המערך
                        $randomProducts = array_slice($products, 0, 3);  // בחירת המוצרים הראשונים במערך (עד 3 מוצרים)
                    
                        return $randomProducts;
                    }
                    $randomProducts = getRandomProducts($products, 3);
                    foreach ($randomProducts as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name_p']; ?>" data-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                $imageResult = mysqli_query($con, "SELECT image FROM tblproduct WHERE id='$id'");
               
                ?>
            </div>
        </div>
    </div>

   
    <div class="col-sm-4">
        <div class="card-body"> 
            <div class="d-flex">
            <button type="button" name="addtocart" class=" ">
            <a href="cart.php" style="color:#f5ebe0;">Back</a>
            </button>
             <button type="button" id="addToCartButton" class="btn1">
            <a href="#" style="color:#f5ebe0;" class="image-link" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['name_p']; ?>">
               Add To Cart </a>
            </button>
           
        </div>
    </div>
     </div>
   <script>
   const mainImage = document.getElementById('mainImage');
    const productPrice = document.getElementById('productPrice');
    const productID = document.getElementById('productid');
    let selectedProductId = '';
    let selectedProductImage = '';
    let selectedProductPrice = '';
    let selectedProductName = '';
    let prevImageUrl = "<?php echo $row['image']; ?>";
    const imageLinks = document.querySelectorAll('.image-link');
    imageLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const currentImageUrl = this.querySelector('img').getAttribute('src');
     
      mainImage.src = currentImageUrl;
      productPrice.textContent = this.dataset.price;
      productID.dataset.id = this.dataset.id;
      selectedProductId = this.dataset.id;
      selectedProductImage = currentImageUrl;
      this.querySelector('img').setAttribute('src', prevImageUrl);
      prevImageUrl = currentImageUrl;
      // Update price and ID
      const selectedProductName = this.dataset.name;
      const selectedProductID = this.dataset.id;
      const selectedProductprice= this.dataset.price;
      document.getElementById('productname').textContent = selectedProductName;
      document.getElementById('productid').dataset.id = selectedProductID;
      document.getElementById('productPrice').dataset.price= selectedProductprice;
   });
});

const addToCartButton = document.getElementById('addToCartButton');

addToCartButton.addEventListener('click', function (e) {
   e.preventDefault();

   if (selectedProductId) {
      addToCart(selectedProductId, selectedProductImage);
   } else {
      alert("Please select a product.");
   }
});

function addToCart(productId, imageUrl) {
   // Make an AJAX request to the server-side script to add the product to the cart
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "inserttocart.php?id=" + productId, true);
   xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         // Request successful, do something if needed
         alert("Product added to cart!");

         // Display the selected image in the cart (assuming there is an element with ID "cartImage")
         document.getElementById('cartImage').src = imageUrl;
      }
   };
   xhr.send();
}


    </script>

<?php
}

mysqli_close($con);
?>



<!-- ///////////////////////////////////////////////////////////necklace -->
<?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
$result = mysqli_query($con, "SELECT * FROM necklace where id = '$id' ");
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>
                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `necklace` WHERE type = '$type' AND id != '$id' AND amount > 0 LIMIT 3";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    function getRandomProducts($products) {
                        shuffle($products);  // שימוש בפונקציה shuffle() לשינוי רנדומלי של המערך
                        $randomProducts = array_slice($products, 0, 3);  // בחירת המוצרים הראשונים במערך (עד 3 מוצרים)
                    
                        return $randomProducts;
                    }

                    $randomProducts = getRandomProducts($products, 3);

                    foreach ($randomProducts as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name']; ?>" data-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                $imageResult = mysqli_query($con, "SELECT image FROM necklace WHERE id='$id' ");
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card-body"> 
            <div class="d-flex">
            <button type="button" name="addtocart" class=" ">
            <a href="cart.php" style="color:#f5ebe0;">Back</a>
            </button>
             <button type="button" id="addToCartButton" class="btn1">
            <a href="#" style="color:#f5ebe0;" class="image-link" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['name']; ?>">
               Add To Cart </a>
            </button>
        </div>
    </div>
     </div>
   <script>
   const mainImage = document.getElementById('mainImage');
    const productPrice = document.getElementById('productPrice');
    const productID = document.getElementById('productid');
    let selectedProductId = '';
    let selectedProductImage = '';
    let selectedProductPrice = '';
    let selectedProductName = '';
    let prevImageUrl = "<?php echo $row['image']; ?>";
    const imageLinks = document.querySelectorAll('.image-link');
    imageLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const currentImageUrl = this.querySelector('img').getAttribute('src');
      mainImage.src = currentImageUrl;
      productPrice.textContent = this.dataset.price;
      productID.dataset.id = this.dataset.id;
      selectedProductId = this.dataset.id;
      selectedProductImage = currentImageUrl;
      this.querySelector('img').setAttribute('src', prevImageUrl);
      prevImageUrl = currentImageUrl;
      // Update price and ID
      const selectedProductName = this.dataset.name;
      const selectedProductID = this.dataset.id;
      const selectedProductprice= this.dataset.price;
      document.getElementById('productname').textContent = selectedProductName;
      document.getElementById('productid').dataset.id = selectedProductID;
      document.getElementById('productPrice').dataset.price= selectedProductprice;
   });
});

const addToCartButton = document.getElementById('addToCartButton');

addToCartButton.addEventListener('click', function (e) {
   e.preventDefault();

   if (selectedProductId) {
      addToCart(selectedProductId, selectedProductImage);
   } else {
      alert("Please select a product.");
   }
});

function addToCart(productId, imageUrl) {
   // Make an AJAX request to the server-side script to add the product to the cart
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "inserttocartnecklace.php?id=" + productId, true);
   xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         // Request successful, do something if needed
         alert("Product added to cart!");

         // Display the selected image in the cart (assuming there is an element with ID "cartImage")
         document.getElementById('cartImage').src = imageUrl;
      }
   };
   xhr.send();
}


    </script>

<?php
}

mysqli_close($con);
?>



  <!--////////////////////////////////////////////////// earing -->
  <?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM earing  WHERE id='$id' ");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>

                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `earing` WHERE type = '$type' AND id != '$id' AND amount > 0 LIMIT 3";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    function getRandomProducts($products) {
                        shuffle($products);  // שימוש בפונקציה shuffle() לשינוי רנדומלי של המערך
                        $randomProducts = array_slice($products, 0, 3);  // בחירת המוצרים הראשונים במערך (עד 3 מוצרים)
                    
                        return $randomProducts;
                    }

                    $randomProducts = getRandomProducts($products, 3);

                    foreach ($randomProducts as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name']; ?>" data-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                $imageResult = mysqli_query($con, "SELECT image FROM earing  WHERE id='$id'");
               
                ?>
            </div>
        </div>
    </div>

   
    <div class="col-sm-4">
        <div class="card-body"> 
            <div class="d-flex">
            <button type="button" name="addtocart" class=" ">
            <a href="cart.php" style="color:#f5ebe0;">Back</a>
            </button>
             <button type="button" id="addToCartButton" class="btn1">
            <a href="#" style="color:#f5ebe0;" class="image-link" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['name']; ?>">
               Add To Cart </a>
            </button>
           
        </div>
    </div>
     </div>
   <script>
   const mainImage = document.getElementById('mainImage');
    const productPrice = document.getElementById('productPrice');
    const productID = document.getElementById('productid');
    let selectedProductId = '';
    let selectedProductImage = '';
    let selectedProductPrice = '';
    let selectedProductName = '';
    let prevImageUrl = "<?php echo $row['image']; ?>";
    const imageLinks = document.querySelectorAll('.image-link');
    imageLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const currentImageUrl = this.querySelector('img').getAttribute('src');
     
      mainImage.src = currentImageUrl;
      productPrice.textContent = this.dataset.price;
      productID.dataset.id = this.dataset.id;
      selectedProductId = this.dataset.id;
      selectedProductImage = currentImageUrl;
      this.querySelector('img').setAttribute('src', prevImageUrl);
      prevImageUrl = currentImageUrl;
      // Update price and ID
      const selectedProductName = this.dataset.name;
      const selectedProductID = this.dataset.id;
      const selectedProductprice= this.dataset.price;
      document.getElementById('productname').textContent = selectedProductName;
      document.getElementById('productid').dataset.id = selectedProductID;
      document.getElementById('productPrice').dataset.price= selectedProductprice;
   });
});

const addToCartButton = document.getElementById('addToCartButton');

addToCartButton.addEventListener('click', function (e) {
   e.preventDefault();

   if (selectedProductId) {
      addToCart(selectedProductId, selectedProductImage);
   } else {
      alert("Please select a product.");
   }
});

function addToCart(productId, imageUrl) {
   // Make an AJAX request to the server-side script to add the product to the cart
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "inserttocartearing.php?id=" + productId, true);
   xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         // Request successful, do something if needed
         alert("Product added to cart!");

         // Display the selected image in the cart (assuming there is an element with ID "cartImage")
         document.getElementById('cartImage').src = imageUrl;
      }
   };
   xhr.send();
}


    </script>

<?php
}

mysqli_close($con);
?>



 <!-- ///////////////////////////////////////////////////////////////////////////////////////////////barcelet -->
 <?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM barcelet WHERE id='$id'  ");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name_p']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>

                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `barcelet` WHERE  type = '$type' AND id != '$id' AND amount > 0 LIMIT 3";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    function getRandomProducts($products) {
                        shuffle($products);  // שימוש בפונקציה shuffle() לשינוי רנדומלי של המערך
                        $randomProducts = array_slice($products, 0, 3);  // בחירת המוצרים הראשונים במערך (עד 3 מוצרים)
                    
                        return $randomProducts;
                    }

                    $randomProducts = getRandomProducts($products, 3);

                    foreach ($randomProducts as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name_p']; ?>" data-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                $imageResult = mysqli_query($con, "SELECT image FROM barcelet WHERE id='$id'");
               
                ?>
            </div>
        </div>
    </div>

   
    <div class="col-sm-4">
        <div class="card-body"> 
            <div class="d-flex">
            <button type="button" name="addtocart" class=" ">
            <a href="cart.php" style="color:#f5ebe0;">Back</a>
            </button>
             <button type="button" id="addToCartButton" class="btn1">
            <a href="#" style="color:#f5ebe0;" class="image-link" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['name_p']; ?>">
               Add To Cart </a>
            </button>
           
        </div>
    </div>
     </div>
   <script>
   const mainImage = document.getElementById('mainImage');
    const productPrice = document.getElementById('productPrice');
    const productID = document.getElementById('productid');
    let selectedProductId = '';
    let selectedProductImage = '';
    let selectedProductPrice = '';
    let selectedProductName = '';
    let prevImageUrl = "<?php echo $row['image']; ?>";
    const imageLinks = document.querySelectorAll('.image-link');
    imageLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const currentImageUrl = this.querySelector('img').getAttribute('src');
     
      mainImage.src = currentImageUrl;
      productPrice.textContent = this.dataset.price;
      productID.dataset.id = this.dataset.id;
      selectedProductId = this.dataset.id;
      selectedProductImage = currentImageUrl;
      this.querySelector('img').setAttribute('src', prevImageUrl);
      prevImageUrl = currentImageUrl;
      // Update price and ID
      const selectedProductName = this.dataset.name;
      const selectedProductID = this.dataset.id;
      const selectedProductprice= this.dataset.price;
      document.getElementById('productname').textContent = selectedProductName;
      document.getElementById('productid').dataset.id = selectedProductID;
      document.getElementById('productPrice').dataset.price= selectedProductprice;
   });
});

const addToCartButton = document.getElementById('addToCartButton');

addToCartButton.addEventListener('click', function (e) {
   e.preventDefault();

   if (selectedProductId) {
      addToCart(selectedProductId, selectedProductImage);
   } else {
      alert("Please select a product.");
   }
});

function addToCart(productId, imageUrl) {
   // Make an AJAX request to the server-side script to add the product to the cart
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "inserttocartbarcelet.php?id=" + productId, true);
   xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         // Request successful, do something if needed
         alert("Product added to cart!");

         // Display the selected image in the cart (assuming there is an element with ID "cartImage")
         document.getElementById('cartImage').src = imageUrl;
      }
   };
   xhr.send();
}


    </script>

<?php
}

mysqli_close($con);
?>


<!-- ///////////////////////////////////////anklet -->
<?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM anklet WHERE id='$id' ");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name_p']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>

                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `anklet` WHERE type = '$type' AND id != '$id' AND amount > 0 LIMIT 3";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    function getRandomProducts($products) {
                        shuffle($products);  // שימוש בפונקציה shuffle() לשינוי רנדומלי של המערך
                        $randomProducts = array_slice($products, 0, 3);  // בחירת המוצרים הראשונים במערך (עד 3 מוצרים)
                    
                        return $randomProducts;
                    }

                    $randomProducts = getRandomProducts($products, 3);

                    foreach ($randomProducts as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name_p']; ?>" data-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                $imageResult = mysqli_query($con, "SELECT image FROM anklet WHERE id='$id'");
               
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card-body"> 
            <div class="d-flex">
            <button type="button" name="addtocart" class=" ">
            <a href="cart.php" style="color:#f5ebe0;">Back</a>
            </button>
             <button type="button" id="addToCartButton" class="btn1">
            <a href="#" style="color:#f5ebe0;" class="image-link" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['name_p']; ?>">
               Add To Cart </a>
            </button>
        </div>
    </div>
     </div>
   <script>
   const mainImage = document.getElementById('mainImage');
    const productPrice = document.getElementById('productPrice');
    const productID = document.getElementById('productid');
    let selectedProductId = '';
    let selectedProductImage = '';
    let selectedProductPrice = '';
    let selectedProductName = '';
    let prevImageUrl = "<?php echo $row['image']; ?>";
    const imageLinks = document.querySelectorAll('.image-link');
    imageLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const currentImageUrl = this.querySelector('img').getAttribute('src');
     
      mainImage.src = currentImageUrl;
      productPrice.textContent = this.dataset.price;
      productID.dataset.id = this.dataset.id;
      selectedProductId = this.dataset.id;
      selectedProductImage = currentImageUrl;
      this.querySelector('img').setAttribute('src', prevImageUrl);
      prevImageUrl = currentImageUrl;
      // Update price and ID
      const selectedProductName = this.dataset.name;
      const selectedProductID = this.dataset.id;
      const selectedProductprice= this.dataset.price;
      document.getElementById('productname').textContent = selectedProductName;
      document.getElementById('productid').dataset.id = selectedProductID;
      document.getElementById('productPrice').dataset.price= selectedProductprice;
   });
});

const addToCartButton = document.getElementById('addToCartButton');

addToCartButton.addEventListener('click', function (e) {
   e.preventDefault();

   if (selectedProductId) {
      addToCart(selectedProductId, selectedProductImage);
   } else {
      alert("Please select a product.");
   }
});

function addToCart(productId, imageUrl) {
   // Make an AJAX request to the server-side script to add the product to the cart
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "inserttocartanklet.php?id=" + productId, true);
   xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         // Request successful, do something if needed
         alert("Product added to cart!");

         // Display the selected image in the cart (assuming there is an element with ID "cartImage")
         document.getElementById('cartImage').src = imageUrl;
      }
   };
   xhr.send();
}


    </script>

<?php
}

mysqli_close($con);
?>

<!-- ////////////////////////////////////////////////////////////////////////////////handmade -->
<?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM handmade WHERE id='$id'  ");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>

                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `handmade` WHERE type = '$type' AND id != '$id' AND amount > 0 LIMIT 3 ";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    function getRandomProducts($products) {
                        shuffle($products);  // שימוש בפונקציה shuffle() לשינוי רנדומלי של המערך
                        $randomProducts = array_slice($products, 0, 3);  // בחירת המוצרים הראשונים במערך (עד 3 מוצרים)
                    
                        return $randomProducts;
                    }

                    $randomProducts = getRandomProducts($products, 3);

                    foreach ($randomProducts as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name']; ?>" data-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                $imageResult = mysqli_query($con, "SELECT image FROM handmade WHERE id='$id'");
               
                ?>
            </div>
        </div>
    </div>

   
    <div class="col-sm-4">
        <div class="card-body"> 
            <div class="d-flex">
            <button type="button" name="addtocart" class=" ">
            <a href="cart.php" style="color:#f5ebe0;">Back</a>
            </button>
             <button type="button" id="addToCartButton" class="btn1">
            <a href="#" style="color:#f5ebe0;" class="image-link" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['name']; ?>">
               Add To Cart </a>
            </button>
           
        </div>
    </div>
     </div>
   <script>
   const mainImage = document.getElementById('mainImage');
    const productPrice = document.getElementById('productPrice');
    const productID = document.getElementById('productid');
    let selectedProductId = '';
    let selectedProductImage = '';
    let selectedProductPrice = '';
    let selectedProductName = '';
    let prevImageUrl = "<?php echo $row['image']; ?>";
    const imageLinks = document.querySelectorAll('.image-link');
    imageLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const currentImageUrl = this.querySelector('img').getAttribute('src');
     
      mainImage.src = currentImageUrl;
      productPrice.textContent = this.dataset.price;
      productID.dataset.id = this.dataset.id;
      selectedProductId = this.dataset.id;
      selectedProductImage = currentImageUrl;
      this.querySelector('img').setAttribute('src', prevImageUrl);
      prevImageUrl = currentImageUrl;
      // Update price and ID
      const selectedProductName = this.dataset.name;
      const selectedProductID = this.dataset.id;
      const selectedProductprice= this.dataset.price;
      document.getElementById('productname').textContent = selectedProductName;
      document.getElementById('productid').dataset.id = selectedProductID;
      document.getElementById('productPrice').dataset.price= selectedProductprice;
   });
});

const addToCartButton = document.getElementById('addToCartButton');

addToCartButton.addEventListener('click', function (e) {
   e.preventDefault();

   if (selectedProductId) {
      addToCart(selectedProductId, selectedProductImage);
   } else {
      alert("Please select a product.");
   }
});

function addToCart(productId, imageUrl) {
   // Make an AJAX request to the server-side script to add the product to the cart
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "inserttocartmadehande.php?id=" + productId, true);
   xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         // Request successful, do something if needed
         alert("Product added to cart!");

         // Display the selected image in the cart (assuming there is an element with ID "cartImage")
         document.getElementById('cartImage').src = imageUrl;
      }
   };
   xhr.send();
}


    </script>

<?php
}

mysqli_close($con);
?>
<!-- ///////////////////////////////////////////////////////////////////////////////////party -->
<?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM party WHERE id='$id' ");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name_p']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>

                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `party` WHERE type = '$type' AND id != '$id' AND amount > 0 LIMIT 3";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    function getRandomProducts($products) {
                        shuffle($products);  // שימוש בפונקציה shuffle() לשינוי רנדומלי של המערך
                        $randomProducts = array_slice($products, 0, 3);  // בחירת המוצרים הראשונים במערך (עד 3 מוצרים)
                    
                        return $randomProducts;
                    }

                    $randomProducts = getRandomProducts($products, 3);

                    foreach ($randomProducts as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name_p']; ?>" data-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                $imageResult = mysqli_query($con, "SELECT image FROM party WHERE id='$id'");
               
                ?>
            </div>
        </div>
    </div>

   
    <div class="col-sm-4">
        <div class="card-body"> 
            <div class="d-flex">
            <button type="button" name="addtocart" class=" ">
            <a href="cart.php" style="color:#f5ebe0;">Back</a>
            </button>
             <button type="button" id="addToCartButton" class="btn1">
            <a href="#" style="color:#f5ebe0;" class="image-link" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['name_p']; ?>">
               Add To Cart </a>
            </button>
           
        </div>
    </div>
     </div>
   <script>
   const mainImage = document.getElementById('mainImage');
    const productPrice = document.getElementById('productPrice');
    const productID = document.getElementById('productid');
    let selectedProductId = '';
    let selectedProductImage = '';
    let selectedProductPrice = '';
    let selectedProductName = '';
    let prevImageUrl = "<?php echo $row['image']; ?>";
    const imageLinks = document.querySelectorAll('.image-link');
    imageLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const currentImageUrl = this.querySelector('img').getAttribute('src');
     
      mainImage.src = currentImageUrl;
      productPrice.textContent = this.dataset.price;
      productID.dataset.id = this.dataset.id;
      selectedProductId = this.dataset.id;
      selectedProductImage = currentImageUrl;
      this.querySelector('img').setAttribute('src', prevImageUrl);
      prevImageUrl = currentImageUrl;
      // Update price and ID
      const selectedProductName = this.dataset.name;
      const selectedProductID = this.dataset.id;
      const selectedProductprice= this.dataset.price;
      document.getElementById('productname').textContent = selectedProductName;
      document.getElementById('productid').dataset.id = selectedProductID;
      document.getElementById('productPrice').dataset.price= selectedProductprice;
   });
});

const addToCartButton = document.getElementById('addToCartButton');

addToCartButton.addEventListener('click', function (e) {
   e.preventDefault();

   if (selectedProductId) {
      addToCart(selectedProductId, selectedProductImage);
   } else {
      alert("Please select a product.");
   }
});

function addToCart(productId, imageUrl) {
   // Make an AJAX request to the server-side script to add the product to the cart
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "inserttocartparty.php?id=" + productId, true);
   xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         // Request successful, do something if needed
         alert("Product added to cart!");

         // Display the selected image in the cart (assuming there is an element with ID "cartImage")
         document.getElementById('cartImage').src = imageUrl;
      }
   };
   xhr.send();
}


    </script>

<?php
}

mysqli_close($con);
?>
<!-- /////////////////////////////////////////////////////////////////////discount -->
<?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
$result = mysqli_query($con, "SELECT * FROM discount WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name_p']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>
                <?php
                $type = $row['type'];
                // Retrieve other products of the same type
                $sql = "SELECT * FROM `discount` WHERE type = '$type' AND id != '$id' AND amount > 0 LIMIT 3";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    function getRandomProducts($products) {
                        shuffle($products);  // שימוש בפונקציה shuffle() לשינוי רנדומלי של המערך
                        $randomProducts = array_slice($products, 0, 3);  // בחירת המוצרים הראשונים במערך (עד 3 מוצרים)
                    
                        return $randomProducts;
                    }
                    $randomProducts = getRandomProducts($products, 3);
                    foreach ($randomProducts as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name_p']; ?>" data-id="<?php echo $product['id']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                $imageResult = mysqli_query($con, "SELECT image FROM discount WHERE id='$id' AND amount > 0 ");
                ?>
            </div>
        </div>
    </div>   
    <div class="col-sm-4">
        <div class="card-body"> 
            <div class="d-flex">
            <button type="button" name="addtocart" class=" ">
            <a href="cart.php" style="color:#f5ebe0;">Back</a>
            </button>
             <button type="button" id="addToCartButton" class="btn1">
            <a href="#" style="color:#f5ebe0;" class="image-link" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>" data-name="<?php echo $row['name_p']; ?>">
               Add To Cart </a>
            </button>
           
        </div>
    </div>
     </div>
   <script>
   const mainImage = document.getElementById('mainImage');
    const productPrice = document.getElementById('productPrice');
    const productID = document.getElementById('productid');
    let selectedProductId = '';
    let selectedProductImage = '';
    let selectedProductPrice = '';
    let selectedProductName = '';
    let prevImageUrl = "<?php echo $row['image']; ?>";
    const imageLinks = document.querySelectorAll('.image-link');
    imageLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const currentImageUrl = this.querySelector('img').getAttribute('src');
     
      mainImage.src = currentImageUrl;
      productPrice.textContent = this.dataset.price;
      productID.dataset.id = this.dataset.id;
      selectedProductId = this.dataset.id;
      selectedProductImage = currentImageUrl;
      this.querySelector('img').setAttribute('src', prevImageUrl);
      prevImageUrl = currentImageUrl;
      // Update price and ID
      const selectedProductName = this.dataset.name;
      const selectedProductID = this.dataset.id;
      const selectedProductprice= this.dataset.price;
      document.getElementById('productname').textContent = selectedProductName;
      document.getElementById('productid').dataset.id = selectedProductID;
      document.getElementById('productPrice').dataset.price= selectedProductprice;
   });
});

const addToCartButton = document.getElementById('addToCartButton');

addToCartButton.addEventListener('click', function (e) {
   e.preventDefault();

   if (selectedProductId) {
      addToCart(selectedProductId, selectedProductImage);
   } else {
      alert("Please select a product.");
   }
});

function addToCart(productId, imageUrl) {
   // Make an AJAX request to the server-side script to add the product to the cart
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "inserttocartdiscount.php?id=" + productId, true);
   xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         // Request successful, do something if needed
         alert("Product added to cart!");

         // Display the selected image in the cart (assuming there is an element with ID "cartImage")
         document.getElementById('cartImage').src = imageUrl;
      }
   };
   xhr.send();
}


    </script>

<?php
}

mysqli_close($con);
?>