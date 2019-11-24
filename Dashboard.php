<?php
	session_start();
	if($_SESSION['pass']!=1)
		header("Location: http://localhost/NewFolder/Login.php");
	$_SESSION['name']="Ganesh Stores";
	$_SESSION['address']="J.P.Nagar,Bangalore-98";
?>

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
	
	 <title>Dashboard</title>
	
	<style type="text/css">
		.row {
			height:600px;
		}
		#big {
			width:225px;
			height:225px;
			border-radius:100%;
			background-color:#5F3F6F;
			color:white;
			text-align:center;
			padding-top:65px;
			position:absolute;
			top:36%;
			left:25.5%;
			font-size:150%;
		}
		.circle {
			width:150px;
			height:150px;
			border-radius:100%;
			color:#000000;
			padding-top:39px;
			border: 1px solid #AC97C5;
			font-size:125%;
			box-shadow: inset 0 0 25px 25px #5F3F6F, 0 0 20px black ;

		}
		.circle:active{
			color:black;
		}
		.circle1 {
			width:150px;
			height:150px;
			border-radius:100%;
			color:#000000;
			padding-top:59px;
			border: 1px solid #AC97C5;
			font-size:125%;
			box-shadow: inset 0 0 25px 25px #5F3F6F, 0 0 20px black ;
		}
		#one {
			background-color:#F3F3F3;
			position:absolute;
			left:31%;
			top:8%;
		}
		#two {
			background-color:#F3F3F3;
			position:absolute;
			top:58%;
			
		}
		#three {
			background-color:#F3F3F3;
			position:absolute;
			top:25%;
		}
		#four {
			background-color:#F3F3F3;
			position:absolute;
			left:31%;
			top:77%;
		}
		#five {
			background-color:#F3F3F3;
			position:absolute;
			left:60%;
			top:25%;
		}
		#six {
			background-color:#F3F3F3;
			position:absolute;
			left:60%;
			top:58%;
		}
		.col-sm-4 {
			position:relative;
			top:20px;
		}
		.card {
			height:500px;
			clear:both;
		}
		.card-img-top {
			height:200px;
			border:1px solid grey;
		}
		.card-body {
			background-color:#EFF0F1;
			color: white;
			background-image:radial-gradient(circle,#B09CCA,#603E76); 
		}
		.margin {
			margin-bottom:40px;
			float:right;
		}
		body {
			margin: 0;
		    background-image: url("Image/bg.png");
		    height: 100%; 
		    background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
			background-color:#0C3054;
		}
		:root {
			  --button-color: white;
			  --button-background-color1:#5F3F6F;
			  --button-background-color2:#8D73AA;
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

		}

		.btn-primary:hover {
		    background-color: var(--button-background-color2);
		    background-image:radial-gradient(circle,#B09CCA,#603E76); 
		    border-radius: var(--border-radius1);
		}

	@-webkit-keyframes swing
	{
	    15%
	    {
	        -webkit-transform: translateX(5px);
	        transform: translateX(5px);
	    }
	    30%
	    {
	        -webkit-transform: translateX(-5px);
	       transform: translateX(-5px);
	    } 
	    50%
	    {
	        -webkit-transform: translateX(3px);
	        transform: translateX(3px);
	    }
	    65%
	    {
	        -webkit-transform: translateX(-3px);
	        transform: translateX(-3px);
	    }
	    80%
	    {
	        -webkit-transform: translateX(2px);
	        transform: translateX(2px);
	    }
	    100%
	    {
	        -webkit-transform: translateX(0);
	        transform: translateX(0);
	    }
	}
	@keyframes swing
	{
	    15%
	    {
	        -webkit-transform: translateX(5px);
	        transform: translateX(5px);
	    }
	    30%
	    {
	        -webkit-transform: translateX(-5px);
	        transform: translateX(-5px);
	    }
	    50%
	    {
	        -webkit-transform: translateX(3px);
	        transform: translateX(3px);
	    }
	    65%
	    {
	        -webkit-transform: translateX(-3px);
	        transform: translateX(-3px);
	    }
	    80%
	    {
	        -webkit-transform: translateX(2px);
	        transform: translateX(2px);
	    }
	    100%
	    {
	        -webkit-transform: translateX(0);
	        transform: translateX(0);
	    }
	}
	.circle:hover
	{
	        -webkit-animation: swing 1s ease;
	        animation: swing 1s ease;
	        -webkit-animation-iteration-count: 1;
	        animation-iteration-count: 1;
	        background-image:radial-gradient(circle,#B09CCA,#603E76); 
	        color:#0C3054;
	}
	
	.circle1:hover
	{
	        -webkit-animation: swing 1s ease;
	        animation: swing 1s ease;
	        -webkit-animation-iteration-count: 1;
	        animation-iteration-count: 1;
	        background-image:radial-gradient(circle,#B09CCA,#603E76); 
	        color:#0C3054;
	}
	</style>
	

  </head>
  <body>
    
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div id="big">Billing<br>Application</div>
				<a href="http://localhost/NewFolder/Employee.php" class="btn circle" id="one">Employee<br>Management</a>
				<a href="http://localhost/NewFolder/Customer.php" class="btn circle" id="two">Customer<br>Management</a>
				<a href="http://localhost/NewFolder/Stock.php" class="btn circle" id="three">Inventory<br>Management</a>
				<a href="http://localhost/NewFolder/Purchase.php" class="btn circle" id="six">Stock<br>Purchased</a>
				<a href="http://localhost/NewFolder/Bill.php" class="btn circle1" id="four">Billing</a>
				<a href="http://localhost/NewFolder/Stats.php" class="btn circle1" id="five">Statistics</a>
			</div>
			<div class="col-sm-4">
				<div class="margin"><a class="btn btn-primary" href="http://localhost/NewFolder/Logout.php">Logout</a></div>
				<div class="card">
						<img class="card-img-top" src="Image/shop.jpg" alt="Card image cap">
				    <div class="card-body">
						<h5 class="card-title"><?php echo $_SESSION['name']; ?></h5>
						<p class="card-text"><?php echo $_SESSION['address']; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		
	</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
