<?php
	session_start();
	require_once('../connect.php');
	require_once('../student.php');
	echo '</div></div>';
	$id = $_SESSION["id"];
	$name = $_SESSION["name"];
	$amt = $_SESSION["amt"];
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$pwd = $_POST["pwd"];
		$date = Date("Y-m-d");
		$flag = 0;
		$valid = 'SELECT `Password` FROM `Payment` WHERE `Hostelite_ID`='.$id.';';
		$res_valid = $connect->query($valid);
		$fetch_valid = $res_valid->fetch_assoc();
		if($pwd == $fetch_valid["Password"])
		{
			$insert = 'INSERT INTO `Payment_Made`(`Hostelite_ID`, `Amount`, `Date`) VALUES('.$id.','.$amt.',\''.$date.'\')';
			$connect->query($insert);
			$select = 'SELECT * FROM `Total_Bill` WHERE `Hostelite_ID`='.$id.' AND `Left_amt` != 0';
			$res = $connect->query($select);
			while($fetch = $res->fetch_assoc())
			{
				if($fetch['Left_amt'] <= $amt)
				{
					$update = 'UPDATE `Total_Bill` SET `Left_amt` = 0, `Paid_amt`=`Total`,`Date`=\''.$date.'\' WHERE `Sr_No`='.$fetch['Sr_No'].';';
					if($connect->query($update))
						$flag = 1;
					$amt = $amt-$fetch['Left_amt'];
					echo $amt;
				}
				else
				{
					$update = 'UPDATE `Total_Bill` SET `Left_amt` ='.($fetch['Left_amt']-$amt).', `Paid_amt`=`Total`,`Date`=\''.$date.'\' WHERE `Sr_No`='.$fetch['Sr_No'].';';
					if($connect->query($update))
						$flag = 1;
				}
			}
			if($amt)
			{
				$flag = 1;
				$msg = 'INSERT INTO `Message_stud`(`Hostelite_ID`,`Sender`,`Date`,`Msg`) VALUES('.$id.',\'Accounts\',\''.$date.'\',\'Please collect the extra amount from the Accounts department.\')';
				$connect->query($msg);
				$insert_amt = 'INSERT INTO `Extra_Amount`(`Hostelite_ID`,`Date`,`Amount`) VALUES('.$id.',\''.$date.'\','.$amt.')';
				$connect->query($insert_amt);
			}
			if($flag == 1)
				echo '<script>window.alert(\'Payment sucessful!!\')</script>';
			else
				echo '<script>window.alert(\'Payment unsucessful\')</script>';
			echo '<script>window.document.location.href=\'/Hostel/Student/payment.php\'</script>';
		}
		else
			echo '<script>window.alert(\'Password was incorrect.\')</script>';
	}
?>
	<div class="col-lg-offset-4 col-lg-4" style="padding-top: 50px; padding-bottom: 50px; width:550px;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>PASSWORD VALIDATION</h2>
					</header>
					<br>
					<h3 style="padding-left:20px">Hey! <?php echo $name; ?></h3>
					<h3 style="padding-left:20px">Payment made to Vastushree</h3>
					<h3 style="padding-left:20px">Amount: <?php echo $amt; ?></h3>
					<br>
					<div class="form-inline form-group">	
						Password:
						<input type="password" name="pwd" class="form-control" required>
					</div>
					</br>  
				<button type ="submit" style="color:#fff; margin-left: 200px" class="btn-submit">SUBMIT</button>
		  </form>
		</div>
</BODY>
</HTML>
