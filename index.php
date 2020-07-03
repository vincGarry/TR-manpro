<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PENGIRIMAN</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">MANPRO PENGIRIMAN</h1>
    <div class="row">
        <div class="col-sm-12" align="center">           
            <a class="btn btn-primary" href="indexdatacustomer.php" role="button">data customer</a>
            <a class="btn btn-primary" href="indexdatapengiriman.php" role="button">data pengiriman</a>
            <a class="btn btn-primary" href="indexdatatracking.php" role="button">data tracking</a>
            <a class="btn btn-primary" href="indexdatabiaya.php" role="button">data biaya</a>
            <a class="btn btn-primary" href="indexdatapembayaran.php" role="button">data pembayaran</a>
            <br><br>
            <a class="btn btn-success" href="#tambah" data-toggle="modal">pengiriman baru</a>
        </div>
    </div>
</div>
<?php include('modal_tambah_data_pengiriman.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
