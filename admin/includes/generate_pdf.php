<?php
session_start();
	include 'conn.php';

//============================================================+
// File name   : generate_pdf.php
// Description : Example PHP script to generate a PDF using TCPDF
// Author      : OpenAI (Adapted from Nicola Asuni's example)
//============================================================+

// Include the main TCPDF library (search for installation path).
require_once('../../TCPDF/tcpdf.php');

// Create a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//landscape
// $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('OpenAI');
$pdf->SetTitle('Generated PDF Document');
$pdf->SetSubject('TCPDF Generated PDF');
$pdf->SetKeywords('TCPDF, PDF, example, test');

// Set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

$mobile ="09365846526";
$email ="ewn.gmail.com";
$address ="Noveleta, Cavite";
$headerHtml = "E.W.N Manpower services";
$content = "$mobile\n$email\n$address";

// $pdf->SetHeaderData('PDF_HEADER_LOGO', PDF_HEADER_LOGO_WIDTH, $headerHtml, $content);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('helvetica', '', 10);

// Add a page
$pdf->AddPage();

if(isset($_GET['id'])) {
    $employee_id = $_GET['id'];
}
// echo $employee_id;
// exit();

$sql_emp = "SELECT * FROM employees
WHERE employee_id = '$employee_id'";
$result_emp = $conn->query($sql_emp);
while ($row = $result_emp->fetch_assoc()) {
    $img = $row['photo'];
    $name = $row['firstname'].' '.$row['lastname'];
    $email = $row['email'];
    $contact = $row['contact_info'];
    $address = $row['address'];
}

$sql = "SELECT * FROM payroll_employee
WHERE employee_id = '$employee_id'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $payslipNumber = $row['created_on'].$row['id'];
    $employeeId = $row['employee_id'];
    $date_range = $row['date_range'];
    $numDaysWork = $row['num_days_work'];
    $salary = $row['salary'];
    $meal_allowance = $row['meal_allowance'];
    $incentives = $row['incentives'];
    $adjustments = $row['adjustments'];
    $transportation = $row['transportation'];
    $sss = $row['sss'];
    $tin = $row['tin'];
    $pagibig = $row['pagibig'];
    $philhealth = $row['philhealth'];
    $total_deduction = $row['total_deduction'];
    $pay_per_cut_off = $row['pay_per_cut_off'];
    $gross = $row['gross'];
    $netSalary =  $row['net_salary'];
    $createdOn = $row['created_on'];
}


if ($result->num_rows > 0) {
    $name = $_SESSION['name'] ;
    $role = $_SESSION['role'];
    $html = <<<HTML
    <div class="" style="display:flex;align-items:center;justify-content:center;flex-direction:row;text-align:center">
        <!-- <div style="margin-right: 20px;"> -->
            <img src="../../images/ewn.png" class="img-responsive" id="ewn-logo" alt="img"  style="width: 100px">
        <!-- </div> -->
        <center><h1><b>EWN Manpower Services</b></h1></center>
        <b style="margin-left: 20px;">09396193386<i class="fa fa-phone"></i><b><br>
        <b style="margin-left: 20px;">ewn@gmail.com <i class="fa fa-envelope-o"></i><b><br>
        <b style="margin-left: 20px;">Noveleta, Cavite <i class="fa fa-location-arrow"></i><b>
    </div>

    <div style="display:flex;align-items:left;justify-content:left;flex-direction:row;text-align:left">
        <div style="margin-left:20px">
            <div class="">
                <img class="img-responsive" src="../../images/$img" id="employee-img" alt="image" style="width: 71px; border-radius: 50%;"><br>
                <b id="employee-name">$name</b>
            </div>

            <div class="receipt-left">
                <b>Mobile :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="mobile-number">$contact</span><br>
                <b>Email :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="email">$email</span><br>
                <b>Address :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="address">$address</span><br/>
                <b>Date range :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="address">$date_range</span>
            </div>
        </div>
    </div>



    <table style="border-collapse: collapse; border: 1px solid black;">
        <tr>
            <th style="padding: 8px; border: 1px solid black;">Earnings</th>
            <th style="padding: 8px; border: 1px solid black;">Amount</th>
            <th style="padding: 8px; border: 1px solid black;">Deductions</th>
            <th style="padding: 8px; border: 1px solid black;">Amount</th>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Salary</td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$salary</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Meal allowance</td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$meal_allowance</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Incentives</td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$incentives</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Adjustments</td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$adjustments</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Transportation</td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$transportation</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">SSS</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$sss</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Philhealth</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$philhealth</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Pagibig</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$pagibig</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Tax</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$tin</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">Cash advance</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$pay_per_cut_off</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">GROSS EARNINGS</td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$gross</td>
            <td style="padding: 8px; border: 1px solid black; text-align:right">total deduction</td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$total_deduction</td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid black; text-align:right">NET SALARY RECEIVED</td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black;"></td>
            <td style="padding: 8px; border: 1px solid black; text-align:right"><span>Php</span>$netSalary</td>
        </tr>
    </table>


    <div class="" style="display:flex;align-items:left;justify-content:left;flex-direction:row;text-align:left">
        <div class="" style="margin-left:-1rem">
            <h5>Prepared by:</h5><br>
            <span style="text-align:left">$name</span><br>
            (<i style="text-align:left">$role</i>)
        </div>
    </div>
HTML;

    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    echo "0 results";
}



// Close and output PDF document
$pdfContent = $pdf->Output($employeeId.'.pdf', 'S'); // Output PDF as a string

// Set response headers for downloading the PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="'.$employeeId.'".pdf"');
header('Content-Length: ' . strlen($pdfContent));

// Output the PDF content
echo $pdfContent;

// Exit script
exit;
?>