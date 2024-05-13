<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  display: flex;
  background-image: url('images/background.png'); /* Background image */
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  /* Transparent background */
  background-color: rgba(255, 255, 255, 0.5); /* Adjust opacity as needed */
  background-image: url('images/mountains.png'); /* Add the mountains image */
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 15px;
  text-decoration: none;
  font-size: 24px;
  color: #000; /* Black text color */
  display: block;
  transition: 0.3s;
  display: flex;
  align-items: center;
}

.sidenav a.logout {
  background-color: red; /* Red background color for logout button */
  color: white; /* White text color for logout button */
}

.sidenav a:hover {
  background-color: #555; /* Darker background color on hover */
}

.sidenav .closebtn {
  position: absolute;
  top: 15px; /* Adjusted from 0 */
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  color: #000; /* Black close button color */
}

.menu-header {
  padding: 15px;
  background-color: rgba(255, 255, 255, 0.5); /* Transparent background for menu header */
}

.menu-header h2 {
  color: #000; /* Black text color */
  margin: 0;
}

.menu-item {
  margin-top: 15px;
}

.content {
  flex: 1;
  padding: 30px;
  transition: margin-left 0.5s;
  font-size: 20px;
  color: #333; /* Dark gray text color */
}

.circle-graph {
  position: relative;
  width: 150px;
  height: 150px;
  background-color: #ddd;
  border-radius: 50%;
}

.circle-email:before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #3498db; /* Blue for email statistics */
  clip-path: polygon(50% 0%, 100% 0%, 100% 100%, 50% 100%);
  transform-origin: center;
  animation: fill-email 2s linear forwards;
}

@keyframes fill-email {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- User's name display -->
<div id="userDisplay" style="font-size: 24px; color: #fff; background-color: rgba(0, 0, 0, 0.5); padding: 10px; position: fixed; top: 0; right: 0; margin: 10px; display: none;">
  <!-- User's name will be displayed here -->
</div>

<div id="mySidenav" class="sidenav">
  <div class="menu-header">
    <img src="images/MYLOGO.png" alt="Logo" style="width: 120px; margin-bottom: 15px;">
    <h2>Main Menu</h2>
  </div>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a>
  <div class="menu-item">
    <a href="#" onclick="showFunction('dashboard')">
      Dashboard
      <img src="images/dashboard.png" alt="Dashboard" style="width: 24px; height: 24px; margin-left: 10px;">
    </a>
  </div>
  <div class="menu-item">
    <a href="#" onclick="showFunction('profile')">
      User Profile
      <img src="images/members.png" alt="User Profile" style="width: 24px; height: 24px; margin-left: 10px;">
    </a>
  </div>
  <div class="menu-item">
    <a href="#" onclick="showFunction('table-list')">
      Table List
      <img src="images/reports.png" alt="Table List" style="width: 24px; height: 24px; margin-left: 10px;">
    </a>
  </div>
  <div class="menu-item">
    <a href="#" onclick="showFunction('notifications')">
      Notifications
      <img src="images/messages.png" alt="Notifications" style="width: 24px; height: 24px; margin-left: 10px;">
    </a>
  </div>
  <div class="menu-item" style="margin-top: auto;">
    <a href="#" class="logout" onclick="logout()">
      Logout
      <img src="images/logout.png" alt="Logout" style="width: 24px; height: 24px; margin-left: 10px;">
    </a>
  </div>
</div>

<span style="font-size:36px;cursor:pointer;color:#000;position: fixed;top: 20px;left: 20px;" onclick="openNav()">&#9776;</span>

<div class="content" id="functionDisplay">
  <!-- Function display goes here -->
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("functionDisplay").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("functionDisplay").style.marginLeft= "0";
}

function showFunction(functionName) {
  var functionDisplay = document.getElementById("functionDisplay");
  if (functionName === 'dashboard') {
    functionDisplay.innerHTML = `
      <h2>Dashboard</h2>
      <canvas id="emailPieChart" width="400" height="200"></canvas>
    `;

    // Generate pie chart for email statistics
    var ctx = document.getElementById('emailPieChart').getContext('2d');
    var emailPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Emails Sent', 'Emails Opened', 'Emails Clicked'],
        datasets: [{
          label: 'Email Statistics',
          data: [1000, 500, 200], // Example data for email statistics
          backgroundColor: [
            'rgba(255, 99, 132, 0.5)', // Red for Emails Sent
            'rgba(54, 162, 235, 0.5)', // Blue for Emails Opened
            'rgba(255, 206, 86, 0.5)' // Yellow for Emails Clicked
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  } else if (functionName === 'profile') {
    functionDisplay.innerHTML = "<h2>User Profile</h2><img src='images/me.png' alt='Profile Picture' style='width: 150px; height: 150px; border-radius: 50%;'><p style='font-size: 24px;'>Name: Darius Adrian Silagan Escolano</p><p style='font-size: 24px;'>Email: dariusescolano@gmail.com</p>";
  } else if (functionName === 'table-list') {
    functionDisplay.innerHTML = "<h2>Table List</h2><h3>Recent Transactions</h3><table><tr><th>Date</th><th>Description</th><th>Amount</th></tr><tr><td>2024-05-01</td><td>Product Purchase</td><td>$50</td></tr><tr><td>2024-04-30</td><td>Service Payment</td><td>$100</td></tr></table><h3>Products</h3><table><tr><th>Name</th><th>Price</th><th>Availability</th></tr><tr><td>Product A</td><td>$20</td><td>In Stock</td></tr><tr><td>Product B</td><td>$30</td><td>Out of Stock</td></tr></table>";
  } else if (functionName === 'notifications') {
    functionDisplay.innerHTML = "<h2>Notifications</h2><h3>New Messages</h3><ul><li>From: Jane Doe - Subject: Meeting Tomorrow</li><li>From: John Smith - Subject: Project Update</li></ul><h3>Updates</h3><ul><li>System update scheduled for May 10</li><li>New feature rollout next week</li></ul><h3>Reminders</h3><ul><li>Reminder: Pay rent by May 15</li><li>Reminder: Submit report by Friday</li></ul>";
  } else {
    functionDisplay.innerHTML = "<h2>" + functionName + "</h2><p>This section displays " + functionName + ".</p>";
  }
}

function logout() {
  // Add logout functionality here, e.g., clearing session, cookies, etc.
  alert("Logging out..."); // Placeholder for logout action
  window.location.href = "index.php"; // Redirect to index.php after logging out
}
</script>
   
</body>
</html>












