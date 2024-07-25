<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Cash Advance</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="cashadvance_add.php">
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Employee ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="employee" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="amount" class="col-sm-3 control-label">Cashadvance</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="amount" name="amount" required>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="pay-per-cut-off" class="col-sm-3 control-label">How much to pay per cut off?</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="pay-per-cut-off" name="pay-per-cut-off" required>
                    </div>
                </div> -->
				<div class="form-group">
					<label for="amount" class="col-sm-3 control-label">How many cutoff/s to pay cashadvance?</label>
					<div class="col-sm-9">
						<select class="form-control" id="numberOfCutoffs" name="number-of-cutoffs">
							<option value="1">1 cutoff</option>
							<option value="2">2 cutoffs</option>
							<option value="3">3 cutoffs</option>
							<option value="4">4 cutoffs</option>
							<option value="5">5 cutoffs</option>
							<option value="6">6 cutoffs</option>
							<option value="7">7 cutoffs</option>
							<option value="8">8 cutoffs</option>
							<option value="9">9 cutoffs</option>
							<option value="10">10 cutoffs</option>
							<option value="11">11 cutoffs</option>
							<option value="12">12 cutoffs</option>
							<option value="13">13 cutoffs</option>
							<option value="14">14 cutoffs</option>
							<option value="15">15 cutoffs</option>
							<option value="16">16 cutoffs</option>
							<option value="17">17 cutoffs</option>
							<option value="18">18 cutoffs</option>
							<option value="19">19 cutoffs</option>
							<option value="20">20 cutoffs</option>
							<option value="21">21 cutoffs</option>
							<option value="22">22 cutoffs</option>
							<option value="23">23 cutoffs</option>
							<option value="24">24 cutoffs</option>
						</select>
					</div>
				</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save new cash advance</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>- <span class="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="cashadvance_edit.php">
            		<input type="hidden" class="caid" name="id">
                <div class="form-group">
                    <label for="edit_amount" class="col-sm-3 control-label">Amount</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_amount" name="amount" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="employee_id" class="col-sm-3 control-label">Employee id</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit-pay-per-cut-off" class="col-sm-3 control-label">How much to pay per cut off?</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit-pay-per-cut-off" name="edit-pay-per-cut-off" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="balance" class="col-sm-3 control-label">Balance </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="balance" name="balance" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update cash advance</button>
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
            	<h4 class="modal-title"><b><span class="date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="cashadvance_delete.php">
            		<input type="hidden" class="caid" name="id">
            		<div class="text-center">
	                	<p>DELETE CASH ADVANCE</p>
	                	<h2 class="employee_name bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete cash advance</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     