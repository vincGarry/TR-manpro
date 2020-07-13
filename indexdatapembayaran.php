<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
</head>

<body class="">
  <div class="wrapper ">
    <?php include('sidebar.php'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Status Pembayaran</a>
          </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="height: 800px;">
        <div class="card">
            <div class="col-sm-8 col-sm-offset-2">
            <!-- <a href="#tambah" class="btn btn-success" data-backdrop="static" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> tambah</a> -->
            <?php 
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                        <span><?php echo $_SESSION['message']; ?></span>
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
      
  <?php include('nama.php'); ?>
    </div>
  </div>
  <!-- include php -->
  <?php include('modal_tambah_data_pengiriman.php'); ?>
  <?php include('footer.php'); ?>
  
</body>

</html>