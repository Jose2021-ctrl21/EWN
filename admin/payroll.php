<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payroll
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Payroll</li>
        <li class="active">payroll</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
       <div class="row">
            <div class="col-md-12">
                <div class="box">
                  <!-- attendance filtering by date range -->
                  <!-- <div class="row">
                        <form action="" method="POST"><br><br>
                            <div class="form-group row mt-3">
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="date col-sm-6">
                                            <label for="dateFrom" class="col-form-label">Date from</label>
                                            <input type="text" class="form-control" id="dateFrom" name="dateFrom" required>
                                        </div>
                                        <div class="date col-sm-6">
                                            <label for="dateTo" class="col-form-label">Date to</label>
                                            <input type="text" class="form-control" id="dateTo" name="dateTo" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9"></div>
                                        <div class="date col-sm-3">
                                            <button type="submit" class="btn btn-primary print">Print payslip</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                <!-- attendance filtering by date range -->
                <!-- <a href="#payroll" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Print payroll</a> -->
                    <div class="box-body" style="overflow-x:auto">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Employee id</th>
                                <!-- <th>Date range</th> -->
                                <th>Number of days worked</th>
                                <th style="text-align:right">Salary</th>
                                <th style="text-align:right">Meal allowance</th>
                                <th style="text-align:right">Incentives</th>
                                <th style="text-align:right">Adjustment</th>
                                <th style="text-align:right">Transportation</th>
                                <th style="text-align:right">13th month</th>
                                <th style="text-align:right">Bonus</th>
                                <th style="text-align:right">SSS</th>
                                <th style="text-align:right">Philhealth</th>
                                <th style="text-align:right">Pagibig</th>
                                <th style="text-align:right">Income tax</th>
                                <th style="text-align:right">Cashadvance deduction</th>
                                <th style="text-align:right">Total deduction</th>
                                <th style="text-align:right">Gross</th>
                                <th style="text-align:right">Net salary</th>
                                <th>Created on</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>   
                            <?php
                            $createdOn = $_GET['date_range'];
                            $sql = "SELECT *,approval.status AS status, approval.id AS status_id, payroll_employee.id AS id FROM payroll_employee LEFT JOIN approval ON approval.id = payroll_employee.status WHERE date_range = '$createdOn' ";
                            $query = $conn->query($sql);
                            $year=date('Y');
                            while($row = $query->fetch_assoc()){
                          ?>
                          <tr>
                            <td><?php echo $row['employee_id']; ?></td>
                            <td><?php echo $row['num_days_work']; ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['salary']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['meal_allowance']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['incentives']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['adjustments']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['transportation']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format((float)$row['_13th']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format((float)$row['bonus']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['sss']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['philhealth']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['pagibig']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['tin']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['pay_per_cut_off']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['total_deduction']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['gross']); ?></td>
                            <td class="text-right"> &#8369; <?php echo number_format($row['net_salary']); ?></td>
                            <td><?php echo $row['created_on']?></td>
                            <?php

                            // $sql_stat = "SELECT *, approval.status AS status, 
                            // approval.id AS status_id
                            // FROM payroll_employee 
                            // LEFT JOIN approval ON approval.id = payroll_employee.status 
                            // WHERE payroll_employee.status = 2 LIMIT 1";
                            // $query_stat = $conn->query($sql_stat);
                            // $row_stat = $query_stat->fetch_assoc();
                            // $approve = htmlspecialchars($row_stat['status']);
                            // echo "<h1> $approve</h1>";
                            // if($approve != 'approve'){

                            ?>
                            <td>
                            <button class='btn btn-warning btn-sm btn-flat'>
                                <a href="payroll_payslip.php?id=<?php echo $row['id']; ?>" style="color:white">
                                <i class='fa fa-eye'></i>&nbsp;View</a>
                              </button>
                            <?php 
                            $sql_aprv = "SELECT status FROM payroll_employee WHERE status = 2";
                            $query_aprv = $conn->query($sql_aprv);
                            if($query_aprv->num_rows > 0){?>
                              <button class='btn btn-success btn-sm download btn-flat' data-id=<?php echo $row['employee_id'] ?>><i class='fa fa-download' onclick="printPayslip()"></i> Download</button>
                              <button class='btn btn-info btn-sm viewpayslip btn-flat' data-id=<?php echo $row['employee_id'] ?>><i class='fa fa-print'></i> Print</button>
                              <?php
                              }else{
                              ?>
                              <button class='btn btn-success btn-sm download btn-flat' data-id=<?php echo $row['employee_id'] ?> disabled><i class='fa fa-download' onclick="printPayslip()"></i> Download</button>
                              <button class='btn btn-info btn-sm viewpayslip btn-flat' data-id=<?php echo $row['employee_id'] ?> disabled><i class='fa fa-print'></i> Print</button>
                             <?php
                              }
                             ?>
                              </td>
                          </tr>
                          <?php
                          }
                          ?>
                           <!-- <tr>
                              <td class="text-left">
                              <button class='btn btn-warning btn-flat' onclick="printAllPaySlip()"> Print selected payslip</button>
                              </td>
                          </tr> -->
                            </tbody>
                        </table>
                        <button class='btn btn-info btn-sm btn-flat approve' onclick="approve('<?php echo $createdOn ?>')">Approve</button>
                    </div>
                </div> 
            </div>
        </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/payroll_slip.php'; ?>
  <?php include 'includes/payroll_slip_download.php'; ?>
  <?php include 'includes/payroll_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>


<script>
  function approve(date_range){
      if (confirm("Are you sure you want to approve?")) {
        // AJAX request to update the status on the server
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "payroll_status_update2.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // Redirect to another page after successful update
            alert("Success!");
            window.location.reload();
          }
        };

        // Prepare the data to send
        var data = "action=approve&date_range=" + date_range;
        console.log(data);
        // Send the request with the data
        xhr.send(data);
      }
  }
