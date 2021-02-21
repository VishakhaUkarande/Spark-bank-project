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

    $sender=mysqli_real_escape_string($con,$_POST['senderaccountno']);
    $receiver=mysqli_real_escape_string($con,$_POST['recieveraccountno']);
    $transfer_amt=mysqli_real_escape_string($con,$_POST['transaction']);
    $remark=mysqli_real_escape_string($con,$_POST['remark']);

if(count($err)==0){
            echo "<center><h1><b><u>TRANSFER DETAILS</u></b></h1></center>";
            echo "<center><h2><u>Before Transfer....</u></h2></center>";
            echo "<center><h3><i><u>Sender Details:</u></i></h3></center>";
            $sen=mysqli_query($con,"select Accountno	,FirstName,LastName,PhoneNo,Address,Email,CurrentBalance from customer where AccountNo='$sender'");	
	if(mysqli_num_rows($sen)>0){
		echo "<center><table border='1'>
        <tr>
        <th>Account Number</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Current Balance</th>
        <th>Remark</th>
        </tr>";
        
        while($rows = mysqli_fetch_array($sen))
        {
        echo "<tr>";
        echo "<td>" . $rows['Accountno'] . "</td>";
        echo "<td>" . $rows['FirstName'] . "</td>";
        echo "<td>" . $rows['LastName'] . "</td>";
        echo "<td>" . $rows['Email'] . "</td>";
        echo "<td>" . $rows['Address'] . "</td>";
        echo "<td>" . $rows['PhoneNo'] . "</td>";
        echo "<td>" . $rows['CurrentBalance'] . "</td>";
        echo "<td>" . $remark . "</td>";
        echo "</tr>";
        }
        echo "</table></center></br></br></br>";
        }
		
		echo "<center><h3><i><u>Reciever Details:</u></i></h3></center>";
        $rec=mysqli_query($con,"select Accountno	,FirstName,LastName,PhoneNo,Address,Email,CurrentBalance from customer where AccountNo='$receiver'");
            if(mysqli_num_rows($rec)>0){
        echo "<center><table border='1'>
        <tr>
        <th>Account Number</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Current Balance</th>
        <th>Remark</th>
        </tr>";
        
        while($rows = mysqli_fetch_array($rec))
        {
        echo "<tr>";
        echo "<td>" . $rows['Accountno'] . "</td>";
        echo "<td>" . $rows['FirstName'] . "</td>";
        echo "<td>" . $rows['LastName'] . "</td>";
        echo "<td>" . $rows['Email'] . "</td>";
        echo "<td>" . $rows['Address'] . "</td>";
        echo "<td>" . $rows['PhoneNo'] . "</td>";
        echo "<td>" . $rows['CurrentBalance'] . "</td>";
        echo "<td>" . $remark . "</td>";
        echo "</tr>";
        }
        echo "</table></center></br></br></br></br><hr/>";
        }
		
		 echo "<center><h2><u>After Transfer....</u></h2></center>";
        
        $sen_cur_bal=mysqli_query($con,"select CurrentBalance from customer where AccountNo='$sender'");
        $rec_cur_bal=mysqli_query($con,"select CurrentBalance from customer where AccountNo='$receiver'");
        $row_sen = mysqli_fetch_array($sen_cur_bal);
        $row_rec=mysqli_fetch_array($rec_cur_bal);
		
		if(isset($row_sen['CurrentBalance'])?$row_sen['CurrentBalance']>$transfer_amt:""){
        $diff=$row_sen['CurrentBalance']-$transfer_amt;
        $add=$row_rec['CurrentBalance']+$transfer_amt;
        mysqli_query($con,"update customer set CurrentBalance='$diff' where AccountNo='$sender'");
        mysqli_query($con,"update customer set CurrentBalance='$add' where AccountNo='$receiver'");

        $date=date("Y-m-d h:i:s");
                
        $done=mysqli_query($con,"insert into transaction(datetime,remark,amount,senderAccNo,receiverAccNo) values('$date','$remark','$transfer_amt','$sender','$receiver')");
            }
        else{
        echo "<center><h2><i> AMOUNT IS HIGHER THAN CURRENT BALANCE, HENCE CANNOT BE PROCESSED</i></h2></center>";
            }
        echo "<center><h3><i><u>Sender Details:</u></i></h3></center>";
        $sen=mysqli_query($con,"select Accountno	,FirstName,LastName,PhoneNo,Address,Email,CurrentBalance from customer where AccountNo='$sender'");
		
		if(mysqli_num_rows($sen)>0){
        echo "<center><table border='1'>
        <tr>
        <th>Account Number</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Current Balance</th>
        <th>Remark</th>
        </tr>";
        
        while($rows = mysqli_fetch_array($sen))
        {
        echo "<tr>";
        echo "<td>" . $rows['Accountno'] . "</td>";
        echo "<td>" . $rows['FirstName'] ."</td>";
        echo "<td>" . $rows['LastName'] . "</td>";
        echo "<td>" . $rows['Email'] . "</td>";
        echo "<td>" . $rows['Address'] . "</td>";
        echo "<td>" . $rows['PhoneNo'] . "</td>";
        echo "<td>" . $rows['CurrentBalance'] . "</td>";
        echo "<td>" . $remark . "</td>";
        echo "</tr>";
        }
        echo "</table></center></br></br></br>";
        }
		
		echo "<center><h3><i><u>Reciever Details:</u></i></h3></center>";
        $rec=mysqli_query($con,"select Accountno	,FirstName,LastName,PhoneNo,Address,Email,CurrentBalance from customer where AccountNo='$receiver'");
            if(mysqli_num_rows($rec)>0){
        echo "<center><table border='1'>
        <tr>
        <th>Account Number</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Current Balance</th>
        <th>Remark</th>
        </tr>";
        
        while($rows = mysqli_fetch_array($rec))
        {
        echo "<tr>";
        echo "<td>" . $rows['Accountno'] . "</td>";
        echo "<td>" . $rows['FirstName'] . "</td>";
        echo "<td>" . $rows['LastName'] . "</td>";
        echo "<td>" . $rows['Email'] . "</td>";
        echo "<td>" . $rows['Address'] . "</td>";
        echo "<td>" . $rows['PhoneNo'] . "</td>";
        echo "<td>" . $rows['CurrentBalance'] . "</td>";
        echo "<td>" . $remark . "</td>";
        echo "</tr>";
        }
        echo "</table></center></br></br></br></br>";
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

