<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      Schedule, Assignment and Budget
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Schedules</li>
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
      <div class="col-xs-5">
          <div class="box">
          <!-- Details -->
          <div class="box-body shadow" style="box-shadow: 0 1px 1px gray;">
              <form class="form-horizontal" method="POST" action="">
                    <div class="form-group">
                          <div class="col-sm-6">
                            <label for="add-location" class="control-label">Assign to location</label>
                              <select class="form-control" name="add-location" id="check-location" required>
                                <option value="" selected>-select-</option>
                                <?php
                                  $sql = "SELECT * FROM location";
                                  $query = $conn->query($sql);
                                  while($prow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$prow['id']."' value_2='".$prow['incentives']."'>".$prow['municipality'].', '.$prow['province']."</option>
                                    ";
                                  }
                                ?>
                              </select>
                          </div>
                          <div class="col-sm-6">
                            <label for="add-schedule" class="control-label">Schedule</label>
                            <input type="text" class="form-control check-add-schedule" id="datepicker_add2" name="add-schedule">
                          </div>
                          <!-- <div class="col-sm-4">
                              <label for="add-meal-allowance" class="control-label">Meal allowance</label>
                            <input type="text" class="form-control" id="check-meal-allowance" name="add-meal-allowance">
                          </div>
                          <div class="col-sm-4">
                              <label for="add-adjustments" class="control-label">Adjustments</label>
                            <input type="text" class="form-control" id="check-adjustments" name="add-adjustments">
                          </div>
                          <div class="col-sm-4">
                              <label for="add-transpo" class="control-label">Transportation</label>
                            <input type="text" class="form-control" id="check-transpo" name="add-transpo">
                          </div> -->
                    </div>
              </form>
          </div>
          <!-- Details -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="example3" class="table table-bordered">
                <thead>
                <th><input type='checkbox' onchange="selectAll(this)" id="toAssign">&nbsp;All</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                </thead>
                <tbody>
                  <?php
                    $sql_s = "SELECT *, employees.id As empid, employees.position_id AS position_id, employees.employee_id AS employee_id FROM employees
                    LEFT JOIN position ON employees.position_id = position.id WHERE assigned_status='0' AND archive = 'no'";
                    $query_s = $conn->query($sql_s);
                    while($row_s = $query_s->fetch_assoc()){
                      echo "
                        <tr>
                          <td><input type='checkbox' class='employeeCheckbox' id='toAssign' value='".$row_s['empid']."' value2='".$row_s['position_id']."' value3='".$row_s['employee_id']."'>
                          </td>
                          <td>".$row_s['employee_id']."</td>
                          <td>".$row_s['firstname']." ".$row_s['lastname']."</td>
                        </tr>
                      ";
                    }
                  ?>
                   <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                      <button class="btn btn-primary assign">Assign</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- end col-xs-6 -->
        <div class="col-xs-7">
          <div class="box">
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th><input type='checkbox' onchange="selectAllToUnassign(this)" id='toUnAssign'>&nbsp;All</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Location Assigned</th>
                  <th>Date</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, ass_sched_fin.id AS ass_id FROM ass_sched_fin
                    LEFT JOIN position ON ass_sched_fin.ass_position = position.id
                    LEFT JOIN location ON ass_sched_fin.ass_location = location.id
                    LEFT JOIN schedules ON ass_sched_fin.ass_schedule = schedules.id
                    LEFT JOIN employees ON ass_sched_fin.ass_employee_id = employees.id
                    WHERE employees.archive = 'no'
                    ORDER BY ass_id DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td><input type='checkbox' class='employeeCheckboxUnassign' id='toUnassign' value='".$row['ass_id']."'></td>
                          <td>".$row['employee_id']."</td>
                          <td>".$row['firstname']." ".$row['lastname']."</td>
                          <td>".$row['description']."</td>
                          <td>".$row['province'].", ".$row['municipality']."</td>
                          <td>".$row['ass_schedule']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['ass_id']."'><i class='fa fa-edit'></i> Edit</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                  <!-- <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                      <button class='btn btn-warning delete btn-flat' onclick="unassignSelectedEmployees()"> Unassign</button>
                    </td>
                  </tr> -->
                </tbody>
              </table>
              <button class='btn btn-warning delete unassign btn-flat' onclick="unassignSelectedEmployees()"> Unassign</button>
            </div>
          </div>
        </div>
       <!-- end col-xs-6 -->
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_schedule_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>
<?php include "includes/security_modal.php";?>


<!-- CHECK DATE FOR DOCS IF NEED TO UPDATE -->
<?php
    include '../timezone.php';
    // $curDate = date('Y-m-d');
    $sql = "SELECT * FROM location WHERE date < CURDATE()";
    $query = $conn->query($sql);
   if($query->num_rows > 0){
            echo '
            <div class="modal fade" id="updateDocs" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title"><b>UPDATE DOCS FOR TODAY</b></h4>
                        </div>
                        <div class="modal-body">
                            <center><a href="vax_location.php" style="text-decoration:underline"> <h3>Go to vax location page</h3></a></center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Ignore</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    // Show the modal when the document is ready
                    $("#updateDocs").modal("show");
                });
            </script>';
      }
