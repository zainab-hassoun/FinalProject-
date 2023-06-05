<?php  
session_start();
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
if (!$con) {
    die(mysqli_error($con));
}
?>
<html>
<head>
<meta charset="utf-8">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/userhome.css"/>
<meta charset="utf-8" />
<title></title>
<style>
body {		
    background-image:url('image/img22.jpg');
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size:cover;
}


.card-body {
    padding: 20px;
  
}

.card-title {
    font-size: 18px;
    
    font-weight: bold;
    margin-bottom: 10px;
}

.card-subtitle {
    font-size: 14px;
    color: #999;
    margin-bottom: 10px;
}

.card-text {
    margin-bottom: 10px;
}

.btn-primary, .btn-danger {
    border-radius: 20px;
    font-size: 14px;
    text-decoration: none;
    color: #fff;
}

.btn-primary {
    background-color: #007bff;
}

.btn-danger {
    background-color: #dc3545;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
}


.card-text{
    font-family: "Roboto", sans-serif;
}
</style>
</head>
<body>  	
    <section>
        <ul>
            <li><a href="homeuser.php"><img src="image/img231.jpg" width="120px" /></a></li>
            <li style="padding:10px; "><a style="color:#9d8189;font-family:serif;" href="homeuser.php">Home</a></li>
            <li style="padding:10px;"><a style="color:#9d8189; font-family: serif;"  href="statususer.php">Status <i class="bi bi-clock-history"></i></a></li> 
            <li style="padding:15px;" class="icon"><a  style="color:#9d8189;font-family:serif;" href="login.php" > <i class="fa-sharp fa-solid fa-right-from-bracket" style="width:40px"></i></a></li>
        </ul>
    </section> 
    
    <div class="container">
        <a href="addmangers.php" class="text-align"><button class="btn1"><i class="bi bi-add">Add Manager</button></a>
       <a href="manger.php" class="text-align"> <button class="btn1"><i class="bi bi-add">GO BACK</button></a>

        <div class="row">
            <?php
            $sql = "SELECT * FROM `manger`";
            $result = mysqli_query($con, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $password = $row['Password'];

                    echo '
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Id: ' . $id . '</h5>
                                <br/>
                                <h6 class="card-subtitle mb-2 text-muted">Name: ' . $name . '</h6>
                                <p class="card-text">Email: ' . $email . '</p>
                                <p class="card-text">Phone: ' . $phone . '</p>
                                <p class="card-text">Password: ' . $password . '</p>
                                <button class="btn btn-primary"><a href="Updatemanger.php?updateid=' . $id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="removemangers.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
