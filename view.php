<?php
	session_start();  //Start the session
	$con=mysqli_connect("localhost","root","","sparkbank");//database connection establish
	if(!$con)
		{
			die("Connection failed");
		}
	//Set session variable
    $_SESSION['user']=$_POST['user'];
	$_SESSION['sender']=$_SESSION['user'];
	$user=$_SESSION['user'];

?>

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
<div class="middle">	
<?php
	if (isset($_SESSION['user']))   //check variable is declare or empty
		{
		$result=mysqli_query($con,"SELECT Accountno,FirstName,LastName,Email,CurrentBalance FROM customer WHERE Accountno='$user'");	
		while($row=mysqli_fetch_array($result))         //fetch user data from database 
		{
		echo "<p><b class='font-weight-bold'>Account No</b> &nbsp;:".$row['Accountno']."</p><br>";
		echo "<p name='sender'><b class='font-weight-bold'>Name&nbsp;&nbsp;</b>&nbsp;&nbsp;: ".$row['FirstName']."&nbsp".$row['LastName']."</p><br>";
		echo "<p><b class='font-weight-bold'>Email ID</b> : ".$row['Email']."</p><br>";
		echo "<p><b class='font-weight-bold'>Balance</b>&nbsp; :&nbsp;<b>Rs.</b> ".$row['CurrentBalance']."</p>";
		}         
		}
	?>
</div>
<form action="index.php" method="post"/>
</form>

<div class="footer">
<p>Copyright &copy; spark internship project</p>
</div>

</div>
</body>
</html>

