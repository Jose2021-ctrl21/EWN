<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Employee information sheet</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-12">
                      <label for="add-photo" class="control-label">Photo</label>
                      <input type="file"  class="form-control" name="add-photo" id="add-photo" accept="image/*">
                    </div>
                </div>
                <hr/>
                <h4 for="" class="text-dark">Personal information</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                  	  <label for="add-firstname" class="control-label">Firstname</label>
                    	<input type="text" class="form-control" id="add-firstname" name="add-firstname" required>
                  	</div>
                  	<div class="col-sm-3">
                  	  <label for="add-lastname" class="control-label">Lastname</label>
                    	<input type="text" class="form-control" id="add-lastname" name="add-lastname" required>
                  	</div>
                    <div class="col-sm-3">
                  	  <label for="nickname" class="control-label">Nickname</label>
                    	<input type="text" class="form-control" id="nickname" name="nickname" required>
                  	</div>
                    <div class="col-sm-3">
                      <label for="contact" class="control-label">Contact number</label>
                      <input type="text" class="form-control" id="contact" name="contact" required>
                      <span id="numberError"></span>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="email" class="control-label">Email address</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <span id="emailError"></span>
                  	</div>
                  	<div class="col-sm-3">
                        <label for="fb" class="control-label">FB account</label>
                        <input type="text" class="form-control" id="fb" name="fb">
                  	</div>
                    <div class="col-sm-3">
                        <label for="datepicker_add" class="control-label">Birthdate</label>
                        <div class="date">
                            <input type="text" class="form-control" id="datepicker_add" name="birthdate">
                        </div>
                  	</div>
                    <div class="col-sm-3">
                        <label for="blood-type" class="control-label">Blood type</label>
                        <!-- <input type="text" class="form-control" id="blood-type" name="blood-type"> -->
                        <select class="form-control" name="blood-type" id="blood-type" required>
                          <option value="" selected>- Select -</option>
                          <option value="A">A</option>
                          <option value="A+">A+</option>
                          <option value="B">B</option>
                          <option value="B+">B+</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="gender" class="control-label">Gender</label>
                        <select class="form-control" name="gender" id="gender" required>
                          <option value="" selected>- Select -</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                  	</div>
                  	<div class="col-sm-3">
                        <label for="civil-status" class="control-label">Civil status</label>
                        <!-- <input type="text" class="form-control" id="civil-status" name="civil-status"> -->
                        <select class="form-control" name="civil-status" id="civil-status" required>
                          <option value="" selected>- Select -</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Separated/divorced">Separated/divorced</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                  	</div>
                      <div class="col-sm-3">
                    <label for="" class="control-label">Position</label>
                        <select class="form-control" name="add-employee-position" id="add-employee-position" required>
                        <option value="" selected id="">-select-</option>
                            <?php
                                $sql = "SELECT * FROM position";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                echo "<option value='".$prow['id']."'>".$prow['description']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="address" class="control-label">Address</label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                  	</div>
                </div> 
                <hr/>
                <h4 for="" class="text-dark">Employee membership IDs</h4>
                <div class="form-group">
                <?php
                    $sql = "SELECT * FROM deductions";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        $description = strtolower($row["description"]);
                        echo '
                        <div class="col-sm-3">
                            <label for="check-' . $description . '" class="control-label">' . $row["description"] . '</label>
                            <input class="form-check-input" type="checkbox" id="check-' . $description . '" name="' . $description . '">
                            <input type="text" class="form-control" id="' . $description . '_deduction" name="' . $description . '-deduction" placeholder=".50">
                            <input type="text" class="form-control" id="' . $description . '_input" name="' . $description . '" disabled>
                            <span id="' . $description . 'Error"></span>
                        </div>';
                    }
                    ?>


                  	<!-- <div class="col-sm-3">
                        <label for="check-tin" class="control-label">TIN</label>
                        <input class="form-check-input" type="checkbox" id="check-tin" value="1" name="sss">
                        <input type="text" class="form-control" id="tin_deduction" name="tin-deduction" placeholder=".60">
                        <input type="text" class="form-control" id="tin" name="tin" disabled>
                        <span id="tinError"></span>
                  	</div>
                    <div class="col-sm-3">
                        <label for="check-pagibig" class="control-label">Pagibig</label>
                        <input class="form-check-input" type="checkbox" id="check-pagibig" value="1" name="sss">
                        <input type="text" class="form-control" id="pagibig_deduction" name="pagibig-deduction" placeholder=".40">
                        <input type="text" class="form-control" id="pagibig" name="pagibig" disabled>
                        <span id="pagibigError"></span>

                  	</div>
                    <div class="col-sm-3">
                        <label for="check-philhealth" class="control-label">Philhealth</label>
                        <input class="form-check-input" type="checkbox" id="check-philhealth" value="1" name="sss">
                        <input type="text" class="form-control" id="philhealth_deduction" name="philhealth-deduction" placeholder=".70">
                        <input type="text" class="form-control" id="philhealth" name="philhealth" disabled>
                        <span id="philhealthError"></span>

                    </div> -->
                </div>
                <script>

                </script>
                <hr/>
                <h4 for="" class="text-dark">In case of emergency</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="contact-person" class="control-label">Contact person</label>
                        <input type="text" class="form-control" id="contact-person" name="contact-person">
                  	</div>
                  	<div class="col-sm-3">
                        <label for="contact-person-address" class="control-label">Address</label>
                        <input type="text" class="form-control" id="contact-person-address" name="contact-person-address">
                  	</div>
                    <div class="col-sm-3">
                        <label for="contact-person-number" class="control-label">Contact no.</label>
                        <input type="text" class="form-control" id="contact-person-number" name="contact-person-number">
                      <span id="contactNumberError"></span>
                  	</div>
                </div> 
                <hr/>
                <h4 for="" class="text-dark">Accounts</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="bank-account" class="control-label">Bank account</label>
                        <input type="text" class="form-control" id="bank-account" name="bank-account">
                        <span id="bank-accountError"></span>

                  	</div>
                  	<div class="col-sm-3">
                        <label for="gcash" class="control-label">Gcash account</label>
                        <input type="text" class="form-control" id="gcash" name="gcash">
                        <span id="gcashError"></span>

                  	</div>
                </div> 
                <!-- <h4 for="" class="text-dark">Employee position</h4> -->

                <hr/>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add" id="validateButtonAdd"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_edit.php">
            		<input type="hidden" class="empid" name="id">
                <h4 for="" class="text-dark">Personal information</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="firstname" class="control-label">Firstname</label>
                        <input type="text" class="form-control" id="edit-firstname" name="firstname" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="lastname" class="control-label">Lastname</label>
                        <input type="text" class="form-control" id="edit-lastname" name="lastname" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="nickname" class="control-label">Nickname</label>
                        <input type="text" class="form-control" id="edit-nickname" name="nickname" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="contact" class="control-label">Contact number</label>
                        <input type="text" class="form-control" id="edit-contact" name="contact">
                        <span id="numberError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="email" class="control-label">Email address</label>
                        <input type="email" class="form-control" id="edit-email" name="email">
                        <span id="emailError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="fb" class="control-label">FB account</label>
                        <input type="text" class="form-control" id="edit-fb" name="fb">
                    </div>
                    <div class="col-sm-3">
                        <label for="edit-datepicker_edit" class="control-label">Birthdate</label>
                        <input type="date" class="form-control" id="edit-datepicker_edit" name="birthdate">
                    </div>
                    <div class="col-sm-3">
                        <label for="blood-type" class="control-label">Blood type</label>
                        <div class="date">
                            <input type="text" class="form-control" id="edit-blood-type" name="blood-type">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="gender" class="control-label">Gender</label>
                        <select class="form-control" name="gender" id="edit-gender" required>
                            <option value="" selected>- Select -</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="civil-status" class="control-label">Civil status</label>
                        <input type="text" class="form-control" id="edit-civil-status" name="civil-status">
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="control-label">Position</label>
                        <select class="form-control" name="edit-employee-position" id="edit-employee-position" required>
                            <option value="" selected id="edit_employee_position">-select-</option>
                            <?php
                                $sql = "SELECT * FROM position";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                echo "<option value='".$prow['id']."'>".$prow['description']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="address" class="control-label">Address</label>
                        <textarea class="form-control" name="address" id="edit-address"></textarea>
                    </div>
                </div>

                <h4 for="" class="text-dark">Employee membership IDs</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="sss" class="control-label">SSS</label>
                        <input type="text" class="form-control" id="edit-sss" name="sss">
                        <span id="sssError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="tin" class="control-label">TIN</label>
                        <input type="text" class="form-control" id="edit-tin" name="tin">
                        <span id="tinError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="pagibig" class="control-label">Pagibig</label>
                        <input type="text" class="form-control" id="edit-pagibig" name="pagibig">
                        <span id="pagibigError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="philhealth" class="control-label">Philhealth</label>
                        <input type="text" class="form-control" id="edit-philhealth" name="philhealth">
                        <span id="philhealthError"></span>
                    </div>
                </div>

                <h4 for="" class="text-dark">In case of emergency</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="contact-person" class="control-label">Contact person</label>
                        <input type="text" class="form-control" id="edit-contact-person" name="contact-person">
                    </div>
                    <div class="col-sm-3">
                        <label for="edit-contact-person-address" class="control-label">Address</label>
                        <input type="text" class="form-control" id="edit-contact-person-address" name="contact-person-address">
                    </div>
                    <div class="col-sm-3">
                        <label for="contact-person-number" class="control-label">Contact no.</label>
                        <input type="text" class="form-control" id="edit-contact-person-number" name="contact-person-number">
                        <span id="contactNumberError"></span>
                    </div>
                </div>
                <h4 for="" class="text-dark">Accounts</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="bank-account" class="control-label">Bank account</label>
                        <input type="text" class="form-control" id="edit-bank-account" name="bank-account">
                        <span id="bank-accountError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="gcash" class="control-label">Gcash account</label>
                        <input type="text" class="form-control" id="edit-gcash" name="gcash">
                        <span id="gcashError"></span>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit" id="validateButtonEdit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="employee_delete.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>DELETE EMPLOYEE</p>
	                	<h2 class="bold del_employee_name"></h2>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <label for="edit-photo" class="control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="edit-photo" name="edit-photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    
