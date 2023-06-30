<!DOCTYPE html>
<html>
<head>
  <style>
    html, body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }

  body {
    background-image: url('https://www.jewellerybox.co.uk/cms/media?contentId=1168993&variant=800x500-sc&n=1');
    font-family: Arial, sans-serif;
    display: flex;
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }

    .sidebar {
      background-color: #f1ece9;
      width: 200px;
      padding: 30px;
      margin: -8px;
      height: 550px;
    }

    .content {
    flex: 1;
    padding:0px;
    
    display: flex;
    justify-content: center;
    align-items: center;
  }

    .sidebar h2 {
      color: #9d8189;
      font-size: 20px;
      margin-bottom: 10px;
    }

    .sidebar button {
      background-color: #fbf7f3;
      color: #9d8189;
      border: none;
      border-radius: 4px;
      padding: 10px 14px;
      margin-bottom: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
      width: 210px;
      text-align: left;
    }

    .sidebar button:hover {
      background-color: #e7ded8;
    }

    .sidebar img {
      width: 100%;
      height: auto;
      margin-bottom: 20px;
    }

    /* Added CSS for iframe */
    .content iframe {
      width: 100%;
      height: 100%;
      border: none;
    }
  </style>
</head>
<body>
  <div class="sidebar">
  
    <h2>Jewelry</h2>
    <button onclick="showPage('addJewelry')">Add Jewelry</button><br><br>
    <button onclick="showPage('productmanger')">Remove Jewelries and Update</button><br><br>
    <button onclick="showPage('status')">Status</button><br><br>
    <button onclick="showPage('users')">Users</button><br><br>
    <button onclick="showPage('managers')">Managers</button><br><br>
    <button onclick="logout()">Log Out</button><br><br>
  
  </div>

  <div class="content" id="pageContent">
  </div>

  <script>
   function showPage(page, imageUrl) {
  var contentDiv = document.getElementById('pageContent');
  contentDiv.innerHTML = '';

  var body = document.body;
  body.style.backgroundImage = `url(${imageUrl})`; // שינוי תמונת הרקע של ה־body

  if (page === 'addJewelry') {
    loadPhpPage('addJewelry.php', contentDiv);
  } else if (page === 'productmanger') {
    loadPhpPage('productmanger.php', contentDiv);
  } else if (page === 'status') {
    loadPhpPage('status.php', contentDiv);
  } else if (page === 'users') {
    loadPhpPage('usershows.php', contentDiv);
  } else if (page === 'managers') {
    loadPhpPage('mangersshows.php', contentDiv);
  }
}


    function loadPhpPage(url, targetElement) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          // Instead of setting innerHTML, create an iframe element and set its source to the URL
          var iframe = document.createElement('iframe');
          iframe.src = url;
          targetElement.appendChild(iframe);
        }
      };
      xhttp.open('GET', url, true);
      xhttp.send();
    }
    function logout() {
    window.location.href ='loginmanger.php';
}

    // Prevent sidebar from minimizing when clicking buttons
    var sidebarButtons = document.querySelectorAll('.sidebar button');

    sidebarButtons.forEach(function(button) {
      button.addEventListener('click', function(event) {
        event.stopPropagation();
      });
    });
 
  </script>
</body>
</html>
