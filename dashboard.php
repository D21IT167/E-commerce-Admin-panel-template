<?php
include "header.php";
?>

<section class="content-main">
	<div class="content-header">
		<h2 class="content-title"> Dashboard </h2>
		<div>
			<a href="#" class="btn btn-primary">Create report</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card card-body mb-4">
        <article class="icontext">
          <span class="icon icon-sm rounded-circle bg-primary-light"><span class="fas fa-dollar-sign" style="color: black"></span> </span>
          <div class="text">
            <h6 class="mb-1">Total Sales</h6>  <span>$19,626,058.20</span>
          </div>
        </article> 
	               
	    </div> <!-- card  end// -->
		</div> <!-- col end// -->
		<div class="col-lg-4">
			<div class="card card-body mb-4">
        <article class="icontext">
          <span class="icon icon-sm rounded-circle bg-success-light"><span class="fas fa-truck" style="color: black"></span></span>
          <div class="text">
            <h6 class="mb-1">Total Orders</h6> <span>87790</span>
          </div>
        </article> 
	    </div> <!-- card end// -->
		</div> <!-- col end// -->
		<div class="col-lg-4">
			<div class="card card-body mb-4">
        <article class="icontext">
          <span class="icon icon-sm rounded-circle bg-warning-light"><span class="fa-solid fa-basket-shopping" style="color: black"></span></span>
          <div class="text">
            <h6 class="mb-1">Total Products</h6>  <span>5678</span>
          </div>
        </article>
	    </div> <!--  end// -->
		</div> <!-- col end// -->
	</div> <!-- row end// -->
	<div class="row">
		<div class="col-xl-8 col-lg-12">
			<div class="card mb-4">
	              <article class="card-body">
	              	<h5 class="card-title">Sale statistics</h5>
	              	<canvas height="120" id="myChart"></canvas>
	              </article> <!-- card-body end// -->
	        </div> <!-- card end// -->
		</div> <!-- col end// -->
		<div class="col-xl-4 col-lg-12">
			<div class="card mb-4">
	       <article class="card-body">

<h5 class="card-title">Marketing</h5>


<span class="text-muted">Facebook page</span>
	<div class="progress mb-3">
<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 15%">15%</div>
</div>

<span class="text-muted">Instagram page</span>
<div class="progress mb-3">
<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 65%">65% </div>
</div>

<span class="text-muted">Google search</span>
<div class="progress mb-3">
<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 51%"> 51% </div>
</div>
<span class="text-muted">Other links</span>
<div class="progress mb-3">
<div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: 80%"> 80%</div>
</div>
<br>
<a href="#" class="btn btn-light">Open analytics <i class="material-icons md-open_in_new"></i> </a>
	         </article> <!-- card-body end// -->
	        </div> <!-- card end// -->
		</div> <!-- col end// -->
	</div> <!-- row end// -->
</section> <!-- content-main end// -->
</main>


<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- ChartJS files-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- Custom JS -->
<script src="js/script.js?v=1.0" type="text/javascript"></script>
<!-- ChartJS customize-->
<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
	    // The type of chart we want to create
	    type: 'line',

	    // The data for our dataset
	    data: {
	        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
	        datasets: [
	        {
	            label: 'Sales',
	            backgroundColor: 'rgb(44, 120, 220)',
	            borderColor: 'rgb(44, 120, 220)',
	            data: [18, 17, 4, 3, 2, 20, 25, 31, 25, 22, 20, 9]
	        },
	        {
	            label: 'Visitors',
	            backgroundColor: 'rgb(180, 200, 230)',
	            borderColor: 'rgb(180, 200, 230)',
	            data: [40, 20, 17, 9, 23, 35, 39, 30, 34, 25, 27, 17]
	        } 

	        ]
	    },
	    // Configuration options go here
	    options: {}
	});
</script>
</body>
</html>