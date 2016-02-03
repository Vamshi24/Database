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
$UpdateQuery = "UPDATE customer SET name = '$_POST[name]', phone_no = '$_POST[phone_no]', houseno = '$_POST[houseno]', pincode = '$_POST[pincode]',DOB = '$_POST[DOB]', age = '$_POST[age]' WHERE customer_id ='$_POST[customer_id]'";
if(mysqli_query($dbc, $UpdateQuery)){
echo"Updated";
}
 else{
echo "unable to update";
}
}
 
$response = @mysqli_query($dbc, "SELECT * FROM customer");
 
echo '<table align="left"
cellspacing="5" cellpadding="4">
<tr>
<td align="left"><b>customer_id</b></td>
<td align="left"><b>Name</b></td>
<td align="left"><b>phone_no</b></td>
<td align="left" colspan="2"><b>address</b></td>
<td align="left"><b>DOB</b></td>
<td align="left"><b>age</b></td>
</tr>';
 
while($row = mysqli_fetch_array($response)){
echo '<form action="updatecustomer.php" method ="post">';
echo '<tr>';
echo "<td align='left' style='display:none;'>" . "<input type = 'text' name = 'customer_id'  value ="  . $row['customer_id'] . " </td>";
echo "<td align='left'>" . "<p>"  . $row['customer_id'] . "</p> </td>";

echo "<td align='left'>" . "<input type = 'text' name = 'name' value ="  . $row['name'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'phone_no' value ="  . $row['phone_no'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'houseno' value ="  . $row['houseno'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'pincode' value ="  . $row['pincode'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'DOB' value ="  . $row['DOB'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'age' value ="  . $row['age'] .    " </td>";


echo "<td align='left'>" . "<input class = 'field' type = 'submit' name = 'update' value = 'UPDATE'>" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";
 
?>

</div>
</body>
</html>
