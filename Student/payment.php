<!DOCTYPE html>
<HTML>
<BODY>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../student.php');
	echo '</div></div>';
	$id = $_SESSION["id"];	
	$total = 'SELECT * FROM `Total_Bill` WHERE `Hostelite_ID`='.$id.' AND `Left_amt` > 0;';
	$res_total = $connect->query($total);
	$fetch_row = $res_total->num_rows;
	if($_SERVER["REQUEST_METHOD"] == "POST")	
	{
		$c1 = $_POST["c1"];
		$c2 = $_POST["c2"];
		$c3 = $_POST["c3"];
		$c4 = $_POST["c4"];
		$card = $c1."-".$c2."-".$c3."-".$c4;
		$mth = $_POST["mth"];
		$year =$_POST["year"];
		$cvv = $_POST["cvv"];
		$amt = $_POST["amt"];
		$name = $_POST["name"];
		$payment = 'SELECT * FROM `Payment` WHERE `Hostelite_ID`='.$id.';';
		$res = $connect->query($payment);
		$fetch = $res->fetch_assoc();
		if($card == $fetch["Card_Number"])
		{
			if($mth == $fetch["E_Month"] && $year == $fetch["E_Year"])
			{
				if($cvv == $fetch["CVV"])
				{
					$_SESSION["name"] = $name;
					$_SESSION["amt"] = $amt;
					echo '<script>window.document.location.href=\'password_valid.php\'</script>';
				}
				else
					echo '<script>window.alert(\'CVV Number is incorrect.\')</script>';
			}
			else
				echo '<script>window.alert(\'Month or Year is incorrect.\')</script>';
		}
		else
			echo '<script>window.alert(\'Card Number is incorrect.\')</script>';
	}
?>
	<div class="col-lg-offset-4 col-lg-4" style="padding-top: 20px; padding-bottom: 50px; width:550px;">
			<?php
				if($fetch_row != 0)
				{
					echo '<h3>Amount to be paid: </h3>';
					while($fetch = $res_total->fetch_assoc())
						echo 'For the month '.$fetch["Month"].' amount due is '.$fetch["Left_amt"].'.';
				}
				else
					echo '<script>window.alert(\'All bills have been paid\')</script>';
			?>
				<button onclick="document.getElementById('update').style.display='block'" class="bar-item button" style="margin-left: 600px;width: 180px; background-color:#333;">UPDATE CARD DETAILS</button><br><br>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>CARD PAYMENT</h2>
					</header>
					<br>
					<div class="form-inline form-group">
							Card Number:
							<input type="text" class="form-control" name="c1" pattern="[0-9]{4}" style="margin-left:10px;width:60px;" required>
							<input type="text" class="form-control" name="c2" pattern="[0-9]{4}" style="margin-left:10px;width:60px;" required>
							<input type="text" class="form-control" name="c3" pattern="[0-9]{4}" style="margin-left:10px;width:60px;" required>
							<input type="text" class="form-control" name="c4" pattern="[0-9]{4}" style="margin-left:10px;width:60px;" required>
					</div>
					<div class="form-inline form-group">
							Month:
							<select name="mth" class="form-control" required>
							<option value=1>(01)Jan</option>
							<option value=2>(02)Feb</option>
							<option value=3>(03)Mar</option>
							<option value=4>(04)Apr</option>
							<option value=5>(05)May</option>
							<option value=6>(06)Jun</option>
							<option value=7>(07)Jul</option>
							<option value=8>(08)Aug</option>
							<option value=9>(09)Sep</option>
							<option value=10>(10)Oct</option>
							<option value=11>(11)Nov</option>
							<option value=12>(12)Dec</option>
							</select>
							Year:
							<select name="year" class="form-control" required>
							<option value=2017>2017</option>
							<option value=2018>2018</option>
							<option value=2019>2019</option>
							<option value=2020>2020</option>
							<option value=2021>2021</option>
							</select>
							CVV:
							<input type="password" class="form-control" name="cvv" pattern="{3}" style="width:60px;" required>
					</div>
					<div class="form-group">
							Cardholder's Name:
							<input type="text" class="form-control" name="name" style="width:480px;" required>
					</div>
					</br>  
				<button type ="submit" style="color:#fff; margin-left: 200px" class="btn-submit">SUBMIT</button>
		  </form>
		</div>
		<div id="update" class="modal" style="padding-top: 50px">
			<div class="modal-content">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('update').style.display='none'" 
					class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">UPDATE</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right:30px">
					<form method="post" action="update.php">
					<header class="form-header">
						<h2>CARD UPDATE</h2>
					</header>
					<br>
					<div class="form-inline form-group">
							Card Number:
							<input type="text" class="form-control" name="c1" pattern="[0-9]{4}" style="margin-left:10px;width:60px;" required>
							<input type="text" class="form-control" name="c2" pattern="[0-9]{4}" style="margin-left:10px;width:60px;" required>
							<input type="text" class="form-control" name="c3" pattern="[0-9]{4}" style="margin-left:10px;width:60px;" required>
							<input type="text" class="form-control" name="c4" pattern="[0-9]{4}" style="margin-left:10px;width:60px;" required>
					</div>
					<div class="form-inline form-group">
							Month:
							<select name="mth" class="form-control" required>
							<option value=1>(01)Jan</option>
							<option value=2>(02)Feb</option>
							<option value=3>(03)Mar</option>
							<option value=4>(04)Apr</option>
							<option value=5>(05)May</option>
							<option value=6>(06)Jun</option>
							<option value=7>(07)Jul</option>
							<option value=8>(08)Aug</option>
							<option value=9>(09)Sep</option>
							<option value=10>(10)Oct</option>
							<option value=11>(11)Nov</option>
							<option value=12>(12)Dec</option>
							</select>
							Year:
							<select name="year" class="form-control" required>
							<option value=2017>2017</option>
							<option value=2018>2018</option>
							<option value=2019>2019</option>
							<option value=2020>2020</option>
							<option value=2021>2021</option>
							</select>
							CVV:
							<input type="password" class="form-control" name="cvv" pattern="{3}" style="width:60px;" required>
					</div>
					<div class="form-group">
						Amount:
						<input type="text" class="form-control" name="amt" pattern="[0-9]*" min = 0 required>
					</div>
					<div class="form-group">
							Password:
							<input type="password" class="form-control" name="pass" style="width:480px;" required>
					</div>
					</br>  
				<button type ="submit" style="color:#fff; margin-left: 200px" class="btn-submit">SUBMIT</button>
		  </form>
				</div>
			</div>
	</div>
	</BODY>
</HTML>
