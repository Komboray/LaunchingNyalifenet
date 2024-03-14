<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nurse | Dashboard</title>
  <link rel="icon" type="image/x-icon" href="nya-logo.jpg">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://pyscript.net/releases/2024.1.1/core.css" />
  <script type="module" src="https://pyscript.net/releases/2024.1.1/core.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/chat.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  

    <style> 
     .hidden {
         display: none;
     }
    </style>
 

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<style>
    /* Custom styling for the title class */
    .title {
      font-weight: bold;
      color: rgb(191, 30, 135);
      font-size: 28px; /* You can adjust the font size as needed */
      @media (max-width: 600px) {
      .title {
        font-weight: normal; /* Adjust the font weight for smaller screens */
        font-size: 16px; /* Adjust the font size for smaller screens */
      }}
    }
    .error{
          background: #F2DEDE;
          color:#A94442;
          padding:10px;
          width:95%;
          border-radius:5px;
          margin:20px auto;
        }
  </style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="">
        <a href="" class="title">NYALIFE WOMEN'S CLINIC</a>
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

     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          
        <!--  <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>--->
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

</ul>
</nav>


<style>
    /* Custom styling for the title class */
    .logo {
        font-weight: normal; /* Adjust the font weight for smaller screens */
        font-size: 16px; /* Adjust the font size for smaller screens */
      }
  </style>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/logo.png" alt="" class="logo" width="200" height="100"  style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
        <a href="#" class="d-block"> Welcome: <!-- The php tag to display the name from the db -->  Nurse</a>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="nurse_index.php" class="nav-link">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Nurse's Dashboard
               
              </p>
            </a>
          </li>
        
         
          <li class="nav-item">
            <a href="nurse_handlePatient.php" class="nav-link">
              <i class="nav-icon fas  fa-users"></i>
              <p>
               Handle Patients
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="nurse_medicines.php" class="nav-link">
              <i class="nav-icon fas  fa-users"></i>
              <p>
               Medicines
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="nurse_messaging.php" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Messaging
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="nurse_task.php" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Tasks
               
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            
            <a href="logout.php" class="nav-link">
            
              <i class="fas fa-sign-out-alt mr-2" style="color:crimson"></i>
              
                <p class="text-danger"><b> Logout</b></p>
               
            </a>
          </li>
          
         
         
         
    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 

    </body>
</html>