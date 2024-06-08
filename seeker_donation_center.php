<?php
include 'functions.php';
include 'config.php';
session_start();
$seeker_username = $_SESSION['seeker_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion Tech Online Blood Donation Website</title>
        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!-- custom css file link -->
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="vendor/bootstrap/css/bootstrap_campaign.css" rel="stylesheet">
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="vendor/dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="vendor/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>
        <script src="assets/dist/js/sb-admin-2.js"></script>
        

<style>

.icon {
    cursor: pointer;
    position:relative;
    line-height: 60px;

  }
  .icon span {
    background: var(--red);
    padding: 7px;
    border-radius: 50%;
    color: #fff;
    vertical-align: top;

  }
  .icon img {
    display: inline-block;
    width: 25px;
    margin-top: 20px;

  }
  .icon:hover {
    opacity: .7;
  }
  .notifi-box {
  background: var(--red);
  opacity: 0;
  backdrop-filter: blur(15px);
  width: 400px;
  height: 0px;
  position: absolute;
  top: 1px;
  right: 45px;
  overflow-y:auto;
  transition: 0.6s ease;
  transition-property: 1s opacity, 250ms height;
  margin-top: 190px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.notifi-box h2 {
  font-size: 30px;
  padding: 10px;
  border-bottom: 1px solid #eee;
  color: #999;
  margin-left: 45px;

}
.notifi-box h2 span {
  color: #f00;
}
.notifi-item {
  display: flex;
  border-bottom: 1px solid #eee;
  padding: 15px 5px;
  margin-bottom: 15px;
  cursor: pointer;
  margin-left: 45px;

}
.notifi-item:hover {
  background-color: #eee;
}

.notifi-item .text h4 {
  color: #777;
  font-size: 16px;
  margin-top: 10px;
  
}
.notifi-item .text p {
  color:#999;
  font-size: 12px;
  
}

 .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }


.header .dropdown-content a {
    padding: 12px 16px;
    display: block;
  }
  
.dropdown:hover .dropdown-content {
    display: block;
  }

.header .navbar .dropdown .dropbtn{
    font-size: 1.7rem;
    color: var(--light-color);
    margin-left: 2rem;
    background-color: #fff;
}

.header .navbar .dropdown .dropbtn:hover{
    color: var(--bluegreen);
} 

.dropdown {
    float: left;
    overflow: hidden;
  }

 center img{
    height: 80px;
    width: 80px;
    border-radius: 50%;
    object-fit: cover;

 }


.item{
    position: relative;
    cursor: pointer;
   }
   
.item a{
    color: #fff;
    font-size: 16px;
    text-decoration: none;
    display: block;
    padding: 5px 30px;
    line-height: 60px;
   }
   
.item a:hover{
    background: #5a1616;
    transition: 0.3s ease;
   }

.home{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
    padding-top: 20rem;
}

.home .image{
    flex:1 1 45rem;
}

.home .image img{
    padding-top: 7rem;
    width:90%;
    height: 90%;
}

.home .content{
    flex:1 1 45rem; 
}

.home .content h3{
    font-size: 3.5rem;
    color:#fff;
    line-height: 1.8;
    text-shadow: var(--text-shadow);
}

.home .content p{
    font-size: 1.7rem;
    color: var(--light-color);
    line-height: 1.8;
    padding: 1rem 0;

}



#wrapper {
        padding-top: 100px;
        padding-bottom: 50px;
    }

    /* datatable */
    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card:not([class*=bg-]) .card-header {
        color: #0061f2;
    }

    .card-header-actions .card-header {
        height: 3.5625rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.5625rem;
        padding-bottom: 0.5625rem;
    }

    .card-header-actions .card-header .dropdown-menu {
        margin-top: 0;
        top: 0.5625rem !important;
    }

    .card-icon {
        overflow: hidden;
    }

    .card-icon .card-icon-aside {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        padding: 2rem;
    }

    .card-icon .card-icon-aside i {
        height: 3rem;
        width: 3rem;
    }

    .card-waves .card-body {
        background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: center bottom;
    }

    .card-waves .card-body {
        background-image: url("../assets/img/backgrounds/bg-waves.svg");
    }
    .footer{

border-bottom: 1px solid rgba(0, 23, 58, 0.8);
padding: 0 0 0 0;
}
.footer .box-container{
border-bottom:10px solid #6967679d;
border-top:10px solid #6967679d;
background: #e9e9e9;
display: grid;
grid-template-columns: repeat(auto-fit,minmax(22rem,1fr));
gap: 2rem;
}

.footer .box-container .box h3{
font-size: 28px;
margin: 0 0 20px 0;
padding: 2px 0 2px 0;
line-height: 1;
font-weight: 700;
text-transform: uppercase;
color:#751919;
font-weight: bold;
}
.footer .box-container .box p{
font-size: 14px;
line-height: 24px;
margin-bottom: 0;
font-family: "Raleway", sans-serif;
color: #444;
}

.footer .box-container .box a{
display: block;
font-size: 1.5rem;
color: #444;
padding: 1rem 0;
line-height: 1;
}
.footer .box-container .box a:hover{
color: #751919;
}

.footer .box-container .box a i{
padding-right:.5rem;
color:  #751919;
}

.footer .box-container .box a:hover i{
padding-right:2rem;

}
.home{
padding-top: 200px;
background-color: #751919;
}



</style>
</head>
<body>

<!-- Header section Starts -->
<?php include("seeker_header_2.php") ?>
<!-- Header Section Ends -->

<!-- Home section Starts -->
<section class="home" id="home" style="background-color: #751919;">
    <div class="image">
        <img src="assets/img/images/BLOG.jpg" alt="">
    </div>

    <div class="content">
        <h3 style="font-size:48px;">Welcome to Blood Donation Campaign </h3>
        <p style="font-size:20px;">This page is about the information of Blood Donation Campaign. User can view the detials about campaign.</p>
    </div>

</section>

<!-- Home section Ends -->


<!-- Center section Starts -->
<div id="wrapper">


<div id="page-wrapper">
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                <table class="table" width="100%" cell-spacing="0" id="datatable">
                    <thead>
                        <tr>
                            <th>Center ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Information</th>
                            <th>Center Picture</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>

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
            'url': 'donation_center_fetch_data.php',
            'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5]
        }, ]
    });
});
</script>
<!-- Center section Ends -->

<!-- Footer section Starts -->
<?php include("seeker_footer.html") ?>
<!-- Footer section Ends -->



  <!-- custom javascript file link  -->
  <script src="js/script.js"></script>

</body>

