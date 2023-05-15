<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        }  
        ?>
<html>
<style>
        
section{
margin: 50px;
}

button{

border:none;
display: inline-block;
border-width: 0;
box-shadow: rgba(25, 25, 25, 0.04) 0 0 1px 0, rgba(0, 0, 0, 0.1) 0 3px 7px 0;
cursor: pointer;
font-family: Arial, sans-serif;
font-size: 1em;
height: 50px;
padding: 0 25px;
border-radius: 50%;
transition: all 200ms;
}

ul {
list-style-type: none;
overflow: hidden;

}
li {
float: left;
}
.icon{
   
float: right;
}
li a {
display: block;
text-align: center;
text-decoration: none;
}
section{
margin: 10px;
}
h1 {
    color:#f1f1f1;
    text-shadow: 1px 1px 2px white, 0 0 25px blue, 0 0 5px darkblue;
    font-size: 50px;
}
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
                height: 300px;
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
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body style="background-color:#fff" >
<section>
<ul>
  <li><a href="homeuser.php"><img src="image/img231.jpg" width="120px"/></a></li>
  <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
  <li style="padding:10px;"><a style="color:#9d8189;font-family: serif;" href="contact.php">Contact</a></li> 
  <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
  <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="heart.php" ><i class="fa-regular fa-heart"></i></a></li> 
  <li style="padding:15px;" class="icon"><a style="color:#9d8189;font-family:serif;"  href="cart.php" ><i class="fa-solid fa-cart-shopping"></i></a></li> 
</ul>
   
</section> 

</ul>
<div class="row itemsBlock"  >
 <?php
 $sql="SELECT * FROM `tblproduct`";
 $result=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result)){
 $id=$row['id'];
 $name=$row['name_p'];
$img=$row['image'];
 $price=$row['price'];
 $amount=$row['amount'];
 echo'
 <div class="col-3 col-3 col-3 col-3 ">
 <div class="card-body">
      <img class="card-img-top" src="'.$img.' ">
    
      <h3 class="card-title" align="center">'.$name.'</h3>
          <p class="card-text" >Price: '.$price.'$</p>
          <p class="card-text" > Quantity: '.$amount.'</p>
         
        </div>
  <button class="btn btn-primary"><a href="Updatejewelry.php?
  updateidm='.$id.'" class="text-light"> Update</a></button>
  <button class="btn btn-danger"><a href="removejewelry.php?
  deleteidm='.$id.'" class="text-light" >Delete</a></button><?br>
  
     </div>';
}?>
 <?php
 $sql="SELECT * FROM `barcelet`";
 $result=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result)){
 $id=$row['id'];
 $name=$row['name_p'];
$img=$row['image'];
 $price=$row['price'];
 $amount=$row['amount'];
 echo'
 <div class="col-3 col-3 col-3 col-3 ">
 <div class="card-body">
      <img class="card-img-top" src="'.$img.' ">
    
      <h3 class="card-title" align="center">'.$name.'</h3>
          <p class="card-text" >Price: '.$price.'$</p>
          <p class="card-text" > Quantity: '.$amount.'</p>
         
        </div>
  <button class="btn btn-primary"><a href="Updatejewelrybarcelet.php?
  updateidm='.$id.'" class="text-light"> Update</a></button>
  <button class="btn btn-danger"><a href="removejewelrybarcelet.php?
  deleteidm='.$id.'" class="text-light" >Delete</a></button><?br>
  
     </div>';
}?>


<?php
 $sql="SELECT * FROM `earing`";
 $result=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result)){
 $id=$row['id'];
 $name=$row['name_p'];
$img=$row['image'];
 $price=$row['price'];
 $amount=$row['amount'];
 echo'
 <div class="col-3 col-3 col-3 col-3 ">
 <div class="card-body">
      <img class="card-img-top" src="'.$img.' ">
    
      <h3 class="card-title" align="center">'.$name.'</h3>
          <p class="card-text" >Price: '.$price.'$</p>
          <p class="card-text" > Quantity: '.$amount.'</p>
         
        </div>
  <button class="btn btn-primary"><a href="Updatejewelryearing.php?
  updateidm='.$id.'" class="text-light"> Update</a></button>
  <button class="btn btn-danger"><a href="removejewelryearing.php?
  deleteidm='.$id.'" class="text-light" >Delete</a></button><?br>
  
     </div>';
}?>

<?php
 $sql="SELECT * FROM `necklace`";
 $result=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result)){
 $id=$row['id'];
 $name=$row['name_p'];
$img=$row['image'];
 $price=$row['price'];
 $amount=$row['amount'];
 echo'
 <div class="col-3 col-3 col-3 col-3 ">
 <div class="card-body">
      <img class="card-img-top" src="'.$img.' ">
    
      <h3 class="card-title" align="center">'.$name.'</h3>
          <p class="card-text" >Price: '.$price.'$</p>
          <p class="card-text" > Quantity: '.$amount.'</p>
         
        </div>
  <button class="btn btn-primary"><a href="Updatejewelrynecklace.php?
  updateidm='.$id.'" class="text-light"> Update</a></button>
  <button class="btn btn-danger"><a href="removejewelrynecklace.php?
  deleteidm='.$id.'" class="text-light" >Delete</a></button><?br>
  
     </div>';
}?>
<?php
 $sql="SELECT * FROM `anklet`";
 $result=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result)){
 $id=$row['id'];
 $name=$row['name_p'];
$img=$row['image'];
 $price=$row['price'];
 $amount=$row['amount'];
 echo'
 <div class="col-3 col-3 col-3 col-3 ">
 <div class="card-body">
      <img class="card-img-top" src="'.$img.' ">
    
      <h3 class="card-title" align="center">'.$name.'</h3>
          <p class="card-text" >Price: '.$price.'$</p>
          <p class="card-text" > Quantity: '.$amount.'</p>
         
        </div>
  <button class="btn btn-primary"><a href="Updatejewelryanklet.php?
  updateidm='.$id.'" class="text-light"> Update</a></button>
  <button class="btn btn-danger"><a href="removejewelryanklet.php?
  deleteidm='.$id.'" class="text-light" >Delete</a></button><?br>
  
     </div>';
}?>

</div>
        
</section>
        </body>
</html>
<!-- echo "# finalproject" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/zainab-hassoun/finalproject.git
git push -u origin main -->