<link rel="stylesheet" href="css/manger.css">
<style>
	body {
background: linear-gradient(#f5ebe0) ;		
background-image:url('https://tzofit-jewelry.com/wp-content/uploads/2022/07/IMG_0128_950x950.jpg');
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size:cover;

}

input[type=submit] {
  width: 30%;
  background-color: #f0f8ff;
  color:#9d8189;
  padding: 10px 14px ;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #d7ecff;
}
h1{
	
	color:#9d8189;
	font-family: Arial, sans-serif;
}
button{
    background:#f0f8ff;
border:none;
border-radius: 30px;
  border: 2px solid ;
  padding: 20px;
  width: 140px;
  height: 60px;
display: inline-block;
border-width: 0;
box-shadow: rgba(25, 25, 25, 0.04) 0 0 1px 0, rgba(0, 0, 0, 0.1) 0 5px 10px 0;
cursor: pointer;
font-family: Arial, sans-serif;
font-size: 1em;
height: 50px;
padding: 0 25px;
color:#9d8189;
transition: all 200ms;

}

</style>
<body>
<br>
  <center>
		<h1 align="center">Welcome To My Jewelrys</h1>
<div >
<form action="addjewelry.php">
	<input type="submit" value="If you wan't to add  jewerlys  click here">
 </form>
</div>
<div>
<form action="productmanger.php">
	<input type="submit" value="If you wan't to remove jewerlys And Update click here">
 </form>
</div>
<div>
<form action="addmangers.php">
	<input type="submit" value="If you wan't add mangers click here">
 </form>
</div>
<div>
<form action="status.php">
	<input type="submit" value="If you wan't status click here">
 </form>
 </div>
<div>
 <form action="usershows.php">
	<input type="submit" value="If you wan't users click here">
 </form>
 </div>
 <div>
 <form action="mangersshows.php">
	<input type="submit" value="If you wan't mangers click here">
 </form>
</div>
</center>
<button><a href="login.php" style="color:#9d8189">Log Out</a></button>
<br>
</body>
</html>

	</body>
</html>