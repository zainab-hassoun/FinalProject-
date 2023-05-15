
        <?php  
        session_start();
        $con=mysqli_connect("localhost","root","1234","loginproject");
        if(isset($_GET['deleteidm'])){
          $id=$_GET['deleteidm'];
         $sql="delete from `tblproduct` where id=$id";
         $result = mysqli_query($con,$sql);
         if($result){
          //echo "deleted successfull";
          header('location:jewelrystors.php');
          header('location:productmanger.php');
        }else{
          die(mysqli_error($con));
        }

        }
        ?>