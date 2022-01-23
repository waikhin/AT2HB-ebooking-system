<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AT2HB | Dashboard</title>
  <link rel="shortcut icon" href="../img/favicon.ico"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="_asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="_asset/boostrap/css/adminlte.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="_asset/css/dashboard.css">
</head>
<body class="sidebar-mini sidebar-closed sidebar-collapse layout-fixed layout-navbar-fixed">
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if(!isset($_SESSION['rand4ever'])){
  header("Location: index.php");
}

  include"_asset/process/clear_ctrl.php";
    require_once("../user/_asset/process/dbcontroller.php");
    $db_handler = new DBController();
    $conn=$db_handler->connectDB();
?>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../img/rand_logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Team Rand</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="announcement.php" class="nav-link ">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Announcement
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="booking_request.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
<?php 
    $rs2= mysqli_query($conn,"SELECT COUNT(reservation_id) as rsvp_qty 
    FROM reservation
    WHERE reservation_status='Pending';");
    if($rs2){
      $rsvp=mysqli_fetch_assoc($rs2);
      if($rsvp['rsvp_qty']!=0){
?>       
              <span class="badge badge-danger navbar-badge"><?php echo $rsvp['rsvp_qty'];?></span>
<?php }}
?>
              <p>
                Booking Request
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="booking_list.php" class="nav-link ">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="facility.php" class="nav-link ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Facility
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="equipment.php" class="nav-link ">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Equipment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
<?php 
    $rs2= mysqli_query($conn,"SELECT COUNT(user_id) as new_user_qty 
    FROM user
    WHERE user_status!='Verified';");
    if($rs2){
      $rsvp=mysqli_fetch_assoc($rs2);
      if($rsvp['new_user_qty']!=0){
?> 
              <span class="badge badge-danger navbar-badge"><?php echo $rsvp['new_user_qty'];?></span>
<?php }}
?>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="feedback.php" class="nav-link ">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Feedback/Enquiry/Report
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="invoice.php" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Invoice
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Insert content here -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

<?php 
    $rs2= mysqli_query($conn,"SELECT COUNT(reservation_id) as rsvp_qty 
    FROM reservation
    WHERE reservation_status='Pending';");
    if($rs2){
      $rsvp=mysqli_fetch_assoc($rs2);

?>       
              <h3><?php echo $rsvp['rsvp_qty'];?></h3>
<?php }
?>
                <p>New Booking Request</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              <a href="booking_request.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
<?php 
    $rs2= mysqli_query($conn,"SELECT COUNT(reservation_id) as rsvp_qty 
    FROM reservation
    WHERE reservation_status='Approved' AND WEEKOFYEAR(reservation_date)=WEEKOFYEAR(NOW()) AND YEAR(reservation_date) >= YEAR(now());");
    if($rs2){
      $rsvp=mysqli_fetch_assoc($rs2);

?>       
              <h3><?php echo $rsvp['rsvp_qty'];?></h3>
<?php }
?>
                <p>This Week Bookings</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <a href="booking_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
<?php 
    $rs2= mysqli_query($conn,"SELECT COUNT(user_id) as user_qty 
    FROM user
    WHERE WEEKOFYEAR(registered_date)=WEEKOFYEAR(NOW()) AND YEAR(registered_date) = YEAR(now());");
    if($rs2){
      $user=mysqli_fetch_assoc($rs2);

?>       
              <h3><?php echo $user['user_qty'];?></h3>
<?php }
?>

                <p>This Week User Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
<?php 
    $rs2= mysqli_query($conn,"SELECT COUNT(feedback_id) as feedback_qty 
    FROM feedback
    WHERE WEEKOFYEAR(feedback_datetime)=WEEKOFYEAR(NOW()) AND YEAR(feedback_datetime) = YEAR(now());");
    if($rs2){
      $feedback=mysqli_fetch_assoc($rs2);

?>       
              <h3><?php echo $feedback['feedback_qty'];?></h3>
<?php }
?>                
                <p>This Week Reports</p>
              </div>
              <div class="icon">
                <i class="fas fa-flag"></i>
              </div>
              <a href="feedback.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Weekly Booking by Facility</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- PIE CHART -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Monthly Booking by Facility</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.Left col -->

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <div class="col-md-6">
           <!-- DONUT CHART 1-->
           <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Weekly Booking by Faculty</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- PIE CHART 1-->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Monthly Booking by Faculty</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Rand</b> 
    </div>
    <strong>&copy; AT2HB eBooking System</strong> by Team Rand using AdminLTE.io. Template.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="_asset/boostrap/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="_asset/boostrap/js/bootstrap.bundle.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="_asset/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="_asset/boostrap/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="_asset/boostrap/js/demo.js"></script>
<script>
  $(function () {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {   
      labels: [
          'Badminton',
          'Squash',
          'Futsal',
          'Tennis',
          'Rugby',
          'Netball',
          'Volleyball',
          'Takraw',
          'Basketball',
          'Stadium',
          "Wall Climbing",
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100,200,800,900,150,650], //need to link data here
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#fde203', '#7afd03', '#b500d5', '#f200cb', '#24fad8', '#660101'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- PIE CHART 1-
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
    var pieData1       = {
      labels: [
          'FRST',
          'FSS',
          'FCSHD',
          'FACA',
          'FENG',
          'FCSIT',
          'FMHS',
          'FEB',
          'FLC',
          'FBE',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100,200,800,900,350], //need to link data here
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#fde203', '#7afd03', '#b500d5', '#f200cb', '#24fad8'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData1,
      options: pieOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Badminton',
          'Squash',
          'Futsal',
          'Tennis',
          'Rugby',
          'Netball',
          'Volleyball',
          'Takraw',
          'Basketball',
          'Stadium',
          "Wall Climbing",
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100,200,800,900,150,650], //need to link data here
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#fde203', '#7afd03', '#b500d5', '#f200cb', '#24fad8', '#660101'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- DONUT CHART 1-
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart1').get(0).getContext('2d')
    var donutData1       = {
      labels: [
          'FRST',
          'FSS',
          'FCSHD',
          'FACA',
          'FENG',
          'FCSIT',
          'FMHS',
          'FEB',
          'FLC',
          'FBE',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100,200,800,900,350], //need to link data here
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#fde203', '#7afd03', '#b500d5', '#f200cb', '#24fad8'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData1,
      options: donutOptions
    })
  })
</script>
</body>
</html>
