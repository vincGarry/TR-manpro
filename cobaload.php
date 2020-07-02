<?php
		// $tbcustomer = simplexml_load_file('data/tbcustomer.xml');
		$tbcustomer = simplexml_load_file('data/tbcustomer.xml');
		$maxid = max(array_map('intval',$tbcustomer->xpath("//id_customer")));
		print_r($maxid);
?>