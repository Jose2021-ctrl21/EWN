<!-- VIEW -->

<div class="modal fade" id="viewpayslip">
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
                                <center><h1><b>EWN Manpower Services</b></h1></center>
                                
                                <b style="margin-left: 20px;">09396193386<i class="fa fa-phone"></i><b><br>
                                <b style="margin-left: 20px;">ewn@gmail.com <i class="fa fa-envelope-o"></i><b><br>
                                <b style="margin-left: 20px;">Noveleta, Cavite <i class="fa fa-location-arrow"></i><b>
                                </div>

                                <div class="receipt-box">
                                    <!-- <div class="row">
                                        <div class="receipt-header">
                                            <div class="" style="display:flex;align-items:center;justify-content:center;flex-direction:column;text-align:center">
                                                <div class="">
                                                    <b>09396193386<i class="fa fa-phone"></i><b><br>
                                                    <b>ewn@gmail.com <i class="fa fa-envelope-o"></i><b><br>
                                                    <b>noveleta <i class="fa fa-location-arrow"></i><b>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                
                                    <div class="row">
                                        <div class="receipt-header receipt-header-mid">
                                            <!-- <div class="" style="display:flex;align-items:center;justify-content:left;flex-direction:column;text-align:center;"> -->
                                                <div style="margin-left:20px">
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
                                            <!-- <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="receipt-left">
                                                <h3>INVOICE # 102</h3>
                                            </div>
                                            </div> -->
                                        </div>
                                    </div>
                                <b>Date range :</b><span id="date_range"></span>

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
                                                <td class="text-right">
                                                    <span>&#8369<span id="salary">salary value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Meal allowance: </strong>
                                                </td>
                                                <td class="text-right">
                                                     <span>&#8369<span id="meal_allowance">Meal allowance value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Incentives: </strong>
                                                </td>
                                                <td class="text-right">
                                                    <span>&#8369<span id="incentives">Incenntives value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Adjustments: </strong>
                                                </td>
                                                <td class="text-right">
                                                    <span>&#8369<span id="adjustments">Adjustments value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Transportaion: </strong>
                                                </td>
                                                <td class="text-right">
                                                    <span>&#8369<span id="transportation">Transportaion value: </span></span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>SSS: </strong>
                                                </td>
                                                <td class="text-right">
                                                    <p></p>
                                                </td>
                                                <td class="text-right">
                                                    <span>&#8369<span id="sss">SSS value: </span></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Philhealth: </strong>
                                                </td>
                                                <td class="text-right">
                                                    <p></p>
                                                </td>
                                                <td class="text-right">
                                                    <span>&#8369<span id="philhealth">Philhealth value: </span></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Pagibig: </strong>
                                                </td>
                                                <td class="text-right">
                                                    <p></p>
                                                </td>
                                                <td class="text-right">
                                                    <span>&#8369<span id="pagibig">Pagibig value: </span></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>TIN: </strong>
                                                </td>
                                                <td class="text-right">
                                                    <p></p>
                                                </td>
                                                <td class="text-right">
                                                    <span>&#8369<span id="tin">TIN value: </span></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <strong>Cash advance: </strong>
                                                </td>
                                                <td class="text-right">
                                                    <p></p>
                                                </td>
                                                <td class="text-right">
                                                    <span>&#8369<span id="payPerCutOff">Pay per cut off: </span></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><h2><strong>Gross earnings: </strong></h2></td>
                                                <td class="text-right text-secondary"> <span>&#8369<span id="gross">31.566</span></span></td>
                                                <td class="text-right">Total deduction:</td>
                                                <td class="text-right text-secondary"> <span>&#8369<span id="total_deduction">total deduction amount 32423</span></span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><h2><strong>Net salary received: </strong></h2></td>
                                                <td class="text-right text-danger"><h2><strong></strong></h2></td>
                                                <td class="text-right"><h2><strong></strong></h2></td>
                                                <td class="text-right text-success"><h2> <span>&#8369<strong id="net_salary">31.566</strong></span></h2></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <style>
                                    .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                                    .table th, .table td {padding: 8px; }
                                    .text-right, .text-right { display: table-cell;}
                                </style>
                                <!-- end div table -->
                                <div class="row">
                                <div class="receipt-header receipt-header-mid receipt-footer">
                                    <!-- <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                        <div class="receipt-left">
                                            <p id="created_on">15 Aug 2016</p>
                                        </div>
                                    </div> -->
                                    <div class="col-xs-4">
                                        <div class="" style="margin-left:3rem">
                                            <h1>Prepared by:</h1><br>
                                            <span style="text-align:right"><?php echo $_SESSION['name'] ?></span><br>
                                            (<i style="text-align:right"><?php echo $_SESSION['role'] ?></i>)
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                      </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="button" class="btn btn-success btn-flat" onclick="printPayslip()"><i class="fa fa-check-square-o"></i> Print</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function printPayslip() {
    var content = document.getElementById('xxx').innerHTML;
    var newWindow = window.open('', '_blank', 'width=800,height=600');
    newWindow.document.write('<html><head><title>Payslip</title>');
    
    // Add custom styles for print
    newWindow.document.write('<style>');
    newWindow.document.write('@media print {');
    // newWindow.document.write('form{background:red}'); 
    // newWindow.document.write('.modal-header, .modal-footer, .btn { display: none; }'); // Hide header, footer, and buttons
    // newWindow.document.write('.modal-content { border: none; box-shadow: none; }'); // Remove border and shadow
    // newWindow.document.write('.modal-body { padding: 15px; }'); // Adjust padding
    newWindow.document.write('.table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }'); // Adjust table styles
    newWindow.document.write('.table th, .table td { border: 1px solid #ddd; padding: 8px; text-align:right}'); // Adjust table cell styles
    newWindow.document.write('.text-right, .text-right { display: table-cell;}'); // Adjust alignment
    // newWindow.document.write('.text-secondary { color: #555; }'); // Adjust secondary text color
    // newWindow.document.write('.text-danger { color: red; }'); // Adjust danger text color
    newWindow.document.write('.text-success { color: green; }'); // Adjust success text color
    newWindow.document.write('.th-color { color: #black;font-size:1.5rem }'); // Adjust success text color

    // // newWindow.document.write('.row .receipt-main .receipt-box {display:flex;justify-content:between;align-items:center}'); // row
    // // newWindow.document.write('.row .receipt-header {margin-right:50px;border:1px solid red}'); // row
    newWindow.document.write('}');
    newWindow.document.write('</style>');
    
    newWindow.document.write('</head><body>');
    newWindow.document.write(content);
    newWindow.document.write('</body></html>');

    // Close the document
    newWindow.document.close();
    newWindow.focus();
    newWindow.print();
    newWindow.close();
}

</script>