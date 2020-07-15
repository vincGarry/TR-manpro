 <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $tbuser = simplexml_load_file('data/tbuser.xml');
  $j=0;
  $error = "Username atau Password salah!";
  for($i = 0; $i < count($tbuser); $i++){
    $username = (string)$tbuser->user[$i]->username;
    $password = (string)$tbuser->user[$i]->password;
    $id = (string)$tbuser->user[$i]->id_user;
    $admin = (string)$tbuser->user[$i]->admin;
    if (isset($_POST['user'])&&isset($_POST['pass'])){
      if (($_POST['user'] == $username) && ($_POST['pass'] == $password)) {
        $_SESSION["id"] = $id;
        $_SESSION["hak"] = $admin;
        $j=0;
        header("Location:index1.php");
      } else {$j+=1;} 
    }
  }
  if ($j==count($tbuser)) {
    $_SESSION["message"]= $error;
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
                  <?php 
                if(!empty($_SESSION['message'])){
                    ?>
                    <div class="alert alert-danger text-center" style="margin-top:20px;">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                        <span><?php echo $_SESSION['message']; ?></span>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>  
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
