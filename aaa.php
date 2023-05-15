
<?php
session_start();
 $con=mysqli_connect("localhost","root","1234","loginproject");
 $user=$_SESSION['email']; 
 if(isset($_POST['remove'])){
 $user=$_SESSION['email']; 
 $result = mysqli_query($con,"DELETE FROM addtocart WHERE user_id='$user'");
 if($result){
     echo "All items have been deleted from the cart.";
 }else{
     echo "Error deleting items from cart";
 }
}
?><?php

$ss = $_SESSION['email'];
 $id = $_GET['id'];
$sumprice = 0;
$total = 0;
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
$result = mysqli_query($con, "select * From necklace ");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $mainImages = array();
        $result = mysqli_query($con, "SELECT image FROM tblproduct WHERE id='$id'");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $mainImages[] = $row['image'];
            }
        }
?>
<div class="row">
    <div class="col-sm-6">
        <div class="card-body">
            <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card-body">
            <h3 class="card-title" style="color:#9d8189;font-family: serif;">Type:<?php echo $row['name_p']; ?></h3><br>
            <p class="card-text"><h3 style="color:#9d8189;font-family: serif;"> Price: <?php echo $row['price']; ?>$</h6></p><br>
            <div id="thumbnailContainer">
                <?php
                $id = $_GET['id'];
                $con = mysqli_connect("localhost", "root", "1234", "loginproject");
                $sql = "SELECT * FROM `necklace` WHERE id = $id";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['type'] == '1') {
                        $sql2 = "SELECT * FROM `necklace` WHERE type = '1'  AND id != $id";
                        $result2 = mysqli_query($con, $sql2);
                        $products = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                        function randomImage($images)
                        {
                            $n1 = rand(0, count($images) - 1);
                            $n2 = ($n1 + 1) % count($images);
                            $n3 = ($n2 + 1) % count($images);
                            return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                        }

                        $_SESSION['randimages'] = randomImage($products);
                        $imageUrls = $_SESSION['randimages'];
                        foreach ($imageUrls as $imageUrl) {
                            echo "<img src='$imageUrl' alt='Product Image' width='140px' class='thumbnail-img' onclick='updateMainImage(this)'>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    function updateMainImage(image) {
        var mainImageElement = document.getElementById('mainImage');
        mainImageElement.src = image.src;
    }
</script>

<?php
    }
}
?>
