<?php
 session_start(); 
 include_once("dbconn.php");

 if(isset( $_SESSION["loggedin_hp"] )){
   $session_id = $_SESSION["healthcarep_id"];
   $uname = $_SESSION["healthcarep_username"];
   $email = $_SESSION["healthcarep_email"];
   $centerIDses = $_SESSION["center_id"];
   $image = $_SESSION["image"];
 }else{
  header("Location: 400.php");
 }
  $imagequery = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `healthcare_professional` WHERE `healthcarep_id` = $session_id"));

  $image = $imagequery["image"];

  mysqli_close($conn);

 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Appoinment list - FusionTech</title>
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
                            <a class="nav-link active" href="hpuser_appointment_table.php">
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
                                            Appointment List
                                        </h1>
                                    </div>
                                    <div class="col-12 col-xl-auto mb-3">
                                        <a class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                            <i class="me-1" data-feather="user-plus"></i>
                                            Add New Appointment
                                        </a>
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
                                            <th>ID</th>
                                            <th>Donor</th>
                                            <th>Healthcare Professional</th>
                                            <th>Center ID</th>
                                            <th>Appointment Date & Time</th>
                                            <th>Status</th>
                                            <th>Options</th>
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
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excelHtml5',
            text: 'Generate Reports',
            title: 'FusionTech Online Blood Donation',
            autoFilter: true,
            className: '',
            messageTop: 'Appointment List',
            messageBottom: 'Generate Date: <?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("d-m-Y h:i:sa") ?>',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
            }
          }
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'hpuser_appointment_fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [6]
          },
        ]
      });
    });
    </script>
    <!-- user data modal -->
    <script type="text/javascript">
       $(document).on('submit', '#saveUserForm', function(event) {
        event.preventDefault();
        var donor = $('#inputDonor').val();
        var healthcarep = $('#inputHealthcarep').val();
        var centerID = $('#inputCenter').val();
        var date_time = $('#inputDateTime').val();
        var appointment_status = "Pending";

        if ( donor != '' && healthcarep != '' && centerID != '' && date_time != '' && appointment_status != '') {
          var form = new FormData();
          form.append("donor", donor);
          form.append("healthcarep", healthcarep);
          form.append("centerID", centerID);
          form.append("date_time",date_time);
          form.append("appointment_status", appointment_status);


          var settings = {
              "async": true,
              "url": 'appointment_add.php',
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

    $(document).on('click', '.editbtn',function(event){
      var id = $(this).data('id');
      var trid = $(this).closest('tr').attr('id');
      $.ajax({
        url:"appointment_get_single_data.php",
        data:{id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          $('#id').val( json.appointment_id);
          $('#idforshown').val(json.prefix + json.appointment_id);
          $('#trid').val(trid);
          $('._inputDonor').selectpicker('val', [json.donor_username]);
          $('#_inputHealthcarep').val(json.healthcarep_username);
          $('._inputCenter').selectpicker('val', [json.center_id]);
          $('#_inputDateTime').val(json.appointment_date_time);
          $('._inputStatus').selectpicker('val', [json.appointment_status]);
          $('#editUserModal').modal('show');

        }
      })
    });

    $(document).on('submit', '#updateUserForm',function(){
      var id = $('#id').val();
      var trid = $('#trid').val();
      var donor = $('#_inputDonor').val();
      var healthcarep = $('#_inputHealthcarep').val();
      var centerID = $('#_inputCenter').val();
      var date_time = $('#_inputDateTime').val();
      var appointment_status = $('#_inputStatus').val();
      var form = new FormData();
        form.append("id", id);
        form.append("donor", donor);
        form.append("healthcarep", healthcarep);
        form.append("centerID", centerID);
        form.append("date_time",date_time);
        form.append("appointment_status", appointment_status);


         var settings = {
            "async": true,
            "url": 'appointment_edit.php',
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


$(document).on('click', '.deleteBtn', function(event) {
      
      var id = $(this).data('id');

      Swal.fire({
      title: 'Are you sure?',
      text: "Delete Appoinment: APM" + id ,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete: APM' + id
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "appointment_delete.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'success') 
            {
              $("#" + id).closest('tr').remove();
              Swal.fire({
                title: 'APM'+ id + ' has been deleted.',
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
              text: 'Failed to Delete Profile!',
            })
            }
          }
        });
        }
      })
    });
    </script>
</script>

    <!-- add appoinment modal -->
    <!-- Modal -->
    <?php
      include('dbconn.php');
      $donorAddsql = "SELECT * FROM `donor` ";
      $donorAddQuery = mysqli_query($conn,$donorAddsql);
      
      $hpAddsql = "SELECT * FROM `healthcare_professional` ";
      $hpAddQuery = mysqli_query($conn,$hpAddsql);

      $centerAddsql = "SELECT * FROM `blood_donation_center` ";
      $centerAddQuery = mysqli_query($conn,$centerAddsql);
    ?>
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="saveUserForm" action="javascript:void();" method="post" class="was-validated">
          <div class="modal-body ">
            <div class="mb-3 row">
              <label for="inputDonor" class="col-sm-3 col-form-label">Donor: </label>
              <div class="col-sm-9">
                <select name="inputDonor" id="inputDonor" class="inputDonor selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>
                  <?php
                  while($row = mysqli_fetch_assoc($donorAddQuery))
                  {
                  echo "<option value='".$row["donor_username"]."' id='inputDonor' name='inputDonor'>".$row["donor_username"]."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputHealthcarep" class="col-sm-3 col-form-label">Healthcare Professional: </label>
              <div class="col-sm-9">
                <input type="text" name="inputHealthcarep" class="form-control" id="inputHealthcarep" value="<?php echo $uname ?>" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputCenter" class="col-sm-3 col-form-label">Center ID: </label>
              <div class="col-sm-9">
                <input type="text" name="inputCenter" class="form-control" id="inputCenter" value="<?php echo $centerIDses ?>" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputDateTime" class="col-sm-3 col-form-label">Appointment Date & Time: </label>
              <div class="col-sm-9">
              <input type="datetime-local" name="inputDateTime" class="form-control" id="inputDateTime" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Appointment</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- end add appoinment modal -->

    <!-- update appoinment modal -->
    <!-- Modal -->
    <?php
      $donorEditsql = "SELECT * FROM `donor` ";
      $donorEditQuery = mysqli_query($conn,$donorEditsql);
      
      $hpEditsql = "SELECT * FROM `healthcare_professional` ";
      $hpEditQuery = mysqli_query($conn,$hpEditsql);

      $centerEditsql = "SELECT * FROM `blood_donation_center` ";
      $centerEditQuery = mysqli_query($conn,$centerEditsql);
    ?>
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="updateUserForm" action="javascript:void();" method="post" class="was-validated">
          <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
            <input type="hidden" id="trid" name="trid" value="">
            <div class="mb-3 row">
              <label for="idforshown" class="col-sm-3 col-form-label">Appointment ID: </label>
              <div class="col-sm-9">
                <input type="text" name="idforshown" class="form-control" id="idforshown" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputDonor" class="col-sm-3 col-form-label">Donor: </label>
              <div class="col-sm-9">
              <select  name="_inputDonor" id="_inputDonor" class="_inputDonor selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>
                  <?php
                  while($row = mysqli_fetch_assoc($donorEditQuery))
                  {
                  echo "<option value='".$row["donor_username"]."' id='_inputDonor' name='_inputDonor'>".$row["donor_username"]."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputHealthcarep" class="col-sm-3 col-form-label">Healthcare Professional: </label>
              <div class="col-sm-9">
                <input type="text" name="_inputHealthcarep" class="form-control" id="_inputHealthcarep" value="<?php echo $uname ?>" disabled>

              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputCenter" class="col-sm-3 col-form-label">Center: </label>
              <div class="col-sm-9">
              <select name="_inputCenter" id="_inputCenter" class="_inputCenter selectpicker form-control" data-live-search="true" title="Choose one of the following..." disabled>
                  <?php
                  while($row = mysqli_fetch_assoc($centerEditQuery))
                  {
                    echo "<option value='".$row["center_id"]."' id='_inputCenter' name='_inputCenter'>"."BDC".$row["center_id"]." - ".$row["center_name"]."</option>";

                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputDateTime" class="col-sm-3 col-form-label">Appointment Date & Time: </label>
              <div class="col-sm-9">
              <input type="datetime-local" name="_inputDateTime" class="form-control" id="_inputDateTime" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="_inputStatus" class="col-sm-3 col-form-label">Appointment Status: </label>
              <div class="col-sm-9">
              <select name="_inputStatus" id="_inputStatus" class="_inputStatus selectpicker form-control" data-live-search="true" title="Choose one of the following..." required>
                  <option data-tokens="Success" value="Success">Success</option>
                  <option data-tokens="Pending" value="Pending">Pending</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!-- end update appoinment modal -->
    </body>
</html>
