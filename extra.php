 <!DOCTYPE html>
<html lang = "en">
<head>
 <link rel="stylesheet" href="style1.css?<?php echo time(); ?>">
 <link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.min.js"></script>
<title>Spark Foundation</title>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width=device-width , initial-scale=1">
</head>
<body style="background-color:grey;">

<div>

<div class="header">
<h1>Spark Basic Bank Project</h1>
<h2>Customers</h2>
</div>

<div class="navbar">
<a href="index.php" class="left">Home</a>
<a href="customer.php" class="left">Customers</a>
<a href="transaction.php" class="left">Transaction</a>
<a href="transactionhistory.php" class="left">Transaction History</a>
<a href="withdraw.php" class="left">Withdraw</a>
<a href="withdrawhistory.php" class="left">Withdraw History</a>
</div>

<div class="container">
<div class="top-right">
<table id="customer">
<?php
$err = array();
$con = mysqli_connect("localhost","root","","sparkbank");
if($con->connect_error)
die("Connection failed:".$con->connect_error);

$accno=mysqli_real_escape_string($con,$_POST['accountNo']);
$amount=mysqli_real_escape_string($con,$_POST['amount']);
if(count($err)==0){
	echo "<center><h1><u>RECORD BEFORE WITHDRAWAL</u></h1></center>";
	$before=mysqli_query($con,"select Accountno	,FirstName,LastName,PhoneNo,Address,Email,CurrentBalance from customer where AccountNo='$accno'");
	if(mysqli_num_rows($before)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($rows = mysqli_fetch_array($before))
{
echo "<tr>";
echo "<td>" . $rows['Accountno'] . "</td>";
echo "<td>" . $rows['FirstName'] . "</td>";
echo "<td>" . $rows['LastName'] . "</td>";
echo "<td>" . $rows['Email'] . "</td>";
echo "<td>" . $rows['Address'] . "</td>";
echo "<td>" . $rows['PhoneNo'] . "</td>";
echo "<td>" . $rows['CurrentBalance'] . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br></br>";
}


	$result = mysqli_query($con,"select CurrentBalance from customer where AccountNo='$accno'");
	$row = mysqli_fetch_array($result);
	if($row['CurrentBalance']>$amount){
	$left_amt=$row['CurrentBalance']-$amount;
	mysqli_query($con,"update customer set CurrentBalance='$left_amt' where AccountNo='$accno'");

	$date=date("Y-m-d h:i:s");
                
                $done=mysqli_query($con,"insert into withdraw(Accountno,datetime,currentAmount,withdrawAccount) values('$accno','$date','$left_amt','$amount')");
	}
	else{
		echo "<center><h2><i>REQUESTED AMOUNT IS HIGHER THAN CURRENT BALANCE, HENCE CANNOT BE PROCESSED</i></h2></center>";
	}

	echo "<center><h1><u>RECORD AFTER WITHDRAWAL</u></h1></center>";
	$sql=mysqli_query($con,"select Accountno	,FirstName,LastName,PhoneNo,Address,Email,CurrentBalance from customer where Accountno='$accno'");
	if(mysqli_num_rows($sql)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($rows = mysqli_fetch_array($sql))
{
echo "<tr>";
echo "<td>" . $rows['Accountno'] . "</td>";
echo "<td>" . $rows['FirstName'] . "</td>";
echo "<td>" . $rows['LastName'] . "</td>";
echo "<td>" . $rows['Email'] . "</td>";
echo "<td>" . $rows['Address'] . "</td>";
echo "<td>" . $rows['PhoneNo'] . "</td>";
echo "<td>" . $rows['CurrentBalance'] . "</td>";
echo "</tr>";
}
echo "</table></center>";
}
}

	else{
		array_push($err,"No Data Found!!");
	}

mysqli_close($con);
?>

<?php  if (count($err) > 0) : ?>
  <div class="error">
  	<?php foreach ($err as $err) : ?>
  	  <p><?php echo $err ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
</br></br>
<form action="index.php" method="post"/>
</form>
</table>
</div>
</div>

<div class="footer">
<p>Copyright &copy; spark internship project</p>
</div>

</div>
</body>
</html>

