<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
</head>

<body class="">
  <div class="wrapper ">
    <?php include('sidebar.php'); ?>
    <div class="main-panel">

      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
            </div>
            <a class="navbar-brand" href="javascript:;">Data Customer</a>
          </div>
      </nav>

      <div class="content row" style="height: 800px;">
        <div class="card col-sm-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group" style="font-size: 20px; text-align: center;">
                    <br>Pengirim
                  </div>
                  <div class="form-group">
                    <br><input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan ID Pengirim..." >
                  </div>
                </div>
              </div>
              <table id="myTable" class="table table-bordered" style="margin-top:30px;">
                <thead>
                    <th>ID_Pengirim</th>
                    <th>Nama Pengirim</th>
                    <th>Alamat Pengirim</th>
                    <th>Nomor Telepon Pengirim</th>
                </thead>
                <tbody>
                  <?php
                    $file = simplexml_load_file('data/tbpengirim.xml');
                    foreach($file->pengirim as $row){
                  ?>
                  <tr>
                    <td><?php echo $row->id_pengirim; ?></td>
                      <td><?php echo $row->nama_pengirim; ?></td>
                      <td><?php echo $row->alamat_pengirim; ?></td>
                      <td><?php echo $row->nomor_telepon_pengirim; ?></td>
                      
                    </tr>
                    <?php
                      }
                    ?>
                </tbody>
              </table>
        </div>

        <div class="card col-sm-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group" style="font-size: 20px; text-align: center;">
                    <br>Penerima
                  </div>
                  <div class="form-group">
                    <br><input class="form-control" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Cari berdasarkan ID Penerima..." >
                  </div>
                </div>
              </div>
            <table id="myTable1" class="table table-bordered" style="margin-top:30px;">
                <thead>
                    <th>ID_penerima</th>
                    <th>Nama penerima</th>
                    <th>Alamat penerima</th>
                    <th>Nomor Telepon penerima</th>
                    <th>pilihan</th>
                </thead>
                <tbody>
                    <?php
                    $file = simplexml_load_file('data/tbpenerima.xml');
                    foreach($file->penerima as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id_penerima; ?></td>
                            <td><?php echo $row->nama_penerima; ?></td>
                            <td><?php echo $row->alamat_penerima; ?></td>
                            <td><?php echo $row->nomor_telepon_penerima; ?></td>
                            <td>
                                <a href="#edit_<?php echo $row->id_penerima; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
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
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
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
  <?php include('footer.php'); ?>
  
</body>

</html>