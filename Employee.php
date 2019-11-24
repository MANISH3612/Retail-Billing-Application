<?php
	session_start();
	if($_SESSION['pass']!=1)
		header("Location: http://localhost/NewFolder/Login.php");
    $success = "";
	$failure = "";
	if(isset($_POST['submit1']))
	{
		$name = $_POST['emp_name'];
		$email = $_POST['emp_email'];
		$phone = $_POST['emp_phone'];
		$password = $_POST['emp_password'];
		$con_password = $_POST['emp_con_password'];
		$address = $_POST['emp_address'];
		
		if($name!="" && $phone!="" && $password!="" && $con_password!="" && $address!="" && $password==$con_password) 
		{
			$link = mysqli_connect("localhost","root","","retail");
			if(!mysqli_connect_error())
			{
			$query = "INSERT INTO employee (EmpName,EmpPassword,EmpEmail,EmpAddress,EmpPhone) values('$name','$password','$email','$address','$phone') ";
				if(mysqli_query($link,$query))
				{	
					$success = "Employee Registered Successfully!<br>";
					$query = "select last_insert_id() from employee";
					$res = mysqli_query($link,$query);
					$row = mysqli_fetch_array($res);
					$row = $row[0];
					$success = $success." Employee ID = ".$row;
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
		$id = $_POST['emp_id'];
		
		if($id!="") 
		{
			$link = mysqli_connect("localhost","root","","retail");
			if(!mysqli_connect_error())
			{
				$query = "delete from employee where EmpId='$id' ";
				if(mysqli_query($link,$query))
				{	
					$success = "Employee Unregistered Successfully!";
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
		$name = $_POST['Emp_name'];
		$email = $_POST['Emp_email'];
		$phone = $_POST['Emp_phone'];
		$old_password = $_POST['Old_password'];
		$password = $_POST['Password'];
		$con_password = $_POST['Con_password'];
		$address = $_POST['Emp_address'];
		
		$link = mysqli_connect("localhost","root","","retail");
		if(!mysqli_connect_error())
		{
			$query = "Select * from employee where Empid = '$id' ";
			$res = mysqli_query($link,$query);
			if(mysqli_num_rows($res) > 0)
			{
				$result=mysqli_fetch_array($res);
				if($name == "") $name=$result[1];
				if($email == "") $email=$result[3];
				if($address == "") $address=$result[4];
				if($phone == "") $phone=$result[5];
				if($old_password == "") $password1=$result[2];
				if(($old_password != "" && $old_password == $result[2]) || $password != $con_password)
					$failure = "Password mismatch!";
				else
				{
					if($password!="")
						$password1=$password;
						$query = "update employee set EmpName = '$name', EmpEmail = '$email', EmpPhone = '$phone', EmpPassword = '$password1', EmpAddress = '$address' where EmpId = '$id' ";
						if(mysqli_query($link,$query))
						{	
							$success = "Employee Details Updated.";
						}
						else
							$failure = "Couldn't Update.";
				}
			}
			else
				$failure = "Employee Doesn't exists.";
		}
	}
?>

<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="jquery.js"></script>
	
		<title>Employee Management</title>
		
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
				overflow-y:scroll;
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
					<button class="btn btn-primary" id="f1">Add Employee</button>
					<button class="btn btn-danger" id="f2">Remove Employee</button>
					<button class="btn btn-warning" id="f3">Update Employee Details</button>
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
								<label for="emp_name">Employee Name<sup>*</sup></label>
								<input type="text" class="form-control" name="emp_name" id="emp_name">
							</div>
							<div class="form-group">
								<label for="emp_email">Employee Email</label>
								<input type="text" class="form-control" name="emp_email"id="emp_email">
							</div>
							<div class="form-group">
								<label for="emp_phone">Employee Phone Number<sup>*</sup></label>
								<input type="text" class="form-control" name="emp_phone" id="emp_phone">
							</div>
							<div class="form-group">
								<label for="password">Password<sup>*</sup></label>
								<input type="password" class="form-control" name="emp_password" id="password">
							</div>
							<div class="form-group">
								<label for="con_password">Confirm Password<sup>*</sup></label>
								<input type="password" class="form-control" name="emp_con_password" id="con_Password">
							</div>
							<div class="form-group">
								<label for="address">Address<sup>*</sup></label>
								<textarea class="form-control" id="address" name="emp_address"></textarea>
							</div>
							<input type="submit" class="btn btn-primary" name="submit1" value="Register">
						</form>
					</div>
					<div id="form2" class="form">
						<form method="post">
							<div class="form-group">
								<label for="emp_id">Employee ID<sup>*</sup></label>
								<input type="text" class="form-control" name="emp_id" id="emp_id">
							</div>
							<input type="submit" class="btn btn-danger" name="submit2" value="Unregister">
						</form>
					</div>
					<div id="form3" class="form">
						<form method="post">
							<div class="form-group">
								<label for="Emp_id">Employee ID<sup>*</sup></label>
								<input type="text" class="form-control" name="Emp_id" id="Emp_id">
							</div>
							<input type="button" class="btn btn-warning" name="submit3" value="Fetch" onclick="myfuntion();" id="f4">
						</form>
					</div>
					<div id="form4" class="form">
						<form method="post">
							<div class="form-group">
								<label for="Emp_name">Employee Name</label>
								<input type="text" class="form-control" name="Emp_name" id="Emp_name">
							</div>
							<div class="form-group">
								<label for="Emp_email">Employee Email</label>
								<input type="text" class="form-control" name="Emp_email" id="Emp_email">
							</div>
							<div class="form-group">
								<label for="Emp_phone">Employee Phone Number</label>
								<input type="text" class="form-control" name="Emp_phone" id="Emp_phone">
							</div>
							<div class="form-group">
								<label for="Old_password">Old Password</label>
								<input type="password" class="form-control" name="Old_password" id="Old_password">
							</div>
							<div class="form-group">
								<label for="Password">New Password</label>
								<input type="password" class="form-control" name="Password" id="Password">
							</div>
							<div class="form-group">
								<label for="Con_password">Confirm New Password</label>
								<input type="password" class="form-control" name="Con_password" id="Con_password">
							</div>
							<div class="form-group">
								<label for="Address">Address</label>
								<textarea class="form-control" id="Emp_address" name="Emp_address"></textarea>
							</div>
							<input type="submit" class="btn btn-warning" name="submit4" value="Update">
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
			function myfuntion() {
				var empid = $('#Emp_id').val();
				if(empid != "")  
				{	
					$("#form4").css('display','block');
					$("#form1").css('display','none');
					$("#form2").css('display','none');
					$("#form3").css('display','none');
					$.post("EmpUpdate.php",{empid : empid},
					function(data) {
						var out = JSON.parse(data);
						$("#Emp_name").val(out.empname);
						$("#Emp_email").val(out.empemail);
						$("#Emp_phone").val(out.empphone);
						$("#Emp_address").val(out.empaddress);
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
