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
include 'connection.php';

?>
<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	 Room Rate Tariff
	  </div>



<form method="POST">

<div class="card-body">
<div class="card mt-2 shadow-sm mx-auto" style="width:100%;font-size: 15px;">
  <br>
<div class="row"  style="width:100%;">
  <div class="col mb-2" >
<p class="ml-4">Room type:</p>
  
  <select name = "searchRoomtype" class="form-control ml-4 col-sm-12"  >
<option>-</option>
         <!---selecting room type from connection module data--->
         <?php 

             $result = sqlsrv_query($conn,"select  distinct room_type from room_mng");
            while($row=sqlsrv_fetch_array($result)){
             echo "<option>"; echo $row["room_type"] ; echo "</option>";
         
              }

           ?>
       
    </select>
    </div>
      <div class="col">
<p class="ml-3">Category:</p>
  <select type="text" name="category" class="form-control col-sm-12 ml-3 " >
    
<option>-</option>
<option>Weekend</option>
<option>Weekly</option>
<option>Monthly</option>

  </select>
      </div>
        <div class="col">
          <p class="ml-2">Day(s) Occupancy:</p>
          <select  name="day" class="form-control col-sm-12 ml-2 ">
            
              <option>-</option>
             
                <?php 
          for ($i=1; $i <=31 ; $i++) { 
        ?>
   <option><?php echo $i; ?></option>
<?php
    

}



      ?>

          </select>
        </div>
          <div class="col">
          <p class="ml-2"> Rate Type:</p>
          <select name="ratetype" class="form-control col-sm-12 ml-2 " >
               <option>-</option> 
               <option>  Normal rate</option> 
         <option>  Family rate</option> 
           <option>   Company rate</option> 
           <option>   Business rate</option> 
          </select>
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

<?php 
if (isset($_POST['submit'])) {
  # code...

$result = sqlsrv_query($conn,"SELECT TOP 1 standard_rate_tbl.standard_id,standard_rate_tbl.weekend,standard_rate_tbl.weekly,standard_rate_tbl.monthly,room_mng.room_type,room_mng.room_id,standard_rate_tbl.time_created ,standard_rate_tbl.date_created FROM standard_rate_tbl left outer join room_mng ON standard_rate_tbl.room_id=room_mng.room_id where room_mng.room_type = '$_POST[searchRoomtype]' ORDER BY standard_id desc ");   
            while($row=sqlsrv_fetch_array($result)){
                echo $a= $row["standard_id"]; echo "<br>";
                echo $b=$row["room_id"]; echo "<br>";
                echo  $roomtype=$row["room_type"]; echo "<br>";
                echo $weekend =$row["weekend"]; echo "<br>";
                echo  $weekly=$row["weekly"]; echo "<br>";
                echo  $monthly=$row["monthly"]; echo "<br>";
              }


echo $_POST['category'];
echo $day = $_POST['day'];
echo $_POST['ratetype'];

if($_POST['category']=="Weekly"){
    if($_POST['day']<6){
  echo $rate = $weekly / 5;
  echo number_format($rateweekly = $rate*$day,2);
    }else{
      echo "failed";
    }
 } 
if($_POST['category']=="Weekend"){
    if($_POST['day']<3){
    echo $rate = $weekend / 2;
  echo number_format($rateweekend = $rate*$day,2);
    }else{
      echo "failed";
    }

 } 
 if($_POST['category']=="Monthly"){
    if($_POST['day']>5){
   echo  $rate = $monthly / 31;
   echo "<br>";
  echo number_format($ratemonthly = $rate*$day,2);
    }else{
      echo "failed";
    }

 } 

             }
 ?>

   