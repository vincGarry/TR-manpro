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
            <a class="navbar-brand" href="javascript:;">Profil Karyawan</a>
          </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="height: 800px;">
        <div class="card">
            <div class="col-sm-8 col-sm-offset-2">
            <table class="table table-bordered" style="margin-top:30px;">
                <?php 
                $tbuser = simplexml_load_file('data/tbuser.xml');
                for($i = 0; $i < count($tbuser); $i++){
                  $id = (string)$tbuser->user[$i]->id_user;
                  if ($id == $_SESSION["id"]) {?>
                    <tr>
                      <th>Username </th>
                      <td><?php echo (string)$tbuser->user[$i]->username; ?></td>
                    </tr>
                    <tr>
                      <th>Password </th>
                      <td><?php echo md5((string)$tbuser->user[$i]->password); ?></td>
                    </tr>
                    <tr>
                      <th>Nama </th>
                      <td><?php echo (string)$tbuser->user[$i]->nama; ?></td>
                    </tr>
                    <tr>
                      <th>Alamat</th>
                      <td><?php echo (string)$tbuser->user[$i]->alamat; ?></td>
                    </tr>
                    <tr>
                      <th>Email </th>
                      <td><?php echo (string)$tbuser->user[$i]->email; ?></td>
                    </tr>
                    <tr>
                      <th>No. Telp </th>
                      <td><?php echo (string)$tbuser->user[$i]->nomor_telepon; ?></td>
                    </tr>
                  <?php }
                }

                ?>
            </table>
            <?php
            if ($_SESSION["hak"]==1) {?>
            <a class="btn btn-success" href="karyawan.php">Tombol Admin</a>
              <?php
            }
            
            ?>
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