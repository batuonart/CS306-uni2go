<html>
    <head>
        <title>Students</title>
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
        <th>Name</th>
        <th>Graduation Area</th>
        <th>Desired University ID</th>
      
<?php

include "config.php";
include "sidebar.php";

$sql_state = "SELECT * FROM students";
$res = mysqli_query($db,$sql_state);

while($row = mysqli_fetch_array($res))
{
    $stuName = $row["studentName"];
    $StuId = $row["studentId"];
    $univId = $row["desiredUnivId"];
    $area = $row["studentArea"];


    echo "<tr>". "<th>" . $StuId . "</th>" . "<th>" . $stuName .  "</th>" .  "<th>" . $area .  "</th>" .  "<th>" . $univId .  "</th>" . "</tr>";
}

?>

</table>
    </body>
</html>
