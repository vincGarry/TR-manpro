<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DATA PENGIRIMAN</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">DATA PENGIRIMAN</h1>
    <div class="row">
        <a href="index.php" class="btn btn-outline-dark"><span class="glyphicon glyphicon-chevron-left"> back</span></a>
        <div class="col-sm-8 col-sm-offset-2">
            <!-- <a href="#tambah" class="btn btn-success" data-backdrop="static" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> tambah</a> -->
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
            <table class="table table-bordered" style="margin-top:30px;">
                <thead>
                    <th>ID PEMBAYARAN</th>
                    <th>ID PENGIRIMAN</th>
                    <th>METODE PEMBAYARAN</th>
                    <th>STATUS PEMBAYARAN</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('data/tbpembayaran.xml');
                    
                    foreach($file->pembayaran as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id_pembayaran; ?></td>
                            <td><?php echo $row->id_pengiriman; ?></td>
                            <td><?php echo $row->metode_pembayaran; ?></td>
                            <td><?php echo $row->status_pembayaran; ?></td>

                            <td>
                               <!--  <a href="#edit_<?php echo $row->id_customer; ?>" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <?//php include('modal_edit_customer.php'); ?>
                                <a href="#delete_<?php echo $row->id_customer; ?>" data-toggle="modal" data-backdrop="static" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                                <?//php include('modal_delete_customer.php');?> -->
                            </td>
                        </tr>
                        <?php
                    }
        
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?//php include('modal_tambah_data_pengiriman.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>