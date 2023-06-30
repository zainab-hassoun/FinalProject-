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
    </section>
    </body>
</html>
   
   