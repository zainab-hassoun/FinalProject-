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
</head>
<body>  
<section>	 
    <div class="container">
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
    <section>
</body>
</html>
