<?php
	session_start();
	$id_pengiriman = $_GET['id_pengiriman'];
	$tbpengiriman = simplexml_load_file('data/tbpengiriman.xml');
	$index = 0;
	$i = 0;
	foreach($tbpengiriman->pengiriman as $pengiriman){
		if($pengiriman->id_pengiriman == $id_pengiriman){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($tbpengiriman->pengiriman[$index]);
	file_put_contents('data/tbpengiriman.xml', $tbpengiriman->asXML());
	$_SESSION['message'] = 'DIHAPUS';
	header('location: indexdatapengiriman.php');
?>