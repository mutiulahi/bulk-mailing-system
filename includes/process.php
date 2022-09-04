<?php
require "../vendor/autoload.php";
use Phpoffice\PhpSpreadsheet\Spreadsheet;
use Phpoffice\PhpSpreadsheet\Writer\Xlsx;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; 
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
        $mosque[] = $data[11];
        $pension[] = $data[12];
        $fuo_cooperative[] = $data[13];
        $fuo_conas_wel[] = $data[14];
        $fuo_dev[] = $data[15];
        $alansor[] = $data[16];
        $fuo_rent_uti[] = $data[17];
        $medical_ded[] = $data[18];
        $tuition_fee_ded[] = $data[19];
        $refund_conas[] = $data[20];
        $loan_refund[] = $data[21];
        $pension_defi[] = $data[22];
        $total_deduction[] = $data[23];
        $net_pay[] = $data[24];
        $email[] = $data[25];
        $date[] = $data[26];
    }

    for ($i=1; $i < count($names); $i++) {
    
        require '../PHPMailer/vendor/autoload.php';
       
        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'tesleemolamilekan902@gmail.com';                    // SMTP username
            $mail->Password   = 'xzusxwknyprvvjjf';                               // SMTP password
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
           $messages .= 'Message for '.$names[$i].' has been sent successfully to '.$email[$i] .'<br>';
           
        } 
        catch (Exception $e) {
            $messages_error .= 'Message for '.$names[$i].' not sent successfully to '.$email[$i] .'<br>';
        }
       }

       header('location:../index.php?msg='.$messages.'&msg_error='.$messages_error);
}

?>