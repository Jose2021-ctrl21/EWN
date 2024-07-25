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
        List of employee's finances during deployment
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List of employee's finances during deployment</li>
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
              <a href="#addpayroll" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Create payroll</a>
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
                  <th>Employeer contribution( decimal )</th>
                  <th>Employee contribution( decimal )</th>
                  <th>Tools</th>
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
                    <td><?php echo number_format($row['salary']); ?></td>
                    <td><?php echo number_format($row['incentives_value']); ?></td>
                    <td><?php echo number_format($row['meal_allowance']); ?></td>
                    <td><?php echo number_format($row['adjustments']); ?></td>
                    <td><?php echo number_format($row['transportation']); ?></td>
                    <td>
                      <p>SSS: <?php echo $row['sss_employeer']; ?><br>
                      Philhealth: <?php echo $row['philhealth_employeer']; ?><br>
                      Pagibig: <?php echo $row['pagibig_employeer']; ?><br>
                      Tin: <?php echo $row['tin_employeer']; ?></p>
                    </td>
                    <td>
                      <p>SSS: <?php echo $row['sss_emp']; ?><br>
                      Philhealth: <?php echo $row['philhealth_emp']; ?><br>
                      Pagibig: <?php echo $row['pagibig_emp']; ?><br>
                      Tin: <?php echo $row['tin_emp']; ?></p>
                    </td>
                    <td>
                      <!-- <button class='btn btn-success btn-sm edit btn-flat' data-id=''><i class='fa fa-edit'></i> Edit</button> -->
                      <button class='btn btn-danger btn-sm delete btn-flat' data-id="<?php echo $row['id']; ?>"><i class='fa fa-trash'></i> Delete</button>
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
</body>
</html>
