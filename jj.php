
<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        }  
        ?><?php
function calculatePrice($originalPrice, $quantity) {
    return $originalPrice - (10 * ($quantity - 1));
}

$sql = "SELECT * FROM `discount`";
$result1 = mysqli_query($con, $sql);

if (mysqli_num_rows($result1) > 0) {
  
        echo '<p class="card-text"><h6 style="color:#9d8189;font-family: serif;">total: ' . calculatePrice($row['price'], $row['quantity']) . '$</h6></p>';
    
}?>