<?php
	session_start();
	$id = $_POST['empid'];
	$link = mysqli_connect("localhost","root","","retail");
	$_SESSION['UpdateId']=$id;
	$query = "Select * from employee where Empid = '$id' ";
	$res = mysqli_query($link,$query);
	if(mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_array($res);
		$empupdate = array ('empname'=>$row[1],'empemail'=>$row[3],'empphone'=>$row[5],'empaddress'=>$row[4]);
		echo json_encode($empupdate);
	}
?>