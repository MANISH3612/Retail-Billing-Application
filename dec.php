<?php
	$billid=$_POST['billid'];
	$itemname=$_POST['x'];
	session_start();
	$link = mysqli_connect("localhost","root","","retail");
	if(!mysqli_connect_error())
	{
		$query = "Select i.ItemId,i.ItemPrice from effects e,inventory i where e.ItemId = i.ItemId and e.BillId = '$billid' and i.ItemName = '$itemname' ";
		$res = mysqli_query($link,$query);
		if(mysqli_num_rows($res) > 0)
		{
			$row=mysqli_fetch_array($res);
			$itemid=$row[0];
			$itemprice=$row[1];
			$_SESSION['total']=$_SESSION['total']-$itemprice;
			$query = "Select StkCapacity from stock where ItemId = '$itemid' ";
			$res = mysqli_query($link,$query);
			if(mysqli_num_rows($res) > 0)
			{
				$row=mysqli_fetch_array($res);
				$cap=$row[0];
				$cap=$cap+1;
				$_SESSION['totalitems']=$_SESSION['totalitems']-1;
				$query = "Update stock set StkCapacity = '$cap' where ItemId = '$itemid' ";
				$res = mysqli_query($link,$query);
				$query = "Select ItemQty,Price from effects where ItemId = '$itemid' and BillId = '$billid' ";
				$res = mysqli_query($link,$query);
				if(mysqli_num_rows($res) > 0)
				{
					$row=mysqli_fetch_array($res);
					$itemqty=$row[0]-1;
					$price=$row[1]-$itemprice;
					if($itemqty==0)
						$query = "delete from effects where ItemId = '$itemid' and BillId = '$billid' ";
					else
						$query = "Update effects set ItemQty = '$itemqty',Price = '$price' where ItemId = '$itemid' and BillId = '$billid' ";
					$res = mysqli_query($link,$query);
					echo $_SESSION['total'];
				}
			}
		}	
	}
?>