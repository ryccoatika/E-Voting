<?php
   include_once("library/inc.connection.php");
   include_once("library/inc.function.php");

   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $nis = test_input($_POST["nis"]);
      $tgl = test_input($_POST["tgl"]);

      $query = "SELECT * FROM voters WHERE nis = '$nis'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) != 0){
         $row = mysqli_fetch_assoc($result);
         if($tgl == $row['tgl']){
            if($row['state'] == 1)
               header("location:login.php?login=voted");
            else{
               session_start();
               $_SESSION["voternis"] = $nis;
               $_SESSION["votername"] = $row['name'];
               $_SESSION["votertgl"] = $tgl;
               header("location:index.php");
            }
         }else
            header("location:login.php?login=salah");
      }else
         header("location:login.php?login=salah");
   }else
      header("location:login.php?a=a");
?>
