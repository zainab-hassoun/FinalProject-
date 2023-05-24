<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        }  
        ?>
<?php
if(isset($_POST['submit'])){
$name=$_POST['type'];
$id=$_POST['jewNum'];
$price=$_POST['price'];
$image=$_POST['image'];
$amount=$_POST['quantity'];
$sql="INSERT INTO `tblproduct` VALUES ('$id','$name','$image','$price','$amount')";
$result=mysqli_query($con,$sql);
if($result){
  header('location:jewelrystors.php');
}
else{
  die(mysqli_error($con));
}
}
?>
<html>
  
<link rel="stylesheet" href="css/addmanger.css">
<style>
  body {
    font: normal 18px/1.5 "Fira Sans", "Helvetica Neue", sans-serif;
    background-image:url('https://tzofit-jewelry.com/wp-content/uploads/2022/05/5E37F7C4-B7E4-4C40-BAF4-74459C36E8FE-400x400.jpg') ;
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size:cover;
    padding: 50px 0;
    color:#9d8189;
  }
  input[type=submit] {
  width: 20%;
  background-color: #f0f8ff;
  color:#9d8189;
  padding: 10px 14px ;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.flex-outer  button {
    margin-left: auto;
    padding: 8px 16px;
    border: none;
    background-color: #f0f8ff;
    color:#9d8189;
    text-transform: uppercase;
    letter-spacing: .09em;
    border-radius: 2px;
  }
</style>
<body>
  <h1 align="center" >Please enter the details of the jewelry you want to add</h1>
<div class="container">
  <form action="" method="POST">
    <ul class="flex-outer">
      <li>
        <label for="first-name">Type Jewelry</label>
        <input type="text"  name="type" placeholder="Enter The type" autocmopleta="off">
      </li>
      <li>
        <label for="phone">Number Jewelry</label>
        <input type="number"  name="jewNum" placeholder="Enter Number the jewelry" autocmopleta="off">
      </li>
      <li>
        <label for="phone"> Price</label>
        <input type="number"  name="price" placeholder=" price" autocmopleta="off">
      </li>
      <li>
        <label for="image">image</label>
        <input name="image" placeholder=" image" autocmopleta="off">
      </li>
      <li>
        <label for="qunatity">quantity</label>
        <input name="quantity" placeholder="quantity" autocmopleta="off">
      </li>
      <li>
      <input type="submit" name="submit" value="ADD New Jewelry" >
      </li>
      
      <button ><a href="manger.php" style="color:#9d8189">Log Out</a></button>
    </ul>
  </form>
</div>

</div>

</body>
</html>