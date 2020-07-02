<?php
	session_start();
	$id_customer = $_GET['id_customer'];
	$tbcustomer = simplexml_load_file('data/tbcustomer.xml');
	$index = 0;
	$i = 0;
	foreach($tbcustomer->customer as $customer){
		if($customer->id_customer == $id_customer){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($tbcustomer->customer[$index]);
	file_put_contents('data/tbcustomer.xml', $tbcustomer->asXML());
	$_SESSION['message'] = 'DIHAPUS';
	header('location: indexdatacustomer.php');
?>