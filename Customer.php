<?php
	session_start();
	if($_SESSION['pass']!=1)
		header("Location: http://localhost/NewFolder/Login.php");
    $success = "";
	$failure = "";
	if(isset($_POST['submit1']))
	{
		$name = $_POST['cus_name'];
		$email = $_POST['cus_email'];
		$phone = $_POST['cus_phone'];
		$address = $_POST['cus_address'];
		
		if($name!="" && $phone!="" && $address!="") 
		{
			$link = mysqli_connect("localhost","root","","retail");
			if(!mysqli_connect_error())
			{
			$query = "INSERT INTO customer (cusName,cusEmail,cusAddress,cusMobile) values('$name','$email','$address','$phone') ";
				if(mysqli_query($link,$query))
				{	
					$success = "Customer Registered Successfully!<br>";
					$query = "select last_insert_id() from customer";
					$res = mysqli_query($link,$query);
					$row = mysqli_fetch_array($res);
					$row = $row[0];
					$success = $success." Customer ID = ".$row;
				}
				else
					$failure = "Couldn't Register.";
			}
		}
		else
		{
			$failure = "Enter Values for Required fields.";
		}
	}
	if(isset($_POST['submit2']))
	{
		$id = $_POST['cus_id'];
		
		if($id!="") 
		{
			$link = mysqli_connect("localhost","root","","retail");
			if(!mysqli_connect_error())
			{
				$query = "delete from customer where CusId='$id' ";
				if(mysqli_query($link,$query))
				{	
					$success = "Customer Unregistered Successfully!";
				}
				else
					$failure = "Couldn't UnRegister.";
			}
		}
		else
		{
			$failure = "Enter Values for Required fields.";
		}
	}
	if(isset($_POST['submit4']))
	{
		$id = $_SESSION['UpdateId'];
		$name = $_POST['cus_name'];
		$email = $_POST['cus_email'];
		$phone = $_POST['cus_phone'];
		$address = $_POST['cus_address'];
		
		$link = mysqli_connect("localhost","root","","retail");
		if($id == "")
		{
			$failure = "Enter Required Values";
		}
		else
		{
			if(!mysqli_connect_error())
			{
				$query = "Select * from customer where cusid = '$id' ";
				$res = mysqli_query($link,$query);
				if(mysqli_num_rows($res) > 0)
				{
					$result=mysqli_fetch_array($res);
					if($name == "") $name=$result[1];
					if($email == "") $email=$result[2];
					if($address == "") $address=$result[4];
					if($phone == "") $phone=$result[3];
					$query = "update customer set cusName = '$name', cusEmail = '$email', cusMobile = '$phone', cusAddress = '$address' where CusId = '$id' ";
					if(mysqli_query($link,$query))
					{	
						$success = "Customer Details Updated.";
					}
					else
						$failure = "Couldn't Update.";
				}
				else
					$failure = "Customer Doesn't exists.";
			}
		}
	}
?>

