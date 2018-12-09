<?php
	$str = "";
	if($_POST) 
	{
		$num = $_POST['user_number'];
		$name = $_POST['user_name'];
		$password = $_POST['user_password'];
		if($num!="" && $name!="" && $password!="") 
		{
			$link = mysqli_connect("localhost","root","","retail");
			if(!mysqli_connect_error())
			{
				$query = "select * from employee where empid = $num ";
				$result = mysqli_query($link,$query);
				if(mysqli_num_rows($result) > 0)
				{	
					$row=mysqli_fetch_array($result);
					if($name != $row[1]) $str = "Enter Correct Credentails.";
					else if($password != $row[2]) $str = "Enter Correct Credentails.";
					else 
					{	
						session_start();
						$_SESSION['ID']=$num;
						$_SESSION['pass']=1;
						header('Location: http://localhost/NewFolder/Dashboard.php');
					}
				}
				else
					$str = "No Such User exists!";
			}
		}
		else
		{
			$str = "Enter Values for Required fields.";
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script>
		window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button";
		window.onhashchange=function(){window.location.hash="no-back-button";}
	</script>
	
	<title>Login</title>
	
	<style type="text/css">
		#box {
			border:1px solid grey;
			padding:50px;
			margin:100px 0px;
			background-color:#EBC066;
		}
		.alert-danger {
			margin:10px 0px;
			text-align:center;
			padding:5px;
		}
		body {
			background-color:#F73600;
		}
		sup {
			color:red;
			font-size:medium;
		}
	</style>
	

  </head>
  <body>
    
	<div class="container">
	<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
	<div id="box">
	<div class="alert-danger"><?php echo $str; ?></div>
	<form method="post">
		<div class="form-group">
			<label for="user_number">User Id<sup>*</sup></label>
			<input type="text" class="form-control" name="user_number" id="user_number" placeholder="Ex: 0001">
		</div>
		<div class="form-group">
			<label for="user_name">User Name<sup>*</sup></label>
			<input type="text" class="form-control" name="user_name" id="user_name" placeholder="Ex: Ganesh">
		</div>
		<div class="form-group">
			<label for="password">Password<sup>*</sup></label>
			<input type="password" class="form-control" name="user_password" id="Password">
		</div>
		<button class="btn btn-primary">Sign up</button>
	</form>
	</div>
	</div>
	<div class="col-sm-2"></div>
	</div>
	</div>
	
	

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>