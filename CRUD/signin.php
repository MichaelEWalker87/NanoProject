
<?php

$servername = "localhost";
$username = "mikewalker1";
$password = "tucson";
$dbname = "Resume";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Experiance WHERE managername = 'ddd'";

$result = $conn->query($sql);
echo '<table style="width:100%">

  <tr>
    <th>Companyname</th>
    <th>Titleheld</th>
    <th>startdate</th>
    <th>enddate</th>
    <th>descripttion</th>
    <th>managername</th>
    <th>manager Phone</th>
    <th>manageremail</th>
    <th>webiste</th>
    <th>awards</th>
  </tr>';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc) {
        echo'<tr>
   <td>'.$row["Companyname"].'</td>
    <td>'.$row["Titleheld"].'</td>
    <td>'.$row["startdate"].'</td>
    <td>'.$row["enddate"].'</td>
    <td>'.$row["descripttion"].'</td>
    <td>'.$row["managername"].'</td>
    <td>'.$row["manager phone"].'</td>
    <td>'.$row["manageremail"].'</td>
    <td>'.$row["webiste"].'</td>
    <td>'.$row["awards"].'</td>
  </tr>';
    }
} else {
    echo "0 results";
}
echo '</table>';
$conn->close();
