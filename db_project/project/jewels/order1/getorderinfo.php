<html>
<?php
session_start();
if(!isset($_SESSION['myusername']) || $_SESSION['myusername'] != "cashier")
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
<a href="./orderadded.php">insert</a>
<br>
<?php

// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT order_id, customer_id, status, deliverystatus FROM `order` WHERE 1";
//echo $query;
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>order_id</b></td>
<td align="left"><b>customer_id</b></td>
<td align="left"><b>status</b></td>
<td align="left"><b>deliverystatus</b></td>
</tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['order_id'] . '</td><td align="left">' . 
$row['customer_id'] . '</td><td align="left">' .
$row['status'] . '</td><td align="left">' . 
$row['deliverystatus'] . '</td><td align="left">';
echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>
</div>
</body>

</html>
