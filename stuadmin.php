<?php
ob_start();

include "config.php";
include "students.php";

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
<body>

<form action="stuadmin.php" method="post">
<br>
<br>
<div align = "center">
<b>Welcome To Student Admin Panel</b> </div>
    <tr>
    <td><input type="text" name="name" placeholder = "Name"> </td>
    </tr>
    <select id="area" name="area">
      <option value="SAY">SAY</option>
      <option value="SÖZ">SÖZ</option>
      <option value="TM">TM</option>
      <option value="DİL">DİL</option>
    </select>
    <td>Enter Desired University Id:</td>
    <select id="univId" name="univId">
    <?php
    $sql = "SELECT id FROM universities";
    $result = mysqli_query($db,$sql);
    while($ids = mysqli_fetch_array($result))
    {
        $id = $ids['id'];
        echo "<option value='$id'>".$id."</option>";
    }
    ?>
    <tr>
        <td colspan = "2" align = "center">
            <div align = "center">
            <input type="submit" name="submit1" value="Insert">
            </div>
        </td>
    </tr>
    <tr>
    <br>
    <select id="stuId" name="stuId">
    <?php
    $sql = "SELECT studentId FROM students";
    $result = mysqli_query($db,$sql);
    while($ids = mysqli_fetch_array($result))
    {
        $id = $ids['studentId'];
        echo "<option value='$id'>".$id."</option>";
    }
    ?>
    <input type="submit" name="submit2" value="Delete by Id">
    <select id="area2" name="area2">
      <option value="SAY">SAY</option>
      <option value="SÖZ">SÖZ</option>
      <option value="TM">TM</option>
      <option value="DİL">DİL</option>
    </select>
    <input type="submit" name="submit3" value="Search by Area">



    <select id="appStu" name="appStu">
    <?php
    $sql = "SELECT studentName FROM students";
    $result = mysqli_query($db,$sql);
    while($ids = mysqli_fetch_array($result))
    {
        $id = $ids['studentName'];
        echo "<option value='$id'>".$id."</option>";
    }
    ?>
    </select>
    <select id="appUni" name="appUni">
    <?php
    $sql = "SELECT University_name FROM universities";
    $result = mysqli_query($db,$sql);
    while($ids = mysqli_fetch_array($result))
    {
        $id = $ids['University_name'];
        echo "<option value='$id'>".$id."</option>";
    }
    ?>
    </select>
    <input type="submit" name="Append" value="Update Student University">

    </tr>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST["submit1"]))
{
    if($_POST["name"]=="" && $_POST["univId"]=="")
    {
        echo"name cant be empty";
    }
    else
    {
        mysqli_query($db,"insert into students values('0','$_POST[name]','$_POST[univId]','$_POST[area]')");
        echo"insert sucess";
        header("Refresh:0");

    }    
}
if(isset($_POST["submit2"]))
{
    if($_POST["stuId"]=="")
    {
        echo"id cant be empty";
    }
    else
    {
    mysqli_query($db,"SET FOREIGN_KEY_CHECKS=0;");
    mysqli_query($db," delete from students where studentId='$_POST[stuId]'");
    mysqli_query($db," SET FOREIGN_KEY_CHECKS=1;");
    echo"delete sucess";
    header("Refresh:0");

    }
}
if(isset($_POST["submit3"]))
{
    if($_POST["area2"]=="")
    {
        echo"area cant be empty";

    }
    else
    {
    $res = mysqli_query($db,"select * from students where studentArea='$_POST[area2]'");
    echo"Filtered by: $_POST[area2]";
    echo"<table border = 1>";
         echo"<tr>";
        echo"<td>"; echo"Name"; echo"</td>";
        echo"<td>"; echo"Id"; echo"</td>";
        echo"<td>"; echo"Area"; echo"</td>";
        echo"<td>"; echo"DesiredId"; echo"</td>";
        echo"</tr>";
     
    while($row = mysqli_fetch_array($res))
    {
        echo"<tr>";
        echo"<td>"; echo $row["studentName"]; echo"</td>";
        echo"<td>"; echo $row["studentId"]; echo"</td>";
        echo"<td>"; echo $row["studentArea"]; echo"</td>";
        echo"<td>"; echo $row["desiredUnivId"]; echo"</td>";
        echo"</tr>";
    }
    echo"</table>";
    }
}


if(isset($_POST["Append"]))
{
    echo"delete sucess";

    $sql = "SELECT id FROM universities WHERE universities.University_name = '$_POST[appUni]'";
    $result = mysqli_query($db,$sql);
    while($ids = mysqli_fetch_array($result))
    {
      $uId = $ids['id'];
    }

    mysqli_query($db,"SET FOREIGN_KEY_CHECKS=0;");
    mysqli_query($db,"UPDATE students SET desiredUnivId = ' $uId' WHERE students.studentName = '$_POST[appStu]'");
    mysqli_query($db," SET FOREIGN_KEY_CHECKS=1;");
    echo"delete sucess";
    header("Refresh:0");

    
}
?>

