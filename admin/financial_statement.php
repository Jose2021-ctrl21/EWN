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
        Payroll summary
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payroll summary</li>
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
        <div class="col-lg-12">
          <div class="box">
          <div class="box-header with-border">
             <!-- attendance filtering by date range -->
             <!-- <div class="row">
                        <form action="" method="POST"><br><br>
                            <div class="form-group row">
                                <div class="col-md-7">
    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="date col-sm-4">
                                            <label for="dateFrom" class="col-form-label">Date from</label>
                                            <input type="text" class="form-control" id="dateFrom" name="dateFrom" required>
                                        </div>
                                        <div class="date col-sm-4">
                                            <label for="dateTo" class="col-form-label">Date to</label>
                                            <input type="text" class="form-control" id="dateTo" name="dateTo" required>
                                        </div>
                                        <div class="date col-sm-2" style="margin-top:25px">
                                            <button type="submit" class="btn btn-primary print">Print</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <div class="row justify-content-end">
                      <div class="col-md-12">
                        <div class="date col-sm-2" style="margin-top:25px">
                            <a href="" data-toggle="modal" class="btn btn-primary btn-sm btn-flat add"><i class="fa fa-plus"></i> Create payroll</a>
                        </div>
                        <!-- <div class="col-sm-10 align-right">
                            <div class="date col-sm-2">
                                <label for="dateFrom" class="col-form-label">Date from</label>
                                <input type="text" class="form-control" id="dateFrom" name="dateFrom" required>
                            </div>
                            <div class="date col-sm-2">
                                <label for="dateTo" class="col-form-label">Date to</label>
                                <input type="text" class="form-control" id="dateTo" name="dateTo" required>
                            </div>
                            <div class="date col-sm-2" style="margin-top:25px">
                                <button type="submit" class="btn btn-primary print">Print</button>
                            </div>
                        </div> -->
                      </div>
                    </div>
                <!-- attendance filtering by date range -->
          </div>
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Payroll number</th>
                  <th>Pay period</th>
                  <th>Number of employees</th>
                  <th>Number of days worked</th>
                  <th>Total deduction</th>
                  <th>Gross</th>
                  <th>Net salary</th>
                  <th>Created on</th>
                  <th>Status</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                        <?php
                            $sql = "SELECT *, approval.status AS status, 
                            payroll_employee.status AS pe_status,
                            approval.id AS status_id, 
                            payroll_employee.id AS id,
                            payroll_employee.date_range AS date_range,
                            payroll_employee.workdays_total AS workdays_total,
                            SUM(CAST(total_deduction AS DECIMAL)) AS total_deduction,
                            SUM(CAST(gross AS DECIMAL)) AS gross,
                            SUM(CAST(net_salary AS DECIMAL)) AS net_salary,
                            COUNT(DISTINCT employee_id) AS numberOfEmp
                            FROM payroll_employee 
                            LEFT JOIN approval ON approval.id = payroll_employee.status
                            GROUP BY date_range";

                            $query = $conn->query($sql);
                            $year=date('Y');

                            // Fetch approval data outside the loop
                            $sql_appr = "SELECT * FROM approval GROUP BY status, id";
                            $appr_qry = $conn->query($sql_appr);
                            while($row_appr = $appr_qry->fetch_assoc()){
                                $row_apprs[] = $row_appr;
                            }        
                            while($row = $query->fetch_assoc()){
                          ?>
                          <tr>
                            <td>
                            <?php 
                                echo "
                                <a href='payroll.php?date_range=" . $row['date_range'] . "&id=" . $row['id'] . "'>
                                    $year-000-" . $row['id'] . "
                                </a>";
                            ?>
                            </td>
                            <td><?php echo $row['date_range']; ?></td>
                            <td><?php echo $row['numberOfEmp']; ?></td>
                            <td><?php echo $row['workdays_total']; ?></td>
                            <td> &#8369; <?php echo number_format($row['total_deduction']); ?></td>
                            <td> &#8369; <?php echo number_format($row['gross']); ?></td>
                            <td> &#8369; <?php echo number_format($row['net_salary']); ?></td>
                            <td><?php echo $row['created_on']; ?></td>
                            <td>
                              
                              <?php 
                              // $sql_appr = "SELECT * FROM approval GROUP BY status, id";
                              // $appr_qry = $conn->query($sql_appr);
                              // while($row_appr = $appr_qry->fetch_assoc()){
                              //   $row_apprs[] = $row_appr;
                              // }
                              
                              if($_SESSION['access_role_1']==1 || $_SESSION['access_role_1']==3){?>
                                <!-- admin access -->
                              <select class="form-control selected"  data-employee-id="<?php echo $row['id']?>" disabled>
                                <?php foreach($row_apprs as $row_appr): ?>
                                  <option value='<?php echo $row_appr['id']?>'  <?php echo intval($row_appr['id']) === intval($row['pe_status']) ? 'selected' : ''?>><?php echo $row_appr['status']?></option>
                                <?php endforeach ?>
                              </select>
                              <?php }else{?>
                                <!-- staff access -->
                                <select class="form-control selected" data-employee-id="<?php echo $row['id']?>" disabled>
                                  <option value='<?php echo $row['status']?>'><?php echo $row['status']?></option>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                            <button class='btn btn-success btn-sm download btn-flat' data-id=<?php echo $row['employee_id'] ?>><i class='fa fa-download' onclick="printPayslip()"></i> Download</button>
                            <button class='btn btn-info btn-sm btn-flat print' onclick="printFunction('<?php echo $row['date_range']?>')">
                                <i class='fa fa-print'></i> Print
                            </button>

                            </td>
                          </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- END col-xs-12 -->
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/payroll_modal.php'; ?>
  <?php include 'includes/security_modal.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>
<script>
    // Add event listener to select dropdowns with class 'selected'
    document.querySelectorAll('.selected').forEach(select => {
        select.addEventListener('change', function() {
            const selectedValue = this.value; // Get selected status_id
            // const employeeId = this.dataset.employeeId; 

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
            xhr.send("selectedValue=" + encodeURIComponent(selectedValue));
            console.log(selectedValue);
        });
    });
</script>

<script>
  $(function(){
    $(document).on('click', '.edit', function(e){
      e.preventDefault();
      $('#edit').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click', '.add', function(e){
      e.preventDefault();
      $('#security_payroll').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
    $('#security-form-edit-payroll').submit(function(e) {
        e.preventDefault();
        const password = $('#security-pass-edit-payroll').val();

        $.ajax({
          url: 'vax_location_security.php', // Your server-side validation endpoint
          method: 'POST',
          data: { password: password },
          success: function(response) {
            response = JSON.parse(response);
            if(response.result === true) {
              $('#security_payroll').modal('hide');
              $('#addpayroll').modal('show');
              getRow(id); // Use the saved id here
            } else {
              alert('Incorrect password. Please try again.');
              console.log(response.result);
            }
          },
          error: function() {
            alert('An error occurred while validating the password. Please try again.');
          }
        });

      });
    

    $(document).on('click', '.delete', function(e){
      e.preventDefault();
      $('#delete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
    
  });

    //Download
    $(function(){
      $('.download').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        window.location.href = 'includes/generate_payroll_pdf.php?id=' + id;
      });
    });

  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'financial_statement_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('#del_emp_payroll').val(response.id);
        $('#employee_name').html(response.employee_id);
        $('#id_uniq').html(response.id);
        $('#date').html(response.date);
      }
    });
  }
</script>

  <script>
         // DATE RANGE PRINT
        function printFunction(dateRange) {
        // AJAX call to fetch data from the server
        $.ajax({
            type: 'POST',
            url: 'financial_management_fetch_data.php',
            data: {
                dateRange: dateRange,
            },
            dataType: 'json',
            success: function(response) {
                var printableContent = `
                <div class="" style="display:flex;align-items:center;justify-content:center;flex-direction:row;text-align:center">
                <div style="margin-right: 20px;">
                    <img src="../images/ewn.png" class="img-responsive" id="ewn-logo" alt="img"  style="width: 100px">
                </div>
                <center><h1><b>EWN Manpower Services</b></h1></center>
                
                <b style="margin-left: 20px;">09396193386<i class="fa fa-phone"></i><b><br>
                <b style="margin-left: 20px;">ewn@gmail.com <i class="fa fa-envelope-o"></i><b><br>
                <b style="margin-left: 20px;">Noveleta, Cavite <i class="fa fa-location-arrow"></i><b>
                </div>
                `;
                printableContent += "<h1>Payroll report</h1>";
                printableContent += "<p>Date Range: " + dateRange + "</p>";
                printableContent += "<table border=''>";
                printableContent += `
                <tr>
                  <th>Payslip number</th>
                  <th>Employee ID</th>
                  <th>Number of days worked</th>
                  <th>Total deduction</th>
                  <th>Gross income</th>
                  <th>Net salary</th>
                  <th>Created on</th>
                </tr>`;
                for (var i = 0; i < response.length; i++) {
                    printableContent += "<tr>";
                    printableContent += "<td>" + response[i].payslip_number + "</td>";
                    printableContent += "<td>" + response[i].employee_id + "</td>";
                    printableContent += "<td>" + response[i].num_days_work + "</td>";
                    printableContent += "<td>" + response[i].total_deduction + "</td>";
                    printableContent += "<td>" + response[i].gross+ "</td>";
                    printableContent += "<td>" + response[i].net_salary+ "</td>";
                    printableContent += "<td>" + response[i].created_on+ "</td>";
                    printableContent += "</tr>";
                }
                printableContent += "</table>";
                printableContent += `
                <br><br><br>
                
                <div style="display:flex;align-items:left;justify-content:left;flex-direction:row;text-align:left">
                    <div style="text-align:center">
                        <span>Prepared by:</span><br><br>
                        <span style="font-size:20px !important"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></span><br>
                        <i><?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?></i><br>
                    </div>
                </div>`;

                // Open a new window for printing
                var printWindow = window.open('', '_blank');
                printWindow.document.open();
                printWindow.document.write(`
                                              <html>
                                              <head>
                                                  <title>Print</title>
                                                  <style>
                                                      body {
                                                          font-family: Arial, sans-serif;
                                                      }
                                                      h1 {
                                                          text-align: center;
                                                      }
                                                      table {
                                                          width: 100%;
                                                          border-collapse: collapse;
                                                          margin: 20px 0;
                                                      }
                                                      th, td {
                                                          padding: 10px;
                                                          text-align: left;
                                                          border: 1px solid #ddd;
                                                      }
                                                      th {
                                                        background:#4CAF50;
                                                          
                                                      }
                                                      tr:nth-child(even) {
                                                          background-color: #f9f9f9;
                                                      }
                                                  </style>
                                              </head>
                                              <body>
                                                  ${printableContent}
                                              </body>
                                              </html>
                                              `);
                printWindow.document.close();

                // Print the content
                printWindow.print();
                printWindow.close();
            },
            error: function(xhr, status, error) {
                console.error("Error fetching attendance data:", error);
                alert("Error fetching attendance data. Please try again.");
            }
            });
        console.log(dateRange);
        }
  // END DATE RANGE PRINT
    </script>



</body>
</html>
