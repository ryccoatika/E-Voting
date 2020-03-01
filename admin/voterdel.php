<?php
   include_once "../library/inc.session.php";

   if(isset($_GET["nis"])){
      $query = "DELETE FROM voters WHERE nis = '$_GET[nis]'";
      if(mysqli_query($conn, $query))
         header("location:index.php?nav=voters&act=hapus&stats=berhasil");
      else
         header("location:index.php?nav=voters&act=hapus&stats=gagal");
   }else
      header("location:index.php?nav=voters");
?>
