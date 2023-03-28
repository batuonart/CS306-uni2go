<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <a href="newaccount.php" class="w3-bar-item w3-button">Create Account</a>
  <a href="listunivs.php" class="w3-bar-item w3-button">List Universities</a>

  <a href="willstudy.php" class="w3-bar-item w3-button">View All</a>
  <a href="providesdb.php" class="w3-bar-item w3-button">View Providings</a>

  <a href="stuadmin.php" class="w3-bar-item w3-button">Students Admin</a>
  <a href="uniadmin.php" class="w3-bar-item w3-button">University Admin</a>





  <a href="client_chat.php" class="w3-bar-item w3-button">Client Chat</a>
  <a href="admin_chat.php" class="w3-bar-item w3-button">Admin Chat</a>

</div>

<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
</div>



<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html> 
