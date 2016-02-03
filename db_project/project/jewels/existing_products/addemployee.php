<html>
<head>
<?php
session_start();
if(!isset($_SESSION['myusername']))
{
echo("login unsccessfull");
header("location: ../login/main_login.php");
}
?>

<title>Add Employee</title>
</head>
<body>
<form action="http://localhost/project/jewels/employee/employeeadded.php" method="post">

<b>Add a New Employee</b>

<p>Name:
<input type="text" name="name" size="50" value="" />
</p>

<p>Phoneno:
<input type="text" name="phone_no" size="20" value="" />
</p>

<p>Address_id:
<input type="text" name="address_id" size="11" value="" />
</p>

<p>Salary:
<input type="text" name="salary" size="30" value="" />
</p>

<p>DOB(YYYY-MM-DD):
<input type="text" name="DOB" size="30" value="" />
</p>

<p>age:
<input type="text" name="age" size="30" maxlength="2" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</html>
