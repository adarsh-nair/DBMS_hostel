<!DOCTYPE html>
<HTML>
<BODY>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../student.php');
	echo '</div></div>';
$id = $_SESSION["id"];
	$select = 'SELECT * FROM `Hostelite` WHERE `Hostelite_ID` ='.$id.';';
	$result = $connect->query($select);
	$row = $result->fetch_assoc(); 	
echo '<h1 style="padding-left:400px"><u>YOUR PROFILE INFORMATION</u></h1>';
		echo '<img style="margin-left:750px; border: 2px solid black;height:150;width:120px" src="data:image/jpeg;base64,'.base64_encode($row["Pic"]).'"/>';
		echo '<table id="t01" style="margin-left: 400px; max-width: 500px;">';
  echo '<tr>
    <td><div align="left">NAME :</div></td>
    <td>'.$row['Name'].'</td>
  </tr>
  <tr>
    <td><div align="left">ID :</div></td>
    <td>'.$row["Hostelite_ID"].'</td>
  </tr>
  <tr>
    <td><div align="left">ROOM NO. :</div></td>
    <td>'.$row['Room_No'].'</td>
  </tr>
  <tr>
    <td><div align="left">DATE OF BIRTH :</div></td>
    <td>'.$row['DOB'].'</td>
  </tr>
  <tr>
    <td><div align="left">CONTACT NO. : </div></td>
    <td>'.$row['Contact'].'</td>
  </tr>
  <tr>
    <td><div align="left">ADDRESS :</div></td>
    <td>'.$row['Address'].'</td>
  </tr>
  <tr>
    <td><div align="left">EMAIL ID :</div></td>
    <td>'.$row['Email_ID'].'</td>
  </tr>
  <tr>
    <td><div align="left">PARENT\'S NAME :</div></td>
    <td>'.$row['Fname'].'</td>
  </tr>
  <tr>
    <td><div align="left">PARENT\'S CONTACT NO. :</div></td>
    <td>'.$row['Fcontact'].'</td>
  </tr>
  <tr>
    <td><div align="left">FEES :</div></td>';
		if($row['Fees'] == 'Y')
	    echo '<td>Paid</td>';
		else
			echo '<td>Unpaid</td>
  </tr>
</table>';
echo '<br/>';
	$sel = 'SELECT * FROM `In_Out` WHERE `Hostelite_ID` = '.$id.';';
	$result1 = $connect->query($sel); 
	echo '<h3><center>In-Out Timing</center></h3>';
	echo '<table id="t01" style="margin-left: 400px; margin-top: 50px; max-width: 500px;">';
	echo '<tr>
	<th>DATE</th>
	<th>TIME_IN</th>
	<th>TIME_OUT</th>
	</tr>';
	$date = Date("Y-m-d");
	while($row1 = $result1->fetch_array())
	{
		echo "<tr>";
		echo "<td>" . $row1['date'] . "</td>";
		echo "<td>" . $row1['time_in'] . "</td>";
		echo "<td>" . $row1['time_out'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	$essentials = 'SELECT * FROM `Essentials` WHERE `Hostelite_ID` = ' .$id.' ORDER BY Date DESC LIMIT 1';
	$res_ess = $connect->query($essentials);
	if($res_ess->num_rows)
	{
		echo '<br><br>';
		echo '<h3><center>Latest list of items as requested: '.$date.'</center></h3>';
		echo '<table id="t01" style="margin-left: 400px; margin-top: 50px; max-width: 500px;">';
		echo '<tr>
		<th>Sr. No</th>
		<th>Category</th>
		<th>Item Name</th>
		<th>Quantity</th>
		<th>Unit</th>
		</tr>';
		$i= 1;
		$fetch_ess = $res_ess->fetch_assoc();	
		$items = 'SELECT * FROM `Items` WHERE `Sr_No` = '.$fetch_ess["Sr_No"].';';
		$res_items = $connect->query($items);
		while($fetch_items = $res_items->fetch_assoc())
		{
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$fetch_items['Category']. "</td>";
			echo "<td>".$fetch_items['Item_name']. "</td>";
			echo "<td>".$fetch_items['Quantity']. "</td>";
			echo "<td>".$fetch_items['Unit']."</td>";
			echo "</tr>";
			$i = $i + 1;
		}
		echo '</table>';
	}

	$visitor = 'SELECT * FROM `Visitor` WHERE `Date_of_Visit` >= \''.$date.'\'  AND `Hostelite_ID` = '.$id.';';
	$res_visitor = $connect->query($visitor);
	if($res_visitor->num_rows)
	{
		echo '<br><br>';
		echo '<h3><center>List of Visitors</center></h3>';
		echo '<table id="t01" style="margin-left: 400px; margin-top: 50px; max-width: 500px;">';
		echo '<tr>
		<th>Sr. No</th>
		<th>Name</th>
		<th>Room No</th>
		<th>Date of Visit</th>
		</tr>';
		$i = 1;
		while($fetch_visitor= $res_visitor->fetch_assoc())
		{
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$fetch_visitor["Name"].'</td>';
			echo '<td>'.$fetch_visitor["Room_No"].'</td>';
			echo '<td>'.$fetch_visitor["Date_of_Visit"].'</td>';
			echo '</tr>';
			$i = $i + 1;
		}
		echo '</table>';
	}
?>
<br/>
</BODY>
</HTML>
