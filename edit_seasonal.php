<?php
  include'includes/header.php';

   if (isset($_SESSION['u_name'])) {
    
  } else {
    header("Location: login.php");
  }


    include'includes/navigation.php';
  include 'connection.php';
?>

<?php

$id =$_REQUEST['seasonal_id'];

?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	   Edit Seasonal Room Rate
	  </div>
	  <div class="card-body"  style="font-size: 15px;">
     
    <?php 
    $result = sqlsrv_query($conn,"SELECT room_mng.room_type,standard_rate_tbl.standard_id,seasonal_rate_tbl.standard_id,seasonal_rate_tbl.seasonal_id,seasonal_rate_tbl.seasonal_status,seasonal_rate_tbl.start_date,seasonal_rate_tbl.end_date,seasonal_rate_tbl.per_amount FROM standard_rate_tbl right JOIN room_mng ON room_mng.room_id = standard_rate_tbl.room_id right JOIN seasonal_rate_tbl ON standard_rate_tbl.standard_id = seasonal_rate_tbl.standard_id where seasonal_id = '$id'");
            while($row=sqlsrv_fetch_array($result)){

           ?>   
<form method="POST">
      <div class="card mt-2 shadow-sm mx-auto" style="width:100%;">
<div class="row mt-3"  style="width:101%;">
  <div class="col" >
<p class="ml-3">Room type:</p>
  <input name = "selectRoomname" class="form-control ml-3 col-sm-12" value="<?php  echo  $row["room_type"]; ?>" >

    </div>
      <div class="col">
<p class="ml-3">Seasonal Status:</p>
  <input name = "selectStat" class="form-control ml-3 col-sm-12" value="<?php echo $row['seasonal_status']; ?>" >
   
      </div>
        <div class="col  ">
      <p class="ml-2">Start Date:</p>
      <input type="date" name="start" class="form-control col-sm-12 ml-2 " value="<?php echo $row['start_date']; ?>">
        </div>
       <div class="col  ">
      <p class="ml-2">End Date:</p>
      <input type="date" name="end" class="form-control col-sm-12 ml-2 " value="<?php echo $row['end_date']; ?>">
      </div>

    </div>


<div class="row mt-3 mb-3" style="width:101%">
    <div class="col ml-2" >
    <p class="ml-2">Percentage Amount:</p>
  <input type="number" min="1" max="100" step="1" ondrop="return false;" onpaste="return false;" name="percent" class="form-control col-sm-12 ml-2 " value="<?php echo number_format($row['per_amount'],2); ?>">

    </div>
<div class="col col-sm-2">
   <p class="ml-2 text-white">.</p>
<button type="submit" name="submit" class="form-control btn btn-success text-white ml-2" data-toggle="tooltip" title="Save"  style="background-image: linear-gradient(to right, #003366 , #4bcffa);"><i class="fa fa-save"></i> </button>

</div>
</div> 

</div>
         <?php
        date_default_timezone_set('Asia/Manila');
        date('g:i:s:a');?>
        <input type="text" hidden  name="timedate"  value="<?php echo $time = date('M d Y g:i:s:a');?>">

</form>
<?php      } ?>

    </div></div></div>

    <?php if (isset($_POST['submit'])) {

  // select data of standard_rate_tbl table to keep basis for calculate seasonal rate

    $result = sqlsrv_query($conn,"SELECT TOP 1 standard_rate_tbl.standard_id,standard_rate_tbl.weekend,standard_rate_tbl.weekly,standard_rate_tbl.monthly,room_mng.room_type,room_mng.room_id,standard_rate_tbl.time_created ,standard_rate_tbl.date_created,standard_rate_tbl.descript FROM standard_rate_tbl left outer join room_mng ON standard_rate_tbl.room_id=room_mng.room_id where room_mng.room_type = '$_POST[selectRoomname]' AND standard_rate_tbl.descript = 'standard' ORDER BY standard_id desc ");   
            if($row=sqlsrv_fetch_array($result)){
                echo $standard_id= $row["standard_id"]; echo "<br>";
                echo $room_id=$row["room_id"]; echo "<br>";
                echo $roomtype=$row["room_type"]; echo "<br>";
                echo $d=$row["weekend"]; echo "<br>";
                echo $e=$row["weekly"]; echo "<br>";
                echo $f=$row["monthly"]; echo "<br>";
                 
                echo $date=$row["date_created"]; echo "<br>";
                echo $time=$row["time_created"]; echo "<br>"; }



echo "<br><br>";
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
  echo  $weekendtot1 = $d+$weekendtot;
  echo  $weeklytot1 = $e+$weeklytot;
  echo  $monthlytot1 = $f+$monthlytot; 
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
  echo  $weekendtot1 = $e+$weekendtot;
  echo  $weeklytot1 = $e+$weeklytot;
  echo  $monthlytot1 = $f+$monthlytot;

}
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
   
}?>