<?php
ob_start();

include "config.php";
include "universities.php";


?>
<html>
<body>

<form action="uniadmin.php" method="post">
<br>
<br>
<div align = "center">
<b>Weclome to University Admin Panel</b> </div>


    <tr>
    <td><input type="text" name="name" placeholder = "Name"></td>
    </tr>
    <tr>
    <td><input type="text" name="location" placeholder = "Location"></td>
    </tr>
    <select id="ispriv" name="ispriv">
      <option value="Public">Public</option>
      <option value="Private">Private</option>
    </select>
    <br>
    <select id="disciple" name="disciple">
      <option value="Technical">Technical</option>
      <option value="Medical">Medical</option>
      <option value="Law">Law</option>
      <option value="Business">Business</option>
      <option value="All">All</option>
    </select>

    </tr>
    <tr>
        <td>
           
            <input type="submit" name="submit1" value="Insert">
            
            
        </td>
    </tr>
    <br>    
    <tr>
            </tr>
            <select id="idDelete" name="idDelete">
            <?php
            $sql = "SELECT id FROM universities";
            $result = mysqli_query($db,$sql);
            while($ids = mysqli_fetch_array($result))
            {
                $id = $ids['id'];
                echo "<option value='$id'>".$id."</option>";
            }
            ?>
            <input type="submit" name="submit2" value="Delete by Id">


            <select id="discipleFilter" name="discipleFilter">
            <option value="Technical">Technical</option>
            <option value="Medical">Medical</option>
            <option value="Law">Law</option>
            <option value="Business">Business</option>
            <option value="All">All</option>
            </select>
            <input type="submit" name="FilterSubmit" value="Search by Discipline">
</tr>

</form>
</div>
</body>
</html>
<?php

if(isset($_POST["submit1"]))
{
    if($_POST["name"]=="")
    {
        echo"name cant be empty";

    }
    else
    {
        mysqli_query($db,"insert into universities values('$_POST[disciple]','$_POST[ispriv]','$_POST[location]','$_POST[name]','$_POST[id]')");
        echo"insert sucess";
        header('Refresh: 0');
    }
    

}

if(isset($_POST["submit2"]))
{
   
    mysqli_query($db,"delete from universities where id='$_POST[idDelete]'");
    echo"delete sucess";
    header('Refresh: 0');
    

}

if(isset($_POST["FilterSubmit"]))
{
 
  
    $res = mysqli_query($db,"select * from universities where Discipline_type='$_POST[discipleFilter]'");
    echo"<table border = 1>";
         echo"<tr>";
        echo"<td>"; echo"School Name"; echo"</td>";
        echo"<td>"; echo"Id"; echo"</td>";
        echo"<td>"; echo"Location"; echo"</td>";
        echo"<td>"; echo"Disciple"; echo"</td>";
        echo"<td>"; echo"Private/Public"; echo"</td>";
        echo"</tr>";
     
    while($row = mysqli_fetch_array($res))
    {
        echo"<tr>";
        echo"<td>"; echo $row["University_name"]; echo"</td>";
        echo"<td>"; echo $row["id"]; echo"</td>";
        echo"<td>"; echo $row["Location"]; echo"</td>";
        echo"<td>"; echo $row["Discipline_type"]; echo"</td>";
        echo"<td>"; echo $row["Public_or_private"]; echo"</td>";
        echo"</tr>";
    }
    echo"</table>";
    echo"search success";
    
}



?>

