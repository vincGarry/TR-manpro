<?php
	if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
	if(isset($_POST['edit'])){
		$tbcustomer = simplexml_load_file('data/tbpenerima.xml');
		foreach($tbcustomer->penerima as $customer){
			if($customer->id_penerima == $_POST['id_penerima']){
				$customer->nama_penerima = $_POST['nama'];
				$customer->alamat_penerima = $_POST['alamat'];
				$customer->nomor_telepon_penerima = $_POST['nomor_telepon'];
				break;
			}
		}
		file_put_contents('data/tbpenerima.xml', $tbcustomer->asXML());
		header('location: indexdatacustomer.php');
	}
	else{
		header('location: indexdatacustomer.php');
	}
