<?php
	session_start();
	if($_SESSION['pass']!=1)
		header("Location: http://localhost/NewFolder/Login.php");
	$link = mysqli_connect("localhost","root","","retail");
	if(!mysqli_connect_error())
	{
		$ret="";
		$query = "Select * from temp ";
		$res = mysqli_query($link,$query);
		$count = mysqli_num_rows($res);
		if($count > 0)
		{
			$start = "<table class='table table-bordered table-striped'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Date</th><th scope='col'>Item Name</th><th scope='col'>Quantity</th></thead><tbody>";
			$end = "</tbody></table>";
			$i=1;
			while($i<=$count)
			{	
				$row1=mysqli_fetch_array($res);	
				$ret = $ret."<tr><th scope='row'>".$i."</th><td>".$row1[0]."</td><td>".$row1[1]."</td><td>".$row1[2]."</td></tr>";
				$i=$i+1;
			}
			$ret=$start.$ret.$end;
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
	
		<title>Purchased</title>
		
		<style type="text/css">
			body {
				margin:20px;
				background-color:#6A5ACD;
			}
			.card {
				margin:0 auto;
			}
			.card-header {
				text-align:center;
				background-color:#EFF0F1;
				color:red;
				font-size:150%;
			}
			#gap {
				margin-bottom:30px;
			}
			#one {
				float:right;
				font-size:175%;
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
		<div class="card border-success mb-3" style="width:75%;">
			<div class="card-header">Purchase Order</div>
			<div class="card-body text-success">
				<p class="card-text"><?php echo $ret;?></p>
			</div>
		</div>
	</div>
	
	
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
