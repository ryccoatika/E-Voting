<?php
   include_once "../library/inc.session.php";

   if($_SERVER["REQUEST_METHOD"] != "POST")
      header("location:index.php?nav=candidates");

   $no = $_POST["no"];
   $nis = $_POST["nis"];
   $photo = $nis;
   $name = $_POST["name"];
   $class = $_POST["class"];
   $motto = $_POST["motto"];

   $query = "UPDATE candidates SET no_urut='$no', nis='$nis', photo='$photo', name='$name',
   class='$class', motto='$motto' WHERE nis = '$nis'";
   if(mysqli_query($conn, $query)){
      if(!empty($_FILES["photo"]["name"])){
         $target_dir = "../assets/img/";
         $target_file = $target_dir . $photo;
         unlink($target_file);
         move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
      }
      header("location:index.php?nav=candidates&act=edit&stats=berhasil");
   }else
      header("location:index.php?nav=candidates&act=edit&stats=gagal");
 ?>
