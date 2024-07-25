<?php
include 'includes/session.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if selectedPayslip data is received
    if (isset($_POST["selectedPayslip"])) {
        // Retrieve the selected payslip IDs
        $selectedPayslips = $_POST["selectedPayslip"];
echo "$selectedPayslips";
    } else {
        // If selectedPayslip data is not received, return an error message
        http_response_code(400);
        echo "Error: No selected payslips data received.";
    }
} else {
    // If the request method is not POST, return an error message
    http_response_code(405);
    echo "Error: Method not allowed.";
}
?>





<!-- <div class="modal fade" id="">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="date"></span> - <span class="employee_name"></span></b></h4>
            </div>
            <div class="modal-body" id="xxx">
                <form class="form-horizontal" method="POST" action="">
                    <input type="hidden" class="account" name="id" id="id">
                    <div class="col-md-12">   
                      <div class="row">
                              <div class="receipt-main">
                              <div class="" style="display:flex;align-items:center;justify-content:center;flex-direction:row;text-align:center">
                                <div style="margin-right: 20px;">
                                    <img src="../images/ewn.png" class="img-responsive" id="ewn-logo" alt="img"  style="width: 100px">
                                </div>
                                <center><h1><b>E.W.N Man power Services</b></h1></center>
                                
                                <b style="margin-left: 20px;">09396193386<i class="fa fa-phone"></i><b><br>
                                <b style="margin-left: 20px;">ewn@gmail.com <i class="fa fa-envelope-o"></i><b><br>
                                <b style="margin-left: 20px;">noveleta <i class="fa fa-location-arrow"></i><b>
                                </div>

                                <div class="receipt-box">
                                
                                    <div class="row">
                                        <div class="receipt-header receipt-header-mid">
                                            <div class="" style="display:flex;align-items:center;justify-content:center;flex-direction:column;text-align:center;">
                                                <div class="receipt-left">
                                                    <img class="img-responsive" id="employee-img" alt="image"  style="width: 71px;border-radius:50%">
                                                </div>
                                                    <div class="receipt-left">
                                                        <b id="employee-name">Employee Name </b><br>
                                                        <b>Mobile :</b><span id="mobile-number"></span><br>
                                                        <b>Email :</b><span id="email"></span><br>
                                                        <b>Address :</b><span id="address"></span>
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
                                                    <span>&#8369<span id="salary">salary value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Meal allowance: </strong>
                                                </td>
                                                <td class="text-left">
                                                     <span>&#8369<span id="meal_allowance">Meal allowance value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Incentives: </strong>
                                                </td>
                                                <td class="text-left">
                                                    <span>&#8369<span id="incentives">Incenntives value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Adjustments: </strong>
                                                </td>
                                                <td class="text-left">
                                                    <span>&#8369<span id="adjustments">Adjustments value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Transportaion: </strong>
                                                </td>
                                                <td class="text-left">
                                                    <span>&#8369<span id="transportation">Transportaion value: </span></span>
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
                                                    <span>&#8369<span id="sss">SSS value: </span></span>
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
                                                    <span>&#8369<span id="philhealth">Philhealth value: </span></span>
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
                                                    <span>&#8369<span id="pagibig">Pagibig value: </span></span>
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
                                                    <span>&#8369<span id="tin">TIN value: </span></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Cash advance: </strong>
                                                </td>
                                                <td class="text-left">
                                                    <p></p>
                                                </td>
                                                <td class="text-left">
                                                    <span>&#8369<span id="payPerCutOff">Pay per cut off: </span></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><h2><strong>Gross earnings: </strong></h2></td>
                                                <td class="text-left text-secondary"> <span>&#8369<span id="gross">31.566</span></span></td>
                                                <td class="text-left">Total deduction:</td>
                                                <td class="text-left text-secondary"> <span>&#8369<span id="total_deduction">total deduction amount 32423</span></span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><h2><strong>Net salary received: </strong></h2></td>
                                                <td class="text-left text-danger"><h2><strong></strong></h2></td>
                                                <td class="text-right"><h2><strong></strong></h2></td>
                                                <td class="text-left text-success"><h2> <span>&#8369<strong id="net_salary">31.566</strong></span></h2></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <style>
                                    .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                                    .table th, .table td {padding: 8px; }
                                    .text-right, .text-left { display: table-cell;}
                                </style>

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
                </div>
            </div>
                </form>
        </div>
    </div>
</div> -->
