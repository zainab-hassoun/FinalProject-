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
  <span class='badge '>
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
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-body">
                    <h3 class="card-title" style="color:#9d8189;font-family: serif;" > Name: <span id="productname"> <?php echo $row['name']; ?></span></h3><br>
                    <p class="card-text"><h3 style="color:#9d8189;font-family: serif;"> Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                    <p class="card-text" id="productid">ID: <?php echo $row['id']?></p><br>

                    <?php
                    $id = $_GET['id'];
                    $con = mysqli_connect("localhost", "root", "1234", "loginproject");
                    $sql1 = "SELECT * FROM `tblproduct` WHERE id = $id";
                    $result2 = mysqli_query($con, $sql1);

                    while ($innerRow = mysqli_fetch_array($result2)) {
                        if ($innerRow['type'] == '1') {
                            $sql2 = "SELECT * FROM `tblproduct` WHERE type = '1'  and id != $id";
                            $result3 = mysqli_query($con, $sql2);
                            $products = mysqli_fetch_all($result3, MYSQLI_ASSOC);

                            function randomImage1($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages1'] = randomImage1($products);
                            $imageUrls1 = $_SESSION['randimages1'];
                            
                            foreach ($imageUrls1 as $index => $imageUrl) {
                                echo "<a href='" . $innerRow['image'] . "' class='image-link'  data-index='$index' data-price='" . $products[$index]['price'] .  "'data-name='".$products[$index]['name']."' data-id='" . $products[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        } elseif ($innerRow['type'] == '2') {
                            $sql3 = "SELECT * FROM `tblproduct` WHERE type = '2'  and id != $id";
                            $result4 = mysqli_query($con, $sql3);
                            $products1 = mysqli_fetch_all($result4, MYSQLI_ASSOC);

                            function randomImage2($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages2'] = randomImage2($products1);
                            $imageUrls2 = $_SESSION['randimages2'];

                            foreach ($imageUrls2 as $index => $imageUrl) {
                                echo "<a href='" . $innerRow['image'] . "' class='image-link' data-index='$index' data-price='" . $products1[$index]['price'] . "' data-name='".$products[$index]['name']."'data-id='" . $products1[$index]['id'] . "'>
                                <img src='$imageUrl' alt='Product Image' width='140px'></a>";
                            }
                        } elseif ($innerRow['type'] == '3') {
                            $sql4 = "SELECT * FROM `tblproduct` WHERE type = '3' and id != $id";
                            $result5 = mysqli_query($con, $sql4);
                            $products4 = mysqli_fetch_all($result5, MYSQLI_ASSOC);

                            function randomImage3($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages3'] = randomImage3($products4);
                            $imageUrls3 = $_SESSION['randimages3'];

                            foreach ($imageUrls3 as $index => $imageUrl) {
                                echo "<a href='" . $innerRow['image'] . "' class='image-link' data-index='$index' data-price='" . $products4[$index]['price'] ."' data-name='".$products4[$index]['name']." 'data-id='" . $products4[$index]['id'] . "'>
                                <img src='$imageUrl' alt='Product Image' width='140px'></a>";
                            }
                        }
                    }
                    ?>
                </div>
                <div class="col-sm-4">
                    <div class="card-body">
                        <a href="cart.php" style="color:#f5ebe0;"><button type="button" name="addtocart">Back</a></button>
                        <br/>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                var isFirstClick = true;
                var prevImageUrl = "";

                $(".image-link").click(function(e) {
                    e.preventDefault();

                    if (isFirstClick) {
                        isFirstClick = false;
                        prevImageUrl = $(this).find("img").attr("src");

                        var tempImageUrl = $("#mainImage").attr("src");
                        $("#mainImage").attr("src", prevImageUrl);
                        $(this).find("img").attr("src", tempImageUrl);
                        tempImageUrl = prevImageUrl;

                        var imageId = $(this).data("id");
                        $("#productid").text("ID: " + imageId);

                        var price = $(this).data("price");
                        $("#productPrice").text(price);
                        var name= $(this).data("name");
                        $("#productname").text(name);
                    } else {
                        var imageUrl = $(this).find("img").attr("src");

                        $("#mainImage").attr("src", imageUrl);
                        $(this).find("img").attr("src", prevImageUrl);
                        prevImageUrl = imageUrl;

                        var imageId = $(this).data("id");
                        $("#productid").text("ID: " + imageId);

                        var price = $(this).data("price");
                        $("#productPrice").text(price);

                        var name= $(this).data("name");
                        $("#productname").text(name);
                    }
                });
              
            });
        </script>

        <?php
    }
}
?>

<!-- ///////////////////////////////////////////////////////////necklace -->
<?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM necklace WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;" > Type:<span id="productname"> <?php echo $row['name']; ?></span></h3><br>
                    <p class="card-text"><h3 style="color:#9d8189;font-family: serif;"> Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>

                    <?php
                    $id = $_GET['id'];
                    $con = mysqli_connect("localhost", "root", "1234", "loginproject");
                    $sql1 = "SELECT * FROM `necklace` WHERE id = $id";
                    $result2 = mysqli_query($con, $sql1);

                    while ($innerRow = mysqli_fetch_array($result2)) {
                        if ($innerRow['type'] == '1') {
                            $sql2 = "SELECT * FROM `necklace` WHERE type = '1' ";
                            $result2 = mysqli_query($con, $sql2);
                            $products5 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products5);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
                                echo "<a href='" . $innerRow['image'] . "' class='image-link' data-index='$index' data-price='" . $products5[$index]['price'] . "' data-name='".$products5[$index]['name']."' data-id='" . $products5[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        } elseif ($innerRow['type'] == '2') {
                            $sql3 = "SELECT * FROM `necklace` WHERE type = '2'  ";
                            $result3 = mysqli_query($con, $sql3);
                            $row3 = mysqli_fetch_array($result3);
                            $products1 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products1);
                            $imageUrls = $_SESSION['randimages'];
                            foreach ($imageUrls as $index => $imageUrl) {
                                echo "<a href='" . $innerRow['image'] . "' class='image-link' data-index='$index' data-price='" . $products1[$index]['price'] . "' data-name='".$products1[$index]['name']."'  data-id='" . $products1[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        } elseif ($innerRow['type'] == '3') {
                            $sql1 = "SELECT * FROM `necklace` WHERE type = '3' ";
                            $result1 = mysqli_query($con, $sql1);
                            $row1 = mysqli_fetch_array($result1);
                            $products4 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products4);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
                                echo "<a href='" . $innerRow['image'] . "' class='image-link' data-index='$index' data-price='" . $products4[$index]['price'] . "' data-name='".$products4[$index]['name']."'  data-id='" . $products4[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                var isFirstClick = true;
                var prevImageUrl = "";

                $(".image-link").click(function(e) {
                    e.preventDefault();

                    if (isFirstClick) {
                        isFirstClick = false;
                        prevImageUrl = $(this).find("img").attr("src");

                        var tempImageUrl = $("#mainImage").attr("src");
                        $("#mainImage").attr("src", prevImageUrl);
                        $(this).find("img").attr("src", tempImageUrl);
                        tempImageUrl = prevImageUrl;

                        var imageId = $(this).data("id");
                        $("#productid").text("ID: " + imageId);

                        var price = $(this).data("price");
                        $("#productPrice").text(price);

                        var name= $(this).data("name");
                        $("#productname").text(name);
                    } else {
                        var imageUrl = $(this).find("img").attr("src");

                        $("#mainImage").attr("src", imageUrl);
                        $(this).find("img").attr("src", prevImageUrl);
                        prevImageUrl = imageUrl;

                        var imageId = $(this).data("id");
                        $("#productid").text("ID: " + imageId);

                        var price = $(this).data("price");
                        $("#productPrice").text(price);

                        var name= $(this).data("name");
                        $("#productname").text(name);
                    }
                });
            });
        </script>
        <?php
    }
}
?>

  <!--////////////////////////////////////////////////// earing -->
  <?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM earing WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;" > Type:<span id="productname"><?php echo $row['name']; ?></span></h3><br>
                    <p class="card-text"><h3 style="color:#9d8189;font-family: serif;"> Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h6></p><br>

                    <?php
                    $id = $_GET['id'];
                    $con = mysqli_connect("localhost", "root", "1234", "loginproject");
                    $sql1 = "SELECT * FROM `earing` WHERE id = $id";
                    $result2 = mysqli_query($con, $sql1);

                    while ($innerRow = mysqli_fetch_array($result2)) {
                        if ($innerRow['type'] == '1') {
                            $sql2 = "SELECT * FROM `earing` WHERE type = '1'  AND id != $id";
                            $result2 = mysqli_query($con, $sql2);
                            $products6 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products6);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
            
                                echo "<a href='" . $innerRow['image'] . "' class='image-link'  data-index='$index' data-price='" . $products6[$index]['price'] .  "'data-name='".$products6[$index]['name']."' data-id='" . $products6[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        } elseif ($innerRow['type'] == '2') {
                            $sql3 = "SELECT * FROM `earing` WHERE type = '2'  AND id != $id";
                            $result3 = mysqli_query($con, $sql3);
                            $row3 = mysqli_fetch_array($result3);
                            $products7 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products7);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
            
                                echo "<a href='" . $innerRow['image'] . "' class='image-link'  data-index='$index' data-price='" . $products7[$index]['price'] .  "' data-name='".$products7[$index]['name']."' data-id='" . $products7[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        } elseif ($innerRow['type'] == '3') {
                            $sql1 = "SELECT * FROM `earing` WHERE type = '3'  AND id != $id";
                            $result1 = mysqli_query($con, $sql1);
                            $row1 = mysqli_fetch_array($result1);
                            $products8 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products8);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
            
                                echo "<a href='" . $innerRow['image'] . "' class='image-link'  data-index='$index' data-price='" . $products8[$index]['price'] .  "' data-name='".$products8[$index]['name']."' data-id='" . $products8[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
$(document).ready(function() {
var isFirstClick = true;
var prevImageUrl = "";

$(".image-link").click(function(e) {
    e.preventDefault();

    if (isFirstClick) {
        isFirstClick = false;
        prevImageUrl = $(this).find("img").attr("src");

        var tempImageUrl = $("#mainImage").attr("src");
        $("#mainImage").attr("src", prevImageUrl);
        $(this).find("img").attr("src", tempImageUrl);
        tempImageUrl = prevImageUrl;

        var imageId = $(this).data("id");
        $("#productid").text("ID: " + imageId);

        var price = $(this).data("price");
        $("#productPrice").text(price);

        var name= $(this).data("name");
        $("#productname").text(name);
    } else {
        var imageUrl = $(this).find("img").attr("src");

        $("#mainImage").attr("src", imageUrl);
        $(this).find("img").attr("src", prevImageUrl);
        prevImageUrl = imageUrl;

        var imageId = $(this).data("id");
        $("#productid").text("ID: " + imageId);

        var price = $(this).data("price");
        $("#productPrice").text(price);

        var name= $(this).data("name");
        $("#productname").text(name);
        }
    });
});
</script>
<?php
    }
}
?>
 <!-- ///////////////////////////////////////////////////////////////////////////////////////////////barcelet -->
 <?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM barcelet WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;" > Type:<span id="productname"> <?php echo $row['name']; ?></span></h3><br>
                    <p class="card-text"><h3 style="color:#9d8189;font-family: serif;"> Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h6></p><br>

                    <?php
                    $id = $_GET['id'];
                    $con = mysqli_connect("localhost", "root", "1234", "loginproject");
                    $sql1 = "SELECT * FROM `barcelet` WHERE id = $id";
                    $result2 = mysqli_query($con, $sql1);

                    while ($innerRow = mysqli_fetch_array($result2)) {
                        if ($innerRow['type'] == '1') {
                            $sql2 = "SELECT * FROM `barcelet` WHERE type = '1'  AND id != $id";
                            $result2 = mysqli_query($con, $sql2);
                            $products = mysqli_fetch_all($result2, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
            
                                echo "<a href='" . $innerRow['image'] . "' class='image-link'  data-index='$index' data-price='" . $products[$index]['price'] .  "'  data-name='".$products[$index]['name']."' data-id='" . $products[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        } elseif ($innerRow['type'] == '2') {
                            $sql3 = "SELECT * FROM `barcelet` WHERE type = '2'  AND id != $id";
                            $result3 = mysqli_query($con, $sql3);
                            $row3 = mysqli_fetch_array($result3);
                            $products1 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products1);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
            
                                echo "<a href='" . $innerRow['image'] . "' class='image-link'  data-index='$index' data-price='" . $products1[$index]['price'] .  "' data-name='".$products1[$index]['name']."' data-id='" . $products1[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        } elseif ($innerRow['type'] == '3') {
                            $sql1 = "SELECT * FROM `barcelet` WHERE type = '3'  AND id != $id";
                            $result1 = mysqli_query($con, $sql1);
                            $row1 = mysqli_fetch_array($result1);
                            $products4 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products4);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
            
                                echo "<a href='" . $innerRow['image'] . "' class='image-link'  data-index='$index' data-price='" . $products4[$index]['price'] .  "'  data-name='".$products4[$index]['name']."' data-id='" . $products4[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script>
$(document).ready(function() {
var isFirstClick = true;
var prevImageUrl = "";

$(".image-link").click(function(e) {
    e.preventDefault();

    if (isFirstClick) {
        isFirstClick = false;
        prevImageUrl = $(this).find("img").attr("src");

        var tempImageUrl = $("#mainImage").attr("src");
        $("#mainImage").attr("src", prevImageUrl);
        $(this).find("img").attr("src", tempImageUrl);
        tempImageUrl = prevImageUrl;

        var imageId = $(this).data("id");
        $("#productid").text("ID: " + imageId);

        var price = $(this).data("price");
        $("#productPrice").text(price);
        var name= $(this).data("name");
        $("#productname").text(name);
    } else {
        var imageUrl = $(this).find("img").attr("src");

        $("#mainImage").attr("src", imageUrl);
        $(this).find("img").attr("src", prevImageUrl);
        prevImageUrl = imageUrl;

        var imageId = $(this).data("id");
        $("#productid").text("ID: " + imageId);

        var price = $(this).data("price");
        $("#productPrice").text(price);

        var name= $(this).data("name");
        $("#productname").text(name);
        }
    });
});
</script>
<?php
    }
}
?>
<!-- ///////////////////////////////////////anklet -->
 <?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM anklet WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;" > Type:<span id="productname"> <?php echo $row['name']; ?></span></h3><br>
                    <p class="card-text"><h3 style="color:#9d8189;font-family: serif;"> Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h6></p><br>

                    <?php
                    $id = $_GET['id'];
                    $con = mysqli_connect("localhost", "root", "1234", "loginproject");
                    $sql1 = "SELECT * FROM anklet WHERE id = '$id'";
                    $result2 = mysqli_query($con, $sql1);

                    while ($innerRow1 = mysqli_fetch_array($result2)) {
                        if ($innerRow1['type'] == '1') {
                            $sql2 = "SELECT * FROM `anklet` WHERE type = '1'  and id != $id";
                            $result2 = mysqli_query($con, $sql2);
                            $products = mysqli_fetch_all($result2, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
            
                                echo "<a href='" . $innerRow1['image'] . "' class='image-link'  data-index='$index' data-price='" . $products[$index]['price'] .  "' data-name='".$products[$index]['name']."' data-id='" . $products[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        }
                         else if ($innerRow1['type'] == '2') {
                            $id=$_GET['id'];
                       
                            $sql30 = "SELECT * FROM `anklet` WHERE type ='2'  and id != '$id'";
                            $result30 = mysqli_query($con, $sql30);
                            $row30 = mysqli_fetch_array($result30);
                           
                            $products30 = mysqli_fetch_all($result30, MYSQLI_ASSOC);
                           
                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products3);
                            $imageUrls = $_SESSION['randimages'];
                            foreach ($imageUrls as $index => $imageUrl) {
            
                                echo "<a href='" . $innerRow1['image'] . "' class='image-link'  data-index='$index' data-price='" . $products3[$index]['price'] .  "' data-name='".$products3[$index]['name']."' data-id='" . $products3[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        } elseif ($innerRow1['type'] == '3') {
                            $sql1 = "SELECT * FROM `anklet` WHERE type = '3'";
                            $result1 = mysqli_query($con, $sql1);
                            $row1 = mysqli_fetch_array($result1);
                            $products4 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products4);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
                                echo "<a href='" . $innerRow1['image'] . "' class='image-link'  data-index='$index' data-price='" . $products4[$index]['price'] .  "' data-name='".$products4[$index]['name']."' data-id='" . $products4[$index]['id'] . "'>
                                    <img src='$imageUrl' alt='Product Image' width='150px'></a>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
$(document).ready(function() {
var isFirstClick = true;
var prevImageUrl = "";

$(".image-link").click(function(e) {
    e.preventDefault();
    
    if (isFirstClick) {
        isFirstClick = false;
        prevImageUrl = $(this).find("img").attr("src");

        var tempImageUrl = $("#mainImage").attr("src");
        $("#mainImage").attr("src", prevImageUrl);
        $(this).find("img").attr("src", tempImageUrl);
        tempImageUrl = prevImageUrl;

        var imageId = $(this).data("id");
        $("#productid").text("ID: " + imageId);

        var price = $(this).data("price");
        $("#productPrice").text(price);

        var name= $(this).data("name");
        $("#productname").text(name);
    } else {
        var imageUrl = $(this).find("img").attr("src");

        $("#mainImage").attr("src", imageUrl);
        $(this).find("img").attr("src", prevImageUrl);
        prevImageUrl = imageUrl;

        var imageId = $(this).data("id");
        $("#productid").text("ID: " + imageId);

        var price = $(this).data("price");
        $("#productPrice").text(price);

        var name= $(this).data("name");
        $("#productname").text(name);
        }
    });
});
</script>
<?php
    }
}
?>