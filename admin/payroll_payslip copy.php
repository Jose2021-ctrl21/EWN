<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  <?php
      $sql = "SELECT *, CONCAT(em.firstname,' ',em.lastname) AS name,
      pe.employee_id AS employee_id,
      pe.meal_allowance AS meal_allowance,
      pe.incentives AS incentives,
      pe.adjustments AS adjustments,
      pe.transportation AS transportation,
      pe.sss AS sss,
      pe.pagibig AS pagibig,
      pe.philhealth AS philhealth,
      pe.tin AS tin,
      cash.id AS cashid,
      cash.balance AS balance,
      cash.pay_per_cut_off AS pay_per_cut_off,
      cash.amount AS amount,
      pe.gross AS gross,
      pe.net_salary AS net_salary,
      pe.created_on AS created_on,
      (SELECT SUM(CAST(pe_inner.net_salary AS DECIMAL(10,2)))
             FROM payroll_employee AS pe_inner
             WHERE pe_inner.employee_id = pe.employee_id 
               AND YEAR(pe_inner.created_on) = YEAR(CURDATE())) AS _13th_pay,
      pe.net_salary_after AS net_salary_after
      FROM payroll_employee AS pe
      LEFT JOIN employees As em ON em.employee_id = pe.employee_id
      LEFT JOIN cashadvance As cash ON cash.employee_id = pe.employee_id
      WHERE em.archive = 'no' AND pe.id='".$_GET['id']."' LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $rows = [];
      if($result){
          while($row = mysqli_fetch_assoc($result)){
              $rows[] = $row;
          }
      }else{
          echo "Error executing the query: " . mysqli_error($conn);
      }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payslip
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employee</li>
        <li class="active">payslip of employee</li>
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




