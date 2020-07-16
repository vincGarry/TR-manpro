<?php
	session_start();
	if(isset($_POST['edit'])){
		$tbtracking = simplexml_load_file('data/tbtracking.xml');
		foreach($tbtracking->tracking as $tracking){
			if($tracking->id_tracking == $_POST['id_tracking']){
				$tracking->keterangan_pengiriman = $_POST['keterangan_pengiriman'];
				$tracking->status_penerimaan = $_POST['status_penerimaan'];
				$tracking->tanggal_penerimaan = $_POST['tanggal_penerimaan'];
				break;
			}
		}
		file_put_contents('data/tbtracking.xml', $tbtracking->asXML());
		$_SESSION['message'] = 'Berhasil Diupdate';
		header('location: indexdatatracking.php');
	}
	else{
		$_SESSION['message'] = 'gagal update';
		header('location: indexdatatracking.php');
	}
?>