<?php
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}

	/* Validation to check if gender is selected */
	if(!isset($error_message)) {
	if(!isset($_POST["gender"])) {
	$error_message = " All Fields are required";
	}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
		$error_message = "Accept Terms and Conditions to Register";
		}
	}

	if(!isset($error_message)) {
		require_once("dbcontroller.php");
		$db_handle = new DBController();
		$email=$_POST['userEmail'];
		$sql_e = "SELECT * FROM store_users WHERE email='$email'";
		$res_e = $db_handle->numRows($sql_e);
		if($res_e > 0){
  	  $error_message = "Sorry... email already taken"; 	
  	}else{
  	    $first=$_POST['firstName'];
  	    
		$query = "INSERT INTO `store_users` (`first_name`, `last_name`,`email`,`home_address`,`home_phone`,`cell_phone`,`gender`) VALUES
		( '$first', '" . $_POST["lastName"] . "',  
		'" . $_POST["userEmail"] . "',  '" . $_POST["homeAddress"] . "', 
		'" . $_POST["homePhone"] . "',  '" . $_POST["cellPhone"] . "', '" . $_POST["gender"] . "')";
		$result = $db_handle->insertQuery($query);
  	
		if(!empty($result)) {
			$error_message = "";
			echo"User Added Successfully <a href='siteUsers.php'>Click here to View all Users<h3></h3></a>";
			
			unset($_POST);
		} else {
			$error_message = "Problem in registration. Try Again!";	
		}
  	}
	}
}




    // search in all table columns
    // using concat mysql function
    //$query = "SELECT * FROM  `store_users` WHERE CONCAT(  `first_name` , //`last_name` , `email` ,   `home_phone` ,  `cell_phone` ) LIKE '%"//.$Value."%' LIMIT 0 , 30";
    
   // $query = "SELECT * FROM  `store_users` WHERE first_name LIKE '%" .$Value. //"%' OR last_name LIKE '%" .$Value. "%' OR email LIKE '%" .$Value. "%' //OR home_phone LIKE '%" .$Value. "%' OR cell_phone LIKE '%" .$Value. "%'";

    
    
   /* echo "<h2>Search result</h2>";
			echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Homeaddress</th>
<th>Homephone</th>
<th>Cellphone</th>
<th>Gender</th>
</tr>";

while($row = $search_result->fetch_assoc()) 
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
echo "</table>";*/

function filterTable($query)
{
    $connect = mysqli_connect("localhost:3306", "karthi12_root","abcd1234","karthi12_store_user");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<html>
<head>
<title>User Section</title>
<!--booststrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <!--//booststrap end-->
  <!-- font-awesome icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!--stylesheets-->
  <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
  <!--//stylesheets-->
<link href="//fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
<style>
html {
  background: url(b1.jpg) no-repeat center center fixed;
  background-size: cover;
  height: 100%;
}

body{
    
  
    background-color: #FF8000;
    /* For WebKit (Safari, Chrome, etc) */
    background: #FF8000 -webkit-gradient(linear, left top, left bottom, from(#D4FF00), to(#FF8000)) no-repeat;
    /* Mozilla,Firefox/Gecko */
    background: #FF8000 -moz-linear-gradient(top, #D4FF00, #FF8000) no-repeat;
    /* IE 5.5 - 7 */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#D4FF00, endColorstr=#FF8000) no-repeat;
    /* IE 8 */
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#D4FF00, endColorstr=#D4FF00)" no-repeat;
	font-family:calibri;
	

}

.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}

.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
.demo-table {
	 
	width: 100%;
	border-spacing: initial;
	margin: 2px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 4px;
	padding: 20px 40px;
}


.demo-table td {
	padding: 15px 0px;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
</style>
</head>
<body>
    <h3>User Registration Form</h3>
<form name="frmRegistration" method="post" action="">
<table border="0" width="500" align="center">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>First Name</td>
<td><input type="text" class="demoInputBox" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
</tr>
<tr>
<td>Last Name</td>
<td><input type="text" class="demoInputBox" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
</tr>
<tr>
<td>HomeAddress</td>
<td><input type="text" class="demoInputBox" name="homeAddress" value="<?php if(isset($_POST['homeAddress'])) echo $_POST['homeAddress']; ?>"></td>
</tr>
<tr>
<td>HomePhone</td>
<td><input type="text" class="demoInputBox" name="homePhone" value="<?php if(isset($_POST['homePhone'])) echo $_POST['homePhone']; ?>"></td>
</tr>
<tr>
<td>CellPhone</td>
<td><input type="text" class="demoInputBox" name="cellPhone" value="<?php if(isset($_POST['cellPhone'])) echo $_POST['cellPhone']; ?>"></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
<input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
</td>
</tr>
<tr>
<td colspan=2>
<input type="checkbox" name="terms"> I accept Terms and Conditions <input type="submit" name="register-user" value="Register" class="btnRegister"></td>
</tr>
</table>
</form>
<h3>Search User in Database</h3>
	<form method = "post" action = "registeruser.php">
	    <table border="0" width="500" align="center">
	<select name='field' class="common-input mt-10" required="" id="mySelect">
							<option selected="" disabled selected>Choose</option>
							<option value="Firstname">Firstname</option>
							<option value="Lastname">Lastname</option>
							<option value="Email">Email</option>
							<option value="Homephone">Homephone</option>
							<option value="Cellphone">Cellphone</option>
						</select>	
	<br>
	<br>
	<input type="text" name="Value" placeholder="search for users.." >
         <br>
<br>
	  <button type ="submit" name = "submit" class="btnRegister">Search</button>
	  <br>
      <br>
     
<?php
if(isset($_POST['submit'])){
    
$Value =$_POST['Value'];
$selected_val = $_POST['field'];

if($selected_val=="Firstname")
{
   $query = "SELECT * FROM  `store_users` WHERE first_name ='$Value'";
   //OR last_name LIKE '%" .$Value. "%' OR email LIKE '%" .$Value. "%' OR //home_phone LIKE '%" .$Value. "%' OR cell_phone LIKE '%" .$Value. "%'"; 
}

if($selected_val=="Lastname")
{
     $query = "SELECT * FROM  `store_users` WHERE last_name ='$Value'";
}
if($selected_val=="Email")
{
     $query = "SELECT * FROM  `store_users` WHERE email ='$Value'";
}

if($selected_val=="Homephone")
{
     $query = "SELECT * FROM  `store_users` WHERE home_phone ='$Value'";
}

if($selected_val=="Cellphone")
{
     $query = "SELECT * FROM  `store_users` WHERE cell_phone ='$Value'";
}
$search_result = filterTable($query);

    
 echo "<h2>Search result</h2>";
			echo "<table border='1' class='demo-table'>

<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Homeaddress</th>
<th>Homephone</th>
<th>Cellphone</th>
</tr>";

 
while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['home_address'];?></td>
                    <td><?php echo $row['home_phone'];?></td>
                    <td><?php echo $row['cell_phone'];?></td>
                </tr>
                
                <?php  endwhile;}?>
        </table>
        </form>
  </div>
</div>
  </body>
</html>
	