?>


<script>
  $(document).ready(function() {
      // Accept only numbers validation
      $('#philhealth, #contact, #sss, #tin, #pagibig, #gcash, #bank-account, #contact-person-number, #meal-allowance, #adjustments, #transpo,  #meal-allowance-edit, #adjustments-edit, #transpo-edit').on('input', function() {
          this.value = this.value.replace(/[^0-9]/g, '');
      });
    });
  </script>



<!-- SELECT ALL CHEKCBOX ASSIGNED EMPLOYEE TO UNASSIGN-->
<script>
   function selectAllToUnassign(source) {
      var checkboxes = document.querySelectorAll('#toUnassign');
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = source.checked;
      });
    }

    function unassignSelectedEmployees() {
    // securitymodal
    $('#security_unassign').modal('show');
    securityUnassignModal()
    // securitymodal
    }

    function securityUnassignModal(){
      $('#security-form-edit-unassign').submit(function(e) {
        e.preventDefault();
        const password = $('#security-pass-edit-unassign').val();
        $.ajax({
          url: 'vax_location_security.php',
          method: 'POST',
          data: { password: password },
          success: function(response) {
            response = JSON.parse(response);
            if(response.result === true) {
              $('#security_unassign').modal('hide');
                 unassignSelectedEmployees_process();
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
    }

    function unassignSelectedEmployees_process(){
      var selectedEmployees = [];
        $('.employeeCheckboxUnassign:checked').each(function() {
            selectedEmployees.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: 'schedule_employee_delete.php',
            data: { employees: selectedEmployees },
            success: function(response) {
              alert(response);
              location.reload();
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }
</script>



  <script>
 $(document).ready(function(){
      $('#example1 tbody').on('click', '.edit', function(e){
          console.log("working");
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


  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'schedule_employee_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('#head-name-edit').html(response.firstname+' '+response.lastname);
        $('#position_edit').html(response.description);
        $('#location_edit').html(response.province+', '+response.municipality);
        $('#location_edit').val(response.ass_location);
        $('#datepicker_edit').val(response.ass_schedule);
        $('#employee-id-edit').val(response.employee_id);
        $('#employee-id-id').val(response.ass_employee_id);
        $('#location-id-edit').val(response.empid);
        $('#incentives-edit').val(response.incentives);
        $('#meal-allowance-edit').val(response.ass_meal_allowance);
        $('#adjustments-edit').val(response.ass_adjustments);
        $('#transpo-edit').val(response.ass_transpo);
        $('#schedule-delete').html(response.employee_id);
        $('.employee-delete-id').val(response.ass_employee_id);
        $('.employee-name-delete').html(response.firstname+' '+response.lastname);

      }
    });
  }
</script>
<!-- SELECT ALL CHEKCBOX FORM EMPLOYEE TO BE ASSIGNED-->
<script>
    function selectAll(source) {
      var checkboxes = document.querySelectorAll('#toAssign');
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = source.checked;
      });
    }
  </script>
  <!-- PASS DATA -->
  <script>
$(document).ready(function() {
    $('.assign').click(function() {
        var checkedEmployees = [];
        var checkedEmpIds = [];
        var checkedPositions = []; // Array to store position_id values
        var checkboxes = $('.employeeCheckbox:checked');
        checkboxes.each(function() {
            checkedEmployees.push($(this).attr('value3'));
            checkedEmpIds.push($(this).val());
            checkedPositions.push($(this).attr('value2')); // Collect position_id values
        });

        var location = $('#check-location').val();
        var schedule = $('#datepicker_add2').val();
        var mealAllowance = $('#check-meal-allowance').val();
        var adjustments = $('#check-adjustments').val();
        var transpo = $('#check-transpo').val();
        // console.log(location);
        // console.log(schedule);
        // console.log(mealAllowance);
        // console.log(adjustments);
        // console.log(transpo);
        // console.log(checkedEmployees);
        // console.log(checkedEmpIds);
        // console.log(checkedPositions);
        
        // Construct data object
        var data = {
            checkedEmployees: checkedEmployees,
            checkedEmpIds: checkedEmpIds,
            checkedPositions: checkedPositions, // Pass checked position_id values
            location: location,
            schedule: schedule,
            mealAllowance: mealAllowance,
            adjustments: adjustments,
            transpo: transpo
        };

        console.log(data);

        // Convert data object to JSON string
        var jsonData = JSON.stringify(data);

        $.ajax({
            type: 'POST',
            url: 'schedule_employee_add_multiple.php',
            data: jsonData, // Send JSON string
            contentType: 'application/json', // Set content type to JSON
            success: function(response) {
                // alert("Employees assigned successfully!"+response);
                window.location.href = window.location.href;
            },
            error: function(xhr, status, error) {
                alert("Error assigning employees: " + error);
            }
        });
    });
});
</script>

</body>
</html>