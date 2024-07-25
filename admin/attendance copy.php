<?php
include 'includes/session.php';
include 'includes/header.php';
?>

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
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Attendance</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
                    <div class='alert alert-danger alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h4><i class='icon fa fa-warning'></i> Error!</h4>
                      " . $_SESSION['error'] . "
                    </div>
                  ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
                    <div class='alert alert-success alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      <h4><i class='icon fa fa-check'></i> Success!</h4>
                      " . $_SESSION['success'] . "
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
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <div class="col-sm-8">
                                                <!-- <h2>Date filtering</h2> -->
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="date col-sm-6">
                                                    <label for="dateFrom" class="control-label">Date from</label>
                                                    <input type="text" class="form-control" id="dateFrom" name="dateFrom" required>
                                                </div>
                                                <div class="date col-sm-6">
                                                    <label for="dateTo" class="control-label">Date to</label>
                                                    <input type="text" class="form-control" id="dateTo" name="dateTo" required>
                                                </div>
                                                <div class="date col-sm-10"></div>
                                                <div class="date col-sm-2">
                                                    <button type="submit" class="btn btn-primary mt-3">Print</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- attendance filtering by date range -->
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                               
                                <table id="examplex" class="table table-bordered">
                                    <thead>
                                        <th class="hidden"></th>
                                        <th>Date</th>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Time signed in</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // if(isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
                                        //     $dateFrom = $_POST['dateFrom'];
                                        //     $dateTo = $_POST['dateTo'];
                                        //     $sql = "SELECT *, employees.employee_id AS empid, 
                                        //         attendance.date AS date,
                                        //         attendance.employee_id AS id
                                        //         FROM attendance 
                                        //         LEFT JOIN employees ON employees.id=attendance.employee_id 
                                        //         LEFT JOIN ass_sched_fin ON ass_sched_fin.ass_employee_id = attendance.employee_id
                                        //         WHERE attendance.date BETWEEN ? AND ?
                                        //         ORDER BY attendance.date DESC, attendance.time_in DESC";
                                        //     $stmt = $conn->prepare($sql);
                                        //     $stmt->bind_param("ss", $dateFrom, $dateTo);
                                        //     $stmt->execute();
                                        //     $result = $stmt->get_result();
                                        //     while ($row = $result->fetch_assoc()) {
                                        //         echo "
                                        //         <tr>
                                        //           <td class='hidden'></td>
                                        //           <td>" . $row['date'] . "</td>
                                        //           <td>" . $row['empid'] . "</td>
                                        //           <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                                        //           <td>" . date('h:i A', strtotime($row['time_in'])) . '<span class="label label-success pull-right">present</span>' . "</td>
                                        //           <td>
                                        //             <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                                        //             <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
                                        //           </td>
                                        //         </tr>
                                        //       ";
                                        //     }
                                        //     $stmt->close();
                                        // }else{
                                          // IF NOT FILTERERED
                                            // Modify your SQL query to include the date range condition
                                            $sql = "SELECT *, employees.employee_id AS empid, 
                                                attendance.date AS date,
                                                attendance.employee_id AS id
                                                FROM attendance 
                                                LEFT JOIN employees ON employees.id=attendance.employee_id 
                                                LEFT JOIN ass_sched_fin ON ass_sched_fin.ass_employee_id = attendance.employee_id
                                                ORDER BY attendance.date DESC, attendance.time_in DESC";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while ($row = $result->fetch_assoc()) {
                                                echo "
                                                <tr>
                                                  <td class='hidden'></td>
                                                  <td>" . $row['date'] . "</td>
                                                  <td>" . $row['empid'] . "</td>
                                                  <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                                                  <td>" . date('h:i A', strtotime($row['time_in'])) . '<span class="label label-success pull-right">present</span>' . "</td>
                                                  <td>
                                                    <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                                                    <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
                                                  </td>
                                                </tr>
                                              ";
                                            }
                                            $stmt->close();
                                            // IF NOT FILTERERED
                                        // }
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
    <script>
        $(function() {
            $('.edit').click(function(e) {
                e.preventDefault();
                $('#edit').modal('show');
                var id = $(this).data('id');
                getRow(id);
                console.log("Edit id:" + id)

            });

            $('.delete').click(function(e) {
                e.preventDefault();
                $('#delete').modal('show');
                var id = $(this).data('id');
                getRow(id);
                console.log("delete id:" + id)
            });
        });

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'attendance_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#datepicker_edit').val(response.date);
                    $('#attendance_date').html(response.date);
                    $('#edit_time_in').val(response.time_in);
                    $('#edit_time_out').val(response.time_out);
                    $('#attid').val(response.id);
                    $('#employee_name').html(response.firstname + ' ' + response.lastname);
                    $('#del_attid').val(response.id);
                    $('#del_employee_name').html(response.firstname + ' ' + response.lastname);
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
                var printableContent = "<h1>Attendance Report</h1>";
                printableContent += "<p>Date Range: " + dateFrom + " to " + dateTo + "</p>";
                printableContent += "<table border=''>";
                printableContent += "<tr><th>Date</th><th>Employee ID</th><th>Name</th><th>Time In</th></tr>";
                for (var i = 0; i < response.length; i++) {
                    printableContent += "<tr>";
                    printableContent += "<td>" + response[i].date + "</td>";
                    printableContent += "<td>" + response[i].employee_id + "</td>";
                    printableContent += "<td>" + response[i].firstname + response[i].lastname + "</td>";
                    printableContent += "<td>" + response[i].time_in + "</td>";
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
            $('form').submit(function(e) {
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
