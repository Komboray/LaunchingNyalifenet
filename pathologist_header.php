

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pathology | Dashboard</title>
  <link rel="icon" type="image/x-icon" href="nya-logo.jpg">
  <link rel="icon" type="image/png" href="dist/img/favicon.png">
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <style> 
     .hidden {
         display: none;
     }
     .container {
            max-width: 1200px;
            height:500px;
            margin: 60px auto;
            padding: 60px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }

        .container2 {
            max-width: 1200px;
            height:800px;
            margin: 60px auto;
            padding: 60px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }
        select{
                width: 100%;
                background-color: #141824;
                border: none;
                outline: none;
                padding: 10px;
                font-family: 'Poppins';
                margin-top: 5px;
                resize: none;
                color: #fff;
                border-radius: 10px;
            }
            .error{
          background: #F2DEDE;
          color:#A94442;
          padding:10px;
          width:95%;
          border-radius:5px;
          margin:20px auto;
        }
        .success{
          background: #fff;
          color:#FF00FF;
          padding:10px;
          width:95%;
          border-radius:5px;
          margin:20px auto;
        }


.table-box{
    margin: 50px auto;
}

.table-row{
    display: table;
    width:80%;
    margin: 10px auto;
    font-family: sans-serif;
    background: transparent;
    padding: 12px 0;
    color: #555;
    font-size: 13px;
    box-shadow: 0 1px 4px 0 rgba(0,0,50,0.3);
}

.table-cell{
    display: table-cell;
    width: 30%;
    text-align: center;
    padding: 4px 0;
    border-right: 1px solid #d6d4d4;
    vertical-align: middle;
    font-family: sans-serif;
}
.table-head{
    background: #8665f7;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    font-family: sans-serif;
}

.table-total{
    background: #555;
    color: #fff;
    font-weight: 600;
}
.hero-btn{
    display: inline;
    text-decoration: none;
    color: #0000;
    border: 1px solid #0000;
    padding: 12px 34px;
    font-size: 13px;
    background: transparent;
    position: relative;
    cursor: pointer;
}
 /* hover effecr of the button */
 .hero-btn:hover{
    border: 1px solid #8665f7;
    background: #8665f7;
    transition: 1s;
 }

 .contact-col input, .contact-col textarea{
    width: 100%;
    padding: 15px;
    margin-bottom: 17px;
    outline: none;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.table-cell input{
    background-color: #8665f7;
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
            <a href="pathologist_test.php" class="nav-link">
              <i class="nav-icon fas  fa-medkit"></i>
              <p>
               Perform Test
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pathologist_messaging.php" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Messaging
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pathologist_task.php" class="nav-link">
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