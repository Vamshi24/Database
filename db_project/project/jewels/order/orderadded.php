<html>
<?php
session_start();
if(!isset($_SESSION['myusername']) || $_SESSION['myusername'] == "cashier")
{
echo("login unsccessfull");
header("location: http://localhost/project/jewels/login/main_login.php");
}
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

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['customer_id'])){

        // Adds name to array
        $data_missing[] = 'customer_id';

    } else {

        // Trim white space from the name and store the name
        $customer_id = trim($_POST['customer_id']);

    }

    if(empty($_POST['status'])){

        // Adds name to array
        $data_missing[] = 'status';

    } else{

        // Trim white space from the name and store the name
        $status = trim($_POST['status']);

    }

    if(empty($_POST['deliverystatus'])){

        // Adds name to array
        $data_missing[] = 'deliverystatus';

    } else {

        // Trim white space from the name and store the name
        $deliverystatus = trim($_POST['deliverystatus']);

    }
//require_once('../../mysqli_connect.php');


    
    if(empty($data_missing)){
        
  //      require_once('../../mysqli_connect.php');
        
       // $query = "INSERT INTO order (order_id, customer_id, status, deliverystatus) VALUES (NULL, ?, ?, ?)";
       $query = "INSERT INTO `order`(`order_id`, `customer_id`, `status`, `deliverystatus`) VALUES (NULL, ?, ?, ?)";
	//echo $query; 
        $stmt = mysqli_prepare($dbc, $query);
       echo mysqli_connect_error(); 
//echo $stmt;
        
        mysqli_stmt_bind_param($stmt, "iss", $customer_id, $status, $deliverystatus);
        
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


<form action="http://localhost/project/jewels/order/orderadded.php" method="post">

<b>Add a New Employee</b>

<p>customer_id:
<input type="text" name="customer_id" size="50" value="" />
</p>

<p>status:
<input type="text" name="status" size="20" value="" />
</p>

<p>deliverystatus:
<input type="text" name="deliverystatus" size="11" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</div>
</body>
</html>
