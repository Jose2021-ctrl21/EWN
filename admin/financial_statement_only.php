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
        Lists of employees' finances during deployment
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lists of employees' finances during deployment</li>
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
             <div class="row">
                        <form action="" method="POST"><br><br>
                            <div class="form-group row mt-3">
                                <div class="col-md-7">
                                    <!-- <h2>Date filtering</h2> -->
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
                                        <div class="col-sm-10"></div>
                                        <div class="date col-sm-2">
                                            <button type="submit" class="btn btn-primary print">Print</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- attendance filtering by date range -->
              <a href="#addpayroll" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Create payslips</a>
          </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Employee id</th>
                  <th>Date</th>
                  <th>Salary</th>
                  <th>Incentives</th>
                  <th>Meal allowance</th>
                  <th>Adjustments</th>
                  <th>Transportation</th>
                  <!-- <th>Employeer contribution( decimal )</th> -->
                  <!-- <th>Employee contribution( decimal )</th> -->
                  <!-- <th>Tools</th> -->
                </thead>
                <tbody>   
                <?php
                     $sql = "SELECT * FROM employee_financial_list 
                     LEFT JOIN employees ON employees.employee_id = employee_financial_list.employee_id
                     WHERE employees.archive = 'no'
                     ";
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){
                  ?>    
                  <tr>
                    <td><?php echo $row['employee_id']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo number_format($row['salary']); ?>php</td>
                    <td><?php echo number_format($row['incentives_value']); ?>php</td>
                    <td><?php echo number_format($row['meal_allowance']); ?>php</td>
                    <td><?php echo number_format($row['adjustments']); ?>php</td>
                    <td><?php echo number_format($row['transportation']); ?>php</td>
                    <td>
                      <!-- <button class='btn btn-success btn-sm edit btn-flat' data-id=''><i class='fa fa-edit'></i> Edit</button> -->
                   
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
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
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
        function printFunction(dateFrom, dateTo) {
        // AJAX call to fetch data from the server
        $.ajax({
            type: 'POST',
            url: 'financial_management_fetch_data.php', // Replace 'fetch_attendance_data.php' with your actual server endpoint
            data: {
                dateFrom: dateFrom,
                dateTo: dateTo
            },
            dataType: 'json',
            success: function(response) {
                // Generate printable output using fetched data
                var printableContent = "<h1>Employees' financial Report during deployment</h1>";
                printableContent += "<p>Date Range: " + dateFrom + " to " + dateTo + "</p>";
                printableContent += "<table border=''>";
                printableContent += "<tr><th>Employee ID</th><th>Date</th><th>Salary</th><th>Incentives</th><th>Meal allowance</th><th>Adjustments</th><th>Transportation</th></tr>";
                for (var i = 0; i < response.length; i++) {
                    printableContent += "<tr>";
                    printableContent += "<td>" + response[i].employee_id + "</td>";
                    printableContent += "<td>" + response[i].date + "</td>";
                    printableContent += "<td>" + response[i].salary+ "</td>";
                    printableContent += "<td>" + response[i].incentives_value + "</td>";
                    printableContent += "<td>" + response[i].meal_allowance + "</td>";
                    printableContent += "<td>" + response[i].adjustments + "</td>";
                    printableContent += "<td>" + response[i].transportation + "</td>";
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
                console.error("Error fetching attendance data:", error);
                alert("Error fetching attendance data. Please try again.");
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
