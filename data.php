<?php
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
if (!$con) {
  die('Could not connect: ' . mysqli_error());
}

// Fetch data from the database
$result = mysqli_query($con, "SELECT name_p, amount FROM tblproduct");

// Prepare the data in PHP array format
$data = array(['Product Type', 'Percentage Sold']);
$totalAmount = 0;
$zeroAmount = 0;
$mostBoughtProduct = null;
$maxAmount = 0;
$zeroSoldProducts = array();
while ($row = mysqli_fetch_array($result)) {
  $amount = (int)$row['amount'];
  $totalAmount += $amount;
  if ($amount == 0) {
    $zeroAmount += 1;
    $zeroSoldProducts[] = $row['name_p'];
  }
  $data[] = [$row['name_p'], $amount];

  if ($amount > $maxAmount) {
    $maxAmount = $amount;
    $mostBoughtProduct = $row['name_p'];
  }
}

// Calculate the percentage for each product type
for ($i = 1; $i < count($data); $i++) {
  if ($data[$i][1] == 0) {
    $percentage = 0;
  } else {
    $percentage = ($data[$i][1] / $totalAmount) * 100;
   
    
  }
  $data[$i][1] = $percentage;

}

// Add the most bought product to the data array
if ($mostBoughtProduct !== null) {
  $data[] = [$mostBoughtProduct . ' (Most Bought)', 0];
}

// Convert the PHP array to JSON format and output the result
header('Content-Type: application/json');
echo json_encode($data);
mysqli_close($con);
?>
