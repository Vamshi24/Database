<html>
<?php
session_start();
if(!isset($_SESSION['myusername']))
{
echo("login unsccessfull");
header("location: http://localhost/project/jewels/login/main_login.php");
}
?>

<head>
<?php
echo '<div style="margin:10px 10px 10px 1100px ;">';
echo '<p style="text-align: left; width:150px;">';
echo  "username:" . $_SESSION['myusername'] ;
echo "</p>";
echo ' <a href=" http://localhost/project/jewels/login/logout.php" style="text-align:right;">logout</a> ' ;
echo "</div>";
?>
<title>Project</title>
</head>
<body style="background-image:url('image.jpg');background-attachment:fixed;background-repeat:no repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;">
<div style="margin: 10px 10px 10px ; position: absolute;">
<br/>
<a href="http://localhost/project/jewels/gold_smith1/getgoldsmithinfo.php">Goldsmith</a>
<br/>
<br/>
<a href="http://localhost/project/jewels/materials1/getmaterialsinfo.php">Materials</a>
<br/>
<br/>
<a href="http://localhost/project/jewels/payment1/paymentadded.php">Payment</a>
<br/>
<br/>
<a href="http://localhost/project/jewels/sale1/saleadded.php">Sales</a>
<br/>
<br/>
</div>

<div style="width: 1000px; margin-left: 160px; margin-top: 10px; position: absolute; top: 100px;">
<h2><center>Welcome...!!!</center></h2>
</div>
</body>

</html>
