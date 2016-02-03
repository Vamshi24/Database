<html>
<head>
<title>Project</title>
</html>
<body style="background-image:url('../image.jpg');background-attachment:fixed;background-repeat:no repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;">
<?php
session_start();
if(session_destroy())
{
header("Location: main_login.php");
}
?>
</body>
</html>
