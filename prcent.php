<!DOCTYPE html>
<html>
<head>
  <!-- Add the Google Charts library -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // Load the Google Charts library
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart using the data
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Product Type', 'Percentage Sold'],
        ['RING', 25],
        ['Earing', 20],
        ['Anklet', 15],
        ['Barcelet', 10],
        ['discount', 5],
        ['Handmade', 8],
        ['Party', 10],
        ['Necklace', 7]
      ]);

      // Calculate the percentage based on the amount of each product type
      var totalAmount = 0;
      for (var i = 1; i < data.getNumberOfRows(); i++) {
        totalAmount += data.getValue(i, 1);
      }
      for (var i = 1; i < data.getNumberOfRows(); i++) {
        var percentage = (data.getValue(i, 1) / totalAmount) * 100;
        data.setValue(i, 1, percentage);
      }

      var options = {
        backgroundColor: '#fbf7f3',
        title: 'Percentage of Products Sold by Type',
        pieHole: 0.2, // Set this to 0 for a regular pie chart, or adjust the value for a donut chart
        colors: ['#9d8189', '#f5ebe0', '#6b486b', '#a05d56', '#d0743c', '#ff8c00', '#ff7f50', '#b22222'],
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);

      // Add click event listener to the chart
      google.visualization.events.addListener(chart, 'select', selectHandler);

      // Function to handle click event on the chart
      function selectHandler() {
        var selectedItem = chart.getSelection()[0];
        if (selectedItem) {
          var productType = data.getValue(selectedItem.row, 0);
          if (productType === 'RING') {
            window.location.href = "percent2.php?type=" + productType;
          
          } else if (productType === 'Party') {
            window.location.href = "percent3.php?type=" + productType;
          }
           else if (productType ==='Earing') {
            window.location.href = "percent4.php?type=" + productType;
          }
          else if (productType === 'Anklet') {
            window.location.href = "percent5.php?type=" + productType;
          }
          else if (productType === 'Barcelet') {
            window.location.href = "percent6.php?type=" + productType;
          }
          else if (productType === 'discount') {
            window.location.href = "percent7.php?type=" + productType;
          }
          else if (productType === 'Handmade') {
            window.location.href = "percent8.php?type=" + productType;
          }
         
          else{
            window.location.href ="percent9.php?type=" + productType;
          }
        }
      }
    }
  </script>
  <style>
    body {    
      background-color:#fbf7f3;
    
    }
    #chart_div {     
       
      width: 760px;
      height: 500px;
      position: absolute; /* Set the position to absolute */
      top: 50%; /* Set the top to 50% to center the chart vertically */
      left: 50%; /* Set the left to 50% to center the chart horizontally */
      transform: translate(-50%, -50%); /* Use transform to center the chart */
      text-align: center;
    }
  </style>
</head>
<body>
  <div id="chart_div"></div>
</body>
</html>
