<?php
	session_start();
	$itemname=$_POST['itemname'];
	$qty=$_POST['itemqty'];
	$serial=$_POST['serial'];
	$billid=$_POST['billid'];
	$price=0;
	$ret=$_SESSION['total'];
	$link = mysqli_connect("localhost","root","","retail");
	if(!mysqli_connect_error())
	{
		$query = "Select * from inventory i ,stock s where i.ItemId = s.ItemId and i.ItemName = '$itemname' ";
		$res = mysqli_query($link,$query);
		if(mysqli_num_rows($res) > 0)
		{
			$row=mysqli_fetch_array($res);
			if($row[4]>=$qty)
			{
				$_SESSION['totalitems']+=$qty;
				$price=$row[2]*$qty;
				$cap=$row[4]-$qty;
				$id=$row[0];
				$query = "update stock set  StkCapacity = '$cap' where ItemId = '$id' ";
				mysqli_query($link,$query);
				$query = "INSERT INTO effects values('$billid','$id','$qty','$price') "; 
				if(!mysqli_query($link,$query))
				{
					$query = "select * from effects where BillId = '$billid' and ItemId = '$id' ";
					$res = mysqli_query($link,$query);
					if(mysqli_num_rows($res) > 0)
					{
						$row1=mysqli_fetch_array($res);
						$qty1= $qty + $row1[2];
						$pri = $price + $row1[3];
						$query = "update effects set  ItemQty = '$qty1',Price = '$pri' where BillId = '$billid' and ItemId = '$id' ";
						mysqli_query($link,$query);
					}
				}
				$_SESSION['total']=$_SESSION['total']+$price;
				$ret=$_SESSION['total'];
				echo $ret;
			}
			else
			{
				echo $ret;
			}
		}
	}
?>