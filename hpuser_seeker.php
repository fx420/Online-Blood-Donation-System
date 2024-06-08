<?php
 session_start(); 
 include_once("dbconn.php");

 if(isset( $_SESSION["loggedin_hp"] )){
   $session_id = $_SESSION["healthcarep_id"];
   $uname = $_SESSION["healthcarep_username"];
   $email = $_SESSION["healthcarep_email"];

 }

 $imagequery = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `healthcare_professional` WHERE `healthcarep_id` = $session_id"));

 $image = $imagequery["image"];

 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Seeker - FusionTech</title>
        <?php include("css_link.php"); ?>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <?php include("js_script_top.php"); ?>
    </head>
    <body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="hpuser_dashboard.php"><img src="assets/img/logo.jpeg" alt="logo" style="width: 80px; height: 32px">FusionTech - Blood Donation Online System</a>
            <ul class="navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/upload/healthcare_professional/<?php echo $image ?>" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="assets/img/upload/healthcare_professional/<?php echo $image ?>" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name"><?php echo $uname;?></div>
                                <div class="dropdown-user-details-email"><?php echo $email;?></div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="hpuser_profile.php">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account
                        </a>
                        <a class="dropdown-item" href="hp_admin_logout.php">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Core</div>
                            <!-- Sidenav Accordion (Dashboard)-->
                            <a class="nav-link" href="hpuser_dashboard.php">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </a>
                            <!-- Sidenav Heading (Custom)-->
                            <div class="sidenav-menu-heading">Main</div>

                            <!-- Sidenav Accordion (Manage Profile) -->
                            <a class="nav-link " href="hpuser_profile.php">
                                <div class="nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                                Profile Settings
                            </a>
                            <!-- Sidenav Accordion (User List)-->
                            <a class="nav-link collapsed active" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                                <div class="nav-link-icon "><i class="fas fa-fw fa-user"></i></div>
                                User List
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="collapseProfile" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link " href="hpuser_donor.php">Donor</a>
                                    <a class="nav-link active" href="hpuser_seeker.php">Seeker</a>
                                    <a class="nav-link " href="hpuser_hp.php">Healthcare Professional</a>
                                </nav>
                            </div>
                            
                            <!-- Sidenav Accordion (Manage Blood Bank Inventory)-->
                            <a class="nav-link collapsed " href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseInv" aria-expanded="false" aria-controls="collapseInv">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-warehouse"></i></div>
                                Blood Bank Inventory
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse " id="collapseInv" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link" href="hpuser_inventory.php">Manage Blood Inventory</a>
                                    <a class="nav-link " href="hpuser_blood_location.php">Blood Location</a>
                                </nav>
                            </div>
                            

                            <!-- Sidenav Accordion (Manage Blood Request)-->
                            <a class="nav-link" href="hpuser_request_table.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-heart"></i></div>
                                Send Blood Request
                            </a>

                            <!-- Sidenav Accordion (Add Blood)-->
                            <a class="nav-link" href="hpuser_blood_receive.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-hand-holding-heart"></i></div>
                                Blood Receive
                            </a>

                            <!-- Sidenav Accordion (Manage Appointment)-->
                            <a class="nav-link " href="hpuser_appointment_table.php">
                                <div class="nav-link-icon"><i class="fa-solid fa-calendar-check"></i></div>
                                Appointment List
                            </a>

                            <!-- Sidenav Accordion (Manage Blood Campaign)-->
                            <a class="nav-link" href="hpuser_camp.php">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-calendar-day"></i></div>
                                Register Blood Campaign
                            </a>

                            <!-- Sidenav Accordion (Manage Recent Blog)-->
                            <a class="nav-link" href="hpuser_contact.php">
                                <div class="nav-link-icon"><i class="fa-solid fa-envelopes-bulk"></i></div>
                                Contact Admin
                            </a>

                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title"><?php echo $uname; ?></div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                        <div class="container-fluid px-4">
                            <div class="page-header-content">
                                <div class="row align-items-center justify-content-between pt-3">
                                    <div class="col-auto mb-3">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="user"></i></div>
                                            Seeker List
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-fluid px-4">
                        <div class="card">
                            <div class="card-body">
                                <table class="table" width="100%" cell-spacing="0" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Seeker ID</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Name</th>
                                            <th>Blood Type</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Latest Request Date</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; FusionTech 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    <?php include("js_link.php"); ?>

    <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'hpuser_seeker_fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [11]
          },
        ]
      });
    });
    </script>
    <!-- user data modal -->

</script>

        
    </body>
</html>
