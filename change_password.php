<!doctype html>
<html lang="en"> 
 <head> 
        <title>Change your password | SUNO - Hostel Portal</title> 
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     


        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

<style>
    .me-color {
    width: 100%;
}
</style>
 
</head>
    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-success">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-white p-4">
                                            <h5 class="text-white"><strong> Change your password! </strong></h5>
                                            <p>Please kindly change your password for security purpose.</p>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="index.php" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo-light.png" alt="" class="rounded-circle" height="65">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="index.php" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo-light.png" alt="" class="rounded-circle" height="65">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <?php
                                    if (isset($_GET['type'])) {
                                    if ($_GET['type']=='error') {
                                            echo'<center>
                                                    <div class="col-sm-12" style="text-align: center">
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <i class="mdi mdi-check-all me-2"></i>
                                                            '.$_GET['msg'].'       
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                </center>';
                                        }
                                        if ($_GET['type']=='success') {
                                            echo'<center>
                                                    <div class="col-sm-12" style="text-align: center">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <i class="mdi mdi-check-all me-2"></i>
                                                            '.$_GET['msg'].'       
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                </center>';
                                        }
                                    }
                                ?>
                                <div class="p-2">
                                    <form class="form-horizontal" action="includes/login_code.php" method="POST"> 
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="password" placeholder="Password" > 
                                            </div> 
                                        </div> 

                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" > 
                                            </div> 
                                        </div> 
                                        
                                        <div class="mt-3 d-grid">
                                            <button type="submit" class="btn btn-success" name="change_password">Change Password</button>
                                        </div> 

                                        <!-- {{-- <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div> --}} -->
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>© <script>document.write(new Date().getFullYear())</script> SUNO HOSTEL PORTAL. by SUNO ICT</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>

 </html>
