<?php
   include_once "../library/inc.session.php";

   if($_SERVER["REQUEST_METHOD"] != "POST")
      header("location:index.php?nav=voters");

   $nis = $_POST["nis"];
   $name = $_POST["name"];
   $tgl = $_POST["tgl"];
   $class = $_POST["class"];

   $query = "UPDATE voters SET nis='$nis',name='$name', tgl='$tgl', class='$class' WHERE nis = '$nis'";
   if(mysqli_query($conn, $query))
      header("location:index.php?nav=voters&act=edit&stats=berhasil");
   else
      header("location:index.php?nav=voters&act=edit&stats=gagal");
 ?>
