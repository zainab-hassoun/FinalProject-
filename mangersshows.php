<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        }  
        ?>
<html>
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
  <li style="padding:15px;" class="icon"><a style="color:#9d8189;font-family:serif;"  href="cart.php" ><i class="fa-solid fa-cart-shopping"></i></a></li> 
</ul>
</section> 
    
        <div class="container">
            <button class="btn btn-danger my-5"><a href="addmangers.php" class="text-align">
                Add Manger</a></button>
                <button class="btn btn-danger my-5"><a href="manger.php" class="text-align">
               GO BACK</a></button>
                <table class="table">
             <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">email</th>
      <th scope="col">name</th>
      <th scope="col">phone</th>
      <th scope="col">password</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql="SELECT * FROM `manger`";
  $result=mysqli_query($con,$sql);
  if($result)
  {
while($row=mysqli_fetch_assoc($result)){
 $id=$row['id'];
 $name=$row['name'];
 $email=$row['email'];
 $phone=$row['phone'];
 $password=$row['Password'];
 echo'
 <tr>
 <th scope="row">'.$id.'</th>
 <td>'.$email.'</td>
 <td>'.$name.'</td>
 <td>'.$phone.'</td>
 <td>'.$password.'</td>
 <td>
  <button class="btn btn-primary"><a href="Updatemanger.php?
  updateid='.$id.'" class="text-light"> Update</a></button>
  <button class="btn btn-danger"><a href="removemangers.php?
  deleteid='.$id.'" class="text-light" >Delete</a></button>
</td>
</tr>
 ';
}
  }  
  ?>
 
   </tbody>
</table>
            

        </div>
    </body>
</html>
