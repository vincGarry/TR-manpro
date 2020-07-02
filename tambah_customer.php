<?php
	session_start();
	if(isset($_POST['tambah'])){
		$tbcustomer = simplexml_load_file('data/tbcustomer.xml');
		$maxid = max(array_map('intval',$tbcustomer->xpath("//id_customer")));

		$customer = $tbcustomer->addChild('customer');
		$customer->addChild('id_customer', $maxid + 1);
		$customer->addChild('nama', $_POST['nama']);
		$customer->addChild('alamat', $_POST['alamat']);
		$customer->addChild('email', $_POST['email']);
		$customer->addChild('nomor_telepon', $_POST['nomor_telepon']);
		file_put_contents('data/tbcustomer.xml', $tbcustomer->asXML());
		$_SESSION['message'] = 'Member added successfully';
		header('location: indexdatacustomer.php');
	}
	else{
		$_SESSION['message'] = 'isi dengan lengkap!!';
		header('location: indexdatacustomer.php');
	}
?>