<!---include'header file for the frameworks and CSS-->
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

<div class="col-12 col-sm-9">
   <div class="container-fluid mt-3">
        <div class="card shadow-sm">
          <div class="navigation text-white card-header shadow-sm">
            <i class="fas fa-chart-line"></i> Dashboard
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <div class="row">

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


          </div>
        </div>
      </div>

      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-md-5">
               <div class="card shadow-sm">
                  <div class="card-body">
                     <canvas id="myChart" width="400" height="400"></canvas>
                     <script>
                     var ctx = document.getElementById('myChart').getContext('2d');
                     var myChart = new Chart(ctx, {
                         type: 'bar',
                         data: {
                             labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'],
                             datasets: [{
                                 label: 'Work days',
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
          <div class="col-md-7">
            <div class="card shadow-sm">
                  <div class="card-body">
                     <table class="table">
                       <thead class="bg-primary text-white">
                         <tr>
                           <th scope="col">#</th>
                           <th scope="col">First</th>
                           <th scope="col">Last</th>
                           <th scope="col">Handle</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <th scope="row">1</th>
                           <td>Mark</td>
                           <td>Otto</td>
                           <td>@mdo</td>
                         </tr>
                         <tr>
                           <th scope="row">2</th>
                           <td>Jacob</td>
                           <td>Thornton</td>
                           <td>@fat</td>
                         </tr>
                         <tr>
                           <th scope="row">3</th>
                           <td>Larry</td>
                           <td>the Bird</td>
                           <td>@twitter</td>
                         </tr>
                       </tbody>
                     </table>
                  </div>
               </div>

               <div class="card shadow-sm mt-2">
                  <div class="card-body">
                     <table class="table">
                       <thead class="bg-primary text-white">
                         <tr>
                           <th scope="col">#</th>
                           <th scope="col">First</th>
                           <th scope="col">Last</th>
                           <th scope="col">Handle</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <th scope="row">1</th>
                           <td>Mark</td>
                           <td>Otto</td>
                           <td>@mdo</td>
                         </tr>
                         <tr>
                           <th scope="row">2</th>
                           <td>Jacob</td>
                           <td>Thornton</td>
                           <td>@fat</td>
                         </tr>
                         <tr>
                           <th scope="row">3</th>
                           <td>Larry</td>
                           <td>the Bird</td>
                           <td>@twitter</td>
                         </tr>
                       </tbody>
                     </table>
                  </div>
               </div>
          </div>
  
      </div>
</div>
