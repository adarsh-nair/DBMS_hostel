<?php
	session_start();
	ob_start();
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
		  $w = array(25,50,50);
		  for($i=0;$i<count($header);$i++)
		      $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		  $this->Ln();
		  // Color and font restoration
		  $this->SetFillColor(224,235,255);
		  $this->SetTextColor(0);
		  $this->SetFont('');
		  // Data
		  $fill = false;
						$i = 1;
			$lunch = "Lunch";
			$dinner = "Dinner";
		  while($fetch = $data->fetch_assoc())
		  {
		      $this->Cell($w[0],6,$i,'LR',0,'L',$fill);
					if($fetch["food_type"] = 1)
			      $this->Cell($w[1],6,$lunch,'LR',0,'L',$fill);
					else
			      $this->Cell($w[1],6,$dinner,'LR',0,'L',$fill);
		      $this->Cell($w[2],6,$fetch['date'],'LR',0,'L',$fill);
		      $this->Ln();
		      $fill = !$fill;
					$i = $i +1;
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
			$w = array(25,50,45,40,30);
			for($i=0;$i<count($header);$i++)
			    $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
			$this->Ln();
			// Color and font restoration
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			// Data
			$fill = false;
						$i = 1;
			while($fetch = $data->fetch_assoc())
			{
			    $this->Cell($w[0],6,$i,'LR',0,'L',$fill);
			    $this->Cell($w[1],6,$fetch['Name'],'LR',0,'L',$fill);
			    $this->Cell($w[2],6,$fetch['Quantity'],'LR',0,'L',$fill);
			    $this->Cell($w[3],6,$fetch['Date'],'LR',0,'L',$fill);
			    $this->Cell($w[4],6,$fetch['Total'],'LR',0,'L',$fill);
			    $this->Ln();
			    $fill = !$fill;
					$i = $i +1;
			}
			// Closing line
			$this->Cell(array_sum($w),0,'','T');
		}
	}
	$pdf = new PDF();
	$mth = $_SESSION["mth"];
	$year_mth = '2017-'.$mth;
	$start = $year_mth."-01";
	if($mth == '1' || $mth == '3' || $mth == '5' || $mth == '7' || $mth == '8' || $mth == '10' || $mth == '12')
		$end = $year_mth."-31";
	else if($mth == '2')
		$end = $year_mth."-28";		
	else
		$end = $year_mth."-30";
	$id = $_SESSION["id"];
	$header = array('Sr_No','Food Type','Date');
	$food = 'SELECT `food_type`, `date` FROM `Food` WHERE `Hostelite_ID`='.$id.' AND `date` >= \''.$start.'\' AND `date` <= \''.$end.'\';';
 	$res_f = $connect->query($food);
	$pdf->SetFont('Arial','',14);
	if($res_f->num_rows)
	{
		$pdf->AddPage();
		$pdf->Cell(180,10,'Food Bill',0,1,'C');
		$pdf->Food($header,$res_f);	
	}
	else
	{
		$pdf->AddPage();
		$pdf->Cell(180,10,'No Food Bill entries',0,1,'C');
	}
	$header = array('Sr_No','Category','Quantity','Date', 'Amount');
	$laundry = 'SELECT `Name`,`Quantity`,`Date`,`Total` FROM `Laundry`, `Clothes` WHERE `Hostelite_ID`='.$id.' AND `Cloth_ID`=`Laundry`.`ID` AND `Date` >= \''.$start.'\' AND `Date` <= \''.$end.'\';';
	$res_l = $connect->query($laundry);
	if($res_l->num_rows)
	{
		$pdf->AddPage();
		$pdf->Cell(180,10,'Laundry Bill',0,1,'C');
		$pdf->Laundry($header,$res_l);	
	}
	else
	{
		$pdf->AddPage();
		$pdf->Cell(180,10,'No Laundry Bill entries',0,1,'C');
	}
	if($res_f->num_rows != 0 || $res_l->num_rows != 0)
		$pdf->Output();
	ob_end_flush(); 
?>
