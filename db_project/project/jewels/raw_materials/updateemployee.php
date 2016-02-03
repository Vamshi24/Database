<?php

session_start();
if(!isset($_SESSION['myusername']))
{
echo("login unsccessfull");
header("location: ../login/main_login.php");
}

require_once('../../mysqli_connect.php');

if(isset($_POST['update'])){
$UpdateQuery = "UPDATE employee SET name = '$_POST[name]', phone_no = '$_POST[phone_no]', address_id = '$_POST[address_id]', salary = '$_POST[salary]', DOB = '$_POST[DOB]', age = '$_POST[age]' WHERE employee_id ='$_POST[employee_id]'";
if(mysqli_query($dbc, $UpdateQuery)){
echo"Updated";
}
 else{
echo "unable to update";
}
}
 
$response = @mysqli_query($dbc, "SELECT * FROM employee");
 
echo '<table align="left"
cellspacing="5" cellpadding="4">
<tr>
<td align="left"><b>employee_id</b></td>
<td align="left"><b>Name</b></td>
<td align="left"><b>phone_no</b></td>
<td align="left"><b>address_id</b></td>
<td align="left"><b>salary</b></td>
<td align="left"><b>DOB</b></td>
<td align="left"><b>age</b></td>
</tr>';
 
while($row = mysqli_fetch_array($response)){
echo '<form action="updateemployee.php" method ="post">';
echo '<tr>';
echo "<td align='left' style='display:none;'>" . "<input type = 'text' name = 'employee_id'  value ="  . $row['employee_id'] . " </td>";
echo "<td align='left'>" . "<p>"  . $row['employee_id'] . "</p> </td>";

echo "<td align='left'>" . "<input type = 'text' name = 'name' value ="  . $row['name'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'phone_no' value ="  . $row['phone_no'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'address_id' value ="  . $row['address_id'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'salary' value ="  . $row['salary'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'DOB' value ="  . $row['DOB'] .    " </td>";
echo "<td align='left'>" . "<input type = 'text' name = 'age' value ="  . $row['age'] .    " </td>";


echo "<td align='left'>" . "<input class = 'field' type = 'submit' name = 'update' value = 'UPDATE'>" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";
 
?>
