<?php
  include'includes/header.php';
?>

<?php
  include'includes/navigation.php';
  include'connection.php';
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	  Dashboard
	  </div>

          <div class="card-body">
            <div class="container-fluid">
              <div class="row">

                <div class="col-6 col-md-3 mb-2">
                  <div class="card">
                <div class="card-header bg-primary text-white">
                  <i class="fas fa-users"></i> Total Room type
                </div>
                <div class="card-body">
                  <h2 class="card-title text-center">5</h2>
                  
                </div>
                <div class="card-footer">
                  <a href="" class="text-center">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
              </div>
             </div>

             <div class="col-6 col-md-3 mb-2">
                  <div class="card">
                <div class="card-header bg-primary text-white">
                  <i class="fas fa-users"></i> Total Rate type
                </div>
                <div class="card-body">
                  <h2 class="card-title text-center">5</h2>
                  
                </div>
                <div class="card-footer">
                  <a href="" class="text-center">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
              </div>
             </div>

             <div class="col-6 col-md-3 mb-2">
                  <div class="card">
                <div class="card-header bg-primary text-white">
                  <i class="fas fa-users"></i> Total User
                </div>
                <div class="card-body">
                  <h2 class="card-title text-center">5</h2>
                  
                </div>
                <div class="card-footer">
                  <a href="" class="text-center">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
              </div>
             </div>

             <div class="col-6 col-md-3 mb-2">
                  <div class="card">
                <div class="card-header bg-primary text-white">
                  <i class="fas fa-users"></i> Total User
                </div>
                <div class="card-body">
                  <h2 class="card-title text-center">5</h2>
                  
                </div>
                <div class="card-footer">
                  <a href="" class="text-center">More info <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
              </div>
             </div>


              </div>
            </div>


   

<div class="row">
 
	     <div class="col-sm-12">
               <div class="card shadow-sm">
                  <div class="card-body">
                     <canvas id="myChart" width="1000" height="400"></canvas>
                     <script>
                     var ctx = document.getElementById('myChart').getContext('2d');
                     var myChart = new Chart(ctx, {
                         type: 'bar',
                         data: {
                     labels: [<?php 

       $result = sqlsrv_query($conn,"select distinct room_type from room_mng");
        while($data = sqlsrv_fetch_array($result)){
        echo "['".$data['room_type']."',".''."],";

         }?>],
                             datasets: [{
                                 label: 'Room Rate Analytics',
                                 data: [12, 19, 3, 5, 2, 3,5],
                                 backgroundColor: [
                                     'rgba(255, 99, 132, 0.2)',
                                     'rgba(54, 162, 235, 0.2)',
                                     'rgba(255, 206, 86, 0.2)',
                                     'rgba(75, 192, 192, 0.2)',
                                     'rgba(153, 102, 255, 0.2)',
                                     'rgba(255, 159, 64, 0.2)',
                                     'rgba(255, 159, 64, 0.2)'
                                 ],
                                 borderColor: [
                                     'rgba(255, 99, 132, 1)',
                                     'rgba(54, 162, 235, 1)',
                                     'rgba(255, 206, 86, 1)',
                                     'rgba(75, 192, 192, 1)',
                                     'rgba(153, 102, 255, 1)',
                                     'rgba(255, 159, 64, 1)',
                                     'rgba(255, 159, 64, 1)'
                                 ],
                                 borderWidth: 1
                             }]
                         },
                         options: {
                             scales: {
                                 yAxes: [{
                                     ticks: {
                                         beginAtZero: true
                                     }
                                 }]
                             }
                         }
                     });
                     </script>
                  </div>
               </div>
          </div>




         </div>
     </div>
 </div>
</div>