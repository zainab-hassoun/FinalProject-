<?php  
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        } 
        ?>
        
<?php 
 session_start();
 if (isset($_POST['logout'])) {
    // מחיקת הפרטים הרלוונטיים מהסשן
    unset($_SESSION['username']);
    // ניתוב או הצגת הודעת התנתקות למשתמש
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/userhome.css"/>
<meta charset="utf-8" />
<title></title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<style>
     body{		
        background-image:url('image/ing1.jpg');
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
</style>
</style>
</head>
<body >
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
        $con = mysqli_connect( "localhost", "root", "1234", "loginproject");

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
<img src="https://bnsec.bluenile.com/bluenile/is/image/bluenile/2023Q1-JSP-hero-desktop?$alloy_default$&wid=1944&hei=986&crop=1113,724,2965,1504&fmt=webp" width="1260" height="400" />
    <style>
        .flex-container {
            display: flex;
            justify-content: space-around;
        }

            .flex-container > div {
                width: 400px;
                margin: 40px;
                text-align: center;
                line-height: 75px;
                font-size: 30px;
            }
        .container {
            position: relative;
            width: 100%;
            max-width: 260px;
            height: 300px;
        }

        .image {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            transition: .5s ease;
            opacity: 0;
            color: chartreuse;
            font-size: 30px;
            padding: 20px;
            text-align: center;
        }

        .container:hover .overlay {
            opacity: 1;
        }
        

        .design-content {
            margin: 2rem 0;
        }

        .design-item {
            cursor: pointer;
            margin: 1.5rem 0;
        }

        .design-img {
            position: relative;
            overflow: hidden;
        }

            .design-img::after {
                position: absolute;
                content: "";
                top: 0;
                left: 0;
                width: 135px;
                height: 260px;
                background: rgba(0,0,0,0.3);
            }

            .design-img img {
                transition: all 0.5s ease;
            }
          
        .design-img span:first-of-type {
            position: absolute; 
            z-index: 1;
            top: 90px;
            left: 1px;
            background: var(--exdark);
            color: #fff;
            padding: 0.2rem 1rem;
        }

       
    </style>
    
    <div class="flex-container">
        <div class="container">
        <div class="design-item">
                <div class="design-img">
                <div><a href="ring.php"><img src="https://cdn.shopify.com/s/files/1/1233/9260/files/Two_Tones_Collection_mobile_2.jpg?v=1666281114" width="260" height="260" /></a></div>
                <span>Ring</span>
            </a>
    </div>
    </div>
        </div>
        <div class="container">
        <div class="design-item">
                <div class="design-img">
                <div><a href="Necklace.php"><img src="https://www.dhresource.com/0x0/f2/albu/g20/M00/6A/05/rBVaqWDez9-Aata4AADOo3W3RyU758.jpg" width="260" height="260" /></div>
                <span>Necklace</span>
                </div>
        </div>
        </div>
        <div class="container">
        <div class="design-item">
                <div class="design-img">
                <div><a href="Earing.php"><img src="https://i.etsystatic.com/27043619/r/il/e2d1cc/2788815866/il_570xN.2788815866_hzy7.jpg" width="260" height="260" /></div>
                <span>Earing</span>
        </div>
        </div>
        </div>
        </div>
    <div class="flex-container">
        <div class="container">
        <div class="design-item">
                <div class="design-img">
                <div><a href="Barcelet.php"><img src="image/img4.webp" width="260" height="260" /></div>
                <span>Barcelet</span>
                </div>
                </div>
        </div>
        <div class="container">
        <div class="design-item">
                <div class="design-img">
                <div><a href="Anklet.php"><img src="https://images.squarespace-cdn.com/content/v1/5f0c6fb0f60d7c53370c8767/1598971613845-ESCS4Z3OOJSB1GHPLFBC/Screenshot+2020-09-01+at+15.46.14.png?format=1500w" width="260" height="260" /></div>
                <span>Anklet</span>
        </div>
        </div>
        </div>
        <div class="container">
        <div class="design-item">
                <div class="design-img">
                <div><a href="madehand.php"><img src="https://cdn.shopify.com/s/files/1/0525/9857/1167/articles/Is-Handmade-Jewelry-Better_1024x1024.jpg?v=1623200205" width="260" height="260" /></div>
                <span>Hand <br>Made </span>
        </div>
        </div>
    </div>
    
    </div>
</div>
<div class="flex-container">
        <div class="container">
        <div class="design-item">
                <div class="design-img">
                <div><a href="party.php"><img src="https://i.ebayimg.com/images/g/2jsAAOSwupNkB~Pb/s-l500.jpg" width="260" height="260" /></div>
                <span>Party</span>
                </div>
                </div>
        </div>
        <div class="container">
        <div class="design-item">
                <div class="design-img">
                <div><a href="discount.php"><img src="https://img.freepik.com/premium-photo/part-large-display-with-various-jewelry-items-discount-sign_274679-31301.jpg?w=2000" width="260" height="260" /></div>
                
        </div>
        </div>
        </div>

</body>
</html>