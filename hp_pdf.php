<?php
	function generateRow(){
		$contents = '';
		include_once('dbconn.php');
		$sql = "SELECT * FROM `healthcare_professional`";

		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			$contents .= "
			<tr>
				<td >".$row['prefix'].$row['healthcarep_id']."</td>
				<td >".$row['healthcarep_username']."</td>
				<td >".$row['healthcarep_name']."</td>
				<td >".$row['healthcarep_email']."</td>
				<td >".$row['healthcarep_contact']."</td>
				<td >".$row['center_id']."</td>
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('vendor/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Healthcare Professional Data Report");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage('L','A$');
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$datetime = date("dmY h:i:sa");  
    $content = '';  
    $content .= '
      	<h2 align="center">Healthcare Professional Data Report</h2>
      	<table border="1" cellspacing="0" cellpadding="3" align="center">  
           <tr>  
                <th width="10%">ID</th>
				<th width="20%">Username</th>
				<th width="20%">Name</th> 
				<th width="25%">Email</th> 
				<th width="15%">Contact</th> 
				<th width="10%">Center ID</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
	$pdf->Output('healthcare_professiona_data_report"'.$datetime.'".pdf', 'I');
	

?>