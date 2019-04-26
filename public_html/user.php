
  <link href="style.css" rel='stylesheet' type='text/css' media="all">
  <!--//stylesheets-->

<script>
   if (document.cookie.indexOf("user") == -1) {
 location.href = "/login.php";
} 
</script>
 <?php
 
 
echo nl2br(file_get_contents( "User.txt" )); // get the contents, and echo it out.
?>
