<?php
	ob_start();
	session_start();
	require_once('../FPDF/fpdf.php');
	require_once('../connect.php');
	class PDF extends FPDF
	{
		function List($header, $data)
		{
		  // Colors, line width and bold font
		  $this->SetFillColor(0,0,0);
		  $this->SetTextColor(255);
		  $this->SetDrawColor(128,0,0);
		  $this->SetLineWidth(.3);
		  $this->SetFont('','B');
		  // Header
		  $w = array(25,50, 45, 30, 30);
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
		      $this->Cell($w[1],6,$fetch['Category'],'LR',0,'L',$fill);
		      $this->Cell($w[2],6,$fetch['Item_name'],'LR',0,'L',$fill);
		      $this->Cell($w[3],6,$fetch['SUM(Quantity)'],'LR',0,'R',$fill);
					$this->Cell($w[4],6,$fetch['Unit'],'LR',0,'L',$fill);
		      $this->Ln();
		      $fill = !$fill;
					$i = $i +1;
		  }
		  // Closing line
		  $this->Cell(array_sum($w),0,'','T');
		}
	}
	$pdf = new PDF();
	$id = $_SESSION["id"];
	//$date = Date("Y-m-d");
	$date = '2017-07-19';
	$header = array('Sr_No','Category', 'Item Name', 'Quantity', 'Unit');
	$today = 'SELECT c.Category, `Item_name`, SUM(Quantity), Unit FROM `Category_Items` as c, `Items` as i, `Essentials` as e WHERE c.`Sr_No` = i.`Category` AND e.`Date` = \''.$date.'\' AND e.`Sr_No` = i.`Sr_No` GROUP BY `Item_name`;';
 	$res = $connect->query($today);
	$pdf->SetFont('Arial','',14);
	$pdf->AddPage();
	//$pdf->Cell(180,10,'Today\'s List',0,1,'C');
	$pdf->Cell(180,10,$id,0,1,'C');
	$pdf->List($header,$res);	
	$pdf->Output();
	ob_end_flush(); 
?>
