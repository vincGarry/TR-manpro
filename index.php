 <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $tbuser = simplexml_load_file('data/tbuser.xml');
  for($i = 0; $i < count($tbuser); $i++){
    $username = (string)$tbuser->user[$i]->username;
    $password = (string)$tbuser->user[$i]->password;
    $nama = (string)$tbuser->user[$i]->nama;
    $id = (string)$tbuser->user[$i]->id_user;
    $admin = (string)$tbuser->user[$i]->admin;
    if (isset($_POST['user'])&&isset($_POST['pass'])){
      if (($_POST['user'] == $username) && ($_POST['pass'] == $password)) {
        $_SESSION["id"] = $id;
        $_SESSION["login"] = $nama;
        $_SESSION["hak"] = $admin;
        if (isset($_SESSION["login"])) {
          header("Location:index1.php");
        } else {
        header("Location:logout.php");
      } 
      } 
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
</head>

<body class="" background="logistic.jpg">
    
      
        
          <div class="col-md-4 ml-auto mr-auto" style="text-align:center;margin-top:20%;">
            <div class="card card-upgrade">
              <div class="card-header text-center">
                <h3 class="card-title">Login</h3>
                  <h4 class="card-category">Aplikasi Pengiriman Barang</h4>
                  
              </div>
              <div class="card-body">
                <div class=" table-upgrade ">
                  <table class="table">
                    <form action="index.php" method="post">
                    <tr>
                      <td>Username</td>
                      <td><input type="text" name="user" required=""></td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td><input type="password" name="pass" required=""></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><input type="submit" value="Login"></td>
                    </tr>
                    </form>
                  </table>
                </div>
              </div>
            </div>
          </div>
      
    </div>
  </div>
  <?php include('footer.php'); ?>
</body>

</html>
