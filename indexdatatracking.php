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
            <a class="navbar-brand" href="javascript:;">Tracking</a>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="content" style="height: 800px;">
          <div class="card">
            <div class="col-sm-8 col-sm-offset-2">
              <!-- <a href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> tambah</a> -->
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
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <br><input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan ID Pengiriman..." >
                  </div>
                </div>
              </div>
              <table id="myTable" class="table table-bordered" style="margin-top:30px;">
                <thead>
                  <th>ID TRACKING</th>
                  <th>ID PENGIRIMAN</th>
                  <th>KETERANGAN</th>
                  <th>STATUS PENERIMAAN</th>
                  <th>TANGGAL DITERIMA</th>
                  <th>PILIHAN</th>
                </thead>
                <tbody>
                  <?php
                  //load xml file
                  $file = simplexml_load_file('data/tbtracking.xml');
                  
                  foreach($file->tracking as $row){
                    ?>
                    <tr>
                      <td><?php echo $row->id_tracking; ?></td>
                      <td><?php echo $row->id_pengiriman; ?></td>
                      <td><?php echo $row->keterangan_pengiriman; ?></td>
                      <td><?php echo $row->status_penerimaan; ?></td>
                      <td><?php echo $row->tanggal_penerimaan; ?></td>
                      <td>
                            <!--   <a href="#edit_<?php echo $row->id_customer; ?>" data-toggle="modal" data-backdrop="static" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                              <?php// include('modal_edit_customer.php'); ?>
                              <a href="#delete_<?php echo $row->id_customer; ?>" data-toggle="modal" data-backdrop="static" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                              <?php// include('modal_delete_customer.php'); ?> -->
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
          <script>
            function myFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");

              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
              }
            }
          </script>
          <?php include('modal_tambah_data_pengiriman.php'); ?>
          <?php include('footer.php'); ?>
          
        </body>

        </html>