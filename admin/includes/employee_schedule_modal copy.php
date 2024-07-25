<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Employee information sheet</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_employee_add.php">
                <div class="form-group">
                  <center><div><h1 id="head-name"></h1></div></center>
                      <input type="text" class="form-control" id="add-id" name="add-id" placeholder="add-id">
                      <input type="text" class="form-control" id="employee-id-sc" name="employee-id-sc" placeholder="employee-id-sc">
                      <div class="col-sm-4">
                        <label for="add-employee-id" class="control-label">Employee id</label>
                          <select class="form-control" name="add-employee-id" id="employee-id" required>
                            <option value="" selected>-select-</option>
                            <?php
                              $sql = "SELECT *, position.id As position_id, position.rate As rate, employees.id AS add_id FROM employees LEFT JOIN position ON employees.position_id = position.id";
                              $query = $conn->query($sql);
                              while($prow = $query->fetch_assoc()){
                                echo "
                                  <option value='".$prow['add_id']."'
                                  value_2='".$prow['firstname']." ".$prow['lastname']."'value_3='".$prow['employee_id']." "."'value_4='".$prow['position_id']."'>".$prow['employee_id']."</option>
                                ";
                              }
                            ?>
                          </select>
                      </div>
                </div>
                <div class="form-group">
                      <!-- <div class="col-sm-4">
                          <label for="add-position" class="control-label">Position</label> -->
                      <input type="text" class="form-control" id="add_position_id" name="add-position-id" placeholder="position-id" required>
                      <div class="col-sm-6">
                        <label for="add-location" class="control-label">Assign location</label>
                          <select class="form-control" name="add-location" id="location" required>
                            <option value="" selected>-select-</option>
                            <?php
                              $sql = "SELECT * FROM location";
                              $query = $conn->query($sql);
                              while($prow = $query->fetch_assoc()){
                                echo "
                                  <option value='".$prow['id']."' value_2='".$prow['incentives']."'>".$prow['assigned_location']."</option>
                                ";
                              }
                            ?>
                          </select>
                      </div>
                      <!-- <div class="col-sm-4"> -->
                          <!-- <label for="add-incentives" class="control-label">Incentives</label> -->
                        <input type="hidden" class="form-control" id="incentives" name="add-incentives" required>
                      <!-- </div> -->
                      <div class="col-sm-6">
                        <label for="add-schedule" class="control-label">Schedule</label>
                        <input type="text" class="form-control add-schedule" id="datepicker_add" name="add-schedule">
                      </div>
                      <div class="col-sm-4">
                          <label for="add-meal-allowance" class="control-label">Meal allowance</label>
                        <input type="text" class="form-control" id="meal-allowance" name="add-meal-allowance">
                      </div>
                      <div class="col-sm-4">
                          <label for="add-adjustments" class="control-label">Adjustments</label>
                        <input type="text" class="form-control" id="adjustments" name="add-adjustments">
                      </div>
                      <div class="col-sm-4">
                          <label for="add-transpo" class="control-label">Transportation</label>
                        <input type="text" class="form-control" id="transpo" name="add-transpo">
                      </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Employee information sheet</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_employee_edit.php">
                <div class="form-group">
                  <center><div><h1 id="head-name-edit"></h1></div></center>
                      <input type="hidden" class="form-control" id="name-edit" name="name-edit" placeholder="name">
                      <input type="hidden" class="form-control" id="id-edit" name="id-edit">
                      <div class="col-sm-3">
                        <label for="employee-id-edit" class="control-label">Employee id</label>
                          <input type="text" class="form-control" name="employee-id-edit" id="employee-id-edit" required>
                          <input type="hidden" class="form-control" name="employee-id-id" id="employee-id-id" required>
                      </div>
                </div>
                <div class="form-group">

                      <div class="col-sm-3">
                        <label for="location-edit" class="control-label">Assign location</label>
                          <select class="form-control" name="location-edit" id="location-edit" required>
                            <option value="" selected id="location_edit">-select-</option>
                            <?php
                              $sql = "SELECT * FROM location";
                              $query = $conn->query($sql);
                              while($prow = $query->fetch_assoc()){
                                echo "
                                  <option value='".$prow['id']."' value_incentives='".$prow['incentives']."'>".$prow['assigned_location']."</option>
                                ";
                              }
                            ?>
                          </select>
                      </div>
                        <!-- incentives -->
                        <input type="hidden" class="form-control" id="incentives-edit" name="incentives-edit" required>

                      <div class="col-sm-3">
                        <label for="schedule-edit" class="control-label">Schedule</label>
                        <!-- <select class="form-control" id="schedule-edit" name="schedule-edit"> -->
                        <input type="text" class="form-control" id="datepicker_edit" name="schedule-edit" required>
                      </div>
                      <div class="col-sm-3">
                          <label for="meal-allowance-edit" class="control-label">Meal allowance</label>
                        <input type="text" class="form-control" id="meal-allowance-edit" name="meal-allowance-edit">
                      </div>
                      <div class="col-sm-3">
                          <label for="adjustments-edit" class="control-label">Adjustments</label>
                        <input type="text" class="form-control" id="adjustments-edit" name="adjustments-edit">
                      </div>
                      <div class="col-sm-3">
                          <label for="transpo-edit" class="control-label">Transportation</label>
                        <input type="text" class="form-control" id="transpo-edit" name="transpo-edit">
                      </div>
                </div>
          	</div>
          	<div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit" id="update"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- DELETE -->
<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="schedule-delete"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_employee_delete.php">
            		<input type="text" class="employee-delete-id" name="id">
            		<div class="text-center">
	                	<p>DELETE SCHEDULE</p>
	                	<h2 class="employee-name-delete bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- ADD SCRIPT -->
<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var employeeId = document.getElementById("employee-id");
            var employeeIdSc = document.getElementById("employee-id-sc");
            var addEmployeeId = document.getElementById("add-id");
            var addName = document.getElementById("name");
            var headName = document.getElementById("head-name");
            var position = document.getElementById("add_position_id");
            var location = document.getElementById("location");
            var addIncentives = document.getElementById("incentives");

            employeeId.addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var positionVal = selectedOption.getAttribute('value_4');
                var setEmployeeId = selectedOption.getAttribute('value_3');
                var setHeadName = selectedOption.getAttribute('value_2');
                var setNameAndId = selectedOption.getAttribute('value');
                position.value = positionVal;
                headName.innerHTML = setHeadName;
                employeeIdSc.value = setEmployeeId;
                addEmployeeId.value = setNameAndId;
            });

            position.addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var selValue2 = selectedOption.getAttribute('value_2');
                addSalary.value = selValue2;
            });

            location.addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var selValue2 = selectedOption.getAttribute('value_2');
                addIncentives.value = selValue2;
            });
        });
    </script>
<!-- EDIT SCRIPT -->
<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var location = document.getElementById("location-edit");
            var editIncentives = document.getElementById("incentives-edit");
            location.addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                var setIncentives = selectedOption.getAttribute('value_incentives');
                editIncentives.value = setIncentives;
                // console.log(location);
                console.log(editIncentives);
            });
        });
    </script>

    <!-- TESTING EDIT -->

    <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      var update = document.getElementById("update");

      position.addEventListener("click", function() {

      });
    });

      </script> -->