<?php 
	//print_r($data);
	tcpdf();
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$title = "Aplikasi Teknisi";
	$obj_pdf->SetTitle($title);
	$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, 10, $title, 'Report Barang');
	$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$obj_pdf->SetDefaultMonospacedFont('helvetica');
	$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$obj_pdf->SetFont('helvetica', '', 9);
	$obj_pdf->setFontSubsetting(false);
	$obj_pdf->AddPage();
	ob_start();
	// we can have any view part here like HTML, PHP etc
	?>
		<table>
			<thead>
				<tr>
					<th><b>No</b></th>
					<th><b>ID Barang</b></th>
					<th><b>Nama Barang</b></th>
					<th><b>ID RFID</b></th>
					<th><b>Waktu Daftar</b></th>
				</tr>
			</thead>
			<tbody>
				<?php if ($data->num_rows() > 0) {
						$i = 1;
						foreach ($data->result() as $row)	{ ?>
						<tr>
						<td>
							<?php echo $i;?>
							<br>
						</td>
						<td>
							<?php echo $row->idBarang;?>
						</td>
						<td>
							<?php echo $row->namaBarang;?>
						</td>
						<td>
							<?php echo $row->idRFID;?>
						</td>
						<td>
							<?php echo $row->timestamp;?>
						</td>
						</tr>
				<?php $i++;}} ?>
			</tbody>
		</table>
		
	<?php $content = ob_get_contents();
	ob_clean();
	ob_flush();
	$obj_pdf->writeHTML($content, true, false, true, false, '');
	$obj_pdf->Output('Report.pdf', 'I');
?>