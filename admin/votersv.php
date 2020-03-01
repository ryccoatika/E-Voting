<?php
   include_once "../library/inc.session.php";
   if($_SERVER["REQUEST_METHOD"] != "POST")
      header("location:index.php?nav=voters");

   $nis = $_POST["nis"];
   $name = $_POST["name"];
   $tgl = $_POST["tgl"];
   $class = $_POST["class"];
   $query = "INSERT INTO voters (nis, name, tgl, class)
      VALUES ('$nis', '$name', '$tgl', '$class')";
   if(mysqli_query($conn, $query))
      header("location:index.php?nav=voters&act=tambah&stats=berhasil");
   else
      header("location:index.php?nav=voters&act=tambah&stats=gagal");
 ?>
