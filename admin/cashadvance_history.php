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
        Cash advance history
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Cash advance history</li>
        <li class="active">Cash advance history</li>
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
              <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add cash advance</a> -->
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Cashadvance</th>
                  <th>Number of Cutoff</th>
                  <th>Amount per Cutoff</th>
                  <th>Balance</th>
                </thead>
                <tbody>
                <?php
                // error_reporting(0);
                    $employeeId = $_GET['employee_id'];
                    $sql = "SELECT *, ch.date_advance AS date, 
                    ch.employee_id AS employee_id,
                    ch.amount AS cashadvance,
                    ch.number_of_cutoffs AS number_of_cutoffs,
                    ch.pay_per_cut_off AS pay_per_cut_off,
                    ch.balance AS balance
                    FROM cashadvance AS ch
                    LEFT JOIN employees ON employees.employee_id = ch.employee_id
                    WHERE employees.archive = 'no' AND ch.employee_id = '$employeeId'
                    ORDER BY ch.id DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        echo "
                        <tr>
                            <td class='hidden'></td>
                            <td>".date('M d, Y', strtotime($row['date']))."</td>
                            <td>".$row['employee_id']."</td>
                            <td>&#8369;".$row['cashadvance']."</td>
                            <td>".$row['number_of_cutoffs']."</td>
                            <td>&#8369;".$row['pay_per_cut_off']."</td>
                            <td>&#8369;".$row['balance']."</td>
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
</div>
<?php include 'includes/scripts.php'; ?>

</body>
</html>
