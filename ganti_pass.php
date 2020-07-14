<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_POST['gantip'])){
	$tbuser = simplexml_load_file('data/tbuser.xml');
	foreach($tbuser->user as $user){
		if($user->id_user == $_POST['id_user']){
			if ($user->password == $_POST['password']) {
				if ($_POST['passwordb']==$_POST['passwordb2']) {
					$user->password = $_POST['passwordb'];
				} else {
					$_SESSION['message'] = 'Password dan Konfirmasi tidak sesuai!';
					header('location: indexdatakaryawan.php');

				}
			} else {
				$_SESSION['message'] = 'Password lama tidak sesuai!';
				header('location: indexdatakaryawan.php');
			}
		}
	}
	file_put_contents('data/tbuser.xml', $tbuser->asXML());
	$_SESSION['message'] = 'Berhasil Mengganti Password';
	header('location: indexdatakaryawan.php');
}
else{
	$_SESSION['message'] = 'Gagal ganti Password';
	header('location: indexdatakaryawan.php');
}
