<?php 
	session_start();
	session_destroy();
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
	
		<title>Logout</title>
		
		<style type="text/css">
			body {
				margin-top:50px;
				background-color:#5FBA7D;
			}
			.center {
				margin:auto;
			}
			.margin {
				margin-bottom:50px;
			}
		</style>

	</head>

	<body>

	<div class="container">
		<div class="row">
			<div class="center margin">
				<h1>Logged Out Successfully</h1>
			</div>
		</div>
		<div class="row">
			<div class="center">
				<a class="btn btn-primary" href="http://localhost/NewFolder/Login.php">Login Again</a>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		</script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
