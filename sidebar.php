    <?php
    if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
    if (!isset($_SESSION["id"])) {
            header("Location:logout.php");
    }
    ?>
    <div class="sidebar" data-color="black" data-active-color="danger" >
      <div class="logo">
        <a href="index1.php" class="simple-text logo-normal">
          <?php 
          $tbuser = simplexml_load_file('data/tbuser.xml');
          for($i = 0; $i < count($tbuser); $i++){
          $id = (string)$tbuser->user[$i]->id_user;
          $nama = (string)$tbuser->user[$i]->nama;
          if ($id == $_SESSION["id"]) {
            echo $nama;
          }}
          ?>
        </a>
      </div>
      <div class="sidebar-wrapper" style="overflow-x:hidden;">
        <ul class="nav">
          <li>
            <a href="index1.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="indexdatapengiriman.php">
              <i class="nc-icon nc-delivery-fast"></i>
              <p>Pengiriman</p>
            </a>
          </li>
          <li>
            <a href="indexdatacustomer.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Pelanggan</p>
            </a>
          </li>
          <li>
            <a href="indexdatatracking.php">
              <i class="nc-icon nc-zoom-split"></i>
              <p>Tracking</p>
            </a>
          </li>
          <li>
            <a href="indexdatapembayaran.php">
              <i class="nc-icon nc-tag-content"></i>
              <p>Status Pembayaran</p>
            </a>
          </li>
          <li>
            <a href="indexdatabiaya.php">
              <i class="nc-icon nc-money-coins"></i>
              <p>Data Biaya</p>
            </a>
          </li>
          <li>
            <a href="indexdatakaryawan.php">
              <i class="nc-icon nc-badge"></i>
              <p>Karyawan</p>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="nc-icon nc-user-run"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>