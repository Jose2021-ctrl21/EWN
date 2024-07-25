<!-- Add -->
<div class="modal fade" id="addnewTax">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add salary brackets</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="income_tax_add.php">
                <div class="form-group">
					<div class="col-sm-6">
						<label for="first-bracket" class="control-label">First bracket</label>
                      <input type="text" class="form-control" id="first-bracket" name="first-bracket" required>
                    </div>
                    <div class="col-sm-6">
						<label for="second-bracket" class="control-label">Second bracket</label>
                      <input type="text" class="form-control" id="second-bracket" name="second-bracket" required>
                    </div>
                </div>
                <div class="form-group">
					<div class="col-sm-6">
						<label for="tax-rate" class="control-label">Income tax rate</label>
                      <input type="text" class="form-control" id="tax-rate" name="tax-rate" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save new income tax</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editTax">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Edit salary brackets</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="income_tax_edit.php">
                <div class="form-group">
				<input type="hidden" class="form-control" id="tax-id" name="tax-id" required>
					<div class="col-sm-6">
						<label for="edit-first-bracket" class="control-label">First bracket</label>
                      <input type="text" class="form-control" id="edit-first-bracket" name="edit-first-bracket" required>
                    </div>
                    <div class="col-sm-6">
						<label for="edit-second-bracket" class="control-label">Second bracket</label>
                      <input type="text" class="form-control" id="edit-second-bracket" name="edit-second-bracket" required>
                    </div>
                </div>
                <div class="form-group">
					<div class="col-sm-6">
						<label for="edit-tax-rate" class="control-label">Income tax rate</label>
                      <input type="text" class="form-control" id="edit-tax-rate" name="edit-tax-rate" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> Update income tax</button>
			</form>
			</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteTax">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="income_tax_delete.php">
            		<input type="hidden" class="delete_id" name="delete-id">
            		<div class="text-center">
	                	<p>ARE YOU SURE YOU WANT TO DELETE SELECTED ROW?</p>
	                	<h2 class="annual_salary_range bold"></h2>
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


     