<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(!$con){
          
            die(mysqli_error($con));
        }  
        ?>
<?php
if(isset($_POST['submit'])){
$name=$_POST['nameM'];
$id=$_POST['idM'];
$email=$_POST['emailM'];
$phone=$_POST['phoneM'];
$pass=$_POST['passM'];
$sql="INSERT INTO `manger` VALUES ('$email','$pass','$id','$phone','$name')";
$result=mysqli_query($con,$sql);
if($result){
  header('location:mangersshows.php');
}
else{
  die(mysqli_error($con));
}
}
?>
<html>
<style>
  
  body {
    font: normal 18px/1.5 "Fira Sans", "Helvetica Neue", sans-serif;
    background-image:url('https://tzofit-jewelry.com/wp-content/uploads/2022/02/IMG_72944-400x400.jpg') ;
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
</style>
<body>

<h1 align="center" >Please enter the details of the manager you want to add</h1>
<div class="container">
  <form action="" method="post">
    <ul class="flex-outer">
      <li>
        <label for="first-name">Name</label>
        <input type="text"  name="nameM" placeholder="Your name.." autocmopleta="off">
      </li>
      <li>
        <label for="last-name">Id</label>
        <input type="number"  name="idM" placeholder="Your Id Number.." autocmopleta="off">
      </li>
      <li>
        <label for="email">Email</label>
        <input type="text"  name="emailM" placeholder="Your Email address.." autocmopleta="off">
      </li>
      <li>
        <label for="phone">Phone</label>
        <input type="number"  name="phoneM" placeholder="Your Phone Number.." autocmopleta="off">
      </li>
      <li>
        <label for="phone">Password</label>
        <input type="password"  name="passM" placeholder="Your password.." autocmopleta="off">
      </li>
      <li>
      <input type="submit" name="submit" value="ADD New jewerly" >
      </li>
      
      <button ><a href="manger.php" style="color:#9d8189">Log Out</a></button>
    </ul>
  </form>
</div>
  
</body>
</html>