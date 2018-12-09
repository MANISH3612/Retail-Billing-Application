<?php
	$billid=$_POST['billid'];
	$cusid=$_POST['cusid'];
	$empid=$_POST['empid'];
	$total=$_POST['total'];
	$totalitems=$_POST['totalitems'];
	$date=date('y/m/d');
	$link = mysqli_connect("localhost","root","","retail");
	if(!mysqli_connect_error())
	{
		$query = "Update bill SET CusId = '$cusid',TotalItems = '$totalitems',BillAmount = '$total' where BillId = '$billid' ";
		$query1 = "Update payment SET PayAmount = '$total',CusId = '$cusid',BillId = '$billid' where PayId = '$billid' ";
		mysqli_query($link,$query);
		mysqli_query($link,$query1);
	}
	session_start();
	$_SESSION['update']=1;
?>