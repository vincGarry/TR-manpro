<?php
	if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
    if (isset($_GET["id_pembayaran"])) {
    $tbpembayaran = simplexml_load_file('data/tbpembayaran.xml');
    foreach($tbpembayaran->pembayaran as $pb){
			if($pb->id_pembayaran == $_GET['id_pembayaran']){
				$pb->status_pembayaran = "Lunas";
				break;
			}
		}
	file_put_contents('data/tbpembayaran.xml', $tbpembayaran->asXML());
		$_SESSION['message'] = 'Sudah Lunas';
		header('location: indexdatapembayaran.php');
		unset($_SESSION['lunas']);
	} else {
            header("Location:indexdatapembayaran.php");
	}
?>