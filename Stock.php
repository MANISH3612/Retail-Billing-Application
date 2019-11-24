<?php
	session_start();
	if($_SESSION['pass']!=1)
		header("Location: http://localhost/NewFolder/Login.php");
    $success = "";
	$failure = "";
	if(isset($_POST['submit1']))
	{
		$name = $_POST['item_name'];
		$price = $_POST['item_price'];
		$cap = $_POST['item_cur_cap'];
		$maxcap = $_POST['item_max_cap'];
		
		if($name!="" && $price!="" && $cap!="" && $maxcap!="") 
		{
			if($maxcap < $cap)
				$failure="Capacity is too high!";
			else
				{
				$link = mysqli_connect("localhost","root","","retail");
				if(!mysqli_connect_error())
				{
					$query = "INSERT INTO inventory (ItemName,ItemPrice) values('$name','$price') ";
					if(mysqli_query($link,$query))
					{	
						$query = "select last_insert_id() from employee";
						$res = mysqli_query($link,$query);
						$row = mysqli_fetch_array($res);
						$row = $row[0];
						$query = "INSERT INTO stock values('$row','$cap','$maxcap') ";
						if(mysqli_query($link,$query))
						{
							$success = "Item Added Successfully!";
						}
						else
						{
							$failure = "Couldn't Add Item.";
							$query = "delete from inventory where ItemID = '$row' ";
							if(!mysqli_query($link,$query))
								$failure = $failure."<br>Some Wrong update in DB";
						}
					}
					else
						$failure = "Couldn't Add Item.";
				}
			}
		}
		else
		{
			$failure = "Enter Values for Required fields.";
		}
	}
	if(isset($_POST['submit2']))
	{
		$id = $_POST['item_id'];
		
		if($id!="") 
		{
			$link = mysqli_connect("localhost","root","","retail");
			if(!mysqli_connect_error())
			{
				$query = "delete from inventory where ItemId='$id' ";
				if(mysqli_query($link,$query))
				{	
					$success = "Item Removed Successfully!";
				}
				else
					$failure = "Couldn't Remove.";
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
		$name = $_POST['Item_name'];
		$price = $_POST['Item_price'];
		$cap = $_POST['Item_cur_cap'];
		$maxcap = $_POST['Item_max_cap'];
		
		$link = mysqli_connect("localhost","root","","retail");
		if($id == "")
		{
			$failure = "Enter Required Values";
		}
		else
		{
			if(!mysqli_connect_error())
			{
				$query = "Select * from inventory i ,stock s where i.ItemId = s.ItemId and i.ItemId = '$id' ";
				$res = mysqli_query($link,$query);
				if(mysqli_num_rows($res) > 0)
				{
					$result=mysqli_fetch_array($res);
					if($name == "") $name=$result[1];
					if($price == "") $price=$result[2];
					if($cap == "") $cap=$result[4];
					if($maxcap == "") $maxcap=$result[5];
					$query = "update inventory set ItemName = '$name', ItemPrice = '$price' where ItemId = '$id' ";
					if(mysqli_query($link,$query))
					{	
						$query = "update stock set  StkCapacity = '$cap', MaxstkCapacity = '$maxcap'  where ItemId = '$id' ";
						if(mysqli_query($link,$query))
						{
							$success = "Item Details Updated.";
						}
						else
						{
							$failure = "Wrong Update occured!";
						}
					}
					else
						$failure = "Couldn't Update.";
				}
				else
					$failure = "Item Doesn't exists.";
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
	
		<title>Inventory Management</title>
		
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
					<button class="btn btn-primary" id="f1">Add Item</button><br>
					<button class="btn btn-danger" id="f2">Remove Item</button><br>
					<button class="btn btn-warning" id="f3">Update Item Details</button>
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
								<label for="item_name">Item Name<sup>*</sup></label>
								<input type="text" class="form-control" name="item_name" id="item_name">
							</div>
							<div class="form-group">
								<label for="item_price">Item Price<sup>*</sup></label>
								<input type="text" class="form-control" name="item_price"id="item_price">
							</div>
							<div class="form-group">
								<label for="item_max_cap">Item's Max Capacity<sup>*</sup></label>
								<input type="text" class="form-control" name="item_max_cap" id="item_max_cap">
							</div>
							<div class="form-group">
								<label for="item_cur_cap">Item's Current Capacity<sup>*</sup></label>
								<input type="text" class="form-control" name="item_cur_cap" id="item_cur_cap">
							</div>
							<input type="submit" class="btn btn-primary" name="submit1" value="Add">
						</form>
					</div>
					<div id="form2" class="form">
						<form method="post">
							<div class="form-group">
								<label for="item_id">Item ID<sup>*</sup></label>
								<input type="text" class="form-control" name="item_id" id="item_id">
							</div>
							<input type="submit" class="btn btn-danger" name="submit2" value="Remove">
						</form>
					</div>
					<div id="form3" class="form">
						<form method="post">
							<div class="form-group">
								<label for="Item_id">Item ID<sup>*</sup></label>
								<input type="text" class="form-control" name="Item_id" id="Item_id">
							</div>
							<input type="button" class="btn btn-warning" name="submit3" value="Fetch" onclick="myfuntion();" id="f4">
						</form>
					</div>
					<div id="form4" class="form">
						<form method="post">
							<div class="form-group">
								<label for="Item_name">Item Name</label>
								<input type="text" class="form-control" name="Item_name" id="Item_name">
							</div>
							<div class="form-group">
								<label for="Item_price">Item Price</label>
								<input type="text" class="form-control" name="Item_price"id="Item_price">
							</div>
							<div class="form-group">
								<label for="Item_max_cap">Item's Max Capacity</label>
								<input type="text" class="form-control" name="Item_max_cap" id="Item_max_cap">
							</div>
							<div class="form-group">
								<label for="Item_cur_cap">Item's Current Capacity</label>
								<input type="text" class="form-control" name="Item_cur_cap" id="Item_cur_cap">
							</div>
							<input type="submit" class="btn btn-warning" name="submit4" value="Update">
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
			function myfuntion() {
				var itemid = $('#Item_id').val();
				if(itemid != "")  
				{	
					$("#form4").css('display','block');
					$("#form1").css('display','none');
					$("#form2").css('display','none');
					$("#form3").css('display','none');
					$.post("StockUpdate.php",{itemid : itemid},
					function(data) {
						var out = JSON.parse(data);
						$("#Item_name").val(out.itemname);
						$("#Item_price").val(out.itemprice);
						$("#Item_cur_cap").val(out.itemcap);
						$("#Item_max_cap").val(out.itemmaxcap);
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
