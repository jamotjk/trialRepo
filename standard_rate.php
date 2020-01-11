<?php


  include'includes/header.php';
   if (isset($_SESSION['u_name'])) {
    
  } else {
    header("Location: login.php");
  }

  include'includes/navigation.php';
  include'connection.php';
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
        date('g:i:s:a');?>
        <input type="text"  name="timeC"  hidden value="<?php echo $time = date('g:i:s:a');?>">


	 </form>
</div>
   <br>

   <form method="POST">
    <div class="navigation text-white card-header py-1 ">
  <button class="btn btn-default text-white rounded-pill " type="submit" name="records"><i class="fa fa-book"></i> Records</button>
    </div>
	<div class="card shadow-sm mx-auto" style="width:100%;font-size: 15px;">

   <div class="container">
<br>
 <div class="card-body shadow-sm border">
<div class="mt-1"  style="width:100%;font-size: 15px;margin-left: -9px;">
<div class="row"  style="width:104%;">
  <div class="col" >
  <select name = "searchRoomtype" class="form-control ml-3 col-sm-12"  >
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
          <button type="submit" name="searchbtn" class="btn col-sm-5 ml-2 text-white btn-primary" data-toggle="tooltip" title="Search"><i class="fa fa-search"></i> </button>
        </div>
    <div class="col">
    <button class="btn btn-info col-sm-5 float-right "><a href="report.php" class="text-decoration-none text-white fa fa-print" data-toggle="tooltip" title="Print" >  </a></button>
      </div>
    </div>
  
</div>
<br>
     <?php 
     if (isset($_POST["records"])) {

        # To View all standard room rate created  records...

          include 'tablehead.php';
          $result = sqlsrv_query($conn,"select distinct room_name,weekend,weekly,monthly,date_created,time_created,standard_id from Arch_standard_rate_tbl order by standard_id desc");
            while($row=sqlsrv_fetch_array($result)){
            echo "  <tr>";  
            echo '<td>'; echo $a=$row["room_name"]; echo '</td>';
            echo '<td>'; echo $c=number_format($row["weekend"],2); echo '</td>';
            echo '<td>'; echo $d=number_format($row["weekly"],2) ; echo '</td>';
            echo '<td>'; echo $e=number_format($row["monthly"],2) ; echo '</td>';
            echo '<td><center>'; echo $f= $row["date_created"]; echo '</td></center>';                   
?>          <td class="text-center "><a href="edit_standard_rate.php?standard_id=<?php echo $row['standard_id'];?>" ><i class="fa fa-edit text-success"></i><a></td>    
  </tr>
  <?php 
       }
      } if (isset($_POST["searchbtn"])) {
            $date  = $_POST['date']; 
            if (($date=='By Date') && ($_POST['searchRoomtype']=='By Room type')) {
              # code...
            }
            else{
                    include 'tablehead.php';
            }
            # To View all standard room rate created  records BY Room type...
      

            $result = sqlsrv_query($conn,"select distinct room_name,weekend,weekly,monthly,date_created,time_created,standard_id from Arch_standard_rate_tbl where room_name ='$_POST[searchRoomtype]' order by standard_id desc");
            while($row=sqlsrv_fetch_array($result)){
            echo "  <tr>";  
            echo '<td>'; echo $a=$row["room_name"]; echo '</td>';
            echo '<td>'; echo $c=number_format($row["weekend"],2); echo '</td>';
            echo '<td>'; echo $d=number_format($row["weekly"],2) ; echo '</td>';
            echo '<td>'; echo $e=number_format($row["monthly"],2) ; echo '</td>';
            echo '<td><center>'; echo $f= $row["date_created"]; echo '</td></center>';   
        ?> 
 <td class="text-center "><a href="edit_standard_rate.php?standard_id=<?php echo $row['standard_id'];?>" ><i class="fa fa-edit text-success"></i><a></td>    
  </tr>
  <?php 
      }
        
          # To View all standard room rate created  records by date...
                 
            $result = sqlsrv_query($conn,"select distinct room_name,weekend,weekly,monthly,date_created,time_created,standard_id from Arch_standard_rate_tbl where date_created =' $date' order by standard_id desc");
            while($row=sqlsrv_fetch_array($result)){
            echo "  <tr>";  
            echo '<td>'; echo $a=$row["room_name"]; echo '</td>';
            echo '<td>'; echo $c=number_format($row["weekend"],2); echo '</td>';
            echo '<td>'; echo $d=number_format($row["weekly"],2) ; echo '</td>';
            echo '<td>'; echo $e=number_format($row["monthly"],2) ; echo '</td>';
            echo '<td><center>'; echo $f= $row["date_created"]; echo '</td></center>';      
         ?> <td class="text-center "><a href="edit_standard_rate.php?standard_id=<?php echo $row['standard_id'];?>" ><i class="fa fa-edit text-success"></i><a></td>    
  </tr>
  <?php 
      }
        }?>
    </tbody>
  </table>
</form>
     </div> 
     <br>  

<?php  
if(isset($_POST["submit"])){    
  if(empty($_POST['weekend']) || empty($_POST['weekly'])|| empty($_POST['monthly'])){
    echo '<script>alert("Action Failed")</script>';
    echo '<script>window.location.href = " standard_rate.php";</script>';
  }
  else{
  sqlsrv_query($conn,"insert into Arch_standard_rate_tbl (room_name,weekend,weekly,monthly,date_created,time_created) values ('$_POST[selectRoomtype]','$_POST[weekend]','$_POST[weekly]','$_POST[monthly]','$_POST[date_created]','$time')");

  $result = sqlsrv_query($conn,"select  room_id,room_type from room_mng where room_type ='$_POST[selectRoomtype]'");
   while($row=sqlsrv_fetch_array($result)){
    $id =$row["room_id"] ;
    $roomtype =$row["room_type"] ;
    sqlsrv_query($conn,"insert into standard_rate_tbl (room_id,weekend,weekly,monthly,date_created,time_created,descript) values('$id','$_POST[weekend]','$_POST[weekly]','$_POST[monthly]','$_POST[date_created]','$time','standard')");

     echo '<script>alert("Created Successfully")</script>';
     echo '<script>window.location.href = " standard_rate.php";</script>';
    }
  }
}
 ?> 
</div>
</div>
<br>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
