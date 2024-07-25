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
        Logs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Logs</li>
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
            <div class="box-body" style="overflow-x:auto;">
                <!-- attendance filtering by date range -->
                <div class="row">
                  <form action="" method="POST">
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



            <table id="example1" class="table table-bordered">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Date and Time</th>
                      <th>User</th>
                      <th>Activity</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      // Assuming $conn is your database connection
                      $sql = "SELECT * FROM audit_logs ORDER BY id DESC";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                          echo "
                              <tr>
                                  <td>".$row['id']."</td>
                                  <td>".$row['date_and_time']."</td>
                                  <td>".$row['user']."</td>
                                  <td>".$row['description']."</td>
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
  <?php include 'includes/vax_location_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>




<script>
         // DATE RANGE PRINT
        function printFunction(dateFrom, dateTo) {
        // AJAX call to fetch data from the server
        $.ajax({
            type: 'POST',
            url: 'audit_logs_fetch_data.php', // Replace 'fetch_attendance_data.php' with your actual server endpoint
            data: {
                dateFrom: dateFrom,
                dateTo: dateTo
            },
            dataType: 'json',
            success: function(response) {
                // Generate printable output using fetched data
                var printableContent = "<h1>Logs Report</h1>";
                printableContent += "<p>Date Range: " + dateFrom + " to " + dateTo + "</p>";
                printableContent += "<table border=''>";
                printableContent += "<tr><th>Date and Time</th><th>User</th><th>Activity</th></tr>";
                for (var i = 0; i < response.length; i++) {
                    printableContent += "<tr>";
                    printableContent += "<td>" + response[i].date_and_time + "</td>";
                    printableContent += "<td>" + response[i].user + "</td>";
                    printableContent += "<td>" + response[i].description + "</td>";
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
