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
        <title>Profile - FusionTech</title>
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
                            <a class="nav-link active" href="hpuser_profile.php">
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
                    Profile
                  </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                  <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="me-1" data-feather="edit"></i>
                    Edit Profile
                  </a>
                </div>
              </div>
            </div>
          </div>
        </header>
        <!-- Main page content-->

        <div class="container-xl px-4 mt-4">
          <div class="row">
              <div class="col-xl-4">
                  <!-- Profile picture card-->
                  <div class="card mb-4 mb-xl-0">
                      <div class="card-header">Profile Picture</div>
                      <div class="card-body text-center">
                          <!-- Profile picture image-->
                          <img class="img-account-profile rounded-circle mb-2" src="assets/img/upload/healthcare_professional/<?php echo $image ?>" alt="" />
                      </div>
                  </div>
              </div>
              <div class="col-xl-8">
                  <!-- Account details card-->
                  <div class="card mb-4">
                      <div class="card-header">Account Details</div>
                      <div class="card-body">
                          <form action="" method="post">
                          <?php
                              $sql_query = "SELECT * FROM `healthcare_professional` WHERE `healthcarep_username` = '$uname';";
                              $results = mysqli_query($conn, $sql_query);
                              while($row = mysqli_fetch_assoc($results)){
                          ?>
                              <!-- Form Group (username)-->
                              <div class="mb-3">
                                  <label class="small mb-1" for="username">Username (how your name will appear to other users on the site)</label>
                                  <input class="form-control" id="username" name="username" type="text" placeholder="Enter your username" value="<?php echo $uname ?>" disabled/>
                              </div>
                              <!-- Form Row (Full Name)-->
                              <div class="mb-3">
                                  <label class="small mb-1" for="name">Full Name</label>
                                  <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" value="<?php echo $row["healthcarep_name"]; ?>" disabled/>
                              </div>
                              <!-- Form Row (Home Address)-->
                              <div class="mb-3">
                                  <label class="small mb-1" for="password">Password</label>
                                  <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password" value="<?php echo $row["healthcarep_password"]; ?>" disabled/>
                              </div>
                              <!-- Form Group (email address)-->
                              <div class="mb-3">
                                  <label class="small mb-1" for="email">Email address</label>
                                  <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email address" value="<?php echo $row["healthcarep_email"]; ?>" disabled/>
                              </div>
                              <!-- Form Row (Phone number)-->
                              <div class="mb-3">
                                      <label class="small mb-1" for="contact">Phone number</label>
                                      <input class="form-control" id="contact" name="contact" type="tel" placeholder="Enter your phone number" value="<?php echo $row["healthcarep_contact"]; ?>" disabled/>
                              </div>
                              <div class="mb-3">
                                      <label class="small mb-1" for="contact">Currently Work On: </label>
                                      <input class="form-control" id="contact" name="contact" type="tel" placeholder="Enter your phone number" value="<?php echo "BDC".$row["center_id"]; ?>" disabled/>
                              </div>
                          </form>
                          <?php } ?>
                      </div>
                  </div>
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

    <script>
    $(document).on('submit', '#updateUserForm',function(){
      var id = $('#id').val();
      var trid = $('#trid').val();
      var healthcarep_username = $('#_inputUsername').val();
      var healthcarep_password = $('#_inputPassword').val();
      var healthcarep_name = $('#_inputName').val();
      var healthcarep_email = $('#_inputEmail').val();
      var healthcarep_contact = $('#_inputContact').val();
      var image = $('#_inputImage')[0].files[0];

      var form = new FormData();
        form.append("id", id);
        form.append("healthcarep_username", healthcarep_username);
        form.append("healthcarep_password", healthcarep_password);
        form.append("healthcarep_name", healthcarep_name);
        form.append("healthcarep_email",healthcarep_email);
        form.append("healthcarep_contact", healthcarep_contact);
        form.append("image", image);


         var settings = {
            "async": true,
            "url": 'hpuser_profile_edit.php',
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
            }
            else
            {
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: d.msg,
            })
            }

         }, 'json');
    });
    </script>

  </script>


  <!-- update profile modal -->
  <!-- Modal -->
  <?php
  $editsql = "SELECT * FROM `blood_donation_center` ";
  $editQuery = mysqli_query($conn,$editsql);
  ?>
  <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Healthcare Professional Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="updateUserForm" action="javascript:void();" method="post" class="was-validated">
          <?php
          $sql_query = "SELECT * FROM `healthcare_professional` WHERE `healthcarep_username` = '$uname';";
          $results = mysqli_query($conn, $sql_query);
          while($row = mysqli_fetch_assoc($results)){
          ?>
          <div class="modal-body">
            <input type="hidden" id="id" name="id" value="<?php echo $row['healthcarep_id'] ?>">
            <input type="hidden" id="trid" name="trid" value="">
            <div class="mb-3 row">
              <label for="idforshown" class="col-sm-3 col-form-label">Healthcare Professional ID: </label>
              <div class="col-sm-9">
                <input type="text" name="idforshown" class="form-control" id="idforshown" disabled value="<?php echo $row['prefix'].$row['healthcarep_id'] ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputUsername" class="col-sm-3 col-form-label">Username: </label>
              <div class="col-sm-9">
              <input type="text" name="_username" class="form-control" id="_inputUsername" value="<?php echo $uname ?>" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputPassword" class="col-sm-3 col-form-label">Password: </label>
              <div class="col-sm-9">
              <input type="password" name="_inputPassword" class="form-control" id="_inputPassword" value="<?php echo $row['healthcarep_password'] ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputName" class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-9">
              <input type="text" name="_inputName" class="form-control" id="_inputName" value="<?php echo $row['healthcarep_name'] ?>" pattern="^[a-zA-Z '.,]{4,}(?: [a-zA-Z]+)?(?: [a-zA-Z]+)?$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputEmail" class="col-sm-3 col-form-label">Email: </label>
              <div class="col-sm-9">
                <input type="email" name="_inputEmail" class="form-control" id="_inputEmail" value="<?php echo $row['healthcarep_email'] ?>" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputContact" class="col-sm-3 col-form-label">Contact: </label>
              <div class="col-sm-9">
                <input type="text" name="_inputContact" class="form-control" id="_inputContact" value="<?php echo $row['healthcarep_contact'] ?>" pattern="^(01)[0-9]{8,9}$" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputImage" class="col-sm-3 col-form-label">Profile Picture</label>
              <div class="col-sm-9">
                <input type="file" name="inputImage" class="form-control" id="_inputImage" accept="image/*" class="box">
              </div>
            </div>
          </div>
          <?php mysqli_close($conn);} ?>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary SaveBtn" >Save Changes</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- end update profile modal -->
    
</body>

</html>