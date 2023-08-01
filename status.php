<html>
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
        padding: 5px;
        border-radius: 25%;
        margin-left: 640px;
    } 
    .btn1{
    width: 15%;
    border-radius: 20px;
  background-color: #f5ebe0;
    color:#9d8189;
  padding: 10px 14px ;
  margin: 20px 0;
  border: none;
  border-radius: 4px;
    }
    tr{
      padding:15px;
      margin:5px;
    }
    .btn1{
    width: 15%;
    border-radius: 20px;
 
  background-color: #f5ebe0;
    color:#9d8189;
  padding: 10px 14px ;
  margin: 20px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
section{
  margin:20px;
}
</style>
    <body >
      	<meta charset="utf-8">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<body>
<section>
        <div class="container">
            <table class="table">
            <tr>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="clickable">username</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Date</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Image</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Name</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Quantity</th>
            <th style="color:#9d8189;font-family:serif;" scope="col" class="additional-column">Price</th>
        </tr>
        <?php
        
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
$sum = 0;
$usersArray = array();
$datesArray = array(); // Initialize the datesArray
$rowsArray = array();
$result1 = mysqli_query($con, "SELECT * FROM `payment1`");
   
while ($row = mysqli_fetch_array($result1)) {
    $current_user = $row['user_id'];

    if (!in_array($current_user, $usersArray)) {
        $usersArray[] = $current_user;
        $rowsArray[$current_user] = array();
    }

    $rowsArray[$current_user][] = $row;

    $current_date = $row['order_date'];
    if (!in_array($current_date, $datesArray)) {
        $datesArray[] = $current_date;
    }
}

foreach ($usersArray as $user) {
 
    ?>
    <tr class="user-row" data-user-id="<?php echo $user; ?>">
        <td style="color:#9d8189;font-family:serif;" scope="col" class="clickable"><?php echo $user ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php
   
    foreach ($rowsArray[$user] as $row) {
        $sum = $row['price'] * $row['quantity'];
        if ($row['isblocked'] == 1) {
        ?>
        <tr class="additional-row" data-user-id="<?php echo $user; ?>">
            <td></td>
            <?php
            if (in_array($row['order_date'], $datesArray)) {
                $key = array_search($row['order_date'], $datesArray);
                unset($datesArray[$key]);
                ?>
                <td style="color:#9d8189;font-family:serif;" class="clickable" data-date="<?php echo $row['order_date']; ?>"><?php echo $row['order_date']; ?></td>
            <?php } else { ?>
                <td></td>
            <?php } ?>
            <td style="color:#9d8189;font-family:serif;" class="additional-column"><img width="56px" src="<?php echo isset($row['image']) ? $row['image'] : ''; ?>" name="image"></td>
            <td style="color:#9d8189;font-family:serif;" class="additional-column"><?php echo isset($row['name']) ? $row['name'] : ''; ?></td>
            <td style="color:#9d8189;font-family:serif;" class="additional-column"><?php echo isset($row['quantity']) ? $row['quantity'] : ''; ?></td>
            <td style="color:#9d8189;font-family:serif;" class="additional-column"><?php echo $sum . "$"; ?></td> 
        </tr>
    <?php
    }
}
}
?>

  </table>
</div>
</section>

    <!-- JavaScript to handle the click event and show order details -->
   <!-- ... Your HTML and CSS code ... -->

<!-- JavaScript to handle the click event and show order details -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ... Your previous JavaScript code ... -->

<script>
    $(document).ready(function() {
        // Hide all additional rows initially
        $(".additional-row").hide();
        $(".additional-row1").hide();

        // Register click event on the "username" column
        $(".clickable").click(function() {
            // Get the username from the clicked row
            const username = $(this).text();

            // Show the additional rows related to the clicked username
            $(".additional-row[data-user-id='" + username + "']").toggle();
        });

        // Register click event on the "Date" column header
        $(".clickable1").click(function() {
            // Hide all additional rows
            $(".additional-row1").hide();

            // Show the additional rows related to the clicked date
            $(this).closest("tr").nextUntil("tr:not(.additional-row)").toggle();
        });
    });
</script>








</body>
</html>

   
   