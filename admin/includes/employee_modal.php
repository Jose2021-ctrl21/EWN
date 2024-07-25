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
                <label class="control-label">Instruction:&nbsp;<i>Fields with asterisk (<span class="asterisk-red">&ast;</span>)  are required to be filled out</i></label>
                <h4 for="" class="text-dark">Personal information</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                  	  <label for="add-firstname" class="control-label"><span class="asterisk-red">&ast;</span>Firstname</label>
                    	<input type="text" class="form-control" id="add-firstname" name="add-firstname" required>
                  	</div>
                  	<div class="col-sm-3">
                  	  <label for="add-lastname" class="control-label"><span class="asterisk-red">&ast;</span>Lastname</label>
                    	<input type="text" class="form-control" id="add-lastname" name="add-lastname" required>
                  	</div>
                    <div class="col-sm-3">
                  	  <label for="nickname" class="control-label"><span class="asterisk-red">&ast;</span>Nickname</label>
                    	<input type="text" class="form-control" id="nickname" name="nickname" required>
                  	</div>
                    <div class="col-sm-3">
                      <label for="contact" class="control-label"><span class="asterisk-red"><span class="asterisk-red">&ast;</span></span>Contact number</label>
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
                        <label for="datepicker_add" class="control-label"><span class="asterisk-red">&ast;</span>Birthdate</label>
                        <div class="date">
                            <input type="text" class="form-control" id="datepicker_add" name="birthdate">
                            <span id="bDateError"></span>
                        </div>
                  	</div>
                    <div class="col-sm-3">
                        <label for="blood-type" class="control-label"><span class="asterisk-red">&ast;</span>Blood type</label>
                        <!-- <input type="text" class="form-control" id="blood-type" name="blood-type"> -->
                        <select class="form-control" name="blood-type" id="blood-type" required>
                          <option value="" selected>- Select -</option>
                          <option value="A">A</option>
                          <option value="A+">A+</option>
                          <option value="B">B</option>
                          <option value="B+">B+</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                          <option value="O">O</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="gender" class="control-label"><span class="asterisk-red">&ast;</span>Sex</label>
                        <select class="form-control" name="gender" id="gender" required>
                          <option value="" selected>- Select -</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                  	</div>
                  	<div class="col-sm-3">
                        <label for="civil-status" class="control-label"><span class="asterisk-red">&ast;</span>Civil status</label>
                        <!-- <input type="text" class="form-control" id="civil-status" name="civil-status"> -->
                        <select class="form-control" name="civil-status" id="civil-status" required>
                          <option value="" selected>- Select -</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Separated/divorced">Separated/divorced</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                  	</div>
                    <div class="col-sm-6">
                        <label for="address" class="control-label"><span class="asterisk-red">&ast;</span>Address</label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                  	</div>
                </div> 
                <hr/>
                <h4 for="" class="text-dark">Employee IDs</h4>
                <div class="form-group">
                <?php
                    $sql = "SELECT * FROM deductions LIMIT 4";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        $description = strtolower($row["description"]);
                        echo '
                        <div class="col-sm-4">
                            <input type="hidden" id="check-' . $description . '" name="' . $description . '" value="' . $row["id"] . '">
                        </div>';
                    }
                    ?>
                 
                    <div class="col-sm-3">
                        <label for="sss" class="control-label"><span class="asterisk-red">&ast;</span>SSS</label>
                        <input type="hidden" class="form-control" id="sss_deduction" name="sss-deduction">
                        <input type="text" class="form-control" id="sss_input" name="sss" required>
                        <span id="sssError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="tin" class="control-label"><span class="asterisk-red">&ast;</span>TIN</label>
                        <input type="hidden" class="form-control" id="tin_deduction" name="tin-deduction">
                        <input type="text" class="form-control" id="tin_input" name="tin" required>
                        <span id="tinError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="philhealth" class="control-label"><span class="asterisk-red">&ast;</span>Philhealth</label>
                        <input type="hidden" class="form-control" id="philhealth_deduction" name="philhealth-deduction">
                        <input type="text" class="form-control" id="philhealth_input" name="philhealth" required>
                        <span id="philhealthError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="pagibig" class="control-label"><span class="asterisk-red">&ast;</span>Pagibig</label>
                        <input type="hidden" class="form-control" id="pagibig_deduction" name="pagibig-deduction">
                        <input type="text" class="form-control" id="pagibig_input" name="pagibig" required>
                        <span id="pagibigError"></span>
                    </div>
                    
                </div><hr/>
                <h4 for="" class="text-dark">Position</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="" class="control-label"><span class="asterisk-red">&ast;</span>Position</label>
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
                        <label for="add-reg-rel" class="control-label"><span class="asterisk-red">&ast;</span>Status</label>
                        <select class="form-control" name="add-reg-rel" id="add-reg-rel" required>
                            <option value="" selected id="">-select-</option>
                            <?php
                                $sql = "SELECT * FROM reg_rel";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                echo "<option value='".$prow['id']."'>".$prow['title']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <hr/>
                <h4 for="" class="text-dark">In case of emergency</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="contact-person" class="control-label"><span class="asterisk-red">&ast;</span>Contact person</label>
                        <input type="text" class="form-control" id="contact-person" name="contact-person">
                  	</div>
                  	<div class="col-sm-3">
                        <label for="contact-person-address" class="control-label"><span class="asterisk-red">&ast;</span>Address</label>
                        <input type="text" class="form-control" id="contact-person-address" name="contact-person-address">
                  	</div>
                    <div class="col-sm-3">
                        <label for="contact-person-number" class="control-label"><span class="asterisk-red">&ast;</span>Contact no.</label>
                        <input type="text" class="form-control" id="contact-person-number" name="contact-person-number">
                      <span id="contactNumberError"></span>
                  	</div>
                </div> 
                <hr/>
                <h4 for="" class="text-dark">Accounts</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="bank-name" class="control-label"><span class="asterisk-red">&ast;</span>Bank account</label>
                        <select class="form-control" name="bank-name" id="bank-name" required>
                            <option value="" selected>- Select -</option>
                            <option value="BDO">BDO</option>
                            <option value="BPI">BPI</option>
                            <option value="Metrobank">Metrobank</option>
                            <option value="Land Bank">Land Bank</option>
                            <option value="Security Bank">Security Bank</option>
                            <option value="UnionBank">UnionBank</option>
                            <option value="Philippine National Bank (PNB)">Philippine National Bank (PNB)</option>
                            <option value="CIMB Bank Philippines">CIMB Bank Philippines</option>
                            <option value="China Bank">China Bank</option>
                            <option value="EastWest Bank">EastWest Bank</option>
                            <option value="RCBC">RCBC (Rizal Commercial Banking Corporation)</option>
                            <option value="PNB Savings">PNB Savings</option>
                            <option value="PSBank">PSBank (Philippine Savings Bank)</option>
                            <option value="Maybank Philippines">Maybank Philippines</option>
                            <option value="ING Philippines">ING Philippines</option>
                        </select>
                  	</div>
                    <div class="col-sm-3">
                        <label for="bank-services" class="control-label"><span class="asterisk-red">&ast;</span>Bank financial services</label>
                        <select class="form-control" name="bank-services" id="bank-services" required>
                            <option value="" selected>- Select -</option>
                            <option value="Savings">Savings</option>
                            <option value="Checking">Checking</option>
                            <!-- <option value="Deposits">Deposits</option> -->
                        </select>
                  	</div>
                      <div class="col-sm-3">
                        <label for="bank-account" class="control-label"><span class="asterisk-red">&ast;</span>Bank account number</label>
                        <input type="text" class="form-control" id="bank-account" name="bank-account">
                        <span id="bank-accountError"></span>
                    </div>
                </div> <hr/>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="gcash" class="control-label"><span class="asterisk-red">&ast;</span>Gcash account</label>
                        <input type="text" class="form-control" id="gcash" name="gcash">
                        <span id="gcashError"></span>
                  	</div>
                </div>
                <!-- <h4 for="" class="text-dark">Employee position</h4> -->

                <hr/>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add" id="validateButtonAdd"><i class="fa fa-save"></i> Add employee record</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" style="overflow-y:auto">
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
                        <label for="firstname" class="control-label"><span class="asterisk-red">&ast;</span>Firstname</label>
                        <input type="text" class="form-control" id="edit-firstname" name="firstname" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="lastname" class="control-label"><span class="asterisk-red">&ast;</span>Lastname</label>
                        <input type="text" class="form-control" id="edit-lastname" name="lastname" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="nickname" class="control-label"><span class="asterisk-red">&ast;</span>Nickname</label>
                        <input type="text" class="form-control" id="edit-nickname" name="nickname" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="contact" class="control-label"><span class="asterisk-red">&ast;</span>Contact number</label>
                        <input type="text" class="form-control" id="edit-contact" name="contact" required>
                        <span id="numberError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="email" class="control-label"><span class="asterisk-red">&ast;</span>Email address</label>
                        <input type="email" class="form-control" id="edit-email" name="email" required>
                        <span id="emailError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="fb" class="control-label"><span class="asterisk-red">&ast;</span>FB account</label>
                        <input type="text" class="form-control" id="edit-fb" name="fb" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="edit-datepicker_edit" class="control-label"><span class="asterisk-red">&ast;</span>Birthdate</label>
                        <input type="date" class="form-control" id="edit-datepicker_edit" name="birthdate" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="blood-type" class="control-label"><span class="asterisk-red">&ast;</span>Blood type</label>
                        <div class="date">
                            <input type="text" class="form-control" id="edit-blood-type" name="blood-type" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="gender" class="control-label"><span class="asterisk-red">&ast;</span>Sex</label>
                        <select class="form-control" name="gender" id="edit-gender" required>
                            <option value="" selected>- Select -</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="civil-status" class="control-label"><span class="asterisk-red">&ast;</span>Civil status</label>
                        <input type="text" class="form-control" id="edit-civil-status" name="civil-status" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="address" class="control-label"><span class="asterisk-red">&ast;</span>Address</label>
                        <textarea class="form-control" name="address" id="edit-address" required></textarea>
                    </div>
                </div>

                <h4 for="" class="text-dark">Employee IDs</h4>
                <div class="form-group">
                    <?php
                        $sql = "SELECT * FROM deductions LIMIT 3";
                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()) {
                            $description = strtolower($row["description"]);
                            echo '
                            <div class="col-sm-4">
                                <input type="hidden" id="edit-check-' . $description . '" name="' . $description . '" value="' . $row["id"] . '">
                            </div>';
                        }
                    ?>
                    <div class="col-sm-3">
                        <label for="edit-sss" class="control-label">SSS</label>
                        <input type="hidden" class="form-control" id="sss-deduction" name="sss-deduction">
                        <input type="text" class="form-control" id="edit-sss" name="sss">
                        <span id="sssError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="edit-tin" class="control-label">TIN</label>
                        <input type="hidden" class="form-control" id="tin-deduction" name="tin-deduction">
                        <input type="text" class="form-control" id="edit-tin" name="tin">
                        <span id="tinError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="edit-philhealth" class="control-label">Philhealth</label>
                        <input type="hidden" class="form-control" id="philhealth-deduction" name="philhealth-deduction">
                        <input type="text" class="form-control" id="edit-philhealth" name="philhealth">
                        <span id="philhealthError"></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="edit-pagibig" class="control-label">Pagibig</label>
                        <input type="hidden" class="form-control" id="pagibig-deduction" name="pagibig-deduction">
                        <input type="text" class="form-control" id="edit-pagibig" name="pagibig">
                        <span id="pagibigError"></span>
                    </div>
                </div>

                <h4 for="" class="text-dark">Position</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="" class="control-label"><span class="asterisk-red">&ast;</span>Position</label>
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
                        <label for="rate" class="control-label">Rate</label>
                        <input type="text" class="form-control" id="rate" disabled>
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="control-label"><span class="asterisk-red">&ast;</span>Status</label>
                        <select class="form-control" name="edit-reg-rel" id="edit-reg-rel" required>
                            <option value="" selected id="edit_reg_rel">-select-</option>
                            <?php
                                $sql = "SELECT * FROM reg_rel";
                                $query = $conn->query($sql);
                                while($prow = $query->fetch_assoc()){
                                echo "<option value='".$prow['id']."'>".$prow['title']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                  
                </div>
                <h4 for="" class="text-dark">In case of emergency</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="contact-person" class="control-label"><span class="asterisk-red">&ast;</span>Contact person</label>
                        <input type="text" class="form-control" id="edit-contact-person" name="contact-person" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="edit-contact-person-address" class="control-label"><span class="asterisk-red">&ast;</span>Address</label>
                        <input type="text" class="form-control" id="edit-contact-person-address" name="contact-person-address" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="contact-person-number" class="control-label"><span class="asterisk-red">&ast;</span>Contact no.</label>
                        <input type="text" class="form-control" id="edit-contact-person-number" name="contact-person-number" required>
                        <span id="contactNumberError"></span>
                    </div>
                </div>
                <hr/>
                <h4 for="" class="text-dark">Accounts</h4>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="edit-bank-name" class="control-label"><span class="asterisk-red">&ast;</span>Bank account</label>
                        <select class="form-control" name="bank-name" id="edit-bank-name" required>
                            <option value="" id="edit_bank_name" selected>- Select -</option>
                            <option value="BDO">BDO</option>
                            <option value="BPI">BPI</option>
                            <option value="Metrobank">Metrobank</option>
                            <option value="Land Bank">Land Bank</option>
                            <option value="Security Bank">Security Bank</option>
                            <option value="UnionBank">UnionBank</option>
                            <option value="Philippine National Bank (PNB)">Philippine National Bank (PNB)</option>
                            <option value="CIMB Bank Philippines">CIMB Bank Philippines</option>
                            <option value="China Bank">China Bank</option>
                            <option value="EastWest Bank">EastWest Bank</option>
                            <option value="RCBC">RCBC (Rizal Commercial Banking Corporation)</option>
                            <option value="PNB Savings">PNB Savings</option>
                            <option value="PSBank">PSBank (Philippine Savings Bank)</option>
                            <option value="Maybank Philippines">Maybank Philippines</option>
                            <option value="ING Philippines">ING Philippines</option>
                        </select>
                  	</div>
                    <div class="col-sm-3">
                        <label for="edit-bank-services" class="control-label"><span class="asterisk-red">&ast;</span>Bank financial services</label>
                        <select class="form-control" name="bank-services" id="edit-bank-services" required>
                            <option value="" id="edit_bank_services">- Select -</option>
                            <option value="Savings">Savings</option>
                            <option value="Checking">Checking</option>
                            <!-- <option value="Deposits">Deposits</option> -->
                        </select>
                  	</div>
                      <div class="col-sm-3">
                        <label for="edit-bank-account" class="control-label"><span class="asterisk-red">&ast;</span>Bank account number</label>
                        <input type="text" class="form-control" id="edit-bank-account" name="bank-account" required>
                        <span id="bank-accountError"></span>
                    </div>
                </div> <hr/>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="gcash" class="control-label"><span class="asterisk-red">&ast;</span>Gcash account</label>
                        <input type="text" class="form-control" id="edit-gcash" name="gcash" required>
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
<!-- ARCHIVE -->
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
	                	<p>ARCHIVE EMPLOYEE</p>
	                	<h2 class="bold del_employee_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-warning btn-flat" name="delete"><i class="fa fa-archive"></i> Archive</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- ARCHIVE RESTORE -->
<div class="modal fade" id="restore">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="archive_restore.php">
            		<input type="hidden" class="empid" name="id">
            		<div class="text-center">
	                	<p>RESTORE EMPLOYEE</p>
	                	<h2 class="bold del_employee_name"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="restore"><i class="fa fa-undo"></i>&nbsp;Restore</button>
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
                      <input type="file" id="edit-photo" name="edit-photo" accept="image/*" required>
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
