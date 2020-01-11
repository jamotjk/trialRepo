<?php


  include'includes/header.php';
   if (isset($_SESSION['u_name'])) {
    
  } else {
    header("Location: login.php");
  }
?>

<?php
  include'includes/navigation.php';
?>
<?php
  include'connection.php';


 $id=$_REQUEST['standard_id'];
 $sql="select * from Arch_standard_rate_tbl where standard_id ='$id'";
  $result = sqlsrv_query($conn, $sql);
  while($row=sqlsrv_fetch_array($result)){
  $row["standard_id"] ; 
   $row["room_name"] ; 
   $row["weekend"] ; 
   $row["weekly"] ; 
   $row["monthly"] ; 


?>
<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	 Edit Standard Room Rate
	  </div>



<form method="POST">

<div class="card-body">
<div class="card mt-2 shadow-sm mx-auto" style="width:100%;font-size: 15px;">
  <br>
<div class="row"  style="width:100%;">
  <div class="col mb-2" >
<p class="ml-4">Room type:</p>
   <input type="text" name="room_name" class="form-control col-sm-12 ml-3 " value="<?php  echo $row['room_name'] ; ?>">
    </div>
      <div class="col">
<p class="ml-3">Weekend:</p>
  <input type="text" name="weekend" class="form-control col-sm-12 ml-3 " value="<?php  echo $row['weekend'] ; ?>">
      </div>
        <div class="col">
          <p class="ml-2">Weekly:</p>
          <input type="text" name="weekly" class="form-control col-sm-12 ml-2 " value="<?php  echo $row['weekly'] ; ?>">
        </div>
          <div class="col">
          <p class="ml-2"> Monthly</p>
          <input type="text" name="monthly" class="form-control col-sm-12 ml-2 " value="<?php  echo $row['monthly'] ; ?>">
        </div>
           </div>
<div class="row mt-2 mb-4"  style="width:100%;">
       <div class="col  ">
        <button type="submit" name="submit" class="form-control col-sm-2 float-right ml-2 btn btn-info rounded-pill"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
</div>
	  </div>
	 </form>
</div>
</div>
<?php } 

if (isset($_POST["submit"])) {
    sqlsrv_query($conn,"update Arch_standard_rate_tbl set room_name='$_POST[room_name]',weekend = '$_POST[weekend]', weekly='$_POST[weekly]',monthly='$_POST[monthly]' where standard_id='$id'");
        echo '<script>alert("Update Successfully")</script>';
    echo '<script>window.location.href = " standard_rate.php";</script>';
}


?>


