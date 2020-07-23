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
			size:1008pt 612pt;
			mso-page-orientation:landscape;
			margin:1.25in 1.0in 1.25in 1.0in;
			mso-header-margin:.5in;
			mso-footer-margin:.5in;
			mso-paper-source:0;}

		div.Section2 {page:Section2;}

		table, th, tr, td {
		font-family: Helvetica;
  		border: 1px solid black;
  		border-spacing: 0px;
  		padding: 0px;
  		text-align: center;
		}
	</style>
</head>
<body>
	<div class=Section2 align="center">
		<h1>DAFTAR PENGIRIMAN</h1>
		<h2>Tanggal :<?php echo date("Y/m/d")?></h2>
		<table>
			<thead>
				<th>ID PENGIRIMAN</th>
				<th>ADMIN</th>
				<th>TANGGAL PENGIRIMAN</th>
				<th>ASAL</th>
				<th>TUJUAN</th>
				<th>BIAYA</th>
				<th>PEMBAYARAN</th>
				<th>KETERANGAN</th>
				<th>PENGIRIM</th>
				<th>PENERIMA</th>
			</thead>
			<tbody>
				<?php
				$file1 = simplexml_load_file('data/tbpengiriman.xml');
				$tbtracking = simplexml_load_file('data/tbtracking.xml');
				$tbbiaya = simplexml_load_file('data/tbbiaya.xml');
				$tbuser = simplexml_load_file('data/tbuser.xml');
				$tbpembayaran = simplexml_load_file('data/tbpembayaran.xml');
				$tbpengirim = simplexml_load_file('data/tbpengirim.xml');
				$tbpenerima = simplexml_load_file('data/tbpenerima.xml');
				foreach($file1->pengiriman as $row){
					$pengiriman = $row->id_pengiriman;
					?>
					<tr>
						<td><?php echo $row->id_pengiriman; ?></td>
						<!-- nama -->
						<td><?php 
							for($i = 0; $i < count($tbuser); $i++){
								$id_user = (string)$tbuser->user[$i]->id_user;
								$nama = (string)$tbuser->user[$i]->nama;
								if ($row->id_user == $id_user) {
									echo $nama;
								}							
							}
						 ?></td>
						<td><?php echo $row->tanggal_pengiriman; ?></td>
						<td><?php echo $row->asal; ?></td>
						<td><?php echo $row->tujuan; ?></td>
						<!-- biaya -->
						<td><?php 
							for($i = 0; $i < count($tbbiaya); $i++){
								$id_biaya = (string)$tbbiaya->biaya[$i]->id_biaya;
								$id_pengiriman = (string)$tbbiaya->biaya[$i]->id_pengiriman;
								$total = (string)$tbbiaya->biaya[$i]->total_biaya;
								if ($row->id_biaya == $id_biaya && $row->id_pengiriman == $id_pengiriman) {
									echo " RP.".$total;
								}							
							}
						?></td>

						<!-- pembayaran -->
						<td><?php 
							for($i = 0; $i < count($tbpembayaran); $i++){
								$id_pembayaran = (string)$tbpembayaran->pembayaran[$i]->id_pembayaran;
								$id_pengiriman = (string)$tbpembayaran->pembayaran[$i]->id_pengiriman;
								$status = (string)$tbpembayaran->pembayaran[$i]->status_pembayaran;
								$total = (string)$tbbiaya->biaya[$i]->total_biaya;
								if ($row->id_pembayaran == $id_pembayaran && $row->id_pengiriman == $id_pengiriman) {
									echo $status;
								}							
							}
						 ?></td>

						 <!-- tracking -->
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

						<!-- pengirim -->
						<td><?php 
							for($i = 0; $i < count($tbpengirim); $i++){
								$id_pengirim = (string)$tbpengirim->pengirim[$i]->id_pengirim;
								$nama_pengirim = (string)$tbpengirim->pengirim[$i]->nama_pengirim;
								if ($row->id_pengirim == $id_pengirim) {
									echo $nama_pengirim;
								}							
							}
						?></td>

						<!-- penerima -->
						<td><?php 
							for($i = 0; $i < count($tbpenerima); $i++){
								$id_penerima = (string)$tbpenerima->penerima[$i]->id_penerima;
								$nama_penerima = (string)$tbpenerima->penerima[$i]->nama_penerima;
								if ($row->id_penerima == $id_penerima) {
									echo $nama_penerima;
								}							
							}
						?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>