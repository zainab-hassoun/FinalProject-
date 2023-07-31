<!DOCTYPE html>
<html>
<head>
  <!-- Add the Google Charts library -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // Load the Google Charts library
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(fetchAndDrawChart);

    // Fetch data from the server and draw the chart
    function fetchAndDrawChart() {
      // Use AJAX to fetch the data from the server
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var jsonData = JSON.parse(xhr.responseText);
            drawChart(jsonData);
          } else {
            console.error('Failed to fetch data');
          }
        }
      };
      xhr.open('GET', 'data6.php', true);
      xhr.send();
    }

    // Draw the chart using the data
    function drawChart(jsonData) {
      var data = google.visualization.arrayToDataTable(jsonData);

      var options = {
        title: 'Percentage of Products Sold by Type',
        backgroundColor: '#fbf7f3',
        pieHole: 0.2, // Set this to 0 for a regular pie chart, or adjust the value for a donut chart
        // is3D: true,
        colors: ['#9d8189', '#f5ebe0', '#6b486b', '#a05d56', '#d0743c', '#ff8c00', '#ff7f50', '#b22222'],
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
  </script>

  <style>
    body {    
      background-color:#fbf7f3;
    
    }
    #chart_div {     
        width: 800px;
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
