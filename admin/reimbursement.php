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
        Employee reimbursement List
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Reimbursement</li>
        <li class="active">Reimbursement list</li>
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
              <table id="example1" class="table table-bordered table-striped display-nowrap" style="width: 100%">
                <thead>
                  <th style="display:none">ID</th>
                  <th>Receipt</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Meal allowance</th>
                  <th>Meal allowance +</th>
                  <th>Transportation</th>
                  <th>Transportation +</th>
                  <th>Adjustments</th>
                  <th>Date</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT *, employees.id AS empid, employees.employee_id AS employee_id,
                  efl.transportation AS transportation,
                  efl.adjustments AS adjustments,
                  efl.meal_allowance AS meal_allowance,
                  efl.date AS date,
                  efl.sss_emp AS sss,
                  efl.pagibig_emp AS pagibig,
                  efl.philhealth_emp AS philhealth,
                  efl.tin_emp AS tin,
                  efl.id AS id,
                  efl.reimbursement_proof
                  FROM employees 
                          LEFT JOIN position ON position.id=employees.position_id
                          LEFT JOIN employee_financial_list AS efl ON efl.employee_id = employees.employee_id
                          WHERE archive = 'no' AND efl.id IS NOT NULL
                          ORDER BY efl.id DESC";
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){
                  ?>
                  <tr>
                      <td style="display:none"><?php echo $row['id']; ?></td>
                      <td><a href="<?php echo (!empty($row['reimbursement_proof'])) ? 'reimbursement/'.$row['reimbursement_proof']:'reimbursement/no-img.jpg'; ?>" target="_blank"><img src="<?php echo (!empty($row['reimbursement_proof'])) ? 'reimbursement/'.$row['reimbursement_proof']:'reimbursement/no-img.jpg'; ?>" width="30px" height="30px"></a> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['id']; ?>"><span class="fa fa-edit"></span></a></td>
                      <td><?php echo $row['employee_id']; ?></td>
                      <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                      <td class="text-right">&#8369;<?php echo number_format((float)$row['meal_allowance'],2)?></td>
                      <td class="text-right">&#8369;<?php echo number_format((float)$row['meal_allowance_additional'],2)?></td>
                      <td class="text-right">&#8369;<?php echo number_format((float)$row['transportation'],2)?></td>
                      <td class="text-right">&#8369;<?php echo number_format((float)$row['transportation_additional'],2)?></td>
                      <td class="text-right">&#8369;<?php echo number_format((float)$row['adjustments'],2)?></td>
                      <td><?php echo $row['date']?></td>
                      <td>
                        <button class='btn btn-success btn-sm editReimbursement btn-flat' data-id='<?php echo $row['id']?>'><i class='fa fa-edit'></i> Edit</button>
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
      </div>
    </section>   
  </div>

</div>
<?php include 'includes/reimbursement_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>
<?php include 'includes/security_modal.php'; ?>
  <style>

  .error{
    color:red !important;
  }
  .warning{
    color:darkgoldenrod !important;
  }
</style>


<script>
 $(document).ready(function(){
      $('#example1 tbody').on('click', '.editReimbursement', function(e){
          e.preventDefault();
          $('#security_edit').modal('show');
          var id = $(this).data('id');
          console.log("MY ID: " + id);
          getRow(id);
      });
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


  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'reimbursement_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('#head-name-edit').html(response.firstname+' '+response.lastname);
        $('#reimbursement_id').val(response.id);
        $('.reimbursementID').val(response.id);
        $('#employee_id').val(response.employee_id);
        $('#meal-allowance-edit').val(response.meal_allowance);
        $('#adjustments-edit').val(response.adjustments);
        $('#transpo-edit').val(response.transportation);
        // $('#meal-allowance-edit-additional').val(response.meal_allowance_additional);
        // $('#adjustments-edit-additional').val(response.adjustments_additional);
        // $('#transpo-edit-additional').val(response.transportation_additional);
      }
    });
  }
  
</script>
</body>
</html>