<?php
	session_start();
	$id = $_POST['itemid'];
	$link = mysqli_connect("localhost","root","","retail");
	$_SESSION['UpdateId']=$id;
	$query = "Select * from inventory i,stock s where i.ItemId=s.ItemId and i.ItemId = '$id' ";
	$res = mysqli_query($link,$query);
	if(mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_array($res);
		$empupdate = array ('itemname'=>$row[1],'itemprice'=>$row[2],'itemmaxcap'=>$row[5],'itemcap'=>$row[4]);
		echo json_encode($empupdate);
	}
?>