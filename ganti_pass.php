<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_POST['gantip'])){
	$tbuser = simplexml_load_file('data/tbuser.xml');
	foreach($tbuser->user as $user){
		if($user->id_user == $_POST['id_user']){
			if ($user->password == $_POST['password']) {
				if ($_POST['passwordb'] == $_POST['passwordb2']) {
					if ($_POST['passwordb']!=$_POST['password']) {
						$user->password = $_POST['passwordb'];
						file_put_contents('data/tbuser.xml', $tbuser->asXML());
						$_SESSION['message'] = 'Berhasil Mengganti Password';
						header('location: indexdatakaryawan.php');
					} else {
						$_SESSION['message'] = 'Password baru tidak boleh sama dengan Password lama!';
						header('location: indexdatakaryawan.php');
					}
				} else {
					$_SESSION['message'] = 'Password konfirmasi salah!';
					header('location: indexdatakaryawan.php');
				}
			}else {
				$_SESSION['message'] = 'Password lama salah!';
				header('location: indexdatakaryawan.php');
			}
		}
	}
}
else{
	$_SESSION['message'] = 'Gagal ganti Password';
	header('location: indexdatakaryawan.php');
}
