<?php
   session_start();
   session_unset();
   session_destroy();
 ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="assets/img/smeconlogo.png" type="image/x-icon">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <script src="assets/js/jquery-3.3.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <title>Pemilihan Ketua Osis</title>
   </head>
   <body>
      <div class="container">
         <div class="jumbotron jumbotron-fluid row" style="background-color: #b6e1e0; color: #2b4353;">
            <div class="col-sm-4">
               <img src="assets/img/smeconlogo.png" alt="smecon logo" class="img-fluid mx-auto d-block" style="max-width: 200px; opacity: 0.8;" >
            </div>
            <div class="col-sm-8  text-center pl-0 pr-0">
               <h1 class="pt-5 font-weight-light">PEMILIHAN KETUA OSIS SMECON</h1>
               <h5 class="font-weight-light">2018/2019</h5>
            </div>
         </div>
         <?php
            if(isset($_GET["login"]) ){
               if($_GET["login"] == "voted"){
         ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Anda sudah memilih, tidak dapat login kembali.
                  </div>
         <?php
               }elseif($_GET["login"] == "salah"){
         ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    NIS dengan tanggal lahir tidak cocok
                  </div>
         <?php
               }
            }
         ?>
         <?php
            if(isset($_GET["vote"])){
            ?>
               <div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong><?php echo $_GET["name"]; ?></strong> Terima kasih telah memilih : )
               </div>
         <?php
            }
         ?>
         <div class="cards mx-auto" style="max-width: 450px">
            <div class="card-body">
               <form action="loginsv.php" method="post">
                  <h5 class="text-center font-weight-light pb-3">silahkan login terlebih dahulu</h5>
                  <div class="form-group">
                     <input type="text" name="nis" class="form-control" placeholder="nis" required="" autofocus>
                  </div>
                  <div class="form-group input-group">
                     <div class="input-group-prepend">
                        <span style="background-color: #bbb; " class="input-group-text"><img src="assets/img/date.png" alt="date"></span>
                     </div>
                     <input type="date" name="tgl" id="tgl" class="form-control" required="">
                  </div>
                  <button type="submit" class="btn btn-block text-white" style="background-color: #e8630a;">Login</button>
               </form>
            </div>
         </div>
      <br>
      </div>
   </body>
</html>
