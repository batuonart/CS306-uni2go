
<?php
ob_start();
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

<form action="listunivs.php" method="post">

<div class="w3-container">
<h1 style="text-align:center;">List Universities</h1>

<select id="stuName" name="stuName">
    <?php
    $sql = "SELECT studentName FROM students";
    $result = mysqli_query($db,$sql);
    while($ids = mysqli_fetch_array($result))
    {
        $studName = $ids['studentName'];
        echo "<option value='$studName'>".$studName."</option>";
    }
    ?>



<input type="submit" name="submit" value="List Possible Universities">


</form>
</div>
</body>
</html>

<?php

if(isset($_POST["submit"]))
{
    echo"Possible Universities You can Attend:";
    echo "<br>";

    $sql = "SELECT studentArea FROM students WHERE students.studentName = '$_POST[stuName]'";
    $result = mysqli_query($db,$sql);
    while($ids = mysqli_fetch_array($result))
    {
      $stuArea = $ids['studentArea'];
    }

    if($stuArea == "SAY")
    {
      $sql = "SELECT University_name FROM universities WHERE universities.Discipline_type = 'Technical' OR universities.Discipline_type = 'Medical' OR universities.Discipline_type = 'All'";
      $result = mysqli_query($db,$sql);
      while($ids = mysqli_fetch_array($result))
      {
          $schoolName = $ids['University_name'];
          echo $schoolName;
          echo "<br>";

      }

    }
    if($stuArea == "DİL")
    {
      $sql = "SELECT University_name FROM universities WHERE universities.Discipline_type = 'All'";
      $result = mysqli_query($db,$sql);
      while($ids = mysqli_fetch_array($result))
      {
          $schoolName = $ids['University_name'];
          echo $schoolName;
          echo "<br>";

      }
    }
    if($stuArea == "SÖZ")
    {
      $sql = "SELECT University_name FROM universities WHERE universities.Discipline_type = 'All'";
      $result = mysqli_query($db,$sql);
      while($ids = mysqli_fetch_array($result))
      {
          $schoolName = $ids['University_name'];
          echo $schoolName;
          echo "<br>";

      }
    }
    if($stuArea == "TM")
    {
      $sql = "SELECT University_name FROM universities WHERE universities.Discipline_type = 'Law' OR universities.Discipline_type = 'Business' OR universities.Discipline_type = 'All' ";
      $result = mysqli_query($db,$sql);
      while($ids = mysqli_fetch_array($result))
      {
          $schoolName = $ids['University_name'];
          echo $schoolName;
          echo "<br>";

      }
    }
}

?>