</script>

<script>
    // Add event listener to select dropdowns with class 'selected'
    document.querySelectorAll('.selected').forEach(select => {
        select.addEventListener('change', function() {
            const selectedValue = this.value; // Get selected status_id
            const employeeId = this.dataset.employeeId; // Get data-employee-id attribute

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "payroll_status_update.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                var response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        alert(response.message);
                    } else {
                        alert("Failed to update status: " + response.message);
                    }
            };
            xhr.send("selectedValue=" + encodeURIComponent(selectedValue) + "&employeeId=" + encodeURIComponent(employeeId));
            console.log(selectedValue + "--" + employeeId);
        });
    });
</script>


<script>
    $(function(){
      $('.delete').click(function(e){
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });
    });

    $(function(){
      $('.edit').click(function(e){
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });
    });

    //Generate pdf
    $(function(){
      $('.viewpayslip').click(function(e){
        e.preventDefault();
        $('#viewpayslip').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });
    });
    //printpayroll
    $(function(){
      $('.printPayroll').click(function(e){
        e.preventDefault();
        $('#payroll').modal('show');
      console.log("oooooooooooo");
      });
    });

    //Download
    $(function(){
      $('.download').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        window.location.href = 'includes/generate_pdf.php?id=' + id;
      });
    });

//End Generate pdf
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'payroll_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.employee_name').html('Employee id: '+response.employee_id);
      // $('.employee_name').html(response.firstname+' '+response.lastname);
      $('#edit-bank-account').val(response.bank_account);
      $('#edit-gcash').val(response.gcash);
      $('#id').val(response.id);

      // delete payroll
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#del_emp_payroll').val(response.id);

      // viewpayslip
      var img_url = '../images/'+response.photo;
      // var ewn_logo = '../images/ewn.png';

      $('#employee-img').attr('src', img_url);
      // $('#ewn-ilogo').attr('src', ewn_logo);
      $('#employee-name').html(response.firstname+' '+response.lastname);
      $('#mobile-number').html(response.contact_info);
      $('#date_range').html(response.date_range);
      $('#email').html(response.email);
      $('#address').html(response.address);
      // $('#salary-calculation-loc-id').val(response.gcash);
      $('#salary-calculation-loc-id').val(response.gcash);
      $('#salary').html(Number(response.salary).toFixed(2));
      $('#meal_allowance').html(Number(response.meal_allowance).toFixed(2));
      $('#incentives').html(Number(response.incentives).toFixed(2));
      $('#adjustments').html(Number(response.adjustments).toFixed(2));
      $('#transportation').html(Number(response.transportation).toFixed(2));
      $('#sss').html(Number(response.sss).toFixed(2));
      $('#tin').html(Number(response.tin).toFixed(2));
      $('#pagibig').html(Number(response.pagibig).toFixed(2));
      $('#philhealth').html(Number(response.philhealth).toFixed(2));
      $('#gross').html(Number(response.gross).toFixed(2));
      $('#total_deduction').html(Number(response.total_deduction).toFixed(2));
      $('#net_salary').html(Number(response.net_salary).toFixed(2));
      $('#created_on').html(response.created_on);
      // cash advance deduction
      $('#payPerCutOff').html(Number(response.pay_per_cut_off).toFixed(2));
    }
  });
}
</script>