<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="jquery.js"></script>
	
	<script>
		window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button";
		window.onhashchange=function(){window.location.hash="no-back-button";}
	</script>

	
		<title>Customer Management</title>
		
		<style type="text/css">
			#gap {
				margin-bottom:10px;
			}
			#one {
				float:right;
				font-size:175%;
				color:white;
			}
			.btn {
				margin:20px;
			}
			.col-sm-4 {
				border:1px solid grey;
				height:550px;
				margin-bottom:30px;
				background-color:white;
				background-image:radial-gradient(circle,#B09CCA,#603E76); 
			}
			.col-sm-7 {
				border:1px solid grey;
				height:550px;
				padding:30px;
				margin-bottom:30px;
				background-color:#F8D7DA;
				background-image:radial-gradient(circle,#B09CCA,#3E1E4F);
			}
			.form {
				display:none;
			}
			.space {
				margin:10px;
				padding:5px;
				text-align:center;
			}
			sup {
				color:red;
				font-size:medium;
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
			.btn-danger {
			    color: var(--button-color);
			    background-color: var(--button-background-color3);
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

			.btn-danger:hover {
			    background-color: var(--button-background-color4);
			    border-radius: var(--border-radius1);
			}
			.btn-warning {
			    color: var(--button-color);
			    background-color: var(--button-background-color5);
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

			.btn-warning:hover {
			    background-color: var(--button-background-color6);
			    border-radius: var(--border-radius1);
			    color:white;
			}
			label{
				color:white;
			}
		</style>

	</head>

	<body>
		<div class="container">
			<div class="row" id="gap">
				<div class="col-sm-9"></div>
				<div class="col-sm-3"><a href="http://localhost/NewFolder/Dashboard.php" id="one">Dashboard</a></div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<button class="btn btn-primary" id="f1">Add Customer</button>
					<button class="btn btn-danger" id="f2">Remove Customer</button>
					<button class="btn btn-warning" id="f3">Update Customer Details</button>
					<br><br>
					<hr>
					<h3>Output :</h3><br>
					<div class="alert-success space"><?php echo $success; ?></div>
					<div class="alert-danger space"><?php echo $failure; ?></div>
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-7">
					<div id="form1" class="form">
						<form method="post">
							<div class="form-group">
								<label for="cus_name">Customer Name<sup>*</sup></label>
								<input type="text" class="form-control" name="cus_name" id="cus_name">
							</div>
							<div class="form-group">
								<label for="cus_email">Customer Email</label>
								<input type="text" class="form-control" name="cus_email" id="cus_email">
							</div>
							<div class="form-group">
								<label for="cus_phone">Customer Phone Number<sup>*</sup></label>
								<input type="text" class="form-control" name="cus_phone" id="cus_phone">
							</div>
							<div class="form-group">
								<label for="address">Address<sup>*</sup></label>
								<textarea class="form-control" name="cus_address" id="address"></textarea>
							</div>
							<input type="submit" class="btn btn-primary" name="submit1" value="Register">
						</form>
					</div>
					<div id="form2" class="form">
						<form method="post">
							<div class="form-group">
								<label for="cus_id">Customer ID<sup>*</sup></label>
								<input type="text" class="form-control" name="cus_id" id="cus_id">
							</div>
							<input type="submit" class="btn btn-danger" name="submit2" value="Unregister">
						</form>
					</div>
					<div id="form3" class="form">
						<form method="post">
							<div class="form-group">
								<label for="Cus_id">Customer ID<sup>*</sup></label>
								<input type="text" class="form-control" name="cus_id" id="Cus_id">
							</div>
							<input type="button" class="btn btn-warning" name="submit3" value="Fetch" onclick="myfuntion();" id="f4">
						</form>
					</div>
					<div id="form4" class="form">
						<form method="post">
							<div class="form-group">
								<label for="Cus_name">Customer Name</label>
								<input type="text" class="form-control" name="cus_name" id="Cus_name">
							</div>
							<div class="form-group">
								<label for="Cus_email">Customer Email</label>
								<input type="text" class="form-control" name="cus_email" id="Cus_email">
							</div>
							<div class="form-group">
								<label for="Cus_phone">Customer Phone Number</label>
								<input type="text" class="form-control" name="cus_phone" id="Cus_phone">
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<textarea class="form-control" name="cus_address" id="Cus_address"></textarea>
							</div>
							<input type="submit" class="btn btn-warning" name="submit4" value="Update">
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
			function myfuntion() {
				var cusid = $('#Cus_id').val();
				if(cusid != "")  
				{	
					$("#form4").css('display','block');
					$("#form1").css('display','none');
					$("#form2").css('display','none');
					$("#form3").css('display','none');
					$.post("CusUpdate.php",{cusid : cusid},
					function(data) {
						var out = JSON.parse(data);
						$("#Cus_name").val(out.cusname);
						$("#Cus_email").val(out.cusemail);
						$("#Cus_phone").val(out.cusphone);
						$("#Cus_address").val(out.cusaddress);
					});
				}
				else
					alert("Enter ID!");
			}
			$("#f1").click(function() {
				$("#form1").css('display','block');
				$("#form2").css('display','none');
				$("#form3").css('display','none');
				$("#form4").css('display','none');
			})
			$("#f2").click(function() {
				$("#form2").css('display','block');
				$("#form1").css('display','none');
				$("#form3").css('display','none');
				$("#form4").css('display','none');
			})
			$("#f3").click(function() {
				$("#form3").css('display','block');
				$("#form1").css('display','none');
				$("#form2").css('display','none');
				$("#form4").css('display','none');
			})
		</script>
		
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
