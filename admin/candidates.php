<?php
   include_once "../library/inc.session.php";
?>
<table class="table table-striped table-hover table-responsive">
   <thead>
      <td>nis</td>
      <td>photo</td>
      <td>name</td>
      <td>class</td>
      <td>motto</td>
      <td>option</td>
   </thead>
   <tbody>
      <?php
         $query = "SELECT * FROM candidates ORDER BY no_urut";
         $result = mysqli_query($conn, $query);
         if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
               echo "<tr>";
               echo "<td>$row[nis]</td>";
               echo "<td style='max-width: 100px;'><img src='../assets/img/$row[photo]' class='img-fluid img-rounded' alt='$row[photo]'></td>";
               echo "<td>$row[name]</td>";
               echo "<td>$row[class]</td>";
               echo "<td>$row[motto]</td>";
               echo "<td>";
               echo "<a href='?nav=candidates&nis=$row[nis]' class='btn btn-success btn-sm m-2'>Edit</a>";
               echo "<a href='candidatedel.php?nis=$row[nis]' class='btn btn-danger btn-sm m-2'>Delete</a>";
               echo "</td>";
               echo "</tr>";
            }
         }
      ?>
   </tbody>
</table>
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#addnew">Add New</button>
<?php
   if(isset($_GET["nis"])){
      $edit = true;
      $nis = $name = $photo = $class = $motto = "";
      $query = "SELECT * FROM candidates WHERE nis = '$_GET[nis]'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0){
         $rows = mysqli_fetch_assoc($result);
         $no = $rows["no_urut"];
         $nis = $rows["nis"];
         $name = $rows["name"];
         $photo = $rows["photo"];
         $class = $rows["class"];
         $motto = $rows["motto"];
      }
   }else
      $edit = false;
 ?>

<div class="modal" id="addnew">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4>
            <?php
               if($edit)
                  echo "Edit";
               else
                  echo "Add new";
             ?>
            </h4>
            <?php
               if($edit)
                  echo "<a href='index.php?nav=candidates' class='close'>&times;</a>";
               else
                  echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
             ?>
         </div>
         <div class="modal-body">
            <form action="<?php if($edit) echo "candidateedit.php"; else echo "candidatesv.php"; ?>" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="no">nomer urut:</label>
                  <input type="text" class="form-control" name="no" id="no" placeholder="nomer urut"
                  value="<?php if($edit) echo $no; else echo ""; ?>">
               </div>
               <div class="form-group">
                  <label for="nis">nis:</label>
                  <input type="text" class="form-control" name="nis" id="nis" placeholder="nis"
                  value="<?php if($edit) echo $nis; else echo ""; ?>" <?php if($edit) echo "readonly"; ?>>
               </div>
               <label for="photo">photo:</label>
               <div class="custom-file">
                  <input type="file" class="custom-file-input" name="photo" id="photo">
                  <label for="photo" class="custom-file-label">Choose photo</label>
               </div>
               <div class="form-group">
                  <label for="name">name:</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="name"
                  value="<?php if($edit) echo $name; else echo ""; ?>">
               </div>
               <div class="form-group">
                  <label for="class">class:</label>
                  <input list="classlist" type="text" class="form-control" name="class" id="class" placeholder="class"
                  value="<?php if($edit) echo $class; else echo ""; ?>">
                  <?php
                     $query = "SELECT DISTINCT class FROM voters";
                     $result = mysqli_query($conn, $query);
                     if(mysqli_num_rows($result) > 0){
                        echo "<datalist id='classlist'>";
                        while($row = mysqli_fetch_array($result)){
                           echo "<option value='$row[0]'>";
                        }
                        echo "</datalist>";
                     }
                   ?>
               </div>
               <div class="form-group">
                  <label for="motto">motto:</label>
                  <input type="text" class="form-control" name="motto" id="motto" placeholder="motto"
                  value="<?php if($edit) echo $motto; else echo ""; ?>">
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">
                     <?php if($edit) echo "Save Edit"; else echo "Add new"; ?>
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php
   if($edit){
      echo "<script type='text/javascript'>";
      echo "$('#addnew').modal ({backdrop: 'static', keyboard: false});";
      echo "$('#addnew').modal('show');";
      echo "</script>";
   }
 ?>
