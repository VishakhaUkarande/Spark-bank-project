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
<body>

<div>

<div class="header">
<h1 float="left">Spark Basic Bank Project</h1>
<h2>Money Transfer</h2>
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
<img src="img3.jpg" alt="Please Reload!!">

<div>  
   <form action="succesful.php" method="post">
    <div class=text>
    <fieldset>
	<h3>Fill up transaction details :</h3>
	<br>
    <label >Enter your Account Number:</label>
    <input type="text"  placeholder="Account number" name="senderaccountno" autofocus required ><br><br>
    <label>Enter reciever Account Number:</label>
    <input type="text"  placeholder="Account number" name="recieveraccountno" required><br><br>
     <label>Enter the Amount to transfer:</label>
    <input type="text"  placeholder="(in rupees)" name="transaction" required ><br><br>
    <label>Enter the Remarks:</label>
    <input type="text"  name="remark" >

    <center><input class="button" class="a" type="submit" value="Transfer"/></center>
    </fieldset>
    
   </form>
    <br>
    <form action="index.php" method="post"/>
    </form>
  </div>
</div>

</div>

<div class="footer">
<p>Copyright &copy; spark internship project</p>
</div>

</div>

</body>
</html>


