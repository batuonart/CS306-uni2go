
<?php

include "config.php";
include "sidebar.php";


?>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<head>
    
</head>
<body>
<div align = "center">

<form action="newaccount.php" method="post">

<div class="w3-container">
<h1 style="text-align:center;">Student Account Register</h1>

<td><input type="text" name="name" placeholder = "Name"> </td>
<td><input type="text" name="surname" placeholder = "Surname"> </td>
<td><input type="text" name="email" placeholder = "Email"> </td>
<td><input type="password" name="psw" placeholder = "Password"> </td>

<select id="area" name="area">
      <option value="SAY">SAY</option>
      <option value="SÖZ">SÖZ</option>
      <option value="TM">TM</option>
      <option value="DİL">DİL</option>
</select>

<td><input type="text" name="location" placeholder = "Location"> </td>


<input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>

<?php

if(isset($_POST["submit"]))
{
    if($_POST['name'] != "")
    {
        mysqli_query($db,"SET FOREIGN_KEY_CHECKS=0;");

        mysqli_query($db,"insert into students values('0','$_POST[name]','0','$_POST[area]')");
        echo '<script>alert("Account Created")</script>';
        mysqli_query($db,"SET FOREIGN_KEY_CHECKS=1;");

    }
    else
    {
        echo '<script>alert("Please fill all of the blanks")</script>';

    }
    header("Refresh:0");

}

?>



