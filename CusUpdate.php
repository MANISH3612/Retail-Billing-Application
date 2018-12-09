<?php
	session_start();
	$id = $_POST['cusid'];
	$link = mysqli_connect("localhost","root","","retail");
	$_SESSION['UpdateId']=$id;
	$query = "Select * from customer where Cusid = '$id' ";
	$res = mysqli_query($link,$query);
	if(mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_array($res);
		$empupdate = array ('cusname'=>$row[1],'cusemail'=>$row[2],'cusphone'=>$row[3],'cusaddress'=>$row[4]);
		echo json_encode($empupdate);
	}
?>