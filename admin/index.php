<?php
   include_once "../library/inc.connection.php";
   include_once "../library/inc.session.php";
   if(isset($_GET["nav"]))
      $nav = $_GET["nav"];
   else
      $nav = ""
 ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="assets/img/smeconlogo.png" type="image/x-icon">
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <script src="../assets/js/jquery-3.3.1.min.js"></script>
      <script src="../assets/js/popper.min.js"></script>
      <script src="../assets/js/bootstrap.min.js"></script>
      <title>admin pilketos smecone</title>
      <style media="screen">
      .footer {
         position: fixed;
         bottom: 0;
         width: 100%;
         height: 60px;
         line-height: 60px;
         background-color: #f5f5f5;
      }
      </style>
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a href="index.php?nav=candidates" class="navbar-brand">SMECONE ELECTION</a>
            <ul class="navbar-nav">
               <li class="nav-item <?php if($nav == "candidates") echo "active"; ?>"><a href="?nav=candidates" class="nav-link">Candidates</a></li>
               <li class="nav-item <?php if($nav == "voters") echo "active"; ?>"><a href="?nav=voters" class="nav-link">Voters</a></li>
               <li class="nav-item <?php if($nav == "results") echo "active"; ?>"><a href="?nav=results" class="nav-link">Results</a></li>
               <li class="nav-item"><a href="logout.php" class="nav-link text-danger">logout</a></li>
            </ul>
         </nav>
         <?php
         if(isset($_GET["act"]) && isset($_GET["stats"])){
            if($_GET["stats"] == "berhasil")
            echo "<div class='alert alert-success alert-dismissible'>";
            else
            echo "<div class='alert alert-danger alert-dismissible'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            if($_GET["stats"] == "berhasil")
            echo "<strong>$_GET[act] berhasil</strong>";
            else
            echo "<strong>$_GET[act] gagal</strong>, silahkan coba kembali";
            echo "</div>";
         }
         ?>
         <?php
            switch ($nav) {
               case "candidates":
                  include_once "candidates.php";
                  break;
               case "voters":
                  include_once "voters.php";
                  break;
               case "results":
                  include_once "results.php";
                  break;
            }
          ?>
      </div>
      <br>
      <br>
      <br>
      <footer class="footer">
         <h6 class="pt-4 text-muted text-center">Creative by Rekayasa Perangkat Lunak 2019</h6>
      </footer>
   </body>
</html>
