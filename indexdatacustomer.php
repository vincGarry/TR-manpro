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
            <div class="navbar-toggle">
            </div>
            <a class="navbar-brand" href="javascript:;">Penerima</a>
          </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="height: 800px;">
        <div class="card">
          <?php 
            if(isset($_SESSION['message'])){
              ?>
              <div class="alert alert-warning text-center" style="margin-top:20px;">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="nc-icon nc-simple-remove"></i>
                </button>
                <span><b><?php echo $_SESSION['message']; ?></b></span>
              </div>
              <?php

              unset($_SESSION['message']);
            }
            ?>
            <div class="col-sm-12 col-sm-offset-2">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <br><input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan ID Customer..." >
                  </div>
                </div>
              </div>
            <table id="myTable" class="table table-bordered" style="margin-top:30px;">
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