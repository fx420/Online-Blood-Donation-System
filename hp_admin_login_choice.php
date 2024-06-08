<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Index - FusionTech</title>
        <?php include("css_link.php"); ?>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <?php include("js_script_top.php"); ?>
    </head>
    <style>
        .bg {
            background-color: #4c5760;
            
        }
    </style>
    <body class="bg">  
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4 mt-15">
                        <div class="row justify-content-center">
                            <center>
                                <img src="assets/img/logo.png" alt="logo" style="width: 240px; height: 96px; margin-bottom: 20px;">
                                <h1 style="color: white; font-size: 32px; font-weight: bold;">Fusion Tech - Blood Donation System</h1>
                                <p style="color: white; font-size: 24px; font-weight: bold;">Login / Sign Up</p>
                            </center>
                            
                            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                                <div class="card text-center h-100">
                                    <div class="card-body px-5 pt-5 d-flex flex-column align-items-between">
                                        <div>
                                            <div class="h3 text-primary">Healtcare Professional</div>
                                        </div>
                                        <div class="icons-org-join align-items-center mx-auto mt-5 mb-5">
                                            <i class="icon-user fas fa-user-doctor"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent px-5 py-4">
                                        <div class="small text-center"><a class="btn btn-block btn-primary" href="hpuser_login.php">Login</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11 mt-4">
                                <div class="card text-center h-100">
                                    <div class="card-body px-5 pt-5 d-flex flex-column align-items-between">
                                        <div>
                                            <div class="h3 text-primary">Admin</div>
                                        </div>
                                        <div class="icons-org-join align-items-center mx-auto mt-5 mb-5">
                                            <i class="icon-user fas fa-user-gear"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent px-5 py-4">
                                        <div class="small text-center"><a class="btn btn-block btn-primary" href="admin_login.php">Login</a></div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small text-white">Copyright &copy; <a href="index.php" style="color: #1b1ede;font-size:15px;"><b> Fusion Tech 2022 </b></a></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <?php include("js_link.php"); ?>
    </body>
</html>
