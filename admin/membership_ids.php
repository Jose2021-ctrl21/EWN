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
        Membership
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">membership</li>
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
            <!-- <div class="box-header with-border">
              <a href="schedule_print.php" class="btn btn-success btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a>
            </div> -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>SSS</th>
                  <th>TIN</th>
                  <th>PAGIBIG</th>
                  <th>PHILHEALTH</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                   $sql = "SELECT *, employees.id AS empid
                    FROM employees
                    LEFT JOIN deductions ON employees.sss_deduction = deductions.id
                  ";  // Replace with actual employee ID
    
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){?>
                        <tr>
                          <td><?php echo $row['employee_id']?></td>
                          <td><?php echo $row['firstname'].' '.$row['lastname'] ?></td>
                          <td><?php echo $row['sss']?></td>
                          <td><?php echo $row['tin']?></td>
                          <td><?php echo $row['pagibig']?></td>
                          <td><?php echo $row['philhealth']?></td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id=<?php echo $row['empid'] ?>><i class='fa fa-edit'></i> Edit</button>
                          </td>
                        </tr>
                    <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/membership_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
  $(document).ready(function() {
    // Accept only numbers validation
    $('#sss_deduction, #tin_deduction, #pagibig_deduction, #philhealth_deduction,#sss_input, #tin_input, #pagibig_input, #philhealth_input').on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });
  });
</script>
</script>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    // console.log(id);
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'membership_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
        // CHECK FOR MEMBERSHIP
        $('.form-check-input').on('click', function(e){
          // Get the ID of the clicked checkbox
          var checkboxId = $(this).attr('id');
          // Extract the field name from the checkbox ID
          var fieldName = checkboxId.replace('check-', '');
          // Determine if the checkbox is checked
          var isChecked = $(this).is(':checked');
          // Enable/disable the corresponding input fields based on the checkbox state
          $('#' + fieldName + '_input').prop('disabled', !isChecked);
          
          // If the checkbox is checked, set the value of the deduction input field
          if (isChecked) {
              // Get the value attribute of the checkbox
              var value = $(this).val();
              // Set the value to the deduction input field
              $('#' + fieldName + '_deduction').val(value);
          } else {
              // If the checkbox is unchecked, clear the value of the deduction input field
              $('#' + fieldName + '_deduction').val('');
              $('#' + fieldName + '_input').val('');
          }
      });

      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('#sss').val(response.sss);
      $('#tin').val(response.tin);
      $('#philhealth').val(response.philhealth);
      $('#pagibig').val(response.pagibig);
      
      $('#sss_input').val(response.sss);
      $('#tin_input').val(response.tin);
      $('#philhealth_input').val(response.philhealth);
      $('#pagibig_input').val(response.pagibig);

      $('#sss_deduction').val(response.sss_deduction);
      $('#tin_deduction').val(response.tin_deduction);
      $('#philhealth_deduction').val(response.philhealth_deduction);
      $('#pagibig_deduction').val(response.pagibig_deduction);

      // Assuming these are your checkboxes
      var sssCheckbox = $('#check-sss');
      var tinCheckbox = $('#check-tin');
      var philhealthCheckbox = $('#check-philhealth');
      var pagibigCheckbox = $('#check-pagibig');

      // Check the checkboxes based on response data
      sssCheckbox.prop('checked', response.sss !== '');
      tinCheckbox.prop('checked', response.tin !== '');
      philhealthCheckbox.prop('checked', response.philhealth !== '');
      pagibigCheckbox.prop('checked', response.pagibig !== '');


      $('#id').val(response.id);
    }
  });
}
</script>
</body>
</html>
