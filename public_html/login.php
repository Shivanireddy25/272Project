  <link href="bg.css" rel='stylesheet' type='text/css' media="all">
  <!--//stylesheets-->
<?php
if(isset($_POST['submit'])){
$user=$_POST['username'];
$pass=$_POST['password'];
if($user=="admin" && $pass="admin")
{
echo("username and password mached");
setcookie("user", "karti", time()+2*24*60*60);
header("Location:user.php");
}
else{
echo("error ! please enter correct data!");
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    
    <style type = "text/css">
      td {background-color = #DDDDDD}
    </style>
  </head>
  
  <body style = "font-family: arial">
    <p style = "font-size: 13pt">
      Type in your username and password below
      <br />
      
    </p>
    
    <!-- post form data to password.php -->
    <form action = "" method = "post">
      <br />
      
      <table border = "0" cellspacing = "0"
             style = "height: 90px; width: 123px;
                      font-size: 10pt" cellpadding = "0">
        
        <tr>
          <td colspan = "3">
            <strong>Username:</strong>
          </td>
        </tr>
        
        <tr>
          <td colspan = "3">
            <input size = "40" name = "username"
                   style = "height: 22px; width = 115px" />
          </td>
        </tr>
        
        <tr>
          <td colspan = "3">
            <strong>Password:</strong>
          </td>
        </tr>
        
        <tr>
          <td colspan = "3">
            <input size = "40" name = "password"
                   style = "height: 22px; width = 115px"
                   type = "password" />
            <br />
           </td>
        </tr>

        <tr>
          <td colspan = "1">
            <input type = "submit" name = "submit"
                   value = "Login" style = "height: 23px;
                                            width = 47px" />
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
        