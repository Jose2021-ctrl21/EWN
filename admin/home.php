<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
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
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <?php
                                    $month = date('m');
                                    $sql = "SELECT COUNT(attendance.id) AS numEmp FROM attendance WHERE MONTH(date) = '$month'";
                                    $query = $conn->query($sql);
                                    $row = $query->fetch_assoc();
                                    echo "<h3>" . $row['numEmp'] . "</h3>";                    
                                    ?>
                                    <p>Number of employees deployed per month</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-people"></i>
                                </div>
                                <a href="home.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS numEmp FROM employees WHERE archive = 'no'";
                                    $query = $conn->query($sql);
                                    $row = $query->fetch_assoc();
                                    echo "<h3>" . $row['numEmp'] . "</h3>";                    
                                    ?>
                                    <p>Number of active employees</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-person"></i>
                                </div>
                                <a href="home.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <?php if ($_SESSION['access_role_1'] == 1): ?>
                        <div class="col-lg-3 col-md-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <?php
                                    $sql = "SELECT COUNT(DISTINCT date_range) AS status 
                                    FROM payroll_employee 
                                    WHERE status != 2";
                                    $query = $conn->query($sql);
                                    if ($query->num_rows > 0) {
                                        $row = $query->fetch_assoc();
                                        echo "<h3>" . $row['status'] . "</h3>";     
                                    } else {
                                        echo "<h3>0</h3>";     
                                    }
                                    ?>
                                    <p>Notification for approval</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-bell"></i>
                                </div>
                                <a href="financial_statement.php" class="small-box-footer">Go to payroll <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Active vaccination sites and number of employees assigned</h3>
                            <div class="box-tools pull-right">
                                <form class="form-inline">
                                    <div class="form-group">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart" id="myDiv2" style="overflow:auto">
                                <!-- Content for the chart goes here -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Position and number of employees</h3>
                            <div class="box-tools pull-right">
                                <form class="form-inline">
                                    <div class="form-group">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart" id="myDiv" style="overflow:auto">
                                <!-- Content for the chart goes here -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Number of DOCs per location</h3>
                            <div class="box-tools pull-right">
                                <form class="form-inline">
                                    <div class="form-group">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart" id="myDiv3" style="overflow:auto">
                                <!-- Content for the chart goes here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- Include Chart.js library -->
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php
  //LOCATION AND EMPLOYEES ASSIGNED
  $sql = "SELECT location.province AS province,
  location.municipality AS municipality, 
  location.doc AS numberOfChicks,
  COUNT(ass_sched_fin.ass_employee_id_sc) AS numCrew
  FROM ass_sched_fin
  LEFT JOIN location ON location.id = ass_sched_fin.ass_location
  GROUP BY location.id";
  $query = $conn->query($sql);
  $data = array();
  while($row = $query->fetch_assoc()){
      $data[] = $row;
  }
  $jsonData = json_encode($data);

  //POSITION AND NUMBER OF EMPLOYEE
  $sql_pos = "SELECT position.description AS description, COUNT(employees.position_id) AS numPos
  FROM employees
  LEFT JOIN position ON position.id = employees.position_id WHERE employees.archive = 'no'
  GROUP BY position.id";
  $query_pos = $conn->query($sql_pos);
  $data_pos = array();
  while($row_pos = $query_pos->fetch_assoc()){
      $data_pos[] = $row_pos;
  }
  $jsonData_pos = json_encode($data_pos);


  //DOCS PER LOCATION
  $sql_docs = "SELECT CONCAT(province,', ',municipality) AS loc, doc
  FROM location";
  $query_docs = $conn->query($sql_docs);
  $data_docs = array();
  while($row_docs = $query_docs->fetch_assoc()){
      $data_docs[] = $row_docs;
  }
  $jsonData_docs = json_encode($data_docs);
?>


<!-- NUMBER OF EMPLOYEE PER LOCATION -->
 <script>
    // Get the PHP-generated JSON data
    var jsonData = <?php echo $jsonData; ?>;
    // Extract values and labels from the JSON data
    var values = jsonData.map(function(item) { return item.numCrew; });
    var labels = jsonData.map(function(item) { return item.province + ", " + item.municipality; });
    // Create the pie chart data
    var data = [{
        type: "pie",
        values: values,
        labels: labels,
        textinfo: "label+value",
        insidetextorientation: "radial"
    }];
    // Layout for the pie chart
    var layout = {
        height: 700,
        width: 700
    };
    // Render the pie chart
    Plotly.newPlot('myDiv2', data, layout);
</script>


<!-- NUMBER OF EMPLOYEE PER POSITION -->
<script>
    // Get the PHP-generated JSON data
    var jsonData = <?php echo $jsonData_pos; ?>;
    // Extract values and labels from the JSON data
    var values = jsonData.map(function(item) { return item.numPos; });
    var labels = jsonData.map(function(item) { return item.description; });
    // Create the pie chart data
    var data = [{
        type: "pie",
        values: values,
        labels: labels,
        textinfo: "label+value",
        insidetextorientation: "radial"
    }];
    // Layout for the pie chart
    var layout = {
        height: 700,
        width: 700
    };
    // Render the pie chart
    Plotly.newPlot('myDiv', data, layout);
</script>

<!-- NUMBER OF DOCs PER LOCATION -->
<script>
    // Get the PHP-generated JSON data
    var jsonData = <?php echo $jsonData_docs; ?>;
    // Extract values and labels from the JSON data
    var values = jsonData.map(function(item) { return item.doc; });
    var labels = jsonData.map(function(item) { return item.loc; });
    // Create the pie chart data
    var data = [{
        type: "pie",
        values: values,
        labels: labels,
        textinfo: "label+value",
        insidetextorientation: "radial"
    }];
    // Layout for the pie chart
    var layout = {
        height: 700,
        width: 700
    };
    // Render the pie chart
    Plotly.newPlot('myDiv3', data, layout);
</script>

</body>
</html>
