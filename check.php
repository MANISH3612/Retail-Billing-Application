<?php
	session_start();
	$id = $_POST['cusid'];
	$_SESSION['cusid']=$id;
	$link = mysqli_connect("localhost","root","","retail");
	if(!mysqli_connect_error())
	{
		$query = "Select * from customer where cusid = '$id' ";
		$res = mysqli_query($link,$query);
		if(mysqli_num_rows($res) > 0)
		{
			$row=mysqli_fetch_array($res);
			echo "Customer details :<br>Name : ".$row[1]."<br>Mobile : ".$row[3]."<br>Address : ".$row[4];
		}
		else
			echo "No Such Customer exists.";
	}
	else
		echo "Please Refresh";
?>