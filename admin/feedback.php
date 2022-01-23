<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AT2HB | Feedback</title>
  <link rel="shortcut icon" href="../img/favicon.ico"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="_asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="_asset/boostrap/css/adminlte.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="_asset/css/dashboard.css">
    <link rel="stylesheet" href="_asset/css/card-popup.css">
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
      <span class="brand-text font-weight-light">Admin Rand</span>
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
            <a href="dashboard.php" class="nav-link">
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
            <a href="feedback.php" class="nav-link active">
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
      <div class="card-popup" id="detail"></div>
      <!-- pop-up -->
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Feedback/Enquiry/Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Feedback.Enquiry.Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Insert content here -->
            <div class="row">
              <div class="col-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Report List</h3>
    
                        <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                  </div>
                  <!-- /.card-header -->
<?php 
    $report_array = $db_handler->runQuery("SELECT feedback_id,feedback_datetime,user_id,user_name,feedback_subject,feedback_detail
    FROM feedback JOIN user USING(user_id) 
    WHERE feedback_type='Report'
    ORDER BY feedback_id DESC;");
?>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Submitted</th>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Detail</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
  if (!empty($report_array)) { 
  foreach($report_array as $key=>$value){
?>
                      <tr>
                        <td><?php echo $report_array[$key]["feedback_id"]; ?></td>
                        <td><?php echo $report_array[$key]["feedback_datetime"]; ?></td>
                        <td><?php echo $report_array[$key]["user_id"]; ?></td>
                        <td><?php echo $report_array[$key]["user_name"]; ?></td>
                        <td><?php echo $report_array[$key]["user_email"]; ?></td>
                        <td><?php echo $report_array[$key]["feedback_subject"]; ?></td>
                        <td><?php echo $report_array[$key]["feedback_detail"]; ?></td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeIt(<?php echo $report_array[$key]['feedback_id']; ?>)" style='width:2.5em'><i class="fas fa-times"></i></button></td>
                    </tr>
<?php }} ?>
                    </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">

                 </div>
                <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12">
                <div class="card card-secondary collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title">Enquiry List</h3>
    
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                  </div>
                  <!-- /.card-header -->
<?php 
    $enquiry_array = $db_handler->runQuery("SELECT feedback_id,feedback_datetime,user_id,user_name,user_email,feedback_subject,feedback_detail
    FROM feedback JOIN user USING(user_id) 
    WHERE feedback_type='Enquiry'
    ORDER BY feedback_id DESC;");
?>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed table-hover text-nowrap">
                      <thead>
                      <tr>
                          <th>#</th>
                          <th>Submitted</th>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Detail</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
  if (!empty($enquiry_array)) { 
  foreach($enquiry_array as $key=>$value){
?>
                      <tr>
                        <td><?php echo $enquiry_array[$key]["feedback_id"]; ?></td>
                        <td><?php echo $enquiry_array[$key]["feedback_datetime"]; ?></td>
                        <td><?php echo $enquiry_array[$key]["user_id"]; ?></td>
                        <td><?php echo $enquiry_array[$key]["user_name"]; ?></td>
                        <td><?php echo $enquiry_array[$key]["user_email"]; ?></td>
                        <td><?php echo $enquiry_array[$key]["feedback_subject"]; ?></td>
                        <td><?php echo $enquiry_array[$key]["feedback_detail"]; ?></td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeIt(<?php echo $enquiry_array[$key]['feedback_id']; ?>)" style='width:2.5em'><i class="fas fa-times"></i></button></td>
                    </tr>
<?php }} ?>
                    </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                 </div>
                <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12">
                <div class="card card-secondary collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title">Feedback List</h3>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                  </div>
                  <!-- /.card-header -->
<?php 
    $review_array = $db_handler->runQuery("SELECT feedback_id,feedback_datetime,user_id,user_name,user_email,feedback_subject,feedback_detail
    FROM feedback JOIN user USING(user_id) 
    WHERE feedback_type='Feedback'
    ORDER BY feedback_id DESC;");

    // $review_array = $db_handler->runQuery("SELECT feedback_id,feedback_datetime,user_id,user_name,feedback_subject,feedback_detail,reservation_rating,court_name
    // FROM feedback JOIN (user JOIN (reservation JOIN court USING (court_id)) USING (user_id) )USING(user_id) 
    // WHERE feedback_type='Feedback'
    // ORDER BY feedback_id DESC;");
?>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed table-hover text-nowrap">
                      <thead>
                      <tr>
                          <th>#</th>
                          <th>Submitted</th>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Detail</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
  if (!empty($review_array)) { 
  foreach($review_array as $key=>$value){
?>
                      <tr>
                        <td><?php echo $review_array[$key]["feedback_id"]; ?></td>
                        <td><?php echo $review_array[$key]["feedback_datetime"]; ?></td>
                        <td><?php echo $review_array[$key]["user_id"]; ?></td>
                        <td><?php echo $review_array[$key]["user_name"]; ?></td>
                        <td><?php echo $review_array[$key]["user_email"]; ?></td>
                        <td><?php echo $review_array[$key]["feedback_subject"]; ?></td>
                        <td><?php echo $review_array[$key]["feedback_detail"]; ?></td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeIt(<?php echo $review_array[$key]['feedback_id']; ?>)" style='width:2.5em'><i class="fas fa-times"></i></button></td>
                    </tr>
<?php }} ?>
                    </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                 </div>
                <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.row -->

 
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
<!-- AdminLTE App -->
<script src="_asset/boostrap/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="_asset/boostrap/js/demo.js"></script>

<script type="text/javascript">
  function removeIt(str){

    if (confirm("Do you want to delete?") == true) {
        $.ajax({
            type: 'post',
            url: '_asset/process/feedback_ctrl.php?action=remove',
            data: {
                feedback_id:str 
            },
            success: function( data ) {
                console.log( "Success" );
            }
        });
        document.location.reload();
    } 
  }

  // function viewMore(str){
  //   $("#detail").load('_asset/process/feedback_ctrl.php?action=read&user_id='+str);
  //   return;     
  // }

  function closeCard(str){
    $("#detail").html('');
    return;     
  }
</script>

</body>
</html>
