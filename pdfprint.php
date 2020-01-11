

<?php 

/**
 * 
 */
class pdfprint extends reports
{
	
	
if (isset($_POST['print'])) {
require_once ('library/tcpdf.php');
$obj_pdf= new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetTitle("Testing Print PDF");
$obj_pdf->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->SetFont('helvetica','',12);
$obj_pdf->AddPage();
$content = '';
$content.='
<h3>Testing</h3>
<table class="table table-bordered mt-4" width="50%">
	<tr>
	<th>ID</th>
<th>Code</th>
<th>Type</th>
</tr>
';
$content.= fetch_data();
$content.= '</table>';

$obj_pdf->writeHTML($content);
$obj_pdf->Output("sample.pdf", "I");
}

}
 ?>

