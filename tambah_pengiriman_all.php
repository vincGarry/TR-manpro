<?php
	session_start();
	if(isset($_POST['tambahbaru'])){
		// load tb pengiriman
		$tbpengiriman = simplexml_load_file('data/tbpengiriman.xml');
		$maxidpengiriman = max(array_map('intval',$tbpengiriman->xpath("//id_pengiriman")));
		$idpengirimanbaru = $maxidpengiriman +1;

		// load customer
		$tbcustomer = simplexml_load_file('data/tbcustomer.xml');
		$maxidcustomer = max(array_map('intval',$tbcustomer->xpath("//id_customer")));
		$idcustomerbaru = $maxidcustomer + 1;

		// load user
		$admin = $_SESSION["login"];
		// $tbcustomer = simplexml_load_file('data/tbuser.xml');

		// load biaya 
		$tbbiaya = simplexml_load_file('data/tbbiaya.xml');
		$maxidbiaya = max(array_map('intval',$tbbiaya->xpath("//id_biaya")));
		$idbiayabaru = $maxidbiaya + 1;

		// load tracking
		$tbtracking = simplexml_load_file('data/tbtracking.xml');
		$maxidtracking = max(array_map('intval',$tbtracking->xpath("//id_tracking")));
		$idtrackingbaru = $maxidtracking + 1;

		// load pembayaran
		$tbpembayaran = simplexml_load_file('data/tbpembayaran.xml');
		$maxidpembayaran = max(array_map('intval',$tbpembayaran->xpath("//id_pembayaran")));
		$idpembayaranbaru = $maxidpembayaran + 1;

		// proses data pengririman
		$pengiriman = $tbpengiriman->addChild('pengiriman');
		$pengiriman->addChild('id_pengiriman', $idpengirimanbaru);
		$pengiriman->addChild('id_user', $admin);
		$pengiriman->addChild('tanggal_pengiriman', $_POST['tanggal']);
		$pengiriman->addChild('asal', $_POST['asal']);
		$pengiriman->addChild('tujuan', $_POST['tujuan']);
		$pengiriman->addChild('id_biaya', $idbiayabaru);
		$pengiriman->addChild('id_pembayaran', $idpembayaranbaru);
		$pengiriman->addChild('id_tracking', $idtrackingbaru);
		$pengiriman->addChild('id_customer', $idcustomerbaru);
		$pengiriman->addChild('nama_penerima', $_POST['nama_penerima']);
		$pengiriman->addChild('nomor_telepon_penerima', $_POST['nomor_telepon_penerima']);
		$pengiriman->addChild('email_penerima', $_POST['email_penerima']);
		file_put_contents('data/tbpengiriman.xml', $tbpengiriman->asXML());

		// proses data customer
		$customer = $tbcustomer->addChild('customer');
		$customer->addChild('id_customer', $idcustomerbaru);
		$customer->addChild('nama', $_POST['nama']);
		$customer->addChild('alamat', $_POST['alamat']);
		$customer->addChild('email', $_POST['email']);
		$customer->addChild('nomor_telepon', $_POST['nomor_telepon']);
		file_put_contents('data/tbcustomer.xml', $tbcustomer->asXML());

		// proses data biaya
		$biaya = $tbbiaya->addChild('biaya');
		$biaya->addChild('id_biaya', $idbiayabaru);
		$biaya->addChild('id_pengiriman', $idpengirimanbaru);
		$biaya->addChild('berat_barang', $_POST['berat_barang']);
		$biaya->addChild('panjang_barang', $_POST['panjang_barang']);
		$biaya->addChild('lebar_barang', $_POST['lebar_barang']);
		$biaya->addChild('tinggi_barang', $_POST['tinggi_barang']);
		$biaya->addChild('jarak_pengiriman', 'TESTING');
		$biaya->addChild('jenis_layanan', $_POST['jenis_layanan']);
		$biaya->addChild('jalur_pengiriman', $_POST['jalur_pengiriman']);
		$biaya->addChild('total_biaya', 'TESTING');
		file_put_contents('data/tbbiaya.xml', $tbbiaya->asXML());

		// proses data pembayaran
		$pembayaran = $tbpembayaran->addChild('pembayaran');
		$pembayaran->addChild('id_pembayaran', $idpembayaranbaru);
		$pembayaran->addChild('id_pengiriman', $idpengirimanbaru);
		$pembayaran->addChild('metode_pembayaran', $_POST['metode_pembayaran']);
		$pembayaran->addChild('status_pembayaran', $_POST['status_pembayaran']);
		file_put_contents('data/tbpembayaran.xml', $tbpembayaran->asXML());

		// proses data tracking
		$tracking = $tbtracking->addChild('tracking');
		$tracking->addChild('id_tracking', $idtrackingbaru);
		$tracking->addChild('id_pengiriman', $idpengirimanbaru);
		$tracking->addChild('keterangan_pengiriman', $_POST['keterangan_pengiriman']);
		$tracking->addChild('status_penerimaan', 'TESTING');
		$tracking->addChild('tanggal_penerimaan', 'testing');
		file_put_contents('data/tbtracking.xml', $tbtracking->asXML());

		$_SESSION['message'] = 'sukses';
		header('location: indexdatapengiriman.php');
	}
	else{
		$_SESSION['message'] = 'isi dengan lengkap!!';
		header('location: index.php');
	}
?>