<?php
session_start(); // Add this line at the beginning of your code


$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;
$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM tblproduct WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <img src="<?php echo $row['image']; ?>" alt="" class="img">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card-body">
                    <h3 class="card-title" style="color:#9d8189;font-family: serif;">Type: <?php echo $row['name_p']; ?></h3><br>
                    <p class="card-text"><h3 style="color:#9d8189;font-family: serif;"> Price: <?php echo $row['price']; ?>$</h6></p><br>

                    <?php
                    $id = $_GET['id'];

                    $con = mysqli_connect("localhost", "root", "1234", "loginproject");
                    $sql1 = "SELECT * FROM `tblproduct` WHERE id = $id";
                    $result2 = mysqli_query($con, $sql1);

                    while ($row = mysqli_fetch_array($result2)) {
                        if ($row['type'] == '1') {
                            $sql2 = "SELECT * FROM `tblproduct` WHERE type = '1'  AND id != $id";
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

                            foreach ($imageUrls as $index => $imageUrl) {
                                echo "<a href='#' class='image-link' data-index='$index'><img src='$imageUrl' alt='Product Image' width='140px'></a>";
                            }
                        } elseif ($row['type'] == '2') {
                            $sql3 = "SELECT * FROM `tblproduct` WHERE type = '2'  AND id != $id";
                            $result3 = mysqli_query($con, $sql3);
                            $row3 = mysqli_fetch_array($result3);
                            $products1 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products1);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
                                echo "<a href='#' class='image-link' data-index='$index'><img src='$imageUrl' alt='Product Image' width='140px'></a>";
                            }
                        } elseif ($row['type'] == '3') {
                            $sql1 = "SELECT * FROM `tblproduct` WHERE type = '3'  AND id != $id";
                            $result1 = mysqli_query($con, $sql1);
                            $row1 = mysqli_fetch_array($result1);
                            $products4 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

                            function randomImage($images)
                            {
                                $n1 = rand(0, count($images) - 1);
                                $n2 = ($n1 + 1) % count($images);
                                $n3 = ($n2 + 1) % count($images);
                                return array($images[$n1]['image'], $images[$n2]['image'], $images[$n3]['image']);
                            }

                            $_SESSION['randimages'] = randomImage($products4);
                            $imageUrls = $_SESSION['randimages'];

                            foreach ($imageUrls as $index => $imageUrl) {
                                echo "<a href='#' class='image-link' data-index='$index'><img src='$imageUrl' alt='Product Image' width='140px'></a>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var clicked = false; // Track if the first image has been clicked

                $(".image-link").click(function(e) {
                    e.preventDefault(); // Prevent the default link behavior

                    if (!clicked) {
                        clicked = true;
                        return; // Ignore the first image click
                    }

                    var imageUrl = $(this).find("img").attr("src"); // Get the current image URL
                    var id = "<?php echo $id; ?>"; // Get the product ID

                    $.ajax({
                        url: "change_image.php",
                        type: "POST",
                        data: {
                            imageUrl: imageUrl,
                            id: id
                        },
                        success: function(response) {
                            // Handle the response from the server (if needed)
                            // Update the image source with the new image
                            $(".img").attr("src", response);
                        },
                        error: function(xhr, status, error) {
                            // Handle errors (if any)
                            console.log(xhr.responseText);
                        }
                    });
                });
            });
        </script>
<?php
    }
}
?>
</div>
