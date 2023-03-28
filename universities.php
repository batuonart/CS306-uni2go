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
        <title>Universities</title>
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
        
        <table>
        <tr>
        <th>Id</th>
        <th>University Name</th>
        <th>Location</th>
        <th>Public/Private</th>
        <th>Discipline</th>
      
<?php

include "config.php";
include "sidebar.php";
$sql_state = "SELECT * FROM universities";
$res = mysqli_query($db,$sql_state);

while($row = mysqli_fetch_array($res))
{
    $uni_name = $row["University_name"];
    $loc = $row["Location"];
    $id = $row["id"];
    $type = $row["Public_or_private"];
    $discipline = $row["Discipline_type"];


    echo "<tr>". "<th>" . $id . "</th>" . "<th>" . $uni_name .  "</th>" .  "<th>" . $loc .  "</th>" .  "<th>" . $type .  "</th>"."<th>" . $discipline .  "</th>" . "</tr>";
}

?>

</table>
    </body>
</html>
