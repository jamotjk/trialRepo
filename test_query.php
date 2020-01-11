<?php


  include'includes/header.php';
?>
<?php
  include'includes/navigation.php';
?>
<?php
include 'connection.php';

?><form method="POST">
<br><br>


<div class="row"  style="width:110%;">
  <div class="col " >
<p class="ml-4">Month:</p>
  <select name = "selectRoomtype" class="form-control ml-4"  >
<option>Jan</option>
<option>Feb</option>
<option>Mar</option>
<option>Apr</option>
<option>May</option>
<option>Jun</option>
<option>Jul</option>
<option>Sep</option>
<option>Oct</option>
<option>Nov</option>
<option>Dec</option>

</select>
  </div>
 <div class="col">
 	<p class="ml-4">Day:</p>
  <select name = "selectRoomtype" class="form-control ml-1 "  >

<?php 
for ($i=1; $i <= 31; $i++) { 
	echo "<option>".$i."</option>";
}

 ?>

</select>
  </div>
        <div class="col">
          <p class="ml-2">Year:</p>
        
 <select name = "selectRoomtype" class="form-control ml-1 "  >
   <?php 
for ($i=2019; $i < 3019; $i++) { 
	
	echo "<option>".$i."</option>";
}

 ?>
</select>
      
        </div>
          
           </div>



           <input type="date" name="start">
           <input type="date" name="end">
          <input type="submit" name="click">
       </form>
<?php 

if(isset($_POST['click'])){
 echo $_POST['start'];
echo "<br>";


echo date_format($_POST['end'],"M d Y");

 }



 ?>