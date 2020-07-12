 <!DOCTYPE html>
 <html lang="en">

 <head>
   <?php include('header.php'); ?>
 </head>
 <div class="row">
   <button onclick="to_login()" id="btn-login" type="button" class="btn btn-primary center">LOGIN ADMIN</button>
 </div>

 <h1 id="txt-welcome">SELAMAT DATANG !</h1>


 <body class="" background="logistic.jpg">

   <div class="col-md-4 ml-auto mr-auto" style="text-align:center;margin-top:20%;">
     <div class="card card-upgrade">
       <div class="card-header text-center">
         <h4 class="card-category">Tracking Nomor Resi</h4>
       </div>
       <form action="" method="get">
         <div class="card-body">
           <div class=" table-upgrade ">
             <table class="table">
               <input name="resi" type="text"></input>
               <button type="submit">CARI</button>
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

 <script>
   function to_login() {
     window.location.href = "index.php";
   }
 </script>

 <style>
   #btn-login {
     position: relative;
     right: -90%;
   }

   #txt-welcome {
     text-align: center;
     color: white;
   }
 </style>