<?php
	session_start();
	if(isset($_POST['edit'])){
		$tbcustomer = simplexml_load_file('data/tbcustomer.xml');
		foreach($tbcustomer->customer as $customer){
			if($customer->id_customer == $_POST['id_customer']){
				$customer->nama = $_POST['nama'];
				$customer->alamat = $_POST['alamat'];
				$customer->email = $_POST['email'];
				$customer->nomor_telepon = $_POST['nomor_telepon'];
				break;
			}
		}
		file_put_contents('data/tbcustomer.xml', $tbcustomer->asXML());
		$_SESSION['message'] = 'Berhasil Diupdate';
		header('location: indexdatacustomer.php');
	}
	else{
		$_SESSION['message'] = 'gagal update';
		header('location: indexdatacustomer.php');
	}
