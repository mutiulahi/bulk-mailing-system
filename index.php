<?php 
set_time_limit(300);
require "vendor/autoload.php";
use Phpoffice\PhpSpreadsheet\Spreadsheet;
use Phpoffice\PhpSpreadsheet\Writer\Xlsx;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Bulk Mailing System | Fountain University</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Summit University" name="description" />
        <meta content="tescode" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
     
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <style>
            body {
                background-image: url("assets/images/slider-002.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                opacity: 0.9;
            }
            .header{
                color:green; 
                font-weight:900; 
                font-size:40px;
                text-align:center;
                margin-top:20px;
            }
            .sub-header{
                color:green; 
                font-weight:900; 
                font-size:30px;
            }
            label, code{
                font-weight:500; 
                font-size:15px;
            }
            img {
                height:100px; 
                margin-bottom:10px; 
                border-radius:10px;
            }
            .other_input {
                width:90%; 
                border:none; 
                border-bottom: 1px solid #aaa7a7; 
                outline:none;
            }
            @media screen and (max-width: 800px) {
                img {
                    height:50px; 
                    margin-bottom:0px; 
                    border-radius:10px;
                    margin-left:40%;
                }
                .header{
                    font-size:20px;
                }
                .sub-header{
                    font-size:15px;
                }
                label, code{
                    font-size:15px;
                }
                .other_input {
                width:80%; 
                border:none; 
                border-bottom: 1px solid #aaa7a7; 
                outline:none;
            }
            }
                
            
        </style>
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            
            <?php //include 'includes/top-bar.php'; ?>
            <!-- ========== Left Sidebar Start ========== -->
            
            <?php //include 'includes/side-bar.php'; ?>

            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="container">

                <div class="page-content">
                    <div class="container-flud">
                        <!-- end page dcffc1 title --> 
                        <!-- end row -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card" style="background-color: #fff; opacity: 0.8;border-radius:10px; ">
                                    <div class="card-body">

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <img src="assets/images/logo-light.png" >
                                                </div>
                                                <div class="col-sm-11" style="text-align:center;">
                                                    <h1 class="header">FOUNTAIN UNIVERSITY, OSHOGBO</h1>
                                                    <h3 class="sub-header">BULK MAILING SYSTEM</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label">EXCEL FILE:</label>
                                                <input type="file" class="form-control" name="file" placeholder="Email" required>
                                            </div> 
                                            <div class="mb-3">
                                                <button class="btn btn-success btn-block" name="complain"  type="submit">Send <i style="margin-left: 10px;" class="fa fa-paper-plane"></i></button>
                                            </div>

                                        </form>

                                        <?php
                                            // declare the empty variables
                                            $messages = '';
                                            $messages_error = '';
                                            if (isset($_POST['complain'])) {
                                            
                                                // get the actual file
                                                $file = $_FILES['file']['name'];
                                                $file_loc = $_FILES['file']['tmp_name'];
                                                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_loc); 
                                                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                                                foreach ($sheetData as $data) {
                                                    $names[] = $data[0];
                                                    $grade_level[] = $data[1];
                                                    $basic_salary[] = $data[2];
                                                    $other_allowance[] = $data[3];
                                                    $OTHER_ALLOW_ARREARS[] = $data[4];
                                                    $responsibility[] = $data[5];
                                                    $fuo_allowance[] = $data[6];
                                                    $rent_allowance[] = $data[7];
                                                    $grosspay[] = $data[8];
                                                    $paye[] = $data[9];
                                                    $mosque[] = $data[10];
                                                    $pension[] = $data[11];
                                                    $fuo_cooperative[] = $data[12];
                                                    $fuo_conas_wel[] = $data[13];
                                                    $fuo_dev[] = $data[14];
                                                    $alansor[] = $data[15];
                                                    $fuo_rent_uti[] = $data[16];
                                                    $medical_ded[] = $data[17];
                                                    $tuition_fee_ded[] = $data[18];
                                                    $refund_conas[] = $data[19];
                                                    $loan_refund[] = $data[20];
                                                    $pension_defi[] = $data[21];
                                                    $total_deduction[] = $data[22];
                                                    $net_pay[] = $data[23];
                                                    $email[] = $data[24];
                                                    $date[] = $data[25];
                                                }

                                                for ($i=1; $i < count($names); $i++) {
                                                
                                                    require 'PHPMailer/vendor/autoload.php';
                                                
                                                    $mail = new PHPMailer(true);
                                                    try {
                                                        //Server settings
                                                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                                                        $mail->isSMTP();                                            // Send using SMTP
                                                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                                        $mail->Username   = 'tescodepro@gmail.com';                    // SMTP username
                                                        $mail->Password   = 'kjnlldeqlokgtlqt';                               // SMTP password
                                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                                        $mail->Port       = 465;
                                                        $mail->setFrom('info@fountainuniversity.edu.ng', 'Fountain University');
                                                        $mail->addAddress($email[$i]);     //Add a recipient
                                                        $mail->isHTML(true);                   // Set email format to HTML
                                                        $mail->Subject = 'Pay Slip for '.$names[$i];
                                                        $mail->Body    = 'Kindly find the pay slip for the date of '.$date[$i].'<br><br>
                                                        <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
                                                            <tr>
                                                                <th>Name</th>
                                                                <td>'.$names[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Grade Level</th>
                                                                <td>'.$grade_level[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Basic Salary</th>
                                                                <td>'.$basic_salary[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Other Allowance</th>
                                                                <td>'.$other_allowance[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Other Allowance Arrears</th>
                                                                <td>'.$OTHER_ALLOW_ARREARS[$i].'</td>    
                                                            </tr>
                                                            <tr>
                                                                <th>Responsibility</th>
                                                                <td>'.$responsibility[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>FUO Allowance</th>
                                                                <td>'.$fuo_allowance[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Rent Allowance</th>
                                                                <td>'.$rent_allowance[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Gross Pay</th>
                                                                <td>'.$grosspay[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>PAYE</th>
                                                                <td>'.$paye[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mosque Allowance</th>
                                                                <td>'.$mosque[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Pension</th>
                                                                <td>'.$pension[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>FUO Cooperative</th>
                                                                <td>'.$fuo_cooperative[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>FUO Conas Wel</th>
                                                                <td>'.$fuo_conas_wel[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>FUO Dev</th>
                                                                <td>'.$fuo_dev[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Alansor</th>
                                                                <td>'.$alansor[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>FUO Rent Uti</th>
                                                                <td>'.$fuo_rent_uti[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Medical Ded</th>
                                                                <td>'.$medical_ded[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tuition Fee Ded</th>
                                                                <td>'.$tuition_fee_ded[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Refund Conas</th>
                                                                <td>'.$refund_conas[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Loan Refund</th>
                                                                <td>'.$loan_refund[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Pension Defi</th>
                                                                <td>'.$pension_defi[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Deduction</th>
                                                                <td>'.$total_deduction[$i].'</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Net Pay</th>
                                                                <td>'.$net_pay[$i].'</td>
                                                            </tr>
                                                        </table>';

                                                        $mail->send();
                                                        // add string valus to the variable
                                                    // $messages .= 'Message for '.$names[$i].' has been sent successfully to '.$email[$i] .'<br>';
                                                    echo'<center>
                                                            <div class="col-sm-12" style="text-align: center">
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <i class="mdi mdi-check-all me-2"></i>
                                                                    Message for '.$names[$i].' has been sent successfully to '.$email[$i] .'<br>      
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                            </div>
                                                        </center>';
                                                    
                                                    } 
                                                    catch (Exception $e) {
                                                        echo'<center>
                                                            <div class="col-sm-12" style="text-align: center">
                                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                    <i class="mdi mdi-check-all me-2"></i>
                                                                    Message for '.$names[$i].' didn\'t sent successfully to '.$email[$i] .'<br>      
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                            </div>
                                                        </center>';
                                                    }
                                                }
                                            }

                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>

                  <!-- end modal -->

            <!-- subscribeModal -->
            <!-- end modal -->
                <!-- End Page-content -->

                
                <!-- <footer class="footer-student">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <script>document.write(new Date().getFullYear())</script> © SUNO HOSTEL COMPLAINTS.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by ICT Department
                                </div>
                            </div>
                        </div>
                    </div>
                </footer> -->
            </div>
            <!-- end main content-->

        </div>
        
   
         <!-- JAVASCRIPT -->
         <script src="assets/libs/jquery/jquery.min.js"></script>
         <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
         <script src="assets/libs/metismenu/metisMenu.min.js"></script>
         <script src="assets/libs/simplebar/simplebar.min.js"></script>
         <script src="assets/libs/node-waves/waves.min.js"></script>
 
         <!-- Required datatable js -->
         <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
         <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
         <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
         <script src="assets/libs/jszip/jszip.min.js"></script>
         <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
         <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
         <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
         <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
         <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
         
         <!-- Responsive examples -->
         <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
         <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
 
         <!-- Datatable init js -->
         <script src="assets/js/pages/datatables.init.js"></script>    
 
         <script src="assets/js/app.js"></script>

         <script>
            function button_disabled() {                 
                var others = document.getElementsByClassName("form-check-input"); 
                for (var i = 0; i < others.length; i++) {
                    if (others[i].checked) {
                        if (others[i].value == "other") {
                            document.getElementById("other_input").disabled = false;
                        } else {
                            document.getElementById("other_input").disabled = true;
                        } 
                    }
                }           
            }
        </script>

<script>
        $(document).ready(function() {
            $("#subscribeModal").modal('show');
        });
    </script>

    </body>
</html>
