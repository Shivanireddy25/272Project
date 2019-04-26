<?php
$servername = "localhost:3306";
$username = "karthi12_root";
$password = "abcd1234";
$dbname = "karthi12_store_user";


if(isset($_POST['search'])){

$Value = $_POST['Value'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM  `user` WHERE CONCAT(  `UserId` ,`Firstname` , `Lastname` , `Email` ,  `Homeaddress` ,  `Homephone` ,  `Cellphone` ) LIKE '%".$valueToSearch."%' LIMIT 0 , 30";

    $search_result = filterTable($query);
			}
else {
        	$query = "SELECT * FROM user";
               $search_result = filterTable($query);
		}
 function filterTable($query)
{
    $connect = mysqli_connect("localhost:3306", "karthi12_root", "abcd1234", "karthi12_store_user");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html>
<head>
<title> User Registration</title>
<style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
</style>
</head>
<body>
<div class="container">
       <div class="row">
      <div class="col-lg-6">
	<h3>User Registration Form</h3>
	<form method = "post" action = "register.php">
	<div class ="input-group">
	User Id: <br>
	<input type ="text" name = "UserId"><br>
	</div>
	<div class ="input-group">
	First Name: <br>
	<input type ="text" name = "Firstname"><br>
	</div>
	<div class ="input-group">
	Last Name:<br>
	<input type ="text" name = "Lastname"><br>
	</div>
	<div class ="input-group">
	Email:<br>
	<input type ="text" name = "Email"><br>
	</div>
	<div class ="input-group">
	Home Address:<br>
	<input type ="text" name = "Homeaddress"><br>
	</div>
	<div class ="input-group">
	Home Phone:<br>
	<input type ="text" name = "Homephone"><br>
	</div>
	<div class ="input-group">
	Cell Phone:<br>
	<input type ="text" name = "Cellphone"><br>
	</div>
         <br>
	<button type ="submit" name = "register" class = "btn btn-primary">Register</button>
	</form>
        </div>
      

	<h3>Search User in Database</h3>
	<form method = "post" action = "create_search.php">
	<select name='field' class="common-input mt-10" required="">
							<option selected="" disabled selected>Choose</option>
							<option value="UserId">UserId</option>
							<option value="Firstname">Firstname</option>
							<option value="Lastname">Lastname</option>
							<option value="Email">Email</option>
                                                        <option value="Homeaddress">Homeaddress</option>
							<option value="Homephone">Homephone</option>
							<option value="Cellphone">Cellphone</option>
						</select>	
	<input type="text" name="Value" placeholder="Value" >
         <br>
<br>
	  <button type ="submit" name = "search" class = "btn btn-primary">Search</button><br>
<br>
<table>
<tr>
<th>UserId</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Homeaddress</th>
<th>Homephone</th>
<th>Cellphone</th>
</tr>
<?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['UserId'];?></td>
                    <td><?php echo $row['Firstname'];?></td>
                    <td><?php echo $row['Lastname'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['Homeaddress'];?></td>
                    <td><?php echo $row['Homephone'];?></td>
                    <td><?php echo $row['Cellphone'];?></td>
                </tr>
                <?php endwhile;?>
        </table>
        </form>
  </div>
</div>
  </body>
</html>