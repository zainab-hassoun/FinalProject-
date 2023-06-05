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

</style>
    <body >
      	<meta charset="utf-8">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<body>
	 <section>
   <ul>
  <li><a href="homeuser.php"><img src="image/img231.jpg" width="120px"   /></a></li>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>

</ul>
</section> 

<div class="container">
<a href="manger.php" class="text-align"><button class="btn1">
               GO BACK</button></a>
   <table class="table">
    <tr>
      <th scope="col">username</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
    <?php

    $con=mysqli_connect("localhost","root","1234","loginproject");
    $sum=0;
    $result1 = mysqli_query($con,"SELECT * FROM `payment1`"); 
        while($row = mysqli_fetch_array($result1)){
          $sum=$row['price']*$row['quantity'];
          echo "<tr>";
          echo "<td>".$row['user_id']."</td>";
          echo "<td> <img width='56px' src='".$row['image']."' name='image'></td>";
          echo "<td>".$row['name']."</td>";
          echo "<td> ".$row['quantity']."</td>";
          echo "<td>". $sum ."</td>"; 
        echo "</tr>";
  
      }
    ?>  
    </table>
    </center>
  </div>
    </body>
</html>
   
   