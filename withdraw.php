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
<h2>Withdraw</h2>
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
<img src="img2.jpg" alt="Please Reload!!">


    <form action="extra.php" method="post">
    <div class=text>
        <fieldset>
    <h3>Fill up these details :</h3>
    <label>Enter your Name:</label><br>
    <input type="text"  placeholder="Enter your Name" name="Name" autofocus required><br><br>
    <label>Enter Your Account Number:</label><br>
    <input type="text"  placeholder="Enter account number" name=" accountNo" required><br><br>
     <label>Enter the Amount to Withdraw:</label><br>
    <input type="text"  placeholder="Amount to Withdraw" name="amount" required><br><br>

    <center><input class="button1" type="submit" value="Withdraw"/></center>
    </fieldset>
      </form>
    <br>
    <form action="index.php" method="post"/>
    </form>
</div>

</div>

<div class="footer">
<p>Copyright &copy; spark internship project</p>
</div>

</div>

</body>
</html>


