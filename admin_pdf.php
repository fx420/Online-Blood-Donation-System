<?php
	function generateRow(){
		$contents = '';
		include_once('dbconn.php');
		$sql = "SELECT * FROM `admin`";

		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($query)){
			$contents .= "
			<tr>
				<td >".$row['prefix'].$row['admin_id']."</td>
				<td >".$row['admin_username']."</td>
				<td >".$row['admin_name']."</td>
				<td >".$row['admin_email']."</td>
				<td >".$row['admin_contact']."</td>
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('vendor/tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Admin Data Report");  
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
    $pdf->AddPage('L','A4');
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$datetime = date("dmY h:i:sa");
    $content = '';  
    $content .= '
      	<h2 align="center">Admin Data Report</h2>
		
      	<table border="1" cellspacing="0" cellpadding="3"  align="center">  
           <tr>  
                <th width="10%">Admin ID</th>
				<th width="20%">Username</th>
				<th width="25%">Name</th> 
				<th width="30%">Email</th> 
				<th width="15%">Contact</th> 
           </tr>  
      '; 
    $content .= generateRow();  
    $content .= '</table>';    
	$pdf->writeHTML($content);
    $pdf->Output('admin_data_report"'.$datetime.'".pdf', 'I');
?>