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
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add new employee record</a>
            </div>
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered table-striped display-nowrap" style="width: 100%">
                <thead>
                  <th>Employee ID</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Nickname</th>
                  <th>Status</th>
                  <th>Contact number</th>
                  <th>Email</th>
                  <th>Sex</th>
                  <th>Address</th>
                  <th>Member Since</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT *, employees.id AS empid FROM employees 
                          LEFT JOIN position ON position.id=employees.position_id
                          LEFT JOIN reg_rel ON reg_rel.id = employees.reg_rel_id
                          WHERE archive = 'no'
                          ORDER BY employees.id DESC";
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){
                  ?>
                  <tr>
                      <td><?php echo $row['employee_id']; ?></td>
                      <td><img src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="30px" height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['empid']; ?>"><span class="fa fa-edit"></span></a></td>
                      <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                      <td><?php echo $row['nickname']?></td>
                      <td><?php echo $row['title']?></td>
                      <td><?php echo $row['contact_info']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['gender']?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo date('M d, Y', strtotime($row['created_on'])) ?></td>
                      <td>
                          <button class="btn btn-info btn-sm edit btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-eye"></i> View</button>
                          <button class="btn btn-warning btn-sm delete btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-archive"></i> Archive</button>
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
  <?php include 'includes/security_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>
<style>

  .error{
    color:red !important;
  }
  .warning{
    color:darkgoldenrod !important;
  }
</style>

<!-- FOR ADDING -->
<script>
    $(document).ready(function() {
      // PASS VALUE ON INPUT for SSS
      $('#sss_deduction').val($('#check-sss').val());
      $('#pagibig_deduction').val($('#check-pagibig').val());
      $('#philhealth_deduction').val($('#check-philhealth').val());
  });
</script>


<!-- FOR EDIT -->
<script>
    $(document).ready(function() {
      // PASS VALUE ON INPUT for SSS
      $('#sss_deduction').val($('#edit-check-sss').val());
      $('#pagibig_deduction').val($('#edit-check-pagibig').val());
      $('#philhealth_deduction').val($('#edit-check-philhealth').val());
  });
</script>

<script>
$(document).ready(function() {
    // Accept only numbers validation
    $('#philhealth_input, #contact, #sss_input, #tin_input, #pagibig_input, #gcash, #bank-account, #contact-person-number, #meal-allowance, #adjustments, #transpo').on('input', function() {
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
    
    validateInput('#contact', '#numberError', 11, 'Number must not exceed 11 digits', 'Number must not be less than 11 digits');
    validateInput('#contact-person-number', '#contactNumberError', 11, 'Number must not exceed 11 digits', 'Number must not be less than 11 digits');
    validateInput('#pagibig_input', '#pagibigError', 12, 'Number must not exceed 12 digits','Number must not exceed 12 digits');
    validateInput('#philhealth_input', '#philhealthError', 12, 'Number must not exceed 12 digits', 'Number must not be less than 12 digits');
    validateInput('#sss_input', '#sssError', 10, 'Number must not exceed 10 digits', 'Number must not be less 10 digits');
    validateInput('#tin_input', '#tinError', 12, 'Number must not exceed 12 digits', 'Number must not be less 12 digits');
    validateInput('#gcash', '#gcashError', 11, 'Number must not exceed 11 digits', 'Number must not be less 11 digits');
    validateInput('#bank-account', '#bank-accountError', 12, 'Number must not exceed 12 digits', 'Number must not be less 12 digits');

    //BIRTHDAY VALIDATION
    function validateBday(datepicker_add, bdayError, bdayMessage) {
        $(datepicker_add).on('change', function() {
            var bday = $(this).val();
            var errorElement = $(bdayError);
            var currentDate = new Date().toISOString().split('T')[0];  // Get current date in 'YYYY-MM-DD' format
            console.log(currentDate);
            if (bday > currentDate) {
                errorElement.text(bdayMessage);
                errorElement.addClass('error');
                errorElement.css({
                    'position': 'absolute',
                    'top': $(this).position().top + $(this).outerHeight(),
                    'left': $(this).position().left
                });
            } else {
                errorElement.text('');
                errorElement.css('position', '');
                errorElement.removeClass('error');
                errorElement.css({
                    'top': '',
                    'left': ''
                });
            }
        });
    }
    validateBday('#datepicker_add', '#bDateError', 'Future birthday is not allowed');

    
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




//EDIT
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    // $('#security_edit').modal('show');
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
    // console.log(id);
  });
  // $('#security-form-edit').submit(function(e) {
  //       e.preventDefault();
  //       const password = $('#security-pass-edit').val();
  //       $.ajax({
  //         url: 'vax_location_security.php',
  //         method: 'POST',
  //         data: { password: password },
  //         success: function(response) {
  //           response = JSON.parse(response);
  //           if(response.result === true) {
  //             $('#security_edit').modal('hide');
  //             $('#edit').modal('show');
  //             getRow(id);
  //           } else {
  //             alert('Incorrect password. Please try again.');
  //             console.log(response.result);
  //           }
  //         },
  //         error: function() {
  //           alert('An error occurred while validating the password. Please try again.');
  //         }
  //       });
  //   });




  $('.delete').click(function(e){
    e.preventDefault();
    $('#security_archive').modal('show');
    var id = $(this).data('id');
    getRow(id);
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
              $('#delete').modal('show');
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
      $('#rate').val(response.rate);
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
      $('#sss-deduction').val(response.sss_deduction);
      $('#tin-deduction').val(response.tin_deduction);
      $('#pagibig-deduction').val(response.pagibig_deduction);
      $('#philhealth-deduction').val(response.philhealth_deduction);
      $('#edit-contact-person').val(response.contact_person);
      $('#edit-contact-person-address').val(response.contact_person_address);
      $('#edit-contact-person-number').val(response.contact_person_number);
      $('#edit_bank_name').html(response.bank_name);
      $('#edit_bank_name').val(response.bank_name);
      $('#edit_bank_services').html(response.bank_services);
      $('#edit_bank_services').val(response.bank_services);
      $('#edit-bank-account').val(response.bank_account);
      $('#edit-gcash').val(response.gcash);
      $('#edit_reg_rel').html(response.title);
      // $('#edit-position').val(response.position_id);
      // $('#edit-schedule').val(response.schedule_id);
      // console.log(response);
    }
  });
}
</script>

</body>
</html>
