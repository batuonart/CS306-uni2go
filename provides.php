<?php
ob_start();

include "config.php";
include "providesdb.php";
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
        <title>WillStudy</title>
        <style>
        table {
        border-collapse: collapse;
        width: 100%;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #f2f2f2;
        }

        tr:hover {background-color: #e6f3ff;}

        </style>
    </head>
    <body>
    <form action="provides.php" method="post">

  <select id="uniName" name="uniName">
    <?php
    $sql = "SELECT University_name FROM universities";
    $result = mysqli_query($db,$sql);
    while($ids = mysqli_fetch_array($result))
    {
        $id = $ids['University_name'];
        echo "<option value='$id'>".$id."</option>";
    }
    ?>
    <b>Fees</b> </div>
    <td><input type="text" name="cost" placeholder = "Cost"> </td>
    <td><input type="text" name="scholar" placeholder = "Scholarhsip"> </td>
    <b>Fixture</b> </div>

    <td><input type="text" name="Labs" placeholder = "Labs"> </td>
    <td><input type="text" name="Tools" placeholder = "Tools"> </td>
    <b>Opportunities</b> </div>

    <td><input type="text" name="Graduate" placeholder = "Graduate"> </td>
    <td><input type="text" name="Outgoing" placeholder = "Outgoing"> </td>
    <b>Service</b> </div>

    <td><input type="text" name="Dorm" placeholder = "Dorm"> </td>
    <td><input type="text" name="Insurance" placeholder = "Insurance"> </td>
    <input type="submit" name="Submit" value="Submit">


    </form>
    </div>
    </body>
</html>

<?php

if(isset($_POST["Submit"]))
{

  $sql = "SELECT id FROM universities WHERE universities.University_name = '$_POST[uniName]'";
  $result = mysqli_query($db,$sql);
  while($ids = mysqli_fetch_array($result))
  {
    $uniId = $ids['id'];
  }

    
        mysqli_query($db,"SET FOREIGN_KEY_CHECKS=0;");

        mysqli_query($db,"insert into services values('0','$_POST[Dorm]','$_POST[Insurance]', '0' ,'$uniId')");
        mysqli_query($db,"insert into fees values('$_POST[cost]','$_POST[scholar]','$uniId')");
        mysqli_query($db,"insert into fixture values('0','$_POST[Labs]','$_POST[Tools]','$uniId')");
        mysqli_query($db,"insert into opportunities values('$_POST[Outgoing]','$_POST[Graduate]','$uniId')");
        mysqli_query($db,"SET FOREIGN_KEY_CHECKS=1;");

    

    header("Refresh:0");

}

?>