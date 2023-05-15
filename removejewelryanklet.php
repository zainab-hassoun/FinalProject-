<?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(isset($_GET['deleteid'])){
          $id=$_GET['deleteid'];
         $sql="delete from `manger` where id=$id";
         $result = mysqli_query($con,$sql);
         if($result){
          //echo "deleted successfull";
         header('location:mangersshows.php');
        }else{
          die(mysqli_error($con));
        }

        }
        ?>