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
        Cash advance current
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cash advance current</li>
        <li class="active">Cash advance current</li>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
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
                                            <button type="submit" class="btn btn-primary print">Print payroll</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <!-- attendance filtering by date range -->
                <div class="row">
                  <form action="" method="POST">
                    <input type="hidden" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" id="user_name"/>
                    <input type="hidden" value="<?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?>" id="user_role"/>
                  <div class="col-sm-10 align-right">
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
                    </div>
                  </form>
                </div><br><br>
                <!-- attendance filtering by date range -->
                <!-- attendance filtering by date range -->
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add cash advance</a>
            </div>
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Cash Advance</th>
                  <th>Number of Cutoff</th>
                  <th>Amount per Cutoff</th>
                  <th>Paid</th>
                  <th>Cash advance remaining balance</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                <?php
                // error_reporting(0);
                $sql = "SELECT cashadvance.*, cashadvance.id AS caid, 
                employees.employee_id AS empid,
                employees.firstname AS firstname,
                employees.lastname AS lastname,
                CAST(amount AS DECIMAL(10, 2)) AS amount
            FROM cashadvance 
            LEFT JOIN employees ON employees.employee_id = cashadvance.employee_id
            WHERE employees.archive = 'no'
            AND cashadvance.id IN (
                SELECT MAX(id) FROM cashadvance GROUP BY employee_id
            )
            ORDER BY cashadvance.id DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        // Convert string values to floats
                        $amount = floatval($row['amount']);
                        $number_of_cutoffs = floatval($row['number_of_cutoffs']);
                        $amount_per_cutoff = floatval($row['pay_per_cut_off']);
                        $balance = floatval($row['balance']);
                        
                        echo "
                        <tr>
                            <td class='hidden'></td>
                            <td>".date('M d, Y', strtotime($row['date_advance']))."</td>
                            <td><a href='cashadvance_history.php?employee_id=".$row['empid']."'>".$row['empid']."</a></td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>&#8369;".number_format($amount, 2)."</td>
                            <td>".$number_of_cutoffs."</td>
                            <td>&#8369;".number_format($amount_per_cutoff, 2)."</td>
                            <td>&#8369;".number_format((floatval($amount))-(floatval($balance)),2)."</td>
                            <td>&#8369;".number_format($balance, 2)."</td>
                            <td>
                                <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['caid']."'><i class='fa fa-edit'></i> Edit</button>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/cashadvance_modal.php'; ?>
  <?php include 'includes/security_modal.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>


<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#security_edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $('#security-form-edit').submit(function(e) {
        e.preventDefault();
        const password = $('#security-pass-edit').val();

        $.ajax({
          url: 'vax_location_security.php', // Your server-side validation endpoint
          method: 'POST',
          data: { password: password },
          success: function(response) {
            response = JSON.parse(response);
            if(response.result === true) {
              $('#security_edit').modal('hide');
              $('#edit').modal('show');
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

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'cashadvance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      console.log(response);
      $('.date').html(response.date_advance);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('.caid').val(response.caid);
      $('#edit_amount').val(response.amount);
      $('#employee_id').val(response.employee_id);
      $('#balance').val(response.balance);
      $('#edit-pay-per-cut-off').val(response.pay_per_cut_off);
    }
  });
}
</script>
<script>
         // DATE RANGE PRINT
        function printFunction(dateFrom, dateTo) {
        var userName = $('#user_name').val();
        var userRole = $('#user_role').val();
        // AJAX call to fetch data from the server
        $.ajax({
            type: 'POST',
            url: 'cash_advance_fetch_data.php',
            data: {
                dateFrom: dateFrom,
                dateTo: dateTo
            },
            dataType: 'json',
            success: function(response) {
              console.log(response);
                // Generate printable output using fetched data
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
                printableContent += "<p>Date Range: " + dateFrom + " to " + dateTo + "</p>";
                printableContent += "<table border=''>";
                printableContent += `<tr>
                <th>Date</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Loan</th>
                <th>Pay per cut off</th>
                <th>Paid</th>
                <th>Loan remaining balance</th>
                </tr>`;
                for (var i = 0; i < response.length; i++) {
                    printableContent += "<tr>";
                    printableContent += "<td>" + response[i].date_advance + "</td>";
                    printableContent += "<td>" + response[i].employee_id +"</td>";
                    printableContent += "<td>" + response[i].name + "</td>";
                    printableContent += "<td>" + response[i].amount + "</td>";
                    printableContent += "<td>" + response[i].pay_per_cut_off + "</td>";
                    printableContent += "<td>" + response[i].paid + "</td>";
                    printableContent += "<td>" + response[i].balance + "</td>";
                    printableContent += "</tr>";
                }
                printableContent += "</table>";

                printableContent += `
                <br><br><br>
                
                <div style="display:flex;align-items:right;justify-content:right;flex-direction:row;text-align:right">
                    <div style="text-align:center">
                      <span>Prepared by:</span><br>
                      <span style="font-size:20px !important">${userName}</span><br>
                      <i>${userRole}</i><br>
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



</body>
</html>
