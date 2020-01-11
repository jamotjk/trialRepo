<?php


  include'includes/header.php';

  include'includes/navigation.php';
  include 'includes/db.inc.php';
include 'includes/function.php';

  
?>



<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	 Create Standard Room Rate
	  </div>
<form method="POST">
  <div class="card-body">
<div class="card mt-2 shadow-sm mx-auto" style="width:100%;font-size: 15px;">
  <br>
<div class="row"  style="width:100%;">
  <div class="col mb-2" >
<p class="ml-4">Room type:</p>
  <select name = "selectRoomtype" class="form-control ml-4 col-sm-12"  >
<option>-</option>
   <?php   
$object=new MyQuery;
$rows= $object->select_roomType();
if(!empty($rows)){
	foreach ($rows as $row) {
	?>

<option><?php  echo $row['room_type']; ?></option>


	<?php
	}
}


 ?>
    </select>
  </div>
 <div class="col">
<p class="ml-3">Weekend:</p>
  <input type="number"  name="weekend" class="form-control col-sm-12 ml-3 ">
      </div>
        <div class="col">
          <p class="ml-2">Weekly:</p>
          <input type="number" name="weekly" class="form-control col-sm-12 ml-2 ">
        </div>
          <div class="col">
          <p class="ml-2"> Monthly</p>
          <input type="number" name="monthly" class="form-control col-sm-12 ml-2 ">
        </div>
           </div>
    <div class="row mt-3 mb-4 ml-1"  style="width:99%;">
       <div class="col  ">
        <button type="submit" name="submit" class="form-control float-right ml-2 btn text-white btn-info" data-toggle="tooltip" title="Save" style="background-image: linear-gradient(to right, #003366 , #4bcffa);width:8pc;"><i class="fa fa-save"></i></button>
      </div>
    </div>
</div>
	  </div>
      <input type="text" name="date_created"  hidden value=" <?php echo  date("M d Y ");?>"> 
         <?php
        date_default_timezone_set('Asia/Manila');
        $time= date('g:i:s:a');?>
	 </form>
</div>
   <br>
   <table class="table table-bordered table-sm">
   	<tr>
   		
   		<th>ID</th>
   		<th>Type</th>
   	</tr>
<?php 

if (isset($_POST['submit'])) {



//object instancesiate
$search = $_POST['selectRoomtype'];
$object1 = new MyQuery;
$rows=$object1->try($search);
if(!empty($rows)){
	foreach ($rows as $row) {

		echo "<tr>";
		echo "<td>"; echo $room_id =$row['room_id']; echo "</d>";
		
		echo "</tr>";

}
date_default_timezone_set('Asia/Manila');
$time= date('g:i:s:a');
$date = date('M d Y');
$weekend=$_POST['weekend'];
$weekly=$_POST['weekly'];
$monthly=$_POST['monthly'];
$object2 = new MyQuery;
$object2->insert_standardRate($room_id,$weekend,$weekly,$monthly,$date,$time);
# code...
 
}

}

 ?>

 </table>