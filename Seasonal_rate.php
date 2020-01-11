<?php
  include'includes/header.php';


  include'includes/navigation.php';
  include 'connection.php';
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	   Create Seasonal Room Rate
	  </div>
	  <div class="card-body"  style="font-size: 15px;">
	    <!---insert transaction here--->
<form method="POST">
      <div class="card mt-2 shadow-sm mx-auto" style="width:100%;">
<div class="row mt-3"  style="width:101%;">
	<div class="col" >
<p class="ml-3">Room type:</p>
	<select name = "selectRoomname" class="form-control ml-3 col-sm-12"  >

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
<p class="ml-3">Seasonal Status:</p>
	<select name = "selectStat" class="form-control ml-3 col-sm-12"  >
    <option>-</option>>
    	<option>Peak Season</option>
  		<option>Shoulder Season</option> 
  		<option>Low Season</option>
    </select>
	    </div>
		    <div class="col  ">
			<p class="ml-2">Start Date:</p>
			<input type="date" name="start" class="form-control col-sm-12 ml-2 ">
		    </div>
	     <div class="col  ">
			<p class="ml-2">End Date:</p>
			<input type="date" name="end" class="form-control col-sm-12 ml-2 ">
	    </div>

    </div>


<div class="row mt-3 mb-3" style="width:101%">
    <div class="col ml-2" >
    <p class="ml-2">Percentage Amount:</p>
	<input type="number" min="1" max="100" step="1" ondrop="return false;" onpaste="return false;" name="percent" class="form-control col-sm-12 ml-2 ">

    </div>
<div class="col col-sm-2">
	 <p class="ml-2 text-white">.</p>
<button type="submit" name="submit" class="form-control btn btn-success text-white ml-2" id="try" style="background-image: linear-gradient(to right, #003366 , #4bcffa);"><i class="fa fa-save"></i> </button>

</div>
</div> 

</div>
         <?php
        date_default_timezone_set('Asia/Manila');
        date('g:i:s:a');?>
        <input type="text" hidden  name="timedate"  value="<?php echo $time = date('M d Y g:i:s:a');?>">

</form>
	  </div>
	     </div>
<form method="POST">
  <div class="card mt-3 shadow-sm">
    <div class="navigation text-white card-header py-1">
   <button class="btn btn-default text-white rounded-pill " type="submit"  name="records"><i class="fa fa-book"></i> Records</button>
    </div>
   <br>
<div class="container">
  <div class="card-body shadow-sm border mx-auto mb-3" style="width:100%;font-size: 15px;">
    <div class="mt-1"  style="width:100%;font-size: 15px;margin-left: -9px;">
      <div class="row"  style="width:104%;">
    <div class="col" >
  <select name = "searchRoomtype" class="form-control ml-2 col-sm-12"  >
<option>By Room type</option>
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
    <select name = "date" class="form-control ml-2 col-sm-12"  >
      <option>By Date</option>
         <!---selecting room type from connection module data--->
         <?php 
             $result = sqlsrv_query($conn,"select  distinct date_created from Arch_standard_rate_tbl");
            while($row=sqlsrv_fetch_array($result)){
             echo "<option>"; echo $row["date_created"] ; echo "</option>";
              }
           ?>    
    </select>
      </div>
        <div class="col  ">
          <button type="submit" name="searchSeasonal" class="btn col-sm-5 ml-2 text-white  btn-primary" data-toggle="tooltip" title="Search" style=""><i class="fa fa-search"></i> </button>
        </div>
         <div class="col ">
      <button style="" class="btn btn-info  col-sm-5 float-right"><a href="reports.php" class="text-decoration-none text-white fa fa-print" data-toggle="tooltip" title="Print" >  </a></button>
    </div>
  </div>    
  <br>
</div>
<br>

