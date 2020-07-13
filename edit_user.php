<?php
	if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
	if(isset($_POST['edit'])){
		$tbuser = simplexml_load_file('data/tbuser.xml');
		foreach($tbuser->user as $user){
			if($user->username == $_POST['username']){
				$user->nama = $_POST['nama'];
				$user->alamat = $_POST['alamat'];
				$user->email = $_POST['email'];
				$user->nomor_telepon = $_POST['nomor_telepon'];
				break;
			}
		}
		file_put_contents('data/tbuser.xml', $tbuser->asXML());
		$_SESSION['message'] = 'Berhasil Diupdate';
		header('location: indexdatakaryawan.php');
	}
	else{
		$_SESSION['message'] = 'gagal update';
		header('location: indexdatakaryawan.php');
	}
