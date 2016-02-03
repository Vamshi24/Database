<html>
<?php
session_start();
if(!isset($_SESSION['myusername']) || $_SESSION['myusername'] == "cashier")
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
<body style="background-image:url('../image.jpg');background-attachment:fixed;background-repeat:no repeat;background-size:cover;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;">
<div style="margin: 10px 10px 10px ; position: absolute;">
<br/>
<a href="http://localhost/project/jewels/employee/getemployeeinfo.php">Employee</a>
<br/><br/>
<a href="http://localhost/project/jewels/customer/getcustomerinfo.php">Customer</a>
<br/><br/>
<a href="http://localhost/project/jewels/cashier/getcashierinfo.php">Cashier</a>
<br/><br/>
<a href="http://localhost/project/jewels/gold_smith/getgoldsmithinfo.php">Goldsmith</a>
<br/><br/>
<a href="http://localhost/project/jewels/jewellery_shop/getjewelleryshopinfo.php">JewelleryShop</a>
<br/><br/>
<a href="http://localhost/project/jewels/materials/getmaterialsinfo.php">Materials</a>
<br/><br/>
<a href="http://localhost/project/jewels/payment/getpaymentinfo.php">Payment</a>
<br/><br/>
<a href="http://localhost/project/jewels/sale/getsaleinfo.php">Sales</a>
<br/><br/>
<a href="http://localhost/project/jewels/security/getsecurityinfo.php">Security</a>
<br/><br/>
<a href="http://localhost/project/jewels/order/getorderinfo.php">Order</a>
<br/><br/>
<a href="http://localhost/project/jewels/supplier/getsupplierinfo.php">Supplier</a>
</div>
<div style="width: 1000px; margin-left: 160px; margin-top: 10px; position: absolute; top: 100px;">

<?php
require_once('../../mysqli_connect.php');

if(isset($_POST['update'])){
$UpdateQuery = "UPDATE sale SET cashier_id = '$_POST[cashier_id]', customer_id = '$_POST[customer_id]', payment_id = '$_POST[payment_id]'";
if(mysqli_query($dbc, $UpdateQuery)){
echo"Updated";
}
 else{
echo "unable to update";
}
}
 
$response = @mysqli_query($dbc, "SELECT sale_id, cashier_id, customer_id, payment_id FROM `sale` WHERE 1");
 
echo '<table align="left"
cellspacing="5" cellpadding="4">
<tr>
<td align="left"><b>sale_id</b></td>
<td align="left"><b>cashier_id</b></td>
<td align="left"><b>customer_id</b></td>
<td align="left"><b>payment_id</b></td>
</tr>';
 
while($row = mysqli_fetch_array($response)){
echo '<form action="updatesale.php" method ="post">';
echo '<tr>';
echo "<td align='left' style='display:none;'>" . "<input type = 'text' name = 'sale_id'  value ="  . $row['sale_id'] . " </td>";
echo "<td align='left'>" . "<p>"  . $row['sale_id'] . "</p> </td>";

echo "<td align='left'>" . "<input type = 'text' name = 'cashier_id' value ="  . $row['cashier_id'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'customer_id' value ="  . $row['customer_id'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'payment_id' value ="  . $row['payment_id'] .    " </td>";


echo "<td align='left'>" . "<input class = 'field' type = 'submit' name = 'update' value = 'UPDATE'>" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";
 
?>

</div>
</body>
</html>
