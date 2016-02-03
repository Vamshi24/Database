<html>
<head>
<title>Project</title>
</head>
<?php
session_start();
if(!isset($_SESSION['myusername']))
{
echo("here");
header("location: main_login.php");
}
//else{
//header("location: ../employee/getemployeeinfo.php");
//}
?>
<body style="background-image:url('../image.jpg');background-attachment:fixed;background-repeat:no repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;">
Login Successful
</body>
</html>
