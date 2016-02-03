<html>
<title>Add Employee</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['name'])){

        // Adds name to array
        $data_missing[] = 'Name';

    } else {

        // Trim white space from the name and store the name
        $name = trim($_POST['name']);

    }

    if(empty($_POST['phone_no'])){

        // Adds name to array
        $data_missing[] = 'phone_no';

    } else{

        // Trim white space from the name and store the name
        $phone_no = trim($_POST['phone_no']);

    }

    if(empty($_POST['address_id'])){

        // Adds name to array
        $data_missing[] = 'address_id';

    } else {

        // Trim white space from the name and store the name
        $address_id = trim($_POST['address_id']);

    }

    if(empty($_POST['salary'])){

        // Adds name to array
        $data_missing[] = 'salary';

    } else {

        // Trim white space from the name and store the name
        $salary = trim($_POST['salary']);

    }

    if(empty($_POST['DOB'])){

        // Adds name to array
        $data_missing[] = 'DOB';

    } else {

        // Trim white space from the name and store the name
        $DOB = trim($_POST['DOB']);

    }

    if(empty($_POST['age'])){

        // Adds name to array
        $data_missing[] = 'age';

    } else {

        // Trim white space from the name and store the name
        $age = trim($_POST['age']);

    }

    
    if(empty($data_missing)){
        
        require_once('../../mysqli_connect.php');
        
        $query = "INSERT INTO employee (employee_id, name, phone_no, address_id,
        salary, DOB, age) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        
        mysqli_stmt_bind_param($stmt, "ssiisi", $name,
                               $phone_no, $address_id, $salary, $DOB,$age);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Employee Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>


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
