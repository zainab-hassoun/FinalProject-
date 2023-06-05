<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        }  
        ?>
<?php
$id=$_GET['updateidm'];
$sql="SELECT * FROM `tblproduct` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name_p'];
$id=$row['id'];
$price=$row['price'];
$image=$row['image'];
$amount=$row['amount'];

if(isset($_POST['submit'])){
  $name=$_POST['type'];
  $id=$_POST['jewNum'];
  $price=$_POST['price'];
  $image=$_POST['image'];
  $amount=$_POST['amount'];
$sql="update `tblproduct` set id='$id',name_p='$name',image='$image',price='$price',amount='$amount' 
where id=$id";
$result=mysqli_query($con,$sql);
if($result){

  header('location:productmanger.php');

}
else{
  die(mysqli_error($con));
}
}
?>
<style>
  
  body {
    font: normal 18px/1.5 "Fira Sans", "Helvetica Neue", sans-serif;
     background-image:url('image/img22.jpg');
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
/* .flex-outer  button {
    margin-left: auto;
    padding: 8px 16px;
    border: none;
    background-color: #f0f8ff;
    color:#9d8189;
    text-transform: uppercase;
    letter-spacing: .09em;
    border-radius: 2px;
  } */
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
border-radius: 20%;
color:#9d8189;
transition: all 200ms;
}

  
  .container {
    width: 80%;
    max-width: 1200px;
    margin: 0 auto;
  }
  
  .container * {
    box-sizing: border-box;
  }
  
  .flex-outer,
  .flex-inner {
    list-style-type: none;
    padding: 0;
  }
  
  .flex-outer {
    max-width: 800px;
    margin: 0 auto;
  }
  
  .flex-outer li,
  .flex-inner {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }
  
  .flex-inner {
    padding: 0 8px;
    justify-content: space-between;  
  }
  
  .flex-outer > li:not(:last-child) {
    margin-bottom: 20px;
  }
  
  .flex-outer li label,
  .flex-outer li p {
    padding: 8px;
    color:#9d8189;
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    letter-spacing: .09em;
    text-transform: uppercase;
  }
  
  .flex-outer > li > label,
  .flex-outer li p {
    flex: 1 0 120px;
    max-width: 220px;
  }
  
  .flex-outer > li > label + *,
  .flex-inner {
    flex: 1 0 220px;
  }
  
  .flex-outer li p {
    margin: 0;
  }
  
  .flex-outer li input:not([type='checkbox']),
  .flex-outer li textarea {
    padding: 10px;
    border: none;
  }

  
  .flex-inner li {
    width: 100px;
  }
  h1{
    color:#9d8189;
  }
</style>
<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html>
  
<body>
  <h1 align="center" >Update jewerly</h1>
</br>
<div class="container">
  <form action="" method="POST">
    <ul class="flex-outer">
      <li>
        <label for="first-name">Type jewerly</label>
        <input type="text"  name="type" placeholder="Enter The type" autocmopleta="off" value=<?php echo $name;?>>
      </li>
      <li>
        <label for="phone">Number jewerly</label>
        <input type="number"  name="jewNum" placeholder="Enter Number the jewerly" autocmopleta="off" value=<?php echo $id;?> >
      </li>
      <li>
        <label for="phone"> Price</label>
        <input type="number"  name="price" placeholder=" price" autocmopleta="off" value=<?php echo $price;?>>
      </li>
      <li>
        <label for="image">image</label>
        <input name="image" placeholder=" image" autocmopleta="off"value=<?php echo $image;?> >
      </li>
      <li>
        <label for="amount">Amount</label>
        <input  type="number" name="amount" placeholder="amount" autocmopleta="off" value=<?php echo $amount;?>>
      </li>
      <li>
        
      <button class="btn btn-primary" class="text-light" style="margin:10px "  type="submit" name="submit" value="Update"> Update</a></button>
    
      <button  class="btn btn-danger"><a href="manger.php" style="margin:5px " class="text-light">Log Out</a></button> </li>
    </ul>
  </form>
</div>



</body>
</html>