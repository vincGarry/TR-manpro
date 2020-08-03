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
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="height: 800px;">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-box-2 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Total Pengiriman</p>
                      <p class="card-title"><?php 
                        $tbkirim = simplexml_load_file('data/tbpengiriman.xml');
                        echo (count($tbkirim));
                      ?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Terkirim</p>
                      <p class="card-title">
                        <?php 
                        $indi2=0;
                        $tbtracking = simplexml_load_file('data/tbtracking.xml');
                        for ($i=0; $i < count($tbtracking) ; $i++) { 
                        $stats = $tbtracking->tracking[$i]->status_penerimaan;
                        if ($stats == "Terkirim") {
                          $indi2+=1;
                        }
                        }
                        echo $indi2;
                        ?>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Belum Lunas</p>
                      <p class="card-title">
                        <?php 
                        $indi=0;
                        $tbstatus = simplexml_load_file('data/tbpembayaran.xml');
                        for ($i=0; $i < count($tbstatus) ; $i++) { 
                        $stats = $tbstatus->pembayaran[$i]->status_pembayaran;
                        if ($stats == "Belum Lunas") {
                          $indi+=1;
                        }
                        }
                        echo $indi;
                        ?>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-single-02 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Karyawan</p>
                      <p class="card-title"><?php 
                        $tbuser = simplexml_load_file('data/tbuser.xml');
                        echo (count($tbuser));
                      ?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" >
          <div class="col-sm-4" align="center">
            <a class="btn btn-success" href="#tambah" data-toggle="modal">pengiriman baru</a>
            <a class="btn btn-outline-success" href="downloaddatapengiriman.php">download data pengiriman</a>
          </div>
        </div>
        
        <div class="row" style="height: 800px;">
          
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