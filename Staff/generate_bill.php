<! DOCTYPE html>
<?php
	session_start();	
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$mth = test_input($_POST["mth"]);
		$year= test_input($_POST["year"]);
		if($mth == '01' || $mth == '03' || $mth == '05' || $mth == '07' || $mth == '08' || $mth == '10' || $mth == '12')
		{
			$sd = $year.'-'.$mth.'-01';
			$ed = $year.'-'.$mth.'-31';
		}
		else if($mth == '02' || $mth == '04' || $mth == '06' || $mth == '09' || $mth == '11')
		{
			$sd = $year.'-'.$mth.'-01';
			$ed = $year.'-'.$mth.'-30';
		}
		else
		{
			if($year % 4 != 0)
			{
				$sd = $year.'-'.$mth.'-01';
				$ed = $year.'-'.$mth.'-28';
			}
			else
			{
				$sd = $year.'-'.$mth.'-01';
				$ed = $year.'-'.$mth.'-29';
			}
		}
		$select_id = 'SELECT `Hostelite_ID` FROM `Hostelite`';
		$res_id = $connect->query($select_id);
		while($row = $res_id->fetch_assoc())
		{
			//food 
			$count_f = 'SELECT COUNT(`id`) FROM `Food` WHERE `Hostelite_ID`='.$row['Hostelite_ID'].' AND `date`< \''.$ed.'\' AND `date` > \''.$sd.'\';';
			$res_count_f = $connect->query($count_f);
			$cnt_f = $res_count_f->fetch_assoc();
			if($cnt_f['COUNT(`id`)'])
			{
				$check_f = 'SELECT `id` FROM `Food_Bill` WHERE `Hostelite_ID`='.$row['Hostelite_ID'].' AND `Month`=\''.$mth.'\';';
				$res_check_f = $connect->query($check_f);
				if($res_check_f->num_rows)
				{
					$id_f = $res_check_f->fetch_assoc();
					$update_f = 'UPDATE `Food_Bill`	SET `Total_Count` ='.$cnt_f['COUNT(`id`)'].' WHERE `id` = '.$id_f['id'].';';
					$connect->query($update_f);
				}
				else
				{
					$insert_f = 'INSERT INTO `Food_Bill`(`Hostelite_ID`, `Total_Count`, `Month`) VALUES ('.$row['Hostelite_ID'].','.$cnt_f['COUNT(`id`)'].',\''.$mth.'\');';
					$connect->query($insert_f);
				}
			}

			//laundry
			$count_l = 'SELECT SUM(`Quantity`) FROM `Clothes` WHERE `Hostelite_ID`='.$row['Hostelite_ID'].' AND `date`< \''.$ed.'\' AND `date` > \''.$sd.'\';';
			$res_count_l = $connect->query($count_l);
			$cnt_l = $res_count_l->fetch_assoc();
			if($cnt_l['SUM(`Quantity`)'])
			{
				$check_l = 'SELECT `ID` FROM `Laundry_Bill` WHERE `Hostelite_ID`='.$row['Hostelite_ID'].' AND `Month`=\''.$mth.'\';';
				$res_check_l = $connect->query($check_l);
				if($res_check_l->num_rows)
				{
					$id_l = $res_check_l->fetch_assoc();
					$update_l = 'UPDATE `Laundry_Bill`	SET `Total` ='.$cnt_l['SUM(`Quantity`)'].' WHERE `ID` = '.$id_l['id'].';';
					$connect->query($update_l);
				}
				else
				{
					$insert_l = 'INSERT INTO `Laundry_Bill`(`Hostelite_ID`, `Total`, `Month`) VALUES ('.$row['Hostelite_ID'].','.$cnt_l['SUM(`Quantity`)'].',\''.$mth.'\');';
					$connect->query($insert_l);
				}
				$amount_l = 'UPDATE `Laundry_Bill` SET `Amount` =  (SELECT SUM(`Clothes`.`Total`) FROM `Clothes` WHERE `Hostelite_id`='.$row['Hostelite_ID'].' AND `Date`< \''.$ed.'\' AND `Date` > \''.$sd.'\') WHERE `Hostelite_ID`='.$row['Hostelite_ID'].';';
			$connect->query($amount_l);
			}
		}
		$amount_f = 'UPDATE `Food_Bill` SET `Amount` = `Total_Count`*50 WHERE 1;';
		$connect->query($amount_f);
		
		//total bill
		while($row = $res_id->fetch_assoc())	
		{
			$total = 0;
			$food = 'SELECT `Amount` FROM `Food_Bill` WHERE `Hostelite_ID`='.$row["Hostelite_ID"].' AND `Month` = \''.$mth.'\';';
			$res_food = $connect->query($food);
			if($res_food->num_rows)
			{
				$fetch_food = $res_food->fetch_assoc();
				$total = $fetch_food["Amount"];
			}
			$laundry = 'SELECT `Amount` FROM `Laundry_Bill` WHERE `Hostelite_ID`='.$row["Hostelite_ID"].' AND `Month` = \''.$mth.'\';';
			$res_laundry = $connect->query($laundry);
			if($res_laundry->num_rows)
			{
				$fetch_laundry = $res_laundry->fetch_assoc();
				$total = $total + $fetch_laundry["Amount"];
			}
			if($total)
			{
				$select_tot = 'SELECT * FROM `Total_Bill` WHERE `Hostelite_ID` = '.$row["Hostelite_ID"].' AND `Month`	= \''.$mth.'\';';
				$res_select = $connect->query($select_tot);
				if($res_select->num_rows)
				{
					$update_tot = 'UPDATE `Total_Bill` SET `Total` ='.$total.', `Left_amt` = '.$total.' WHERE `Hostelite_ID`='.$row["Hostelite_ID"].' AND `Month`	= \''.$mth.'\';';
					$connect->query($total);
				}
				else
				{
					$insert_tot = 'INSERT INTO `Total_Bill`(`Hostelite_ID`, `Month`, `Total`, `Left_amt`) VALUES('.$row["Hostelite_ID"].',\''.$mth.'\','.$total.','.$total.');';
					$connect->query($total);
				}
			}
		}
	
	}
	echo '<script>window.alert("Bills have been generated")</script>';
	echo '<script>window.document.location.href=/Hostel/student_first.php</script>';
?>		
