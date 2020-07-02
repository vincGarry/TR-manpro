<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DATA CUSTOMER</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">DATA CUSTOMER</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> tambah</a>
            <table class="table table-bordered" style="margin-top:30px;">
                <thead>
                    <th>ID_Customer</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>pilihan</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('data/tbcustomer.xml');
                    
                    foreach($file->customer as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id_customer; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->alamat; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->nomor_telepon; ?></td>
                            <td>
                                <a href="#edit_<?php echo $row->id_customer; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <?php include('modal_edit_customer.php'); ?>
                                <a href="#delete_<?php echo $row->id_customer; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                                <?php include('modal_delete_customer.php'); ?>
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
<?php include('modal_tambah_customer.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>