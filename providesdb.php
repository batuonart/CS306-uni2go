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
        
        <table>
        <tr>
        
        <th>University Name</th>
        <th>Location</th>
        <th>Discipline</th>

        <th>Cost</th>
        <th>Scholarship</th>


        <th>Labs</th>
        <th>Tools</th>

        <th>Gradutate Status</th>
        <th>Outgoing Opportunities</th>

        <th>Dorm</th>
        <th>Insurance</th>

        
      
<?php

include "config.php";
include "sidebar.php";


$sql_state = "SELECT * FROM universities 
INNER JOIN fees
 ON fees.uId = universities.id
 INNER JOIN services
  ON services.uId = universities.id
  INNER JOIN fixture
  ON fixture.uId = universities.id
  INNER JOIN opportunities
  ON opportunities.uId = universities.id";

$res = mysqli_query($db,$sql_state);

while($row = mysqli_fetch_array($res))
{
    $uni_name = $row["University_name"];
    $loc = $row["Location"];
    $discipline = $row["Discipline_type"];

    $cost = $row["Cost"];
    $scholarship = $row["Scholarship"];

    $labs = $row["Labs"];
    $tools = $row["Uni_tools"];

    $outgo = $row["Outgoing"];
    $grad = $row["Grad_status"];

    $dorm = $row["Dorm"];
    $insurance = $row["Insurance"];


    echo "<tr>". "<th>" . $uni_name . "</th>" .  "<th>" . $loc .  "</th>" .  "<th>" . $discipline .  "</th>".
    "<th>" . $cost .  "</th>"."<th>" . $scholarship .  "</th>" .
    "<th>" . $labs .  "</th>"."<th>" . $tools .  "</th>" . 
    "<th>" . $grad .  "</th>"."<th>" . $outgo .  "</th>" . 
    "<th>" . $dorm .  "</th>"."<th>" . $insurance .  "</th>" . "</tr>";
}

?>

    

</table>
    </body>
</html>
