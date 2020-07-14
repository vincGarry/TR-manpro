<?php
	session_start();
	$id_user = $_GET['id_user'];
	$tbuser = simplexml_load_file('data/tbuser.xml');
	$index = 0;
	$i = 0;
	foreach($tbuser->user as $user){
		if($user->id_user == $id_user){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($tbuser->user[$index]);
	file_put_contents('data/tbuser.xml', $tbuser->asXML());
	$_SESSION['message'] = 'DIHAPUS';
	header('location: karyawan.php');
?>