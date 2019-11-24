<?php
	session_start();
	if($_SESSION['pass']!=1)
		header("Location: http://localhost/NewFolder/Login.php");
	$_SESSION['total']=0;
	$_SESSION['update']=0;
	$_SESSION['totalitems']=0;
	$result=$_SESSION['name']."<br>".$_SESSION['address'];
	$link = mysqli_connect("localhost","root","","retail");
	if(!mysqli_connect_error())
	{
		$id=$_SESSION['ID'];
		$query = "Select * from employee where Empid = '$id' ";
		$res = mysqli_query($link,$query);
		if(mysqli_num_rows($res) > 0)
		{
			$row=mysqli_fetch_array($res);
			$result1="Employee Details:<br>Name:".$row[1]."<br>Phone Number:".$row[5];
		}
		else
			$result1="Please Refresh";		
	}
	else
		$result1="Please Refresh";
	if(!mysqli_connect_error())
	{
		$query = "Select ItemName from inventory ";
		$res = mysqli_query($link,$query);
		if(mysqli_num_rows($res) > 0)
		{
			$i=0;
			$select="";
			while($i<mysqli_num_rows($res))
			{
				$row=mysqli_fetch_array($res);
				$select=$select."<option value='$row[0]'>$row[0]</option>";
				$i=$i+1;
			}	
		}
		else
			$result1="Please Refresh";		
	}
	else
		$result1="Please Refresh";
	if(!mysqli_connect_error())
	{
		$query = "select max(BillId) from bill";
		$res = mysqli_query($link,$query);
		$row = mysqli_fetch_array($res);
		$row = $row[0];
		if($row!="")
			$_SESSION['billid']=$row+1;
		else
			$_SESSION['billid']=1;
		$date=date('y/m/d');
		$billid=$_SESSION['billid'];
		$id=$_SESSION['ID'];
		$query = "Insert Into bill values ('$billid','$id','1','0','$date','0') ";
		$query1 = "Insert Into payment values ('$billid','$date','0','1','$billid') ";
		mysqli_query($link,$query);
		mysqli_query($link,$query1);
	}
?>




<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="jquery.js"></script>
	
		<title>Bills</title>
		
	<script>
		window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button";
		window.onhashchange=function(){window.location.hash="no-back-button";}
	</script>
		
		<style type="text/css">
			#gap {
				margin-bottom:10px;
			}
			#one {
				float:right;
				font-size:175%;
				color:white;
			}
			.border {
				border:1px,solid,grey;
				margin-top:10px;
			}
			.height {
				height:60px;
				background-color:#F8D7DA;
			}
			.height2 {
				height:120px;
				background-color:#F3F3F3;
			}
			#height1 {
				min-height:300px;
				background-color:#F3F3F3;
			}
			#proceed {
				margin-top:10px;
				float:right;
			}
			sup {
				color:red;
				font-size:medium;
			}
			.padding {
				padding:15px;
			}
			.center1 {
				text-align:center;
			}
			.border1 {
				border-left:1px solid grey;
			}
			table.center {
				margin-left:auto;
				margin-right:auto;
			}
			#btn1 {
				display:none;
			}
			.col-sm-4 {
				background-color:white;
				background-image:radial-gradient(circle,#B09CCA,#3E1E4F); 
			}
			#empd {
				background-color:white;
				background-image:radial-gradient(circle,#fff,#785A8F); 
			}
			.col-sm-8 {
				background-color:white;
				background-image:radial-gradient(circle,#fff,#785A8F); 
			}
			#shopn {
				background-color:white;
				background-image:radial-gradient(circle,#B09CCA,#3E1E4F); 
			}
			#itemq {
				background-color:white;
				background-image:radial-gradient(circle,#B09CCA,#3E1E4F); 
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
			  --button-background-color2:346499;
			  --button-background-color3:#C82333;
			  --button-background-color4:962831;
			  --button-background-color5:#E0A800;
			  --button-background-color6:#b78e14;
			  --cursor: pointer;
			  --border-radius: 5px;
			  --border-radius1: 50%;
				--height: 25px;
				--width: 210px;
				--line-height: 25px;
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

	<div class="container">
		<div class="row" id="gap">
			<div class="col-sm-9"></div>
			<div class="col-sm-3"><a href="http://localhost/NewFolder/Dashboard.php" id="one">Dashboard</a></div>
		</div>
		<div class="row border height">
			<div class="col-sm-8 center1" id="shopn">
				<?php echo $result; ?>
			</div>
			<div class="col-sm-4 center1 border1">
				Bill ID:<?php echo $_SESSION['billid']; ?><br>
				Date   :<span id="date"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 border height2 padding center1" id="empd">
				<?php echo $result1; ?>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-8 border height2 padding center1">
				<p id="results"></p>
				<form method="post" id="myform">
					<label for="cus_id">Customer ID<sup>* </sup></label>
					<input type="text" name="cus_id" id="cus_id">
					<input type="button" id="submit" onclick="myFunction();" value="Check">
				</form>
			</div>
		</div>
		<div class="row border height padding" id="itemq">
			<form method="post" id="myform1">
					<label for="item">Item Name<sup>* </sup></label>
					<select name="item_name" id="item"><?php echo $select; ?></select>
					<label for="qty">Quantity<sup>* </sup></label>
					<input type="text" name="item_qty" id="qty">
					<input type="button" id="submit" onclick="myFunction1();" value="Add">
			</form>
		</div>
		<div class="row border padding" id="height1">
			<p id="ch"></p>
		</div>
		<div class="row padding" id="proceed">
			<form action="http://localhost/NewFolder/Payment.php" method="POST">
			<button class="btn btn-primary" id="btn1">Proceed to Payment</button>
			</form>
		</div>
	</div>
	
	<script type="text/javascript">
		function myFunction() {
			var cusid = $('#cus_id').val();
			$.post("check.php",{cusid : cusid},
			function(data) {
				if(data=="No Such Customer exists." || data=="Please Refresh")
				{	
					$('#myform').css("display","block");
					var res = data + '<a href="http://localhost/NewFolder/Customer.php">Add Customer</a> ';
					$('#results').html(res);
				}
				else {
					$('#myform').css("display","none");
					$('#btn1').css("display","block");
					$('#results').html(data);
				}
			});
		}
		var serial=1;
		function myFunction2(billid,callback) {
			var itemname = $('#item').val();
			var itemqty = $('#qty').val();
			var total = 0;
			if(Math.floor(itemqty) == itemqty && $.isNumeric(itemqty) && itemqty > 0) 
			{
				$.post("add.php",{itemname : itemname,itemqty : itemqty,serial : serial,billid:billid},
					function(data) {
						if(serial!=1 && total == data)
							alert("Quantity Not Available.<br>Try Reducing the Quantity.");
						total = data;
						callback(total);
				});
			}
			else
				alert("Enter an Positive Integer.");
		}
		function myFunction1() {
			var billid = <?php Print($_SESSION['billid']); ?>;
			myFunction2(billid,function(total) {
				$.post("Retrieve.php",{billid:billid},
				function(data) {
					var start = "<table class='table table-bordered center'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Item Name</th><th scope='col'>Quantity</th><th scope='col'>Mrp</th><th scope='col'>Total Price</th><th scope='col'>Edit</th><th scope='col'>Delete</th></tr></thead><tbody>";
					var end = "<tr><td colspan='4' align='center' >Total</td><td>" + total + "</td></tr></tbody></table>";
					$('#ch').html(start+data+end);
				});
			});
			serial=serial+1;
			$('#myform1')[0].reset();
		}
		var dNow = new Date();
		var localdate= dNow.getDate() + '/' + (dNow.getMonth()+1) + '/' + dNow.getFullYear();
		$('#date').html(localdate);
		function myFunction3(data) {
			var billid = <?php Print($_SESSION['billid']); ?>;
			var x=$(eval('itemname'+data)).val();
			$.post("inc.php",{billid:billid,x:x},
				function(data1) {
					var total=data1;
				$.post("Retrieve.php",{billid:billid},
					function(data) {
						var start = "<table class='table table-bordered center'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Item Name</th><th scope='col'>Quantity</th><th scope='col'>Mrp</th><th scope='col'>Total Price</th><th scope='col'>Edit</th><th scope='col'>Delete</th></tr></thead><tbody>";
						var end = "<tr><td colspan='4' align='center' >Total</td><td>" + total + "</td></tr></tbody></table>";
						$('#ch').html(start+data+end);
				});	
			});
		}
		function myFunction4(data) {
			var billid = <?php Print($_SESSION['billid']); ?>;
			var x=$(eval('itemname'+data)).val();
			$.post("dec.php",{billid:billid,x:x},
				function(data1) {
					var total=data1;
				$.post("Retrieve.php",{billid:billid},
					function(data) {
						var start = "<table class='table table-bordered center'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Item Name</th><th scope='col'>Quantity</th><th scope='col'>Mrp</th><th scope='col'>Total Price</th><th scope='col'>Edit</th><th scope='col'>Delete</th></tr></thead><tbody>";
						var end = "<tr><td colspan='4' align='center' >Total</td><td>" + total + "</td></tr></tbody></table>";
						$('#ch').html(start+data+end);
				});	
			});
		}
		function myFunction5(data) {
			var billid = <?php Print($_SESSION['billid']); ?>;
			var x=$(eval('itemname'+data)).val();
			$.post("del.php",{billid:billid,x:x},
				function(data1) {
					var total=data1;
				$.post("Retrieve.php",{billid:billid},
					function(data) {
						var start = "<table class='table table-bordered center'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Item Name</th><th scope='col'>Quantity</th><th scope='col'>Mrp</th><th scope='col'>Total Price</th><th scope='col'>Edit</th><th scope='col'>Delete</th></tr></thead><tbody>";
						var end = "<tr><td colspan='4' align='center' >Total</td><td>" + total + "</td></tr></tbody></table>";
						$('#ch').html(start+data+end);
				});	
			});
		}
	</script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
