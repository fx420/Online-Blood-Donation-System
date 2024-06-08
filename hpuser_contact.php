<?php
 session_start(); 
 include_once("dbconn.php");

 if(isset( $_SESSION["loggedin_hp"] )){
   $uname = $_SESSION["healthcarep_username"];
   $email = $_SESSION["healthcarep_email"];
   $image = $_SESSION["image"];
 }

 

    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contact - FusionTech</title>
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
                            <!-- Sidenav Heading (Main)-->
                            <div class="sidenav-menu-heading">Main</div>

                            <!-- Sidenav Accordion (Manage Profile) -->
                            <a class="nav-link " href="hpuser_profile.php">
                                <div class="nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                                Profile Settings
                            </a>
                            <!-- Sidenav Accordion (User List)-->
                            <a class="nav-link collapsed " href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                                <div class="nav-link-icon "><i class="fas fa-fw fa-user"></i></div>
                                User List
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse  " id="collapseProfile" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link " href="hpuser_donor.php">Donor</a>
                                    <a class="nav-link" href="hpuser_seeker.php">Seeker</a>
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

                            <!-- Sidenav Accordion (Contact Admin)-->
                            <a class="nav-link active" href="hpuser_contact.php">
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
                <div class="container-xl px-4 mt-4">
                    <!-- Contact Forms card-->
                    <div class="card mb-4">
                        <div class="card-header">Contact Admin</div>
                        <div class="card-body">
                            <form id="saveUserForm" action="javascript:void();" method="post" class="was-validated">
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmail">Email address</label>
                                    <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="Enter your email address" required="required" value="<?php echo $email ?>"/>
                                </div>
                                <!-- Form Row (Phone number)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputSubject">Subject</label>
                                    <input class="form-control" id="inputSubject" name="inputSubject" type="text" required="required" placeholder="Enter your subject"  />
                                </div>
                                <!-- Form Row (Message)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputMessage">Message: </label>
                                    <textarea class="form-control" name="inputMessage" id="inputMessage" rows="10" required="required" placeholder="Type Your Message...."></textarea>
                                </div>
                                <button type="submit" value="Send" class="btn btn-primary" id="contactSubmit" name="contactSubmit">Submit</button>
                            </form>
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


        
    </body>
</html>

<script type="text/javascript">
        $(document).on('submit', '#saveUserForm', function(event) {
        event.preventDefault();
        var email = $('#inputEmail').val();
        var subject = $('#inputSubject').val();
        var msg = $('#inputMessage').val();

        if (email != '' && subject != '' && msg != '') {
          var form = new FormData();
          form.append("email", email);
          form.append("subject", subject);
          form.append("msg", msg);

          var settings = {
              "async": true,
              "url": 'hpuser_contact_add.php',
              "type": "POST",
              "processData": false,
              "contentType": false,
              "mimeType": "multipart/form-data",
              "data": form
          };

          $.ajax(settings).done(function (data) {

              var d = JSON.parse(data);

              if (d.status == 'success') {
                Swal.fire({
                title: d.msg,
                icon: 'success',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'OK',
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  } else {
                    window.location.reload();
                  }
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: d.msg,
                })
              }

          }, 'json');

        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please Fill all the require field!',
          })
        }
      });
    </script>
    