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
            <a class="navbar-brand" href="javascript:;">Data Biaya</a>
          </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="height: 800px;">
        <div class="card">
          
            <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <br><input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan ID pengiriman" >
                  </div>
                </div>
              </div>
            <!-- <a href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> tambah</a> -->
            <table id="myTable" class="table table-bordered" style="margin-top:30px;">
                <thead>
                    <th>ID BIAYA</th>
                    <th>ID PENGIRIMAN</th>
                    <th>BERAT BARANG (KG)</th>
                    <th>PANJANG BARANG (CM)</th>
                    <th>LEBAR BARANG (CM)</th>
                    <th>TINGGI BARANG (CM)</th>
                    <th>JENIS PENGIRIMAN</th>
                    <th>TOTAL BIAYA</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('data/tbbiaya.xml');
                    
                    foreach($file->biaya as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id_biaya; ?></td>
                            <td><?php echo $row->id_pengiriman; ?></td>
                            <td><?php echo $row->berat_barang; ?></td>
                            <td><?php echo $row->panjang_barang; ?></td>
                            <td><?php echo $row->lebar_barang; ?></td>
                            <td><?php echo $row->tinggi_barang; ?></td>
                            <td><?php echo $row->jenis_layanan; ?></td>
                            <td><?php echo $row->total_biaya; ?></td>
                            
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