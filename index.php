<?php
   include_once "library/inc.sessionvoter.php";
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
      <title>OSIS Leader Election</title>
      <style>
      @media screen and (min-width: 1000px){
         body{
            background-image: url('assets/img/bg1.png');
            background-attachment: fixed;
            background-size: cover;
         }
      }
         body {
            background-color: #b6e1e0;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <?php
            if(isset($_GET["vote"]) && $_GET["vote"] == "gagal"){
         ?>
               <div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 Voting gagal, silahkan hubungi panitia untuk tindakan selanjutnya.
               </div>
         <?php
            }
         ?>
         <div class="row">
            <?php
               $query = "SELECT * FROM candidates";
               $result = mysqli_query($conn, $query);
               if(mysqli_num_rows($result)){
                  while($row = mysqli_fetch_assoc($result)){
                     echo "<div class='col-12 col-sm-6 col-md-4 col-lg-4 pt-3'>";
                        echo "<div class='card'>";
                           echo "<img src='assets/img/$row[photo]' alt='$row[name]' class='card-img-top image-fluid'>";
                           echo "<div class='card-body'>";
                              echo "<h4 class='card-title'>$row[name]</h4>";
                              echo "<p class='card-text'>";
                              echo "<table class='table-borderless'>";
                                 echo "<tr>";
                                    echo "<td><b>kelas</b></td>";
                                 echo "</tr>";
                                 echo "<tr>";
                                    echo "<td>$row[class]</td>";
                                 echo "</tr>";
                                 echo "<tr>";
                                 echo "<td><b>moto</b></td>";
                                 echo "</tr>";
                                 echo "<tr>";
                                    echo "<td>$row[motto]</td>";
                                 echo "</tr>";
                              echo "</table>";
                              echo "</p>";
                              echo "<a href='vote.php?nis=$row[nis]' class='btn btn-lg btn-primary btn-block'>Pilih</a>";
                           echo "</div>";
                        echo "</div>";
                     echo "</div>";
                  }
               }
            ?>
         </div>
         <br>
      </div>
   </body>
</html>
