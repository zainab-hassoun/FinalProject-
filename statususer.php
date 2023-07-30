<html>
<?php
date_default_timezone_set('UTC'); // Set your desired timezone
?>
</head>
<meta charset="utf-8">
          <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="css/userhome.css"/>
<meta charset="utf-8" />
<title></title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<style>
     body{		
        background-image:url('image/img22.jpg');
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size:cover;
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
        padding: 0px;
        border-radius: 25%;
        margin-left: 590px;
    }

</style>
      	
<section>
	<section>
 
<ul>
  <li><a href="homeuser.php"><img src="image/img231.jpg" width="120px"   /></a></li>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189;font-family: serif;" href="contact.php">Contact</a></li> 
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="heart.php" ><i class="fa-regular fa-heart"></i></a></li> 
  <span class='badge'>
  <li style="padding:15px;" class="iconcart"><a style="color:#9d8189;font-family:serif;"  href="cart.php" ><i class="fa-solid fa-cart-shopping"> 
    <?php
    session_start();
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

<div class="container">
    <table style="color:#9d8189; font-family: serif;" class="table">
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Order Number</th>
            <th scope="col">username</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
        </tr>

    <?php
// function formatDate($dateString, $format = 'd-m-Y')
// {
//     $dateTime = DateTime::createFromFormat('Y-m-d', $dateString);
//     if ($dateTime === false) {
//         // Try parsing in 'd-m-Y' format
//         $dateTime = DateTime::createFromFormat('d-m-Y', $dateString);
//         if ($dateTime === false || !checkdate($dateTime->format('m'), $dateTime->format('d'), $dateTime->format('Y'))) {
//             // Error in parsing date or invalid date, fallback to original string
//             return $dateString;
//         }
//     }
//     return $dateTime->format($format);
// }
// function extractTime($dateTimeString)
// {
//     $dateTimeParts = explode(' ', $dateTimeString);
//     return isset($dateTimeParts[1]) ? $dateTimeParts[1] : '';
// }

//

function formatDate($dateString, $format = 'd-m-Y')
{
    $dateTime = DateTime::createFromFormat('Y-m-d', $dateString);
    if ($dateTime === false) {
        // Try parsing in 'd-m-Y' format
        $dateTime = DateTime::createFromFormat('d-m-Y', $dateString);
        if ($dateTime === false || !checkdate($dateTime->format('m'), $dateTime->format('d'), $dateTime->format('Y'))) {
            // Error in parsing date or invalid date, fallback to original string
            return $dateString;
        }
    }
    return $dateTime->format($format);
}

function extractTime($dateTimeString)
{
    $dateTimeParts = explode(' ', $dateTimeString);
    return isset($dateTimeParts[1]) ? $dateTimeParts[1] : '';
}

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Format and display the current date and time
$formattedDate = formatDate($currentDateTime, 'd-m-Y');
$currentTime = extractTime($currentDateTime);

// echo 'Current Date: ' . $formattedDate . '<br>';
// echo 'Current Time: ' . $currentTime . '<br>';

 ?>
<?php
if (isset($_SESSION['email'])) {
  $ss = $_SESSION['email'];
  $result1 = mysqli_query($con, "SELECT * FROM `payment1` where user_id='" . $ss . "'");
  $prevDate = null;
  $orderCount = 1;

  while ($row = mysqli_fetch_array($result1)) {
      $sum = $row['price'] * $row['quantity'];
      $dateTime = $row['time']; // Assuming 'date' column contains both date and time
      $date = formatDate($dateTime, 'd-m-Y'); // Extract the date from the dateTime

      if ($date !== $prevDate) {
          // If the date is different from the previous date, it's a new order/package
          $prevDate = $date;
          $orderCount = 1; // Reset the order count for each new date
          ?> 
          <!-- Start of the order row -->
          <tr>
              <td><?php echo formatDate($row['date'], 'd-m-Y'); ?></td>
              <td><?php echo 'הזמנה '  ?></td>
              <td><?php echo $row['user_id']; ?></td>
          </tr>
          <!-- End of the order row -->
          <?php
        } else {
            // If the date is the same as the previous date, it's the same order/package
            $orderCount++; // Increment the order count for the same date
        }
        ?>
      <!-- Start of the product row -->
      <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><img width='56px' src='<?php echo isset($row['image']) ? $row['image'] : ''; ?>' name='image'></td>
          <td><?php echo isset($row['name']) ? $row['name'] : ''; ?></td>
          <td><?php echo isset($row['quantity']) ? $row['quantity'] : ''; ?></td>
          <td><?php echo $sum . "$"; ?></td>
      </tr>
      <!-- End of the product row -->
      <?php
  }
}
?>
 </table>
    </center>
  </div>
    </body>
</html>
   
   