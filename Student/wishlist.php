<HTML>
	<BODY>
		<?php
			session_start();
			require_once('../connect.php');
			require_once('../student.php');
			$date = Date("Y-m-d");
			$mon = date("Y-m-d",strtotime("last Saturday"));
			if(Date("l") == "Monday")
				$mon = $date;
			$select = 'SELECT `Item_name`, COUNT(`Item_name`) FROM `Wish_list` WHERE Date >= \''.$mon.'\' AND Date <= \''.$date.'\' GROUP BY `Item_name`;';
			$res_select = $connect->query($select);
			if($res_select->num_rows)
			{
				echo '<div class="conatiner" style="background:url(\'../img/scroll.jpg\') no-repeat center; background-size:220px 280px; height: 240px; width:180px;margin-left: 250px">';
					echo '<h3 style="margin-left:30px;padding-top:50px;">Wish List</h3>';
					echo '<p style="margin-left:30px;margin-bottom:0px;">Dish Name: Upvotes</p>';	
					echo '<ul style="margin-top:0px;">';
						while($fetch_select = $res_select->fetch_assoc())
								echo '<li>'.$fetch_select['Item_name'].' : '.$fetch_select['COUNT(`Item_name`)'].'</li>';
					echo '</ul>';
				echo '</div>';
			}
			else
			{
				echo '<div class="conatiner" style="background:url(\'../img/scroll.jpg\') no-repeat center; background-size:220px 280px; height: 240px; width:180px; margin-left: 250px">';
					echo '<p>No wish list for this week. Be the first one to make a WISH!</p>';
				echo '</div>';
			}
			$wish_check = 'CALL Wish_check(@cnt,\''.$mon.'\',\''.$date.'\');';
			$connect->query($wish_check);
			$select_check = 'SELECT @cnt;';
			$res_select = $connect->query($select_check);
			$fetch_check = $res_select->fetch_assoc();
			if($fetch_check['@cnt'] < 5)
			{
				echo '<div class="container" style="margin-left:550px; margin-right:500px;">';
					echo '<form method = "post" action = "up_wishlist.php">';
						echo '<div class="form-group">';
							echo 'Dish Name:';
							echo '<input class="form-control" name = "dish" type="text" pattern="{20}" required>';
						echo '</div><br>';
							echo '<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 70px">SUBMIT</button>';
					echo '</form>';
				echo '</div>';
			}
			else
			{
				echo '<div class="container" style="margin-left: 550px;margin-right:500px;">';
					echo '<form method = "post" action = "up_wishlist.php">';
						echo '<div class="form-group">';
							echo 'Dish Name:';
							echo '<select name = "dish" class="form-control" required>';
								$res_select = $connect->query($select);
								while($row = $res_select->fetch_assoc())
									echo '<option value=\''.$row['Item_name'].'\'>'.$row['Item_name'].'</option>';
							echo '</select>';
						echo '</div>';
						echo '<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 70px">SUBMIT</button>';
					echo '</form>';
				echo '</div>';
			}
		?>
	</BODY>
</HTML>
