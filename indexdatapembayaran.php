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
            <div class="col-sm-8 col-sm-offset-2"><div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <br><input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan ID pengiriman" >
                  </div>
                </div>
              </div>
            <!-- <a href="#tambah" class="btn btn-success" data-backdrop="static" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> tambah</a> -->
            
            <table id="myTable" class="table table-bordered" style="margin-top:30px;">
                <thead>
                    <th>ID PEMBAYARAN</th>
                    <th>ID PENGIRIMAN</th>
                    <th>METODE PEMBAYARAN</th>
                    <th>STATUS PEMBAYARAN</th>
                    <th>PILIHAN</th>
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
                               <?php if ($row->status_pembayaran=="Belum Lunas") { ?>
                                <a href="#lunas_<?php  echo $row->id_pembayaran;?>" data-toggle="modal" class="btn  btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>Lunaskan</a>
                                <?php include('modal_lunas.php'); ?>
                               <?php } else{ ?>
                                  <a href="#" class="btn btn-success"></a>
                               <?php } ?>
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
    td = tr[i].getElementsByTagName("td")[1];
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
  <?php include('footer.php'); ?>
  
</body>

</html>