<?php
	include 'includes/session.php';

//============================================================+
// File name   : generate_pdf.php
// Description : Example PHP script to generate a PDF using TCPDF
// Author      : OpenAI (Adapted from Nicola Asuni's example)
//============================================================+

// Include the main TCPDF library (search for installation path).
require_once('../../TCPDF/tcpdf.php');

// Create a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
$address ="Noveleta";
$headerHtml = "E.W.N Manpower services";
$content = "$mobile\n$email\n$address";

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $headerHtml, $content);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('helvetica', '', 10);

// Add a page
$pdf->AddPage();
// HTML content to be written to the PDF
$html = <<<EOF
    <div class="col-md-12">   
    <input type="text" class="account" name="id" id="did">
        <div class="row">
                <div class="receipt-main">
                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="" style="display:flex;align-items:center;justify-content:center;flex-direction:column;text-align:center;">
                            <div class="receipt-left">
                                <img class="img-responsive" id="demployee-img" alt="image"  style="width: 71px;border-radius:50%">
                            </div>
                                <div class="receipt-left">
                                    <b id="demployee-name">Employee Name </b><br>
                                    <b>Mobile :</b><span id="dmobile-number"></span><br>
                                    <b>Email :</b><span id="demail"></span><br>
                                    <b>Address :</b><span id="daddress"></span>
                                </div>
                            </div><br>
                    </div>
                </div>
                </div>

                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="">
                                <th class="th-color">Earnings</th>
                                <th class="th-color">Amount</th>
                                <th class="th-color">Deductions</th>
                                <th class="th-color">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-right">
                                    <strong>Salary: </strong>
                                </td>
                                <td class="text-left">
                                    <span>&#8369<span id="dsalary">salary value: </span></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Meal allowance: </strong>
                                </td>
                                <td class="text-left">
                                        <span>&#8369<span id="dmeal_allowance">Meal allowance value: </span></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Incentives: </strong>
                                </td>
                                <td class="text-left">
                                    <span>&#8369<span id="dincentives">Incenntives value: </span></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Adjustments: </strong>
                                </td>
                                <td class="text-left">
                                    <span>&#8369<span id="dadjustments">Adjustments value: </span></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Transportaion: </strong>
                                </td>
                                <td class="text-left">
                                    <span>&#8369<span id="dtransportation">Transportaion value: </span></span>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>SSS: </strong>
                                </td>
                                <td class="text-left">
                                    <p></p>
                                </td>
                                <td class="text-left">
                                    <span>&#8369<span id="dsss">SSS value: </span></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Philhealth: </strong>
                                </td>
                                <td class="text-left">
                                    <p></p>
                                </td>
                                <td class="text-left">
                                    <span>&#8369<span id="dphilhealth">Philhealth value: </span></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Pagibig: </strong>
                                </td>
                                <td class="text-left">
                                    <p></p>
                                </td>
                                <td class="text-left">
                                    <span>&#8369<span id="dpagibig">Pagibig value: </span></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>TIN: </strong>
                                </td>
                                <td class="text-left">
                                    <p></p>
                                </td>
                                <td class="text-left">
                                    <span>&#8369<span id="dtin">TIN value: </span></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-right"><h2><strong>Gross earnings: </strong></h2></td>
                                <td class="text-left text-secondary"> <span>&#8369<span id="dgross">31.566</span></span></td>
                                <td class="text-left">Total deduction:</td>
                                <td class="text-left text-secondary"> <span>&#8369<span id="total_deduction">total deduction amount 32423</span></span></td>
                            </tr>
                            <tr>
                                <td class="text-right"><h2><strong>Net salary received: </strong></h2></td>
                                <td class="text-left text-danger"><h2><strong></strong></h2></td>
                                <td class="text-right"><h2><strong></strong></h2></td>
                                <td class="text-left text-success"><h2> <span>&#8369<strong id="dnet_salary">31.566</strong></span></h2></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- end div table -->
                <div class="row">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                    <div class="receipt-right">
                        <p id="created_on">15 Aug 2016</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

<style>
    .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    .table th, .table td { padding: 8px; }
    .text-right, .text-left { display: table-cell; border:1px solid gray }


    .text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
    }
    .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
    }
    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }
    .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }
    .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
        color:#fff;
    }
    .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
    }
    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }
    .receipt-right p i {
        text-align: center;
        width: 18px;
    }
    .receipt-main td {
        padding: 9px 20px !important;
    }
    .receipt-main th {
        padding: 13px 20px !important;
    }
    .receipt-main td {
        font-size: 13px;
        font-weight: initial !important;
    }
    .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
    }	
    .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
    }
    .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
    }
    
    #container {
        background-color: #dcdcdc;
    }
</style>
EOF;

// Write HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdfContent = $pdf->Output('example.pdf', 'S'); // Output PDF as a string

// Set response headers for downloading the PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="example.pdf"');
header('Content-Length: ' . strlen($pdfContent));

// Output the PDF content
echo $pdfContent;

// Exit script
exit;
?>
