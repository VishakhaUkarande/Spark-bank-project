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
<h2>Transaction History</h2>
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
<div class="top-left">
<table id="customer">
<?php
$err = array();
$con = mysqli_connect("localhost","root","","sparkbank");
if($con->connect_error)
die("Connection failed:".$con->connect_error);

if(count($err)==0){
	$result = mysqli_query($con,"Select * from transaction");
	
	if(mysqli_num_rows($result)>0){
		echo"<table border='2'>
		<tr>
		<th>Sender Account No.</th>
		<th>Receiver Account No.</th>
        <th>Transferred Amount</th>
		<th>Transfer Date</th>
		<th>Remark</th>
		</tr>";
		
		while($customer=mysqli_fetch_array($result)){
			echo"<tr>";
			echo"<td>" .$customer['senderAccNo']. "</td>";
			echo"<td>" .$customer['receiverAccNo']. "</td>";
			echo"<td>" .$customer['amount']. "</td>";
			echo"<td>" .$customer['datetime']. "</td>";
			echo"<td>" .$customer['remark']. "</td>";
            echo "</tr>";
		}
		echo "</table>";
	}
	else{
		array_push($err,"No Data Found!!");
	}
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

