<?php
   include_once "../library/inc.session.php";
?>
<br>
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addnew" data-keyboard="false" data-backdrop="static">Add New</button>
<br>
<form>
   <div class="form-group">
      <input list="classlist" type="text" class="form-control" id="search" placeholder="search ...">
   </div>
</form>
<table class="table table-striped table-hover table-responsive-sm" id="voters">
   <thead class="thead-dark">
      <tr>
         <th>nis</th>
         <th>name</th>
         <th>birth of date</th>
         <th>class</th>
         <th>state</th>
         <th>option</th>
      </tr>
   </thead>
   <tbody>
      <?php
         $query = "SELECT * FROM voters ORDER BY class ASC";
         $result = mysqli_query($conn, $query);
         if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
               echo "<tr>";
               echo "<td>$row[nis]</td>";
               echo "<td>$row[name]</td>";
               echo "<td>$row[tgl]</td>";
               echo "<td>$row[class]</td>";
               if($row["state"] == 0)
                  echo "<td class='bg-danger'>";
               else
                  echo "<td class='bg-success'>";
               echo "<td>";
               echo "<a href='?nav=voters&nis=$row[nis]' class='btn btn-success btn-sm m-2'>Edit</a>";
               echo "<a href='voterdel.php?nis=$row[nis]' class='btn btn-danger btn-sm m-2'>Delete</a>";
               echo "</td>";
               echo "</tr>";
            }
         }
      ?>
   </tbody>
</table>
<script>
   $(document).ready(function(){
     $("#search").on("keyup", function() {
       var value = $(this).val().toLowerCase();
       $("#voters tbody>tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
     });
   });
</script>
<?php
   if(isset($_GET["nis"])){
      $edit = true;
      $nis = $name = $class = "";
      $query = "SELECT * FROM voters WHERE nis = '$_GET[nis]'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0){
         $rows = mysqli_fetch_assoc($result);
         $nis = $rows["nis"];
         $name = $rows["name"];
         $tgl = $rows["tgl"];
         $class = $rows["class"];
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
                  echo "<a href='index.php?nav=voters' class='close'>&times;</a>";
               else
                  echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
             ?>
         </div>
         <div class="modal-body">
            <form action="<?php if($edit) echo "voteredit.php"; else echo "votersv.php"; ?>" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="nis">nis:</label>
                  <input type="text" class="form-control" name="nis" id="nis" placeholder="nis"
                  value="<?php if($edit) echo $nis; else echo ""; ?>" <?php if($edit) echo "readonly"; ?>>
               </div>
               <div class="form-group">
                  <label for="name">name:</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="name"
                  value="<?php if($edit) echo $name; else echo ""; ?>">
               </div>
               <div class="form-group">
                  <label for="tgl">tanggal lahir:</label>
                  <input type="date" class="form-control" name="tgl" id="tgl"
                  value="<?php if($edit) echo $tgl; else echo ""; ?>">
               </div>
               <div class="form-group">
                  <label for="class">class:</label>
                  <input list="classlist" type="text" class="form-control" name="class" id="class" placeholder="class"
                  value="<?php if($edit) echo $class; else echo ""; ?>">
                  <?php
                     $query = "SELECT DISTINCT class FROM voters ORDER BY class ASC";
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
