

<?php
echo "<h2>MountainSide Site Users</h2>";
$servername = "localhost:3306";
$username = "admin";
$password = "Karti_234";
$dbname = "karthi12_store_user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM store_users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    // while($row = $result->fetch_assoc()) {
        // echo "Name: " . $row["FirstName"] .  " " . "Email: " . $row["Email"]. "<br>";
echo "<table border='1' id= results>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Homeaddress</th>
<th>Homephone</th>
<th>Cellphone</th>
<th>Gender</th>
</tr>";

while($row = $result->fetch_assoc()) 
  {
  echo "<tr>"; 
echo"<td>". $row['first_name']."</td>";
    echo"<td>". $row['last_name']."</td>";
    echo"<td>". $row['email'] ."</td>";
echo"<td>". $row['home_address'] ."</td>";
echo"<td>". $row['home_phone'] ."</td>";
echo"<td>". $row['cell_phone'] ."</td>";
echo"<td>". $row['gender'] ."</td>";
   echo "</tr>";
  }
echo "</table>";
    }
// } else {
//    echo "0 results";
// }
$conn->close();
?>