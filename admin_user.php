<?php
	session_start();
	$id_user = $_GET['id_user'];
	$tbuser = simplexml_load_file('data/tbuser.xml');
	foreach($tbuser->user as $user){
		if($user->id_user == $id_user){
			$user->admin = "1";
			break;
		}
	}
	file_put_contents('data/tbuser.xml', $tbuser->asXML());
	$_SESSION['message'] = 'Berhasil';
	header('location: karyawan.php');
?>