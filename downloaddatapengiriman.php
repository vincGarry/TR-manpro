<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=data_pengiriman.doc");
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		@page Section1 {
			size:595.45pt 841.7pt; 
			margin:1.0in 1.25in 1.0in 1.25in;
			mso-header-margin:.5in;
			mso-footer-margin:.5in;
			mso-paper-source:0;}

		div.Section1 {page:Section1;}

		@page Section2 {
			size:841.7pt 595.45pt;
			mso-page-orientation:landscape;
			margin:1.25in 1.0in 1.25in 1.0in;
			mso-header-margin:.5in;
			mso-footer-margin:.5in;
			mso-paper-source:0;}

		div.Section2 {page:Section2;}

		table, th, tr, td {
  		border: 1px solid black;
  		border-spacing: 0px;
  		padding: 0px;
  		text-align: center;
		}
	</style>
</head>
<body>
	<div class=Section2 align="center">
		<h1>PENGIRIMAN</h1>
		<p>TABEL :</p>
		<table>
			<thead>
				<th>ID PENGIRIMAN</th>
				<th>ID USER</th>
				<th>TANGGAL PENGIRIMAN</th>
				<th>ASAL</th>
				<th>TUJUAN</th>
				<th>ID BIAYA</th>
				<th>ID PEMBAYARAN</th>
				<th>ID TRACKING</th>
				<th>ID PENGIRIM</th>
				<th>ID PENERIMA</th>
			</thead>
			<tbody>
				<?php
				$file1 = simplexml_load_file('data/tbpengiriman.xml');
				$tbtracking = simplexml_load_file('data/tbtracking.xml');
				foreach($file1->pengiriman as $row){
					?>
					<tr>
						<td><?php echo $row->id_pengiriman; ?></td>
						<td><?php echo $row->id_user; ?></td>
						<td><?php echo $row->tanggal_pengiriman; ?></td>
						<td><?php echo $row->asal; ?></td>
						<td><?php echo $row->tujuan; ?></td>
						<td><?php echo $row->id_biaya; ?></td>
						<td><?php echo $row->id_pembayaran; ?></td>
						<td><?php foreach($tbtracking->tracking as $tracking){
							if ($tracking->id_pengiriman == $row->id_pengiriman) {
								return $tracking->keterangan_pengiriman;
							}
							echo $tracking->keterangan_pengiriman;
						}return 0; ?>
						</td>
						<td><?php echo $row->id_pengirim; ?></td>
						<td><?php echo $row->id_penerima; ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>