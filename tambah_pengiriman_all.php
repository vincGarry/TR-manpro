<?php
	session_start();
	if(isset($_POST['tambahbaru'])){
		
		// load tb pengiriman
		$tbpengiriman = simplexml_load_file('data/tbpengiriman.xml');
		$maxidpengiriman = max(array_map('intval',$tbpengiriman->xpath("//id_pengiriman")));
		$idpengirimanbaru = $maxidpengiriman + 1;

		// load customer
		$tbpengirim = simplexml_load_file('data/tbpengirim.xml');
		$maxidpengirim = max(array_map('intval',$tbpengirim->xpath("//id_pengirim")));
		$idpengirimbaru = $maxidpengirim + 1;

		$tbpenerima = simplexml_load_file('data/tbpenerima.xml');
		$maxidpenerima = max(array_map('intval',$tbpenerima->xpath("//id_penerima")));
		$idpenerimabaru = $maxidpenerima + 1;

		// load user
		$admin = $_SESSION["id"];
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

		$berat = $_POST['berat_barang']*1000;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=".$_POST['kota_asal']."&destination=".$_POST['kota_tujuan']."&weight=".$berat."&courier="."jne"."",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key:468d691bd3f44a767a70ef9042959b77"
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data= json_decode($response, true);
		$kotaasal=$data['rajaongkir']['origin_details']['city_name'];
		$kotatujuan=$data['rajaongkir']['destination_details']['city_name'];
		$pengiriman = $tbpengiriman->addChild('pengiriman');
		$pengiriman->addChild('id_pengiriman', $idpengirimanbaru);
		$pengiriman->addChild('id_user', $admin);
		$pengiriman->addChild('tanggal_pengiriman', $_POST['tanggal']);
		$pengiriman->addChild('asal',$kotaasal);
		$pengiriman->addChild('tujuan',$kotatujuan);
		$pengiriman->addChild('id_biaya', $idbiayabaru);
		$pengiriman->addChild('id_pembayaran', $idpembayaranbaru);
		$pengiriman->addChild('id_tracking', $idtrackingbaru);
		$pengiriman->addChild('id_pengirim', $idpengirimbaru);
		$pengiriman->addChild('id_penerima', $idpenerimabaru);
		file_put_contents('data/tbpengiriman.xml', $tbpengiriman->asXML());

		// proses data customer
		$penerima = $tbpenerima->addChild('penerima');
		$penerima->addChild('id_penerima', $idpenerimabaru);
		$penerima->addChild('nama_penerima', $_POST['nama_penerima']);
		$penerima->addChild('alamat_penerima', $_POST['alamat_penerima']);
		$penerima->addChild('nomor_telepon_penerima', $_POST['nomor_telepon_penerima']);
		file_put_contents('data/tbpenerima.xml', $tbpenerima->asXML());

		$pengirim = $tbpengirim->addChild('pengirim');
		$pengirim->addChild('id_pengirim', $idpengirimbaru);
		$pengirim->addChild('nama_pengirim', $_POST['nama_pengirim']);
		$pengirim->addChild('alamat_pengirim', $_POST['alamat_pengirim']);
		$pengirim->addChild('nomor_telepon_pengirim', $_POST['nomor_telepon_pengirim']);
		file_put_contents('data/tbpengirim.xml', $tbpengirim->asXML());

		// proses data biaya
		$biaya = $tbbiaya->addChild('biaya');
		$biaya->addChild('id_biaya', $idbiayabaru);
		$biaya->addChild('id_pengiriman', $idpengirimanbaru);
		$biaya->addChild('berat_barang', $_POST['berat_barang']);
		$biaya->addChild('panjang_barang', $_POST['panjang_barang']);
		$biaya->addChild('lebar_barang', $_POST['lebar_barang']);
		$biaya->addChild('tinggi_barang', $_POST['tinggi_barang']);
		$biaya->addChild('jenis_layanan', $_POST['jenis_layanan']);
		if ($_POST['jenis_layanan']=="reguler") {
			$biaya->addChild('total_biaya', $data['rajaongkir']['results'][0]['costs']['1']["cost"]['0']["value"]);
		} elseif ($_POST['jenis_layanan']=="express") {
			$biaya->addChild('total_biaya', $data['rajaongkir']['results'][0]['costs']['0']["cost"]['0']["value"]);
		}
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