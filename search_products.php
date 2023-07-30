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
      .card-body {
    /* Rest of your styles for the card body */
    overflow: hidden;
    font-family: Georgia, serif;
 color:#9d8189;
text-align:center;


}

.short-name {
    cursor: pointer;
}

.read-more {
    color:#9d8189 ;
    cursor: pointer;
}
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

.input2{

border-radius: 25px;
border: 1.5px solid #9d8189;
padding: 20px;
width: 100px;
height: 40px;
}

.search-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px; /* Adjust the margin as needed */
}
.image-caption {
position: absolute;
top: 0;
left: 14px;
width: 94%;
text-align: center;
background-color: rgba(0, 0, 0, 0.5);
color:#ffb09c;
padding: 10px;
font-weight: bold;
}


.heart-icon {
position: absolute;
top: 10px;
left: 30px;
z-index: 1;

}
h5{
font-family: Georgia, serif;
color:#9d8189;
text-align:center;
font-size:30px;

}
.card-img-top{
    width:300px;

}

/* Center the search container */

</style>
<?php
if (isset($_GET['product_type'])) {
    $product_type = $_GET['product_type'];

    // Replace 'your_database_host', 'your_username', 'your_password', and 'your_database_name' with your actual database credentials.
    $con = mysqli_connect("localhost", "root", "1234", "loginproject");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escaping the input to prevent SQL injection (consider using prepared statements for better security).
    $product_type = mysqli_real_escape_string($con, $product_type);

    // Query to fetch authentic products based on the product type and is_genuine value equal to 3
    $query = "SELECT * FROM tblproduct WHERE type = '$product_type'";

    // Execute the query and handle potential errors
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query execution failed: " . mysqli_error($con));
    }?>
<!-- Rest of the code to display the search results -->

<div class="row itemsBlock">
<!-- Add a wrapper for the items -->
<?php
// Loop through the products and create cards
while ($row = mysqli_fetch_assoc($result)) {
$id = $row['id'];
$name = $row['name_p'];
$img = $row['image'];
$price = $row['price'];
$amount = $row['amount'];
?>
<div class="col-3 col-3 col-3 col-3 ">
  <form action="" method="post">
    <!-- Wrap the image with a container and apply CSS style -->
    <div class="image-container">
        <img class="card-img-top" src="<?php echo $img ?>" alt="<?php echo $name ?>">
    </div>
    <div class="card-body">
    <h5 class="card-title">
        <span class="short-name"><?php echo substr($name, 0, 15); ?></span>
        <?php if (strlen($name) > 15) { ?>
            <span class="read-more" onclick="toggleFullName(this)">...</span>
        <?php } ?>
        <span class="full-name" style="display: none;"><?php echo $name; ?></span>
    </h5>
        <p class="card-text"> <?php echo $price ?>$</p>
        <?php if ($amount == 0) { ?>
            <div class="image-caption">SOLD OUT</div>
        <?php } ?>
        <span class="heart-icon" tabindex="0" data-toggle="tooltip" title="Tooltip on top">
            <a href="#" style="color:#9d8189;" onclick="toggleHeart(<?php echo $id; ?>)">
                <i class="far fa-heart" id="heart-icon-<?php echo $id; ?>"></i>
            </a>
        </span>
        </div>
        
        <div class="card-body">
          <form action="" method="post">
            <input type="number" name="update_qnt" style="height:40px" value="1" min="0" max="<?php echo $amount ?>" class="input2" />
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="submit" name="update" value="Update" class="input1" />
    
            <a href="inserttocart.php?id=<?php echo $id; ?>" style="color:#f5ebe0;"><button type="button" name="addtocart">Add To Cart</button></a>
          </form>
        </div>
        </div>
  <?php
  }}
  mysqli_close($con);
  ?>
</div>
<script>
    function toggleFullName(element) {
        var cardBody = element.parentElement;
        var fullNameSpan = cardBody.querySelector('.full-name');

        // Toggle the visibility of the full name
        if (fullNameSpan.style.display === 'none') {
            fullNameSpan.style.display = 'inline';
            element.innerHTML = '...';
        } else {
            fullNameSpan.style.display = 'none';
            element.innerHTML = '...';
        }
    }
</script>
