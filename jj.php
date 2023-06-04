<?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM tblproduct WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>

                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `tblproduct` WHERE type = '$type' AND id != '$id'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    foreach ($products as $index => $product) {
                        ?>
                        <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name']; ?>" data-id="<?php echo $product['id']; ?>" data-image="<?php echo $product['image']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card-body">
                <a href="cart.php" style="color:#f5ebe0;"><button type="button" name="addtocart">Back</a></button>
                <button type="button" id="addToCartButton">Add To Cart</button>
            </div>
        </div>
    </div>

    <script>
        const mainImage = document.getElementById('mainImage');
        const productPrice = document.getElementById('productPrice');
        const productID = document.getElementById('productid');
        let selectedProductId = '';
        let selectedProductImage = '';

        const imageLinks = document.querySelectorAll('.image-link');

        imageLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                const currentImageUrl = this.querySelector('img').getAttribute('src');
                mainImage.src = currentImageUrl;
                productPrice.textContent = this.dataset.price;
                productID.dataset.id = this.dataset.id;
                selectedProductId = this.dataset.id;
                selectedProductImage = this.dataset.image;
            });
        });

        const addToCartButton = document.getElementById('addToCartButton');

        addToCartButton.addEventListener('click', function (e) {
            e.preventDefault();

            if (selectedProductId) {
                addToCart(selectedProductId, selectedProductImage);
            } else {
                alert("Please select a product.");
            }
        });

        function addToCart(productId, imageUrl) {
            // Make an AJAX request to the server-side script to add the product to the cart
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "inserttocart.php?id=" + productId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Request successful, do something if needed
                    alert("Product added to cart!");

                    // Display the selected image in the cart (assuming there is an element with ID "cartImage")
                    document.getElementById('cartImage').src = imageUrl;
                }
            };
            xhr.send();
        }
    </script>
    <?php
}

mysqli_close($con);
?>
<!-- /////////////////////////////////////////////////////////ring -->
<?php
$id = $_GET['id'];
$ss = $_SESSION['email'];
$sumprice = 0;
$total = 0;

$con = mysqli_connect("localhost", "root", "1234", "loginproject");

$result = mysqli_query($con, "SELECT * FROM tblproduct WHERE id='$id'");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img src="<?php echo $row['image']; ?>" alt="" class="img" id="mainImage">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <h3 class="card-title" style="color:#9d8189;font-family: serif;">Name: <span id="productname"><?php echo $row['name']; ?></span></h3><br>
                <p class="card-text"><h3 style="color:#9d8189;font-family: serif;">Price: <span id="productPrice"><?php echo $row['price']; ?></span>$</h3></p><br>
                <p class="card-text" id="productid" data-id="<?php echo $row['id']; ?>"></p><br>

                <?php
                $type = $row['type'];

                // Retrieve other products of the same type
                $sql = "SELECT * FROM `tblproduct` WHERE type = '$type' AND id != '$id'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    function getRandomProducts($products, $count) {
                        $randomIndexes = array_rand($products, $count);
                        $randomProducts = array();

                        foreach ($randomIndexes as $index) {
                            $randomProducts[] = $products[$index];
                        }

                        return $randomProducts;
                    }

                    $randomProducts = getRandomProducts($products, 3);

                    foreach ($randomProducts as $index => $product) {
                        
                        ?>
                       <a href="#" class="image-link" data-index="<?php echo $index; ?>" data-price="<?php echo $product['price']; ?>" data-name="<?php echo $product['name']; ?>" data-id="<?php echo $product['id']; ?>" data-image="<?php echo $product['image']; ?>">
                            <img src="<?php echo $product['image']; ?>" alt="Product Image" width="150px">
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card-body">
                <a href="cart.php" style="color:#f5ebe0;"><button type="button" name="addtocart">Back</a></button>
                <button type="button" id="addToCartButton">Add To Cart</button>
            </div>
        </div>
    </div>

    <script>
        const mainImage = document.getElementById('mainImage');
        const productPrice = document.getElementById('productPrice');
        const productID = document.getElementById('productid');
        let selectedProductId = '';
        let selectedProductImage = '';

        const imageLinks = document.querySelectorAll('.image-link');

        imageLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                const currentImageUrl = this.querySelector('img').getAttribute('src');
                mainImage.src = currentImageUrl;
                productPrice.textContent = this.dataset.price;
                productID.dataset.id = this.dataset.id;
                selectedProductId = this.dataset.id;
                selectedProductImage = this.dataset.image;
            });
        });

        const addToCartButton = document.getElementById('addToCartButton');

        addToCartButton.addEventListener('click', function (e) {
            e.preventDefault();

            if (selectedProductId) {
                addToCart(selectedProductId, selectedProductImage);
            } else {
                alert("Please select a product.");
            }
        });

        function addToCart(productId, imageUrl) {
            // Make an AJAX request to the server-side script to add the product to the cart
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "inserttocart.php?id=" + productId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Request successful, do something if needed
                    alert("Product added to cart!");

                    // Display the selected image in the cart (assuming there is an element with ID "cartImage")
                    document.getElementById('cartImage').src = imageUrl;
                }
            };
            xhr.send();
        }
    </script>
    <?php
}

mysqli_close($con);
?>