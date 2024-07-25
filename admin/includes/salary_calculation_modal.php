<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add budget</b></h4>
          	</div>
          	<div class="modal-body">
              <form class="form-horizontal" method="POST" action="salary_calculation_add.php">
            	<input type="hidden" id="add-locid" name="add-loc-id">
            	<input type="hidden" id="add-salary" name="add-salary">
                <div class="form-group">
					<div class="col-sm-6">
						<label for="add-incentives" class="control-label">Incentives</label>
						<input type="text" class="form-control" id="add-incentives" name="add-incentives" readonly>
					</div>
                  	<div class="col-sm-6">
                  		<label for="add-doc" class="control-label">Add DOC</label>
                    	<input type="text" class="form-control" id="add-doc" name="add-doc" required>
                  	</div>
                  	<div class="col-sm-6">
					  <label for="add-crew" class="control-label">Total crew</label>
					  <input type="text" class="form-control" id="add-crew" name="add-crew" readonly>
                  	</div>
                  	<div class="col-sm-6">
					  <label for="add-meal-allowance" class="control-label">Meal allowance</label>
					  <input type="text" class="form-control" id="add-meal-allowance" name="add-meal-allowance" value="150">
                  	</div>
                  	<div class="col-sm-6">
					  <label for="add-adjustments-allowance" class="control-label">Adjustments</label>
					  <input type="text" class="form-control" id="add-adjustments-allowance" name="add-adjustments-allowance" placeholder="add-adjustments-allowance">
                  	</div>
					  <div class="col-sm-6">
					  <label for="add-xtmeal-allowance" class="control-label">Xtra meal</label>
					  <input type="text" class="form-control" id="add-xtmeal-allowance" name="add-xtmeal-allowance" placeholder="add-xtmeal-allowance">
                  	</div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
          	</div>
        </div>
    </div>
</div>

<!-- Summary -->
<div class="modal fade" id="total">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Compute</b></h4>
          	</div>
          	<div class="modal-body">
			  <form class="form-horizontal" method="POST" action="salary_computed_process.php">
            		<input type="text" class="com-loc-id" name="com-loc-id" id="com-loc-id">
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Date from:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="datepicker_add" name="date-from">
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">Date to:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="datepicker_edit" name="date-to">
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="compute"><i class="fa fa-check-square-o"></i>Compute</button>
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
            	<h4 class="modal-title"><b>Update location</b></h4>
          	</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="salary_calculation_add.php">
					<input type="hidden" id="edit-add-locid" name="edit-loc-id">
					<input type="hidden" id="edit-add-salary" name="edit-salary">
					<div class="form-group">
						<div class="col-sm-6">
							<label for="add-incentives" class="control-label">Incentives</label>
							<input type="text" class="form-control" id="edit-add-incentives" name="edit-incentives" readonly>
						</div>
						<div class="col-sm-6">
							<label for="add-doc" class="control-label">Add DOC</label>
							<input type="text" class="form-control" id="edit-add-doc" name="edit-doc" required>
						</div>
						<div class="col-sm-6">
						<label for="add-crew" class="control-label">Total crew</label>
						<input type="text" class="form-control" id="edit-add-crew" name="edit-crew" readonly>
						</div>
						<div class="col-sm-6">
						<label for="add-meal-allowance" class="control-label">Meal allowance</label>
						<input type="text" class="form-control" id="edit-add-meal-allowance" name="edit-meal-allowance" value="150">
						</div>
						<div class="col-sm-6">
						<label for="add-adjustments-allowance" class="control-label">Adjustments</label>
						<input type="text" class="form-control" id="edit-add-adjustments-allowance" name="edit-adjustments-allowance" placeholder="add-adjustments-allowance">
						</div>
						<div class="col-sm-6">
						<label for="add-xtmeal-allowance" class="control-label">Xtra meal</label>
						<input type="text" class="form-control" id="edit-add-xtmeal-allowance" name="edit-xtmeal-allowance" placeholder="add-xtmeal-allowance">
						</div>
					</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
						<button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> update</button>
						</div>
					</form>
				</div>
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
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="salary_calculation_delete.php">
            		<input type="text" id="del-salary-locid" name="id">
            		<div class="text-center">
	                	<p>DELETE SALARY CALCULATION</p>
	                	<h2 id="del_salary_calculation" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Confirm</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     