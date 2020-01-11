<?php
  include'login-header.php';
?>

<?php

  include 'connection.php';
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	   User Authentication
	  </div>
	  <div class="card-body"  style="font-size: 15px;">

<form method="POST">
<div class="row"  style="width:100%;">
  <div class="col" >

  	      <div class="col">
<p class="ml-3">Username:</p>
  <input type="text" name="uid" class="form-control col-sm-12 ml-3 ">
      </div>
        <div class="col  ">
          <p class="ml-3">Password:</p>
          <input type="password" name="pwd" class="form-control col-sm-12 ml-3 ">
        </div>
        <div class="col  ">
          <p class="ml-3 text-white">:</p>
          <input type="submit" name="submit" class="form-control col-sm-2  float-right btn btn-info rounded-pill" value="Sign-in">
        	</div>
		</div>
	</div>
</form>
</div>
</div>
</div>

<?php 

	if(isset($_POST['submit'])) {

    	    
  						
		
 $uid =$_POST['uid'];
 $pwd =$_POST['pwd'];
	if(empty($uid) || empty($pwd)) {
			echo '<script>alert("User Denied")</script>';
    					echo '<script>window.location.href = " index.php";</script>';
		} else {
					 $result = sqlsrv_query($conn,"select * from users WHERE username = '$_POST[uid]'");
					  while($row=sqlsrv_fetch_array($result)){
   				     	$_SESSION['u_name'] = $row['username'];
						$_SESSION['u_pwd'] = $row['password'];
						echo '<script>alert("User Logged In")</script>';
    					echo '<script>window.location.href = " index.php";</script>';
						



			}
		}
					


}


 ?>
  