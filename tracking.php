 <!DOCTYPE html>
 <html lang="en">

<head>
<?php include('header.php'); ?>

</head>
 <body class="">
  <!-- <div class="wrapper "> -->
    <?php include('sidebar_home.php'); ?>
    <!-- <div class="main-panel"> -->
<br />
<br />
<br />
<br />
 <h3 id="txt-welcome">SELAMAT DATANG,HELLO CUSTOMERS!!</h3>


   <div class="col-md-4 ml-auto mr-auto" style="text-align:center;margin-top:20%;">
     <div class="card card-upgrade">
       <div class="card-header text-center">
         <h4 class="card-category">Tracking Nomor Resi</h4>
       </div>
       <form action="" method="get">
         <div class="card-body">
           <div class=" table-upgrade ">
             <table class="table">
               <input name="resi" type="text" class="form-control" placeholder="Masukkan Nomor Resi" autocomplete ="off"></input>
               <button type="button" class="btn btn-info">Cari</button>
             </table>
           </div>
         </div>
       </form>
       <?php
        $resi_cari = ($_GET && $_GET['resi']) ? $_GET['resi'] : "";
        $resi = return_resi($resi_cari);
        function return_resi($resi)
        {
          $data =  simplexml_load_file('data/tbtracking.xml');
          $return_value = [];
          foreach ($data->tracking as $key => $row) {
            if ($row->id_tracking == $resi) {
              $return_value[$key]['id_tracking'] = $row->id_tracking;
              $return_value[$key]['id_pengiriman'] = $row->id_pengiriman;
              $return_value[$key]['keterangan_pengiriman'] = $row->keterangan_pengiriman;
              $return_value[$key]['status_penerimaan'] = $row->status_penerimaan;
            }
          }
          return $return_value;
        }
        ?>
     </div>
     <div class="card card-upgrade">
       <?php
        if ($resi) {
          echo ("<h5>Nomor Resi " . $resi['tracking']['id_tracking'][0] . " Ditemukan!<h5>");
          echo ("<table style='width:100%'>
  <tr>
  <th>Keterangan Pengiriman</th>
  <th>Status Penerimaan</th>
  </tr>
  <tr>
  <td>" . $resi['tracking']['keterangan_pengiriman'][0] . "</td>
  <td>" . $resi['tracking']['status_penerimaan'][0] . "</td>
  </tr>
  </table>");
        } else {
          if ($resi_cari == "") {
            echo ("<h5>Harap Masukan Nomor Resi !<h5>");
          } else {
            echo ("<h5>Nomor Resi " . $resi_cari . " Tidak Ditemukan!<h5>");
          }
        }
        ?>
     </div>
   </div>
   </div>
   </div>
   <?php include('footer.php'); ?>
 </body>
 </html>
 <?php include('nama.php'); ?>


 <style>
   #txt-welcome {
     text-align: center;
     color: black;
   }
 </style>
