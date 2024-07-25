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
        Attendance
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance</li>
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
                                        <div class="col-sm-10"></div>
                                        <div class="date col-sm-2">
                                            <button type="submit" class="btn btn-primary print">Print</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
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
                <!-- attendance filtering by date range -->
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Manual attendance</a>
            </div>
            <div class="box-body" style="overflow-x:auto;">
              <table id="examplex" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Time in</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, employees.employee_id AS empid, 
                    attendance.date AS date,
                    attendance.id AS id
                    FROM attendance 
                    LEFT JOIN employees ON employees.employee_id=attendance.employee_id 
                    WHERE employees.archive = 'no'
                    ORDER BY attendance.id DESC, attendance.time_in DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".$row['date']."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".date('h:i A', strtotime($row['time_in'])).'<span class="label label-success pull-right">present</span>'."</td>
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
  <?php include 'includes/attendance_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
    console.log("Edit id:"+id)

  });


  
  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
    console.log("delete id:"+id)
  });
});



function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#datepicker_edit').val(response.date);
      $('#attendance_date').html(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.id);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_id').val(response.employee_id);
      $('#employee_id').val(response.employee_id);
      $('#date').val(response.date);
      $('#del_attid').val(response.id);
      $('#del_employee_name').html(response.firstname+' '+response.lastname);
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
            url: 'attendance_fetch_data.php', // Replace 'fetch_attendance_data.php' with your actual server endpoint
            data: {
                dateFrom: dateFrom,
                dateTo: dateTo
            },
            dataType: 'json',
            success: function(response) {
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
                printableContent += "<tr><th>Date</th><th>Employee ID</th><th>Name</th><th>Time In</th></tr>";
                for (var i = 0; i < response.length; i++) {
                    printableContent += "<tr>";
                    printableContent += "<td>" + response[i].date + "</td>";
                    printableContent += "<td>" + response[i].attid + "</td>";
                    printableContent += "<td>" + response[i].name + "</td>";
                    printableContent += "<td>" + response[i].time_in + "</td>";
                    printableContent += "</tr>";
                }
                printableContent += "</table>";
                printableContent += `
                <br><br><br>
                
                <div style="display:flex;align-items:right;justify-content:right;flex-direction:row;text-align:right">
                    <div style="text-align:center">
                      <span>Prepared by:</span><br>
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
