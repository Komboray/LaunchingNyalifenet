<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>
  <link rel="icon" type="image/x-icon" href="nya-logo.jpg">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/chat.css">

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

   

    /* ////css for the table in add medicine side ya admin */
    .form1{
      display:flex;
    }
        /* Your existing CSS styles go here */
        .tables-container {
            display: flex;
            margin-bottom: 20px;
            width: 100%;
        }

        table {
            flex: 1;
            width: 100%;
            border-collapse: collapse;
            margin-right: 10px;
         
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
          background-color: #A9A9A9;
        }

        .choices-container {
            display: flex;
            margin-bottom: 20px;
        }

        .choice-column {
            flex: 1;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        .active-choice {
            background-color: #A9A9A9;
        }
        .table-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.add-button {
    background-color: #3498db;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 5px;
}

.search-form {
    display: flex;
    margin-top: 10px;
}

input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type="submit"] {
    background-color: #2ecc71;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.staff-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.staff-table th, .staff-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.staff-table th {
    background-color: #3498db;
    color: #fff;
}

.staff-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.edit-button, .view-button, .delete-button {
    background-color: #3498db;
    color: #fff;
    padding: 6px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    margin-right: 5px;
}

.edit-button, .view-button, .delete-button {
            background-color: #008CBA;
            color: white;
            padding: 5px 8px;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
            cursor: pointer;
        }
.delete-button {
            background-color: #f44336;
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
        <a class="nav-link" data-toggle="dropdown" href="#">                                                                                                                                                          <?php //@codebyvakotech?>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/logo.png" alt="" class="logo" width="200" height="100"  style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>
    <?php //@codebyvakotech?>
    
    <!-- Sidebar -->
    <div class="sidebar"style=" overflow:auto;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
        <a href="#" class="d-block"> Welcome: <!-- The php tag to display the name from the db --> Raymond</a>
        </div>
      </div>
      
       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="admin_index.php" class="nav-link">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Dashboard
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin_manage_appointments.php" class="nav-link">
              <i class="nav-icon fas  fa-calendar-check"></i>
              <p>
                Appointments
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas   fa-user mr-2"></i>
              <p>
                Staff Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_staff.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_manage_staff.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Staff</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas   fa-users mr-2"></i>
              <p>
                Patients
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin_add_patient.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_manage_patients.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Patients</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas   fa-plus-square mr-2"></i>
              <p>
               Medicine Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_medicine.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Medicine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_manage_medicine.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Medicine</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-address-card"></i>
              <p>
               Hospital Charges
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="charges.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Charges</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_services.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Services</p>
                </a>
              </li>
             
            </ul>
          </li>

          <!-- //THIS IS THE ADDED PARTthe inventory part -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-archive"></i>
              <p>
               Hospital Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_inventory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_hosp_inventory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Inventory</p>
                </a>
              </li>
             
            </ul>
          </li>

          <!-- //THIS IS THE ADDED PARTthe inventory part -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-archive"></i>
              <p>
               Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Messaging
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Report Generation
               
              </p>
            </a>
          </li>
             
            </ul>
          </li>



         

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Tasks
               
              </p>
            </a>
          </li> -->
          

          
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
          <?php //@codebyvakotech?>
</html>
