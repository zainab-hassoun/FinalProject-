<!-- <?php
// Retrieve the image URL and product ID from the AJAX request
// $imageUrl = $_POST['imageUrl'];
// $price = $_POST['price'];
// $id = $_POST['id'];


// // Perform the necessary database update to change the image URL
// // This could involve updating the 'image' field of the product with the given ID

// // Example code to update the image URL using mysqli
// $con = mysqli_connect("localhost", "root", "1234", "loginproject");
// $sql = "UPDATE tblproduct SET image = '$imageUrl' and price= '$price' WHERE id = '$id'";
// mysqli_query($con, $sql);

// // You can perform additional logic or validation if needed

// // Send a response back to the AJAX request (optional)
// $response = array('status' => 'success');
// echo json_encode($response);
?> -->
<?php
// Retrieve the POST data sent from the JavaScript
$imageUrl = $_POST['imageUrl'];
$price = $_POST['price'];
$id = $_POST['id'];

// Update the database with the new image URL and price
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
$sql = "UPDATE tblproduct SET image='$imageUrl', price='$price' WHERE id='$id'";
$result = mysqli_query($con, $sql);

// Check if the update was successful
if ($result) {
    echo "Image and price updated successfully.";
} else {
    echo "Failed to update image and price.";
}
?>
<?php
// Retrieve the POST data sent from the JavaScript
$imageUrl = $_POST['imageUrl'];
$price = $_POST['price'];
$id = $_POST['id'];

// Update the database with the new image URL and price
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
$sql = "UPDATE madehand SET image='$imageUrl', price='$price' WHERE id='$id'";
$result = mysqli_query($con, $sql);

// Check if the update was successful
if ($result) {
    echo "Image and price updated successfully.";
} else {
    echo "Failed to update image and price.";
}
?>

