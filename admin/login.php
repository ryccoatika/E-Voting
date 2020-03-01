<?php
   session_start();
   session_unset();
   session_destroy();
 ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <script src="../assets/js/jquery-3.3.1.min.js"></script>
      <script src="../assets/js/popper.min.js"></script>
      <script src="../assets/js/bootstrap.min.js"></script>
      <title>e-voting smecon</title>
   </head>
   <body>
      <?php
         if(isset($_GET["login"])){
         ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Login gagal</strong>, silahkan coba lagi
            </div>
      <?php
         }
      ?>
      <div class="container pt-5">
         <div class="row">
            <div class="col-md-5 mx-auto">
               <div class="card">
                  <div class="card-header p-1 bg-white">
                     <h4 class="text-center m-0 p-2">LOGIN ADMIN</h4>
                  </div>
                  <div class="card-body">
                     <form action="login_act.php" method="POST">
                        <div class="form-group">
                           <label for="username">Username</label>
                           <input type="text" autocomplete="off" class="form-control" placeholder="username" name="username" required>
                        </div>
                        <div class="form-group">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" placeholder="********" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
