<?php
	session_start();
	$id_pengiriman = $_GET['id_pengiriman'];

	// $id_pengirim = $_GET['id_pengirim'];
	// $id_penerima = $_GET['id_penerima'];

	$id_biaya = $_GET['id_biaya'];
	$id_tracking = $_GET['id_tracking'];
	$id_pembayaran = $_GET['id_pembayaran'];
	
	$tbpengiriman = simplexml_load_file('data/tbpengiriman.xml');
	$tbpengrim = simplexml_load_file('data/tbpengirim.xml');
	$tbpenerima = simplexml_load_file('data/tbpenerima.xml');
	$tbbiaya = simplexml_load_file('data/tbbiaya.xml');
	$tbtracking = simplexml_load_file('data/tbtracking.xml');
	$tbpembayaran = simplexml_load_file('data/tbpembayaran.xml');

	//hapus pengiriman
	$indexpengiriman = 0;
	$i_pengiriman = 0;
	foreach($tbpengiriman->pengiriman as $pengiriman){
		if($pengiriman->id_pengiriman == $id_pengiriman){
			$indexpengiriman = $i_pengiriman;
			break;
		}
		$i_pengiriman++;
	}
	unset($tbpengiriman->pengiriman[$indexpengiriman]);
	file_put_contents('data/tbpengiriman.xml', $tbpengiriman->asXML());

	// //hapus pengirim
 //    $indexpengirim = 0;
 //    $i_pengirim = 0;
 //    foreach($tbpengirim->pengirim as $pengirim){
 //        if($pengirim->id_pengirim == $id_pengirim){
 //            $indexpengirim = $i_pengirim;
 //            break;
 //        }
 //        $i_pengirim++;
 //    }
 //    unset($tbpengirim->pengirim[$indexpengirim]);
 //    file_put_contents('data/tbpengirim.xml', $tbpengirim->asXML());

	// //hapus penerima
	// $indexpenerima = 0;
	// $i_penerima = 0;
	// foreach($tbpenerima->penerima as $penerima){
	// 	if($penerima->id_penerima == $id_penerima){
	// 		$indexpenerima = $i_penerima;
	// 		break;
	// 	}
	// 	$i_penerima++;
	// }
	// unset($tbpenerima->penerima[$indexpenerima]);
	// file_put_contents('data/tbpenerima.xml', $tbpenerima->asXML());

	//hapus biaya
	$indexbiaya = 0;
	$i_biaya = 0;
	foreach($tbbiaya->biaya as $biaya){
		if($biaya->id_biaya == $id_biaya){
			$indexbiaya = $i_biaya;
			break;
		}
		$i_biaya++;
	}
	unset($tbbiaya->biaya[$indexbiaya]);
	file_put_contents('data/tbbiaya.xml', $tbbiaya->asXML());

	//hapus tracking
	$indextracking = 0;
	$i_tracking = 0;
	foreach($tbtracking->tracking as $tracking){
		if($tracking->id_tracking == $id_tracking){
			$indextracking = $i_tracking;
			break;
		}
		$i_tracking++;
	}
	unset($tbtracking->tracking[$indextracking]);
	file_put_contents('data/tbtracking.xml', $tbtracking->asXML());

	//hapus pembayaran
	$indexpembayaran = 0;
	$i_pembayaran = 0;
	foreach($tbpembayaran->pembayaran as $pembayaran){
		if($pembayaran->id_pembayaran == $id_pembayaran){
			$indexpembayaran = $i_pembayaran;
			break;
		}
		$i_pembayaran++;
	}
	unset($tbpembayaran->pembayaran[$indexpembayaran]);
	file_put_contents('data/tbpembayaran.xml', $tbpembayaran->asXML());

	$_SESSION['message'] = 'DIHAPUS';
	header('location: indexdatapengiriman.php');
?>