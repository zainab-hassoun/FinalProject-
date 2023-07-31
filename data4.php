<?php
$con = mysqli_connect("localhost", "root", "1234", "loginproject");
if (!$con) {
  die('Could not connect: ' . mysqli_error());
}

// Fetch data from the database
$result = mysqli_query($con, "SELECT name_p, amount FROM earing");

// Prepare the data in PHP array format
$data = array(['Product Type', 'Percentage Sold']);
$totalAmount = 0;
$maxAmount = 0;
while ($row = mysqli_fetch_array($result)) {
  $amount = (int)$row['amount'];
  $totalAmount += $amount;

  if ($amount > $maxAmount) {
    $maxAmount = $amount;
  }

  $data[] = [$row['name_p'], $amount];
}

// Calculate the percentage for each product type based on the maximum amount
for ($i = 1; $i < count($data); $i++) {
  $percentage = ($maxAmount / $data[$i][1]) * 100;
  $data[$i][1] = $percentage;
}

// Convert the PHP array to JSON format and output the result
header('Content-Type: application/json');
echo json_encode($data);
mysqli_close($con);
?>
