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
        Employee List
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Employee List</li>
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
                  <th>Employee ID</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Nickname</th>
                  <th>Contact number</th>
                  <th>Email address</th>
                  <th>FB account</th>
                  <th>Sex</th>
                  <th>Address</th>
                  <th>Member Since</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT *, employees.id AS empid FROM employees 
                          LEFT JOIN position ON position.id=employees.position_id
                          WHERE archive = 'yes'
                          ORDER BY employees.id DESC";
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){
                  ?>
                  <tr>
                      <td><?php echo $row['employee_id']; ?></td>
                      <td><img src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="30px" height="30px"></td>
                      <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                      <td><?php echo $row['nickname']?></td>
                      <td><?php echo $row['contact_info']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['fb']?></td>
                      <td><?php echo $row['gender']?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo date('M d, Y', strtotime($row['created_on'])) ?></td>
                      <td>
                          <button class="btn btn-info edit btn-sm btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-eye"></i>&nbsp;View</button>
                          <button class="btn btn-success restore btn-sm btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-undo"></i>&nbsp;Restore</button>
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
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
</div>
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

$(document).ready(function() {
    // Accept only numbers validation
    $('#philhealth, #contact, #sss, #tin, #pagibig, #gcash, #bank-account, #contact-person-number, #meal-allowance, #adjustments, #transpo').on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    // Must not be less or greater number validation
    function validateInput(inputId, errorId, maxLength, errorMessage, errorMessageForMinLength) {
        $(inputId).on('input', function() {
            var inputValue = $(this).val();
            var errorElement = $(errorId);
            var numericValue = inputValue.replace(/\D/g, '');
            if (numericValue.length > maxLength) {
                errorElement.text(errorMessage);
                errorElement.addClass('error');
                errorElement.removeClass('warning');
                errorElement.css({
                    'position': 'absolute',
                    'top': $(this).position().top + $(this).outerHeight(),
                    'left': $(this).position().left
                });
            } else if (numericValue.length < maxLength && numericValue.length > 0) {
                errorElement.text(errorMessageForMinLength);
                errorElement.addClass('warning');
                errorElement.removeClass('error');
                errorElement.css({
                    'position': 'absolute',
                    'top': $(this).position().top + $(this).outerHeight(),
                    'left': $(this).position().left
                });
            } else {
                errorElement.text('');
                errorElement.css('position', '');
                errorElement.removeClass('error');
                errorElement.removeClass('warning');
                errorElement.css({
                    'position': '',
                    'top': '',
                    'left': ''
                });
            }
        });
    }
    
    validateInput('#contact', '#numberError', 11, 'Number must not exceed 11 digits', 'Number must not less than 11 digits');
    validateInput('#contact-person-number', '#contactNumberError', 11, 'Number must not exceed 11 digits', 'Number must not less than 11 digits');
    validateInput('#pagibig', '#pagibigError', 12, 'Number must not exceed 12 digits');
    validateInput('#philhealth', '#philhealthError', 12, 'Number must not exceed 12 digits', 'Number must not less than 12 digits');
    validateInput('#sss', '#sssError', 10, 'Number must not exceed 10 digits', 'Number must not less 10 digits');
    validateInput('#tin', '#tinError', 12, 'Number must not exceed 12 digits', 'Number must not less 12 digits');
    validateInput('#gcash', '#gcashError', 11, 'Number must not exceed 11 digits', 'Number must not less 11 digits');
    validateInput('#bank-account', '#bank-accountError', 12, 'Number must not exceed 12 digits', 'Number must not less 12 digits');

    // Delegate event handler to a parent element
    $(document).on('click', "#validateButtonAdd", function(event) {
        // Filter elements within the parent element
        var errors = $('.error, .warning');
        if (errors.length > 0) {
            alert("Please correct the errors before proceeding.");
            event.preventDefault(); // Prevent form submission
        }
        // else {
        //     alert("Validation successful!");
        // }
    });
});

//VIEW
$('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
    // console.log(id);
  });


//RESTORE
$(function(){
  $('.restore').click(function(e){
    e.preventDefault();
    $('#security_archive').modal('show');
    var id = $(this).data('id');
    getRow(id);
    // console.log(id);
  });

  $('#security-form-archive').submit(function(e) {
        e.preventDefault();
        const password = $('#security-pass-archive').val();

        $.ajax({
          url: 'vax_location_security.php', // Your server-side validation endpoint
          method: 'POST',
          data: { password: password },
          success: function(response) {
            response = JSON.parse(response);
            if(response.result === true) {
              $('#security_archive').modal('hide');
              $('#restore').modal('show');
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
});

//edit part
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit-firstname').val(response.firstname);
      $('#edit-lastname').val(response.lastname);
      $('#edit-nickname').val(response.nickname);
      $('#edit-contact').val(response.contact_info);
      $('#edit-address').val(response.address);
      $('#edit_employee_position').html(response.description);
      $('#edit_employee_position').val(response.posID);
      $('#edit-email').val(response.email);
      $('#edit-fb').val(response.fb);
      $('#edit-datepicker_edit').val(response.birthdate);
      $('#edit-blood-type').val(response.bloodtype);
      $('#edit-gender').val(response.gender);
      $('#edit-civil-status').val(response.civil_status);
      $('#edit-sss').val(response.sss);
      $('#edit-tin').val(response.tin);
      $('#edit-pagibig').val(response.pagibig);
      $('#edit-philhealth').val(response.philhealth);
      $('#edit-contact-person').val(response.contact_person);
      $('#edit-contact-person-address').val(response.contact_person_address);
      $('#edit-contact-person-number').val(response.contact_person_number);
      $('#edit-bank-account').val(response.bank_account);
      $('#edit-gcash').val(response.gcash);
      // $('#edit-position').val(response.position_id);
      // $('#edit-schedule').val(response.schedule_id);
      // console.log(response);
    }
  });
}
</script>

</body>
</html>
