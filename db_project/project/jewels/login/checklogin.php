<html>
<head>
<title>Project</title>
</head>
<body style="background-image:url('../image.jpg');background-attachment:fixed;background-repeat:no repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;">
<?php

$tbl_name="admin"; // Table name

session_start();
// Connect to server and select databse.
require_once('../../mysqli_connect.php');

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
//$myusername = mysql_real_escape_string($myusername);
//$mypassword = mysql_real_escape_string($mypassword);

$query="SELECT * FROM admin WHERE username='$myusername' and password='$mypassword'";

$response = @mysqli_query($dbc, $query);

//$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($response);

// If result matched $myusername and $mypassword, table row must be 1 row
//$count = 1;
if($count == 1) {

// Register $myusername, $mypassword and redirect to file "login_success.php"
@$_SESSION['myusername'] = $myusername;
@$_SESSION['mypassword'] = $mypassword;
if($myusername == "cashier"){
header("location: ../index1.php");
}
else{
header("location: ../index.php");
}
}
else {
echo "Wrong Username or Password";
}


?>
</body>
</html>
