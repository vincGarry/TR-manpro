<!DOCTYPE html>
 <html lang="en">

 <head>
   <?php include('header.php'); ?>
 </head>
 
   <div class="col-md-4 ml-auto mr-auto" style="text-align:center;margin-top:20%;"></div>
       <form action="" method="get">
         <div class="card-body">
           <div class=" table-upgrade ">
             <table class="table">
               <input name="kirim" type="text"></input>
               <button type="submit">CARI</button>
             </table>
           </div>
         </div>
       </form>
       <?php
        $kirim_cari = ($_GET && $_GET['kirim']) ? $_GET['kirim'] : "";
        $kirim = return_kirim($kirim_cari);
        function return_kirim($kirim)
        {
          $data =  simplexml_load_file('data/tbpembayaran.xml');
          $return_value = [];
          foreach ($data->pembayaran as $key => $row) {
            if ($row->id_pembayaran == $kirim) {
              $return_value[$key]['id_pembayaran'] = $row->id_pembayaran;
              $return_value[$key]['id_pengiriman'] = $row->id_pengiriman;
              $return_value[$key]['metode_pembayaran'] = $row->metode_pembayaran;
              $return_value[$key]['status_pembayaran'] = $row->status_pembayaran;
            }
          }
          return $return_value;
        }
        ?>
     <div class="card card-upgrade">
       <?php
        if ($kirim) {
          echo ("<h5>Pembayaran  " . $kirim['pembayaran']['id_pembayaran'][0] . " Ditemukan!<h5>");
          echo ("<table style='width:100%'>
  <tr>
  <th>ID PEMBAYARAN</th>
  <th>ID PENGIRIMAN</th>
  <th>METODE PEMBAYARAN</th>
  <th>STATUS PEMBAYARAN</th>
  </tr>
  <tr>
  <td>" . $kirim['pembayaran']['id_pembayaran'][0] . "</td>
  <td>" . $kirim['pembayaran']['id_pengiriman'][0] . "</td>
  <td>" . $kirim['pembayaran']['metode_pembayaran'][0] . "</td>
  <td>" . $kirim['pembayaran']['status_pembayaran'][0] . "</td>
  
  </tr>
  </table>");
        }else{
            if ($kirim_cari == "") {
                echo ("");
        }else{ echo ("<h5>ID Pembayaran " . $kirim_cari . " Tidak Ditemukan!<h5>");
          }
        }
        
        ?>
     </div>
   <?php include('footer.php'); ?>
 </html>