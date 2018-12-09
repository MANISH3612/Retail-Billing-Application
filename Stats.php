<?php
	session_start();
	if($_SESSION['pass']!=1)
		header("Location: http://localhost/NewFolder/Login.php");
	$stat1=$stat2=$stat3=$stat4=$stat5=$stat6="";
	$link = mysqli_connect("localhost","root","","retail");
	if(!mysqli_connect_error())
	{
		$query ="select c.CusId,CusName from customer c,view1 v where c.CusId=v.CusId order by billsum DESC ";
		$res = mysqli_query($link,$query);
		$count = mysqli_num_rows($res);
		if($count > 0)
		{
			if($count>3) $count=3;
			$i=1;
			$ret="";
			while($i<=$count)
			{	
				$row1=mysqli_fetch_array($res);	
				$ret = $ret."<tr><th scope='row'>".$i."</th><td>".$row1[0]."</td><td>".$row1[1]."</td>";
				$i=$i+1;
			}
			$start = "<table class='table table-bordered'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Customer Id</th><th scope='col'>Customer Name</th></thead><tbody>";
			$end = "</tbody></table>";
			$stat1 = $start.$ret.$end;	
		}
		$query ="select i.ItemId,ItemName from inventory i,view2 v where i.ItemId=v.ItemId order by ItemQty DESC ";
		$res = mysqli_query($link,$query);
		$count = mysqli_num_rows($res);
		if($count > 0)
		{
			if($count>3) $count=3;
			$i=1;
			$ret="";
			while($i<=$count)
			{	
				$row1=mysqli_fetch_array($res);	
				$ret = $ret."<tr><th scope='row'>".$i."</th><td>".$row1[0]."</td><td>".$row1[1]."</td>";
				$i=$i+1;
			}
			$start = "<table class='table table-bordered'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Item Id</th><th scope='col'>Item Name</th></thead><tbody>";
			$end = "</tbody></table>";
			$stat2 = $start.$ret.$end;	
		}
		$query ="select PayType,sum(Amount) as paysum from type group by PayType order by sum(amount) DESC ";
		$res = mysqli_query($link,$query);
		$count = mysqli_num_rows($res);
		if($count > 0)
		{
			if($count>3) $count=3;
			$i=1;
			$ret="";
			while($i<=$count)
			{	
				$row1=mysqli_fetch_array($res);	
				$ret = $ret."<tr><th scope='row'>".$i."</th><td>".$row1[0]."</td><td>".$row1[1]."</td>";
				$i=$i+1;
			}
			$start = "<table class='table table-bordered'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Payment Type</th><th scope='col'>Total Amount</th></thead><tbody>";
			$end = "</tbody></table>";
			$stat3 = $start.$ret.$end;	
		}
		$query ="select c.CusId,CusName from customer c,view1 v where c.CusId=v.CusId order by billsum ASC ";
		$res = mysqli_query($link,$query);
		$count = mysqli_num_rows($res);
		if($count > 0)
		{
			if($count>3) $count=3;
			$i=1;
			$ret="";
			while($i<=$count)
			{	
				$row1=mysqli_fetch_array($res);	
				$ret = $ret."<tr><th scope='row'>".$i."</th><td>".$row1[0]."</td><td>".$row1[1]."</td>";
				$i=$i+1;
			}
			$start = "<table class='table table-bordered'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Customer Id</th><th scope='col'>Customer Name</th></thead><tbody>";
			$end = "</tbody></table>";
			$stat4 = $start.$ret.$end;		
		}
		$query ="select i.ItemId,ItemName from inventory i,view2 v where i.ItemId=v.ItemId order by ItemQty ASC ";
		$res = mysqli_query($link,$query);
		$count = mysqli_num_rows($res);
		if($count > 0)
		{
			if($count>3) $count=3;
			$i=1;
			$ret="";
			while($i<=$count)
			{	
				$row1=mysqli_fetch_array($res);	
				$ret = $ret."<tr><th scope='row'>".$i."</th><td>".$row1[0]."</td><td>".$row1[1]."</td>";
				$i=$i+1;
			}
			$start = "<table class='table table-bordered'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Item Id</th><th scope='col'>Item Name</th></thead><tbody>";
			$end = "</tbody></table>";
			$stat5 = $start.$ret.$end;	
		}
		$query ="select PayType,sum(Amount) as paysum from type group by PayType order by sum(amount) ";
		$res = mysqli_query($link,$query);
		$count = mysqli_num_rows($res);
		if($count > 0)
		{
			if($count>3) $count=3;
			$i=1;
			$ret="";
			while($i<=$count)
			{	
				$row1=mysqli_fetch_array($res);	
				$ret = $ret."<tr><th scope='row'>".$i."</th><td>".$row1[0]."</td><td>".$row1[1]."</td>";
				$i=$i+1;
			}
			$start = "<table class='table table-bordered'><thead><tr><th scope='col'>Serial NO.</th><th scope='col'>Payment Type</th><th scope='col'>Total Amount</th></thead><tbody>";
			$end = "</tbody></table>";
			$stat6 = $start.$ret.$end;	
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
	
		<title>Statistics</title>
		
		<script>
			window.location.hash="no-back-button";
			window.location.hash="Again-No-back-button";
			window.onhashchange=function(){window.location.hash="no-back-button";}
		</script>
		
		<style type="text/css">
			body {
				margin-top:20px;
				background-color:#723EBF;
			}
			#gap {
				margin-bottom:10px;
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
		<div class="card-deck">
			<div class="row">
				<div class="card text-success bg-light mb-3" style="width: 25rem;">
					<div class="card-header">Highest Buying Customer</div>
					<div class="card-body">
						<p class="card-text"><?php echo $stat1; ?></p>
					</div>
				</div>
				<div class="card text-success bg-light mb-3" style="width: 25rem;">
					<div class="card-header">Most Popular Item</div>
					<div class="card-body">
						<p class="card-text"><?php echo $stat2; ?></p>
					</div>
				</div>
				<div class="card text-success bg-light mb-3" style="width: 25rem;">
					<div class="card-header">Favourable Payment Type</div>
					<div class="card-body">
						<p class="card-text"><?php echo $stat3; ?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card text-success bg-light mb-3" style="width: 25rem;">
					<div class="card-header">Lowest Buying Customer</div>
					<div class="card-body">
						<p class="card-text"><?php echo $stat4; ?></p>
					</div>
				</div>
				<div class="card text-success bg-light mb-3" style="width: 25rem;">
					<div class="card-header">Least Popular Item</div>
					<div class="card-body">
						<p class="card-text"><?php echo $stat5; ?></p>
					</div>
				</div>
				<div class="card text-success bg-light mb-3" style="width: 25rem;">
					<div class="card-header">Unfavourable Payment Type</div>
					<div class="card-body">
						<p class="card-text"><?php echo $stat6; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		</script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>