<?php if (isset($_POST['records'])) {
?>
 <table class="table table-bordered table-sm shadow-sm">  
    <thead>
      <tr class="" style="font-size:14px;background-color: #F0F8FF;">      
        <th>Room Type</th>
        <th>Seasonal Status</th>
         <th>Start Date</th>
        <th>End Date</th>
        <th>Percentage Rate</th>
        <th>Monthly Rate</th>
         <th class="text-center">Edit</th>
      </tr>
    </thead>
  <tbody>
<tr>
  
  <?php 
//to get the equal room type from room_mng table and standard_rate_tbl table

    $result = sqlsrv_query($conn,"SELECT room_mng.room_type,standard_rate_tbl.monthly,standard_rate_tbl.standard_id,seasonal_rate_tbl.standard_id,seasonal_rate_tbl.seasonal_id,seasonal_rate_tbl.seasonal_status,seasonal_rate_tbl.start_date,seasonal_rate_tbl.end_date,seasonal_rate_tbl.per_amount FROM standard_rate_tbl
right JOIN room_mng ON room_mng.room_id = standard_rate_tbl.room_id
right JOIN seasonal_rate_tbl ON standard_rate_tbl.standard_id = seasonal_rate_tbl.standard_id order by seasonal_id desc");
            while($row=sqlsrv_fetch_array($result)){
            echo "  <tr>";  
            echo '<td>'; echo $row["room_type"]; echo '</td>';
            echo '<td>'; echo $row["seasonal_status"]; echo '</td>';
            echo '<td>'; echo $row["start_date"]; echo '</td>';
            echo '<td>'; echo $row["end_date"]; echo '</td>';
            echo '<td>'; echo $row["per_amount"]; echo '%</td>';
            echo '<td>'; echo number_format($row["monthly"],2); echo '</td>';
        ?>

  <td class="text-center "><a href="edit_seasonal.php?seasonal_id=<?php echo $row['seasonal_id'];?>" ><i class="fa fa-edit text-success"></i><a></td> 
        <?php  }

 

        ?>
      </tr>
    </tbody>
  </table>

<?php } 

if (isset($_POST['searchSeasonal'])) {
?>
 <table class="table table-bordered table-sm shadow-sm">  
    <thead>
      <tr class="" style="font-size:14px;background-color: #F0F8FF;">
        <th>Room Type</th>
        <th>Seasonal Status</th>
         <th>Start Date</th>
        <th>End Date</th>
        <th>Percentage Rate</th>
        <th>Monthly Rate</th>
         <th class="text-center">Edit</th>
      </tr>
    </thead>
    <tbody>
  <tr>

  <?php 
//to get the equal room type from room_mng table and standard_rate_tbl table using right join for displaying record purposes

    $result = sqlsrv_query($conn,"SELECT room_mng.room_type,standard_rate_tbl.monthly,standard_rate_tbl.standard_id,seasonal_rate_tbl.standard_id,seasonal_rate_tbl.seasonal_id,seasonal_rate_tbl.seasonal_status,seasonal_rate_tbl.start_date,seasonal_rate_tbl.end_date,seasonal_rate_tbl.per_amount FROM standard_rate_tbl
right JOIN room_mng ON room_mng.room_id = standard_rate_tbl.room_id
right JOIN seasonal_rate_tbl ON standard_rate_tbl.standard_id = seasonal_rate_tbl.standard_id where room_mng.room_type ='$_POST[searchRoomtype]' order by seasonal_id desc");
            while($row=sqlsrv_fetch_array($result)){
            echo "  <tr>";  
            echo '<td>'; echo $row["room_type"]; echo '</td>';
            echo '<td>'; echo $row["seasonal_status"]; echo '</td>';
            echo '<td>'; echo $row["start_date"]; echo '</td>';
            echo '<td>'; echo $row["end_date"]; echo '</td>';
            echo '<td>'; echo $row["per_amount"]; echo '%</td>';
            echo '<td>'; echo number_format($row["monthly"],2); echo '</td>';?>


             <td class="text-center "><a href="edit_standard_rate.php?standard_id=<?php echo $row['standard_id'];?>" ><i class="fa fa-edit text-success"></i><a></td> 
        <?php  }

   ?>
      </tr>
    </tbody>
  </table>
<?php 
  }
 ?>
</div>
</div>
</div>
<br>
</form></div>
  
    <?php

if (isset($_POST['submit'])) {

  // select data of standard_rate_tbl table to keep basis for calculate seasonal rate

    $result = sqlsrv_query($conn,"SELECT TOP 1 standard_rate_tbl.standard_id,standard_rate_tbl.weekend,standard_rate_tbl.weekly,standard_rate_tbl.monthly,room_mng.room_type,room_mng.room_id,standard_rate_tbl.time_created ,standard_rate_tbl.date_created,standard_rate_tbl.descript FROM standard_rate_tbl left outer join room_mng ON standard_rate_tbl.room_id=room_mng.room_id where room_mng.room_type = '$_POST[selectRoomname]' AND standard_rate_tbl.descript = 'standard' ORDER BY standard_id desc ");   
            if($row=sqlsrv_fetch_array($result)){
                 $a= $row["standard_id"]; echo "<br>";
                 $b=$row["room_id"]; echo "<br>";
                 $roomtype=$row["room_type"]; echo "<br>";
                 $d=$row["weekend"]; echo "<br>";
                 $e=$row["weekly"]; echo "<br>";
                 $f=$row["monthly"]; echo "<br>";
                 
                 $date=$row["date_created"]; echo "<br>";
                 $time=$row["time_created"]; echo "<br>";

if(empty($_POST['percent'])){
  echo '<script>alert("Pleasse Check the Corresponding Inputs")</script>';
  echo '<script>window.location.href = " Seasonal_rate.php";</script>';   

}else{
if (date($_POST['start']) < date('Y-m-d')) {
  echo '<script>alert("Invalid: The start date is bellow than current date")</script>';
  echo '<script>window.location.href = " Seasonal_rate.php";</script>';   
}
  else if(date($_POST['start']) >= date($_POST['end'])){

  echo '<script>alert("Invalid: Please Check the Date Restriction")</script>';
  echo '<script>window.location.href = " Seasonal_rate.php";</script>';   

 }else{


//calculate the given percent to stndard rate


$percent = $_POST['percent'];

//if  the percent input is less than 10 multiply standard rate to percent and divided by 10
if ($percent<10) {
 
   $weekend = $d*$percent;
   $weekly = $e*$percent;
   $monthly = $percent*$f;

   //get the divedent value to get the value of  seasonal amount 
    $weekendtot = $weekend/10;
    $weeklytot = $weekly/10;
    $monthlytot = $monthly/10;

    //add gotten value of devided  seasonal percent to original standard rate
    $weekendtot1 = $d+$weekendtot;
    $weeklytot1 = $e+$weeklytot;
    $monthlytot1 = $f+$monthlytot; 
}

//if  the percent input is greater than 10 multiply standard rate to percent and divided by 100 
if ($percent>=10) {
   $weekend = $d*$percent;
   $weekly = $e*$percent;
   $monthly = $f*$percent;

   //get the divedent value to get the value of  seasonal amount 
    $weekendtot = $weekend/100;
    $weeklytot = $weekly/100;
    $monthlytot = $monthly/100;
    //add gotten value of devided  seasonal percent to original standard rate
    $weekendtot1 = $e+$weekendtot;
    $weeklytot1 = $e+$weeklytot;
    $monthlytot1 = $f+$monthlytot;
}
  //get the standard rate data and insert in the same table but the  entity descript will be seasonal and the standard rate will be change but cant deleted, 

  $result = sqlsrv_query($conn,"SELECT  room_mng.room_id, standard_rate_tbl.room_id,standard_rate_tbl.date_created,room_mng.room_type,standard_rate_tbl.time_created FROM standard_rate_tbl right outer JOIN room_mng ON standard_rate_tbl.room_id=room_mng.room_id where room_mng.room_type ='$roomtype'and standard_rate_tbl.date_created ='$date'");
    while($row=sqlsrv_fetch_array($result)){
     $insert_room_id=$row["room_id"] ; 
     $insert_room_type=$row["room_type"] ; 
     $insert_date=$row["date_created"] ; 
     $insert_time=$row["time_created"] ; 

    // inserting the seasonal rate data in standard_rate_tbl
    
    sqlsrv_query($conn,"insert into standard_rate_tbl (room_id,weekend,weekly,monthly,date_created,time_created,descript) values('$insert_room_id','$weekendtot1','$weeklytot1','$monthlytot1','$insert_date','$insert_time','seasonal')");

  }
echo $end=$_POST['end'];echo "<br>";
echo $start=$_POST['start'];echo "<br>";
echo $stat=$_POST['selectStat'];echo "<br>";
echo $percent=$_POST['percent'];echo "<br>";
Echo $timedate=$_POST['timedate'];

  $result = sqlsrv_query($conn,"SELECT TOP 1 standard_rate_tbl.standard_id,standard_rate_tbl.monthly,room_mng.room_type,room_mng.room_id FROM standard_rate_tbl left outer join room_mng ON standard_rate_tbl.room_id=room_mng.room_id where room_mng.room_type = '$_POST[selectRoomname]' ORDER BY standard_id desc ");
          
            while($row=sqlsrv_fetch_array($result)){
              
                  $standardid= $row["standard_id"]; echo "<br>";
                  $id=$row["room_id"]; echo "<br>";
                  $roomtype=$row["room_type"]; echo "<br>";
                 
    }
                //    inserting data for seasonal rate tabl   
sqlsrv_query($conn,"insert into seasonal_rate_tbl(standard_id,seasonal_status,per_amount,start_date,end_date,date_time)values ('$standardid','$stat','$percent','$start','$end','$timedate')");     
  
  echo '<script>alert("Created Successfully")</script>';
  echo '<script>window.location.href = " Seasonal_rate.php";</script>';   
    } 

  }

}else{  
  echo '<script>alert("Check standarate room rate")</script>';
  echo '<script>window.location.href = " Seasonal_rate.php";</script>';   
      
  }
}
?>

 <!--script for tool tip-->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

