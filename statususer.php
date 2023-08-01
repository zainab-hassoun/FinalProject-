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
    button{
        
        width: 90px;
        border-radius: 0px;
        background-color:#9d8189 ;
        color: #f5ebe0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
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
    <table id="orderTable" class="table">
        <tr>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="clickable">Date</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">username</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Image</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Name</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Quantity</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Price</th>
        </tr>
        <?php

        if (isset($_SESSION['email'])) {
            $ss = $_SESSION['email'];
            $result1 = mysqli_query($con, "SELECT * FROM `payment1` where user_id='" . $ss . "'");
            $datesArray = array();
            $rowsArray = array();

            while ($row = mysqli_fetch_array($result1)) {
                $sum = $row['price'] * $row['quantity'];
                $current_date = $row['order_date'];

                if (!in_array($current_date, $datesArray)) {
                    $datesArray[] = $current_date;
                    $rowsArray[$current_date] = array();
                }

                $rowsArray[$current_date][] = $row;
            }

            foreach ($datesArray as $date) {
                ?>
                <tr>
                    <td style="color:#9d8189;font-family:serif;" scope="col" class="clickable"><?php echo $date; ?></td>
                </tr>
                <?php
                foreach ($rowsArray[$date] as $row) {
                    $sum = $row['price'] * $row['quantity'];
                    ?>
<tr class="additional-row">
    <td></td>
    <td style="color:#9d8189;font-family:serif;"  class="additional-column"><?php echo $row['user_id']; ?></td>
    <td style="color:#9d8189;font-family:serif;" class="additional-column"><img width="56px" src="<?php echo isset($row['image']) ? $row['image'] : ''; ?>" name="image"></td>
    <td style="color:#9d8189;font-family:serif;" class="additional-column"><?php echo isset($row['name']) ? $row['name'] : ''; ?></td>
    <td style="color:#9d8189;font-family:serif;" class="additional-column"><?php echo isset($row['quantity']) ? $row['quantity'] : ''; ?></td>
    <td style="color:#9d8189;font-family:serif;" class="additional-column"><?php echo $sum . "$"; ?></td>

<td style="color:#9d8189;font-family:serif;" class="additional-column">
    <form action="" method="post">
        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
        <?php
        if (isset($_POST['confirm_order']) && $_POST['order_id'] == $row['id']) {
            if ($row['isblocked'] == 1) {
                echo '<button type="button" disabled>Approved</button>';
            } else {
                // Update 'isblocked' status in the database to 1 (Approved)
                $order_id = $_POST['order_id'];
                $update_query = "UPDATE payment1 SET isblocked = 1 WHERE id = $order_id";
                mysqli_query($con, $update_query);

                echo '<button type="button" disabled>Approved</button>';
            }
        } else {
            if ($row['isblocked'] == 1) {
                echo '<button type="button" disabled>Approved</button>';
            } else {
                echo '<button type="submit" name="confirm_order">Confirm Order</button>';
            }
        }
        ?>
    </form>
          </td>
                </tr>
                    <?php     
    }
            }
        }
        ?>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Hide all additional rows initially
        $(".additional-row").hide();

        // Register click event on the "Date" column header
        $(".clickable").click(function() {
            // Hide all additional rows
            $(".additional-row").hide();

            // Show the additional rows related to the clicked date
            $(this).closest("tr").nextUntil("tr:not(.additional-row)").toggle();
        });
    });
</script>