<!-- 
<script>
         // DATE RANGE PRINT
        function printFunction(dateFrom, dateTo) {
        // AJAX call to fetch data from the server
        $.ajax({
            type: 'POST',
            url: 'payroll_fetch_data.php',
            data: {
                dateFrom: dateFrom,
                dateTo: dateTo
            },
            dataType: 'json',
            success: function(response) {
                // Generate printable output using fetched data
                var printableContent = "<h1>Payroll Report</h1>";
                printableContent += "<p>Date Range: " + dateFrom + " to " + dateTo + "</p>";
                printableContent += "<table border=''>";
                printableContent += `<tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Number of days worked</th>
                <th>Total deduction</th>
                <th>Gross income</th>
                <th>Net salary</th>
                <th>Date created</th>
                </tr>`;
                for (var i = 0; i < response.length; i++) {
                    printableContent += "<tr>";
                    printableContent += "<td>" + response[i].employee_id + "</td>";
                    printableContent += "<td>" + response[i].date_range +"</td>";
                    printableContent += "<td>" + response[i].num_days_work + "</td>";
                    printableContent += "<td>" + response[i].total_deduction + "</td>";
                    printableContent += "<td>" + response[i].gross + "</td>";
                    printableContent += "<td>" + response[i].net_salary + "</td>";
                    printableContent += "<td>" + response[i].created_on + "</td>";
                    printableContent += "</tr>";
                }
                printableContent += "</table>";

                // Open a new window for printing
                var printWindow = window.open('', '_blank');
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Print</title></head><body>');
                printWindow.document.write(printableContent);
                printWindow.document.write('</body></html>');
                printWindow.document.close();

                // Print the content
                printWindow.print();
                printWindow.close();
            },
            error: function(xhr, status, error) {
                console.error("Error fetching payroll data:", error);
                alert("Error fetching payroll data. Please try again.");
            }
            });
        }
        $(function() {
            $('.print').click(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally
                var dateFrom = $('#dateFrom').val(); // Get the value of dateFrom input
                var dateTo = $('#dateTo').val(); // Get the value of dateTo input
                printFunction(dateFrom, dateTo); // Call printFunction with dateFrom and dateTo values
            });
        });
  // END DATE RANGE PRINT
    </script>
 -->







<!-- SELECT ALL CHEKCBOX ASSIGNED EMPLOYEE TO UNASSIGN-->
<script>
    // function selectAllPayroll(source) {
    //     var checkboxes = document.querySelectorAll('.checkPayroll');
    //     checkboxes.forEach(function(checkbox) {
    //         checkbox.checked = source.checked;
    //     });
    // }

    // function printAllPaySlip() {
    //     var selectedPayslip = [];
    //     $('.checkPayroll:checked').each(function() {
    //         selectedPayslip.push($(this).val());
    //     });
    //     console.log(selectedPayslip);
    //     $.ajax({
    //         type: 'POST',
    //         url: 'includes/pay_slip_all.php', // Provide the correct URL
    //         data: { selectedPayslip: selectedPayslip },
    //         success: function(response) {
    //             alert(response);
    //             // location.reload();
    //             // Call print function here after successful response
    //             // printPayslip();
    //         },
    //         error: function(xhr, status, error) {
    //             // Handle errors
    //             console.error(xhr.responseText);
    //         }
    //     });
    // }

    function printPayslip() {
        var content = document.getElementById('xxx').innerHTML;
        var newWindow = window.open('', '_blank', 'width=800,height=600');
        newWindow.document.write('<html><head><title>Payslip</title>');

        // Add custom styles for print
        newWindow.document.write('<style>');
        newWindow.document.write('@media print {');
        newWindow.document.write('.table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }'); // Adjust table styles
        newWindow.document.write('.table th, .table td { border: 1px solid #ddd; padding: 8px; text-align:right}'); // Adjust table cell styles
        newWindow.document.write('.text-right, .text-left { display: table-cell;}'); // Adjust alignment
        newWindow.document.write('.text-success { color: green; }'); // Adjust success text color
        newWindow.document.write('.th-color { color: #000;font-size:1.5rem }'); // Adjust success text color
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

  <!-- PASS DATA -->
</body>
</html>
