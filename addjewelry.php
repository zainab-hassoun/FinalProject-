<html>
<head>
  <link rel="stylesheet" href="css/addmanger.css">
  <style>
    body {
      font: normal 18px/1.5 "Fira Sans", "Helvetica Neue", sans-serif;
      background-image: url('image/img22.jpg');
      font-family: Arial, sans-serif;
      display: flex;
      height: 100%;
      background-repeat: no-repeat;
      background-size: cover;
      padding: 40px 0;
      color: #9d8189;
    }

    input[type = submit] {
      width: 100%;
      background-color: #f5ebe0;
      color: #9d8189;
      padding: 10px 14px;
      margin-top: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    .flex-outer {
      list-style-type: none;
      padding: 0;
    }

    .flex-outer li {
      display: flex;
      margin-bottom: 20px;
    }

    .flex-outer label {
      flex: 0 0 120px;
      max-width: 220px;
      padding: 8px;
      font-weight: 300;
      letter-spacing: 0.09em;
      text-transform: uppercase;
    }

    .flex-outer input[type="text"],
    .flex-outer input[type="number"],
    .flex-outer input[type="submit"] {
      width: 20%;
      padding: 8px;
      border: none;
      border-radius: 4px;
    }
    .flex-outer input[type="submit"] {
      color: #f5ebe0;
     background-color: #9d8189;
    }
    .flex-outer button {
      margin-top: 10px;
      padding: 8px 16px;
      border: none;
     color: #f5ebe0;
     background-color: #9d8189;
      text-transform: uppercase;
      letter-spacing: 0.09em;
      border-radius: 2px;
    }
  </style>
</head>
<body>
 
 
  <div class="container">
     <h1>Add Product Details</h1>
    <form action="" method="POST">
      <ul class="flex-outer">
        <li>
          <label for="type">Type Jewelry</label>
          <input type="text" name="type" placeholder="Enter The Type" autocomplete="off">
        </li>
        <li>
          <label for="jewNum">Number Jewelry</label>
          <input type="number" name="jewNum" placeholder="Enter Number of Jewelry" autocomplete="off">
        </li>
        <li>
          <label for="price">Price</label>
          <input type="number" name="price" placeholder="Price" autocomplete="off">
        </li>
        <li>
          <label for="image">Image</label>
          <input type="text" name="image" placeholder="Image URL" autocomplete="off">
        </li>
        <li>
          <label for="quantity">Quantity</label>
          <input type="number" name="quantity" placeholder="Quantity" autocomplete="off">
        </li>
        <li>
          <input type="submit" name="submit" value="ADD New Jewelry">
        </li>
      </ul>
    </form>
  </div>
</body>
</html>
