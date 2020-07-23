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
				$tbbiaya = simplexml_load_file('data/tbbiaya.xml');
				foreach($file1->pengiriman as $row){
					$pengiriman = $row->id_pengiriman;
					?>
					<tr>
						<td><?php echo $row->id_pengiriman; ?></td>
						<td><?php echo $row->id_user; ?></td>
						<td><?php echo $row->tanggal_pengiriman; ?></td>
						<td><?php echo $row->asal; ?></td>
						<td><?php echo $row->tujuan; ?></td>
						<td><?php 
							for($i = 0; $i < count($tbbiaya); $i++){
								$id_biaya = (string)$tbbiaya->biaya[$i]->id_biaya;
								$id_pengiriman = (string)$tbbiaya->biaya[$i]->id_pengiriman;
								$total = (string)$tbbiaya->biaya[$i]->total_biaya;
								if ($row->id_biaya == $id_biaya && $row->id_pengiriman == $id_pengiriman) {
									echo $total;
								}							
							}
						?></td>
						<td><?php echo $row->id_pembayaran; ?></td>
						<td><?php 
							for($i = 0; $i < count($tbtracking); $i++){
								$id_tracking = (string)$tbtracking->tracking[$i]->id_tracking;
								$id_pengiriman = (string)$tbtracking->tracking[$i]->id_pengiriman;
								$keterangan = (string)$tbtracking->tracking[$i]->keterangan_pengiriman;
								if ($row->id_tracking == $id_tracking && $row->id_pengiriman == $id_pengiriman) {
									echo $keterangan;
								}							
							}
							 ?>
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