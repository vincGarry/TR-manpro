
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
                      <td><input type="text" name="user"></td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td><input type="password" name="pass"></td>
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
        <?php
        if (isset($_POST['user'])&&isset($_POST['pass'])) {
        	$user = $_POST['user'];
        	$pass = $_POST['pass'];
        	if ($user == "admin" && $pass == "admin") {
        		header("Location:index1.php");
        	} else {
        		header("Location:index.php");
        	}
        }
        ?>
      
      
    </div>
  </div>
  <?php include('footer.php'); ?>
</body>

</html>
