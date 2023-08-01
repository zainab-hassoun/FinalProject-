<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "1234", "loginproject");

    function formatDate($dateString, $format = 'd-m-Y')
    {
        $dateTime = DateTime::createFromFormat('Y-m-d', $dateString);
        if ($dateTime === false) {
            $dateTime = DateTime::createFromFormat('d-m-Y', $dateString);
            if ($dateTime === false || !checkdate($dateTime->format('m'), $dateTime->format('d'), $dateTime->format('Y'))) {
                // Error in parsing date or invalid date, fallback to original string
                return $dateString;
            }
        }
        return $dateTime->format($format);
    }
    

    $user = $_SESSION['email']; 
    $query = "SELECT * FROM addtocart WHERE user_id='$user'"; 
    $result = mysqli_query($con, $query);  

    while ($row = mysqli_fetch_array($result)) {
        $Cid = $row['id'];
        $Cname = $row['name'];
        $Cimg = $row['image'];
        $Cqua = $row['quantity'];
        $Cprice = $row['price'];
        $CorderDate =formatDate(date('Y-m-d H:i:s'));  // Store current date and time in 'Y-m-d H:i:s' format

        $result1 = mysqli_query($con, "INSERT INTO `payment1` VALUES('$Cid','$Cname','$Cimg','$Cqua','$Cprice','$user','$CorderDate',0)");
        header('location:payment.php');
    }
?>
