<?php
   include_once "../library/inc.session.php";

   if(isset($_GET["nis"])){
      $query = "DELETE FROM candidates WHERE nis = '$_GET[nis]'";
      if(mysqli_query($conn, $query)){
         $target_dir = "../assets/img/".$_GET["nis"];
         if(file_exists($target_dir))
            unlink($target_dir);
         header("location:index.php?nav=candidates&act=hapus&stats=berhasil");
      }else{
         header("location:index.php?nav=candidates&act=hapus&stats=gagal");
      }
   }else
      header("location:index.php?nav=candidates&act=hapus&stats=gagal");
 ?>
