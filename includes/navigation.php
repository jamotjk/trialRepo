<!----Navigation---->
<?php 


 ?>
<nav class="navigation navbar navbar-expand-lg navbar-dark shadow-sm">
  <a class="navbar-brand" href="index.php"><h4 class="mt-2"><img src="images/logo.png"> Skyline Hotel and Restaurant</h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <span class="account mr-3 mt-2">
		<div class="dropdown">
		  <button class=" btn btn-outline-info btn-sm border-0 text-white rounded-pill" type="button" data-toggle="dropdown" data-hover="dropdown">
		    <h6 class="mt-2 mr-2"><img class="rounded-circle mr-1" src="images/sampleimg.jpeg" width="30" height="30"> Welcome, Administrator! <h6>
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Account Profile</a>
		    <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
		  </div>
		</div>	
	</span>
	<span class="hr mr-3">		
	</span>
    <span class="mt-2 mr-3">
    	<div class="btn-group">
			  <a href="" class="notif btn btn-outline-info btn-sm border-0 text-white rounded-pill" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Notification"><i class="far fa-bell"></i></a>
			  <div class="dropdown-menu dropdown-menu-right shadow-sm">
			  	<span class="dropdown-item-text"><i class="far fa-bell"></i> Notification <a href="" class="float-right text-primary">Clear All</a></span>
			  	<div class="dropdown-divider"></div>
				  <a class="dropdown-item text-dark" href="#">Procurement sent you a budget request</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item text-dark" href="#">You subscribed to local deals in Amsterdam</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item text-dark" href="#">You accepted to the group</a>
			  </div>
		  </div> 
    </span>

    <span class="mt-2 mr-2 text-white">
    	<a class="text-white text-decoration-none" href=""><i class="notif far fa-question-circle"></i> Help</a>	
    </span>

  </div>
</nav>


<!---Side Navigation Menu-->
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-3">
      <div class="nav mt-3 shadow-sm">
      	<div class="multi-level">
      		<input type="checkbox" id="menu"/>
      		<label class="menu" for="Menu"><i class="fas fa-bars"></i> Menu Navigation</label>
      		<div class="item">
      			<input type="checkbox" id="A"/>
      			<i class="arrow fas fa-chevron-down"></i><label for="A"><i class="fas fa-chart-line"></i> Dashboard</label>

      			<ul>
      				<li><a href="index.php"><i class="fas fa-chart-line"></i> Dashboard</a></li>
      				<li><a href="">Dashboard</a></li>
      				<li><a href="">Dashboard</a></li>
      			</ul>
      		</div>

      		<div class="item">
      			<input type="checkbox" id="B"/>
      			<i class="arrow fas fa-chevron-down"></i><label for="B"><i class="fas fa-border-all"></i> Room Rate Management</label>

      			<ul>
      				<li><a href="dashboard.php"><i class="fas fa-border-all"></i> Dashboard</a></li>
      				<li><a href="Seasonal_rate.php"><i class="fas fa-border-all"></i> Seasonal Rate</a></li>
      				<li><a href="standard_rate.php"><i class="fas fa-border-all"></i> Standard Rate</a></li>
              <li><a href="rate_tariff.php"><i class="fas fa-border-all"></i> Room Rate Tariff</a></li>
              <li><a href="standard_rate.php"><i class="fas fa-border-all"></i> User Logs</a></li>
      			</ul>
      		</div>

      		

      	</div>
      </div>

      <div class="nav mt-3 shadow-sm">
        <div class="multi-level">
          <input type="checkbox" id="menu"/>
          <label class="menu" for="Menu"><i class="fas fa-cog"></i> Settings</label>
          <div class="item">
            <input type="checkbox" id="F"/>
            <i class="arrow fas fa-chevron-down"></i><label for="F"><i class="fas fa-user-cog"></i> Account Settings</label>

            <ul>
              <li><a href=""><i class="far fa-user"></i> Update Profile</a></li>
              <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
          </div>
         
        </div>
      </div>

    </div>