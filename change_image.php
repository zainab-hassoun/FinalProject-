<!-- <?php
// Retrieve the image URL and product ID from the AJAX request
$imageUrl = $_POST['imageUrl'];

$id = $_POST['id'];

// Perform the necessary database update to change the image URL
// This could involve updating the 'image' field of the product with the given ID

// Example code to update the image URL using mysqli
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
$sql = "UPDATE tblproduct SET image = '$imageUrl' and price= '' WHERE id = '$id'";
mysqli_query($con, $sql);

// You can perform additional logic or validation if needed

// Send a response back to the AJAX request (optional)
$response = array('status' => 'success');
echo json_encode($response);
?> -->
