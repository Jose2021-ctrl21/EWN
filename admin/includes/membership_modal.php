<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="date"></span> - <span class="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="membership_edit.php">
            		<input type="hidden" class="" name="id" id="id">
                <!-- <div class="form-group">
                    <div class="col-sm-3">
                        
                            <label class="control-label" for="sss">
                                SSS
                            </label>
                            <input class="form-control" type="text" id="sss" name="sss">
                        <span id="sssError"></span>
                    </div>
                    <div class="col-sm-3">
                        
                            <label class="control-label" for="tin">
                                TIN
                            </label>
                            <input class="form-control" type="text" id="tin" name="tin">
                        <span id="tinError"></span>
                    </div>
                    <div class="col-sm-3">
                        
                            <label class="control-label" for="pagibig">
                                Pagibig
                            </label>
                            <input class="form-control" type="text" id="pagibig" name="pagibig">
                        <span id="pagibigError"></span>
                    </div>
                    <div class="col-sm-3">
                        
                            <label class="control-label" for="philhealth">
                                Philhealth
                            </label>
                            <input class="form-control" type="text" id="philhealth" name="philhealth">
                        <span id="philhealthError"></span>
                    </div>
                </div> -->
                <h4 for="" class="text-dark">Employee membership IDs</h4>
                <div class="form-group">
                <?php
                    $sql = "SELECT * FROM deductions LIMIT 4";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                        $description = strtolower($row["description"]);
                        echo '
                        <div class="col-sm-3">
                            <label for="check-' . $description . '" class="control-label">' . $row["description"] . '</label>
                            <input class="form-check-input" type="checkbox" id="check-' . $description . '" name="' . $description . '" value="' . $row["id"] . '">
                            <input type="text" class="form-control" id="' . $description . '_deduction" name="' . $description . '-deduction">
                            <input type="text" class="form-control" id="' . $description . '_input" name="' . $description . '">
                            <span id="' . $description . 'Error"></span>
                        </div>';
                    }
                    ?>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>