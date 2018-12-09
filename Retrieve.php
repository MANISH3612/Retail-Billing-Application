<!DOCTYPE html>
<html>
<head>	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> </head>
<body></body>
</html>
<?php
	$billid=$_POST['billid'];
	$link = mysqli_connect("localhost","root","","retail");
	if(!mysqli_connect_error())
	{
		$ret="";
		$query = "Select * from effects e,inventory i where e.ItemId = i.ItemId and BillId = '$billid' ";
		$res = mysqli_query($link,$query);
		$count = mysqli_num_rows($res);
		if($count > 0)
		{
			$i=1;
			while($i<=$count)
			{	
				$row1=mysqli_fetch_array($res);	
				$ret = $ret."<tr><th scope='row'>".$i."</th><td>".$row1[5]."</td><td>".$row1[2]."</td><td>".$row1[6]."</td><td>".$row1[3]."</td><td><form method='POST'><input type='hidden' value='$row1[5]' name='itemname$i' id='itemname$i'><input type='submit' onclick='myFunction3($i);' value='Increase'</form><form method='POST'><input type='hidden' value='$row1[5]' name='itemname$i' id='itemname$i'><input type='submit' onclick='myFunction4($i);' value='Decrease'</form></td><td><form method='POST'><input type='hidden' value='$row1[5]' name='itemname$i' id='itemname$i'><input type='submit' id='delete' name='delete' onclick='myFunction5($i);' value='Delete'</td></tr>";
				$i=$i+1;
			}
		}	
		echo $ret;
	}
?>