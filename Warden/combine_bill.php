<?php
	session_start();
	ini_set("session.auto_start", 0);
	require_once('../FPDF/fpdf.php');
	require_once('../connect.php');
	class PDF extends FPDF
	{
		function Food($header, $data)
		{
		  // Colors, line width and bold font
		  $this->SetFillColor(0,0,0);
		  $this->SetTextColor(255);
		  $this->SetDrawColor(128,0,0);
		  $this->SetLineWidth(.3);
		  $this->SetFont('','B');
		  // Header
		  $w = array(15,30, 30, 30, 30, 30);
		  for($i=0;$i<count($header);$i++)
		      $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		  $this->Ln();
		  // Color and font restoration
		  $this->SetFillColor(224,235,255);
		  $this->SetTextColor(0);
		  $this->SetFont('');
		  // Data
		  $fill = false;
		  while($fetch = $data->fetch_assoc())
		  {
		      $this->Cell($w[0],6,$fetch['id'],'LR',0,'L',$fill);
		      $this->Cell($w[1],6,$fetch['Hostelite_ID'],'LR',0,'C',$fill);
		      $this->Cell($w[2],6,$fetch['Total_Count'],'LR',0,'R',$fill);
		      $this->Cell($w[3],6,$fetch['Amount'],'LR',0,'R',$fill);
					$this->Cell($w[4],6,$fetch['payment'],'LR',0,'R',$fill);
		      $this->Cell($w[5],6,$fetch['Month'],'LR',0,'C',$fill);
		      $this->Ln();
		      $fill = !$fill;
		  }
		  // Closing line
		  $this->Cell(array_sum($w),0,'','T');
		}
		function Laundry($header, $data)
		{
		  // Colors, line width and bold font
		  $this->SetFillColor(0,0,0);
		  $this->SetTextColor(255);
		  $this->SetDrawColor(128,0,0);
		  $this->SetLineWidth(.3);
		  $this->SetFont('','B');
		  // Header
		  $w = array(15,30, 30, 30, 30, 30);
		  for($i=0;$i<count($header);$i++)
		      $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		  $this->Ln();
		  // Color and font restoration
		  $this->SetFillColor(224,235,255);
		  $this->SetTextColor(0);
		  $this->SetFont('');
		  // Data
		  $fill = false;
		  while($fetch = $data->fetch_assoc())
		  {
		      $this->Cell($w[0],6,$fetch['ID'],'LR',0,'L',$fill);
		      $this->Cell($w[1],6,$fetch['Hostelite_ID'],'LR',0,'C',$fill);
		      $this->Cell($w[2],6,$fetch['Total'],'LR',0,'R',$fill);
		      $this->Cell($w[3],6,$fetch['Amount'],'LR',0,'R',$fill);
					$this->Cell($w[4],6,$fetch['Payment'],'LR',0,'R',$fill);
		      $this->Cell($w[5],6,$fetch['Month'],'LR',0,'C',$fill);
		      $this->Ln();
		      $fill = !$fill;
		  }
		  // Closing line
		  $this->Cell(array_sum($w),0,'','T');
		}
	}
	$pdf = new PDF();
	$header = array('Sr_No','Hostelite ID', 'Total Count', 'Amount', 'Payment', 'Month');
	$mth = Date('m');
	$select_f ='SELECT * FROM `Food_Bill` WHERE `Month`=\''.$mth.'\'';
	$res_f = $connect->query($select_f);
	$pdf->SetFont('Arial','',14);
	if($res_f->num_rows)
	{
		$pdf->AddPage();
		$pdf->Cell(180,10,'Food Bill',0,1,'C');
		$pdf->Food($header,$res_f);	
	}
	else
		echo '<script>window.alert(\'No food bills for this month\')</script>';
	$select_l ='SELECT * FROM `Laundry_Bill` WHERE `Month`=\''.$mth.'\'';
	$res_l = $connect->query($select_l);
	if($res_l->num_rows)
	{
		$pdf->AddPage();
		$pdf->Cell(180,10,'Laundry Bill',0,1,'C');
		$pdf->Laundry($header,$res_l);
	}
	else
		echo '<script>window.alert(\'No laundry bills for this month\')</script>';
	if($res_f->num_rows != 0 || $res_l->num_rows != 0)
		$pdf->Output();
	else if($res_f->num_rows == 0 && $res_l->num_rows == 0)
		echo '<script>window.document.location.href="/Hostel/warden_first.php"</script>';
?>
