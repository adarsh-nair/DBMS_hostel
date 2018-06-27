<!DOCTYPE html>
<HTML>
<BODY>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../student.php');
	echo '</div></div>';
	$id = $_SESSION["id"];
	$select1 = 'SELECT * FROM `Medical_Report` WHERE `Hostelite_ID` ='.$id.';';
	$result1 = $connect->query($select1);
	$row1 = $result1->fetch_assoc(); 
echo '<h1 style="padding-left:480px"><u>MEDICAL REPORT</u></h1>';
echo '<table id="t01" style="margin-left: 400px; max-width: 500px;">';
  echo '<tr>
    <td>Report ID:</td>
    <td>'.$row1['Report_ID'].'</td>
  </tr>
  <tr>
    <td>Blood Group:</td>
    <td>'.$row1['Blood_Grp'].'</td>
  </tr>
  <tr>
    <td>Height:</td>
    <td>'.$row1['Height'].'</td>
  </tr>
  <tr>
    <td>Weight:</td>
    <td>'.$row1['Weight'].'</td>
  </tr>
  <tr>
    <td>Allergy:</td>
    <td>'.$row1['Allergy'].'</td>
  </tr>
  <tr>
    <td>Date of Report:</td>
    <td>'.$row1['Date_of_Report'].'</td>
  </tr>
 
</table></b><br/><br/><br/>';
?>
</BODY>
</HTML>
