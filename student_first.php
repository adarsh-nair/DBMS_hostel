<?php
	session_start();
	require_once('connect.php');
	require_once('student.php');
	echo '</div></div>';
?>
<HTML>
	<BODY>
		<div style="margin-left:20%">
			<button onclick="document.getElementById('msg').style.display='block'" class="bar-item button" style="margin-left:700px; width: 180px; background-color:#333;">MESSAGES</button><br><br>
			<?php
				$id = $_SESSION["id"];
				$sel_name = 'SELECT `Name` FROM `Hostelite` WHERE `Hostelite_ID` = '.$id.';';
				$out = $connect->query($sel_name);
				$name = $out->fetch_assoc();
				echo '<h3>Hey '.$name['Name'].'!</h3>';
			?>
			<div style="margin-left:17%; padding:10px 20px 20px 0px; margin-right: 20%;background:url('./img/notice.png') no-repeat center ;background-size:550px 400px; height:350px;width:500px;color:#fff">
				<h2 style="padding-left: 200px;">NOTICES</h2>
					<div style="padding-left: 55px;">
						<p>Welcome to Home Away from Home!</p>
						<p>All your information has been updated.</p>
						<?php 
							$display = 'SELECT * FROM `Message_stud` WHERE `Hostelite_ID` ='.$id.' AND `Seen` = \'0000-00-00\' ;';
							$res = $connect->query($display);
							$select = 'SELECT `msg` FROM `News` WHERE `n_date` = \''.date("Y-m-d").'\';';
							if($connect->query($select) == TRUE)
							{
							$output = $connect->query($select);
							while($msg = $output->fetch_assoc())
								echo '<p style="color:#ff0000">'.$msg["msg"].'</p><br>';
							}
							$num = $res->num_rows;
							if($num)
								echo '<p style="color:#ff0000">You have '.$num.' unread message(s)!</p><br>';
						?>					
					</div>
			</div>
		</div>
		<div id="msg" class="modal" style="padding-top: 50px">
			<div class="modal-content" style="width:800px;">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('msg').style.display='none'" 
					class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">MESSAGES</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right:30px">
					<?php
						if($res->num_rows)
						{
							echo '<table id="t01" style="margin-top: 70px; max-width: 750px;">';
								echo '<tr>';
									echo '<th>Sr No.</th>';
									echo '<th>Sender</th>';
									echo '<th>Date</th>';
									echo '<th>Message</th> ';
									echo '<th>Seen</th>';
								echo '</tr>';
							$i = 1;
							echo '<form method="post" action="/Hostel/Student/seen.php">';
							while($fetch = $res->fetch_assoc())
							{
								echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$fetch["Sender"].'</td>';
									echo '<td>'.$fetch["Date"].'</td>';
									echo '<td>'.$fetch["Msg"].'</td>';			
									echo '<td><input type ="checkbox" class="form-control" name="seen[]" value="'.$fetch["Sr_No"].'"required/></td>';
								echo '</tr>';
								$i = $i + 1;
							}
							echo '</table>';
							echo '</br>';
							echo '<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 210px">SUBMIT</button>';
							echo '</form>';
						}
						else
							echo '<h4>No new messages to display.</h4>'
					?>
				</div>
				<footer class="container" style="background-color:#0099cc; color:#fff">
					<p style="padding-left:30px;">Mark the messages as seen once you are done reading them.</p>
				</footer>
			</div>
	</div>
	</BODY>
</HTML>
