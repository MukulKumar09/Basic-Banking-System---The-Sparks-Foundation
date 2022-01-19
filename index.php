<html>
<head>
	<title>EDS Banking</title>
<link rel="stylesheet" href="style.css">
<style type="text/css">
	.card{
	display: inline-block;
	border:1px solid #ccc;
	border-radius: 20px;
	box-shadow: 0px 0px 6px #ccc;
	padding: 20px;
	margin: 20px;
	margin-top: 100px;
	font-size: 20px;
	}
	.card:hover{
		background: #eee;
	}
	.card img{
		max-height:250px;
		display: block;
		padding: 50px;
	}
</style>
</head>
<body>
  <?php include 'nv.php';?>
  <div class="tpsp"></div>
  <center>
  <div class="card" onclick="window.location.href='accounts.php'">
  	<img src="img/customer.png">
  	View All Customers
  </div>
  <div class="card" >
  	<img src="img/trans.png" onclick="window.location.href='record.php'">
  	Transaction History
  </div>
</center>
</body>
</html>