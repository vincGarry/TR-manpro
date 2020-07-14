<?php
	session_start();
	if(isset($_POST['tambahbaru'])){
		$tbuser = simplexml_load_file('data/tbuser.xml');
		$maxiduser = max(array_map('intval',$tbuser->xpath("//id_user")));
		for ($i=0; $i < count($tbuser) ; $i++) {
			$username = (string)$tbuser->user[$i]->username;
			if ($_POST['username']==$username) {
				$_SESSION['message'] = 'Username sudah ada !';
				header('location: karyawan.php');
				die();
			}
		}
		$user = $tbuser->addChild('user');
		$user->addChild('id_user', $maxiduser + 1);
		$user->addChild('username', $_POST['username']);
		$user->addChild('password', $_POST['password']);
		$user->addChild('nama', $_POST['nama']);
		$user->addChild('alamat', $_POST['alamat']);
		$user->addChild('email', $_POST['email']);
		$user->addChild('nomor_telepon', $_POST['nomor_telepon']);
		$user->addChild('admin','0');
		file_put_contents('data/tbuser.xml', $tbuser->asXML());
		$_SESSION['message'] = 'Karyawan Berhasil Dibuat';
		header('location: karyawan.php');
	}
?>
