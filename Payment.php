<?php
	session_start();
	$str="Amount to Pay:".$_SESSION['total'];
	$link = mysqli_connect("localhost","root","","retail");
	if($_SESSION['total']==0)
		header('Location: Redirect.html');
	if(isset($_POST['submit']))
	{
		$paytype = $_POST['paytype'];
		$amt = $_POST['amt'];
		if(!($amt <= $_SESSION['total']))
		{
			$str="Paying Too Much!<br>Balance:".$_SESSION['total'];
		}
		else
		{
			if(!mysqli_connect_error())
			{
				$query = "select max(PayId) from payment";
				$res = mysqli_query($link,$query);
				$row = mysqli_fetch_array($res);
				$row = $row[0];
				if($row!="")
					$payid=$row;
				else
					$payid=1;
			}
			$_SESSION['total']=$_SESSION['total']-$amt;
			$query = "INSERT INTO type values('$payid','$paytype','$amt') "; 
			if(!mysqli_query($link,$query))
			{
				$query = "select * from type where PayId = '$payid' and PayType = '$paytype' ";
				$res = mysqli_query($link,$query);
				if(mysqli_num_rows($res) > 0)
				{
					$row1=mysqli_fetch_array($res);
					$amt = $amt + $row1[2];
					$query = "update type set  Amount = '$amt' where PayId = '$payid' and PayType = '$paytype' ";
					mysqli_query($link,$query);
				}
			}
			if($_SESSION['total']==0)
				header('Location: Redirect.html');
			$str="Payment Recieved:".$amt."<br>Balance:".$_SESSION['total'];
		}		
	}
?>

<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="jquery.js"></script>
	
		<title>Payment</title>
		
	<script>
		window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button";
		window.onhashchange=function(){window.location.hash="no-back-button";}
	</script>
		
		<style type="text/css">
			.container {
				margin-top:50px;
			}
			.col-sm-6 {
				border:1px solid grey;
				padding:50px;
				margin:100px 0px;
				background-color:#F3F3F3;
				background-image:radial-gradient(circle,#B09CCA,#3E1E4F); 
			}
			.alert-success {
				margin:10px 0px;
				text-align:center;
				padding:5px;
			}
			body {
				background-color:#0C3054;
				margin: 0;
		    background-image: url("Image/bg.png");
		    height: 100%; 
		    background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
			}
			:root {
			  --button-color: white;
			  --button-background-color1:#007bff;
			  --button-background-color2:#6c757d;
			  --cursor: pointer;
			  --border-radius: 5px;
			  --border-radius1: 50%;
				--height: 30px;
				--width: 95px;
				--line-height: 30px;
				--ext-align: center;
				--transition-property: background, border-radius;
				--transition-duration: .2s, .5s;
				--transition-timing-function: linear, ease-in;
		}
		.btn-primary {
		    color: var(--button-color);
		    background-color: var(--button-background-color1);
		    border-radius: var(--border-radius);
		    cursor: var(--cursor)
		    height:var(--height);
			width:var(--width);
			line-height:var(--line-height);
			ext-align:var(--ext-align);
			transition-property:var(--transition-property);
			transition-duration:var(--transition-duration);
			transition-timing-function:var(--transition-timing-function);
			box-shadow:  0 0 20px black ;

		}

		.btn-primary:hover {
		    background-color: var(--button-background-color2);
		    border-radius: var(--border-radius1);
		}
		</style>

	</head>

	<body>

	<div class="container"><p></p>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">	
				<div class="alert-success"><?php echo $str; ?></div>
				<form method="POST" action="Payment.php">
					<div class="form-group">
						<label for="pay_type">Payment Type</label>
						<select class="form-control" name="paytype" id="pay_type">
							<option value="Cash">Cash</option>
							<option value="Cheque">Cheque</option>
							<option value="Debit card">Debit Card</option>
							<option value="Credit Card">Credit Card</option>
							<option value="Paytm">Paytm</option>
							<option value="Mobikwik">Mobikwik</option>
							<option value="Phonepe">Phonepe</option>
						</select>
					</div>
					<div class="form-group">
						<label for="amt">Amount</label>
						<input type="text" name="amt" class="form-control" id="amt" value="<?php echo $_SESSION['total'];?>">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Pay</button>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
	
	<script type="text/javascript">
		var billid = <?php Print($_SESSION['billid']); ?>;
		var cusid = <?php Print($_SESSION['cusid']); ?>;
		var total = <?php Print($_SESSION['total']); ?>;
		var empid = <?php Print($_SESSION['ID']); ?>;
		var totalitems = <?php Print($_SESSION['totalitems']); ?>;
		var update = <?php Print($_SESSION['update']); ?>;
		if(update == 0)
		{
			$.post("update.php",{billid:billid,cusid:cusid,total:total,empid:empid,totalitems:totalitems},
				function(data) {
					$(p).innerHTML(data);
				}
			);
		}
	</script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
