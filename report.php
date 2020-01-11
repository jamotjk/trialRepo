<?php 
function fetch
include ('library/tcpdf.php');


$pdf = new TCPDF('P','mm','A4');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//Page Content
$pdf->AddPage();

//Header
$pdf->SetFont('Helvetica','',16);
$pdf->Cell(190,10,"Skyline Hotel & Restuarant",0,1,'C');


$pdf->SetFont('Helvetica','',10);
$pdf->Cell(190,5,"Room Rate Management",0,1,'C');
$pdf->Ln();
$pdf->Ln();

//$pdf->SetFont('Helvetica','',10);
//$pdf->Cell(10,5,"Date",0);
//$pdf->Cell(40,5,":",0);
//$pdf->Ln();
$pdf->Ln();

$html="
<label>Date:  01/02/2019</label>
<br>
<label>Descritpion: Standard Room Rate</label>
<br>
<br>
<table>
<tr>
<th>Room no</th>
<th>Room Type</th>
<th>Weekend</th>
<th>Weekly</th>
<th>Weekend</th>
<th>Monthly</th>
<th>Date Created</th>
</tr>
<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

<tr>
	
	<td>1001</td>
	<td>Deluxe</td>
	<td>500.00</td>
	<td>900.00</td>
	<td>300.00</td>
	<td>2,000.00</td>
	<td>01/20/19</td>
</tr>

</table>
<style>
table{
	border-collapse:collapse;
}td{
	border:1px solid #888;
}table tr th{
	background-color:#999;
	height:15x;
}

</style>

";


?>