<?php foreach($rows as $row):?>
      <div class="row">
        <form method="POST" action="payroll_payslip_update.php">
        <div class="col-md-12">
          <h1>Name: <?php echo $row['name'] ?></h1>
          <?php $employeeId = $row['employee_id'] ?>
          <h1>Employee number: <?php echo $employeeId ?></h1>
          <input type="hidden" name="slip-id" value="<?php echo $_GET['id'] ?>" readonly>
          <input type="hidden" name="employee-id" value="<?php echo $employeeId?>" readonly>
          <div class="box">
                <div class="col-sm-4">
                  <div class="box-body">
                        <div class="form-group row">
                          <label for="dbname" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                                <h3>Earnings</h3>
                          </div>
                        </div>
                        <div class="form-group row">
                              <label for="salary" class="col-sm-3 col-form-label">Salary</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $row['salary'] ?>" readonly>
                              </div>
                        </div>
                        <div class="form-group row">
                              <label for="incentives" class="col-sm-3 col-form-label">Incentives</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="incentives" name="incentives" value="<?php echo $row['incentives'] ?>" readonly>
                              </div>
                        </div>
                        <div class="form-group row">
                              <label for="temp-meal-allowance" class="col-sm-3 col-form-label">Meal allowance</label>
                              <div class="col-sm-9">
                                <input type="hidden" class="form-control" id="temp-meal-allowance" name="temp-meal-allowance" value="<?php echo $row['meal_allowance'] ?>">
                                <input type="text" class="form-control" id="meal-allowance" name="meal-allowance" value="<?php echo $row['meal_allowance'] ?>">
                              </div>
                        </div>
                        <div class="form-group row">
                              <label for="temp-adjustments" class="col-sm-3 col-form-label">Adjustments</label>
                              <div class="col-sm-9">
                                <input type="hidden" class="form-control" id="temp-adjustments" name="temp-adjustments"  value="<?php echo $row['adjustments'] ?>">
                                <input type="text" class="form-control" id="adjustments" name="adjustments"  value="<?php echo $row['adjustments'] ?>">
                              </div>
                        </div>
                        <div class="form-group row">
                              <label for="temp-transportation" class="col-sm-3 col-form-label">Transportation</label>
                              <div class="col-sm-9">
                                <input type="hidden" class="form-control" id="temp-transportation" name="temp-transportation"  value="<?php echo $row['transportation'] ?>">
                                <input type="text" class="form-control" id="transportation" name="transportation"  value="<?php echo $row['transportation'] ?>">
                              </div>
                        </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-sm-4">
                  <div class="box-body">
                        <div class="form-group row">
                          <label for="dbname" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                                <h3>Deductions</h3>
                          </div>
                        </div>
                        <div class="form-group row ">
                              <label for="sss" class="col-sm-3 col-form-label">SSS</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="sss" name="sss" value="<?php echo $row['sss'] ?>">
                              </div>
                        </div>
                        <div class="form-group row ">
                              <label for="pagibig" class="col-sm-3 col-form-label">Pag-ibig</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="pagibig" name="pagibig" value="<?php echo $row['pagibig'] ?>">
                              </div>
                        </div>
                        <div class="form-group row ">
                              <label for="philhealth" class="col-sm-3 col-form-label">Philhealth</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="philhealth" name="philhealth" value="<?php echo $row['philhealth'] ?>">
                              </div>
                        </div>
                        <div class="form-group row ">
                              <label for="tin" class="col-sm-3 col-form-label">Income tax</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="tin" name="tin" value="<?php echo $row['tin'] ?>">
                              </div>
                        </div>
                        <div class="form-group row ">
                              <label for="pay_per_cut_off" class="col-sm-3 col-form-label">Cash advance deduction</label>
                              <div class="col-sm-9">
                                <?php 
                                  if((float)$row['balance']>0){
                                ?>
                                <!-- <input type="hidden" class="form-control" id="pay_per_cut_off" name="temp_pay_per_cut_off"> -->
                                <input type="text" class="form-control" id="pay_per_cut_off" name="pay_per_cut_off">
                                <?php }else{?>
                                  <input type="text" class="form-control" id="pay_per_cut_off" name="pay_per_cut_off" value="<?php echo $row['pay_per_cut_off'] ?>" readonly>
                                  <?php } ?>
                              </div>
                        </div>
                  </div>
                </div>
                <!-- end col -->
                <!-- end col -->
                <div class="col-sm-4">
                  <div class="box-body">
                        <div class="form-group row">
                          <label for="dbname" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                                <h3>Cash advance</h3>
                          </div>
                        </div>
                        
                        <div class="form-group row ">
                              <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $row['cashadvance'] ?>" readonly>
                              </div>
                        </div>
                        
                        <div class="form-group row ">
                              <label for="remaining-balance" class="col-sm-3 col-form-label">Paid</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="remaining-balance" name="remaining-balance" value="<?php echo (float)$row['cashadvance']-(float)$row['cashadvance_balance'] ?>" readonly>
                              </div>
                        </div>

                        <div class="form-group row ">
                              <label for="remaining-balance" class="col-sm-3 col-form-label">Balance</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="remaining-balance" name="remaining-balance" value="<?php echo $row['cashadvance_balance'] ?>" readonly>
                              </div>
                        </div>
                       
                  </div>
                </div>
                <!-- end col -->
        </div>
        <div class="col-md-12">
                <!-- end col -->
                <div class="col-sm-4">
                  <div class="box-body">
                        <div class="form-group row">
                          <label for="dbname" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                                <h3>Absences and remaining leave credits</h3>
                          </div>
                        </div>
                        <div class="form-group row ">
                              <label for="absent" class="col-sm-3 col-form-label">Total of absent</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="absent" name="absent" value="<?php echo $row['num_of_absent'] ?>" readonly>
                              </div>
                        </div>                 
                        <div class="form-group row ">
                              <label for="remaining_credits" class="col-sm-3 col-form-label">Leave credits remaining</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="remaining_credits" name="remaining_credits" value="<?php echo $row['remaining_credits'] ?>" readonly>
                              </div>
                        </div>                 
                  </div>
                </div>
                <!-- end col -->
                <!-- end col -->
                <div class="col-sm-4">
                  <div class="box-body">
                        <div class="form-group row">
                          <label for="dbname" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                                <h3>13th month pay and bonuses</h3>
                          </div>
                        </div>
                        <div class="form-group row ">
                            <label for="" class="col-sm-3 col-form-label">Total basic salary as of <?php echo date('M-d-Y') ?></label>
                            <span class="col-sm-3">
                            <?php 
                              if ($row['net_salary_after'] == '') {
                                  echo !empty($row['_13th_pay']) ? $row['_13th_pay'] : 0;
                              } else {
                                  echo !empty($row['net_salary_after']) ? $row['net_salary_after'] : 0;
                              }
                            ?>
                            </span>
                            <div class="col-sm-9">
                              <?php if ($row['net_salary_after'] == '') { ?>
                                <input type="text" class="form-control" id="basicSalary" name="previous_netSalary" placeholder="Enter total basic salary to compute">
                              <?php }else{?>
                                <input type="text" class="form-control" id="basicSalary" name="previous_netSalary" placeholder="Enter total basic salary to compute" readonly>
                              <?php }?>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="_13th" class="col-sm-3 col-form-label">13th month pay</label>
                            <div class="col-sm-9">
                              <?php if ($row['net_salary_after'] == '') { ?>
                                <input type="text" class="form-control" id="result" name="_13th">
                              <?php }else{?>
                                <input type="text" class="form-control" id="result" name="_13th" readonly>
                              <?php }?>
                            </div>
                        </div>
                        <div class="form-group row ">
                              <label for="bonus" class="col-sm-3 col-form-label">Bonus</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="bonus" name="bonus" value="<?php echo $row['bonus'] ?>">
                              </div>
                        </div>
                        <script>
                            const basicSalaryInput = document.getElementById("basicSalary");
                            const resultInput = document.getElementById("result");
                            basicSalaryInput.addEventListener("input", function() {
                                let totalBasicSalary = parseFloat(basicSalaryInput.value);
                                let monthlySalary = totalBasicSalary / 12;
                                resultInput.value = monthlySalary.toFixed(2);
                            });
                        </script>
                  </div>
                </div>
                <!-- end col -->
                  <!-- end col -->
                  <div class="col-sm-4">
                  <div class="box-body">
                        <div class="form-group row">
                          <label for="dbname" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                                <h2 style="color:green">Gross and salary</h2>
                          </div>
                        </div>
                        <div class="form-group row ">
                              <label for="gross" class="col-sm-3 col-form-label" style="color:green">Gross earnings</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="gross" name="gross" value="<?php echo $row['gross'] ?>" readonly>
                              </div>
                        </div>
                        <div class="form-group row ">
                              <label for="net-salary" class="col-sm-3 col-form-label" style="color:green">Net salary</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="net-salary" name="net-salary" value="<?php echo $row['net_salary'] ?>" readonly>
                              </div>
                        </div>
                  </div>
                </div>
                <!-- end col -->
                
              </div>
              <div class="form-group row">
                <div class="col-md-12 text-right">
                      <button type="submit" class="btn btn-info span4" name="update-payslip"><i class="fa fa-calculator"></i> Re-calculate payslip</button>
                </div>
              </div>
            </form>
      </div>
      <?php endforeach ?>


    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>

<script>
    $(document).ready(function() {
        // Accept only numbers validation
        $('#pay_per_cut_off, #sss, #tin, #pagibig, #philhealth').on('input', function() {
            this.value = this.value.replace(/[^0-9.]/g, '');
            
        });
      });
  </script>
</body>
</html>
