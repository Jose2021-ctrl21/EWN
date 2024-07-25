

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Financial statement per day</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="financial_statement.php">
          		  <div class="form-group">
                    <div class="text-center">
                        <h5>Juan delacruz</h5>
                        <p>VC:2024-003</p>
	            	</div>
                </div>
          		<div class="form-group">
                  	<div class="col-sm-6">
                  	    <label for="add-salary" class="control-label">Salary</label>
                    	<input type="text" class="form-control" id="add-salary" name="add-salary" required>
                  	</div>
                  	<div class="col-sm-6">
                  	    <label for="add-meal-allowance" class="control-label">Meal allowance</label>
                    	<input type="text" class="form-control" id="add-meal-allowance" name="add-meal-allowance" required>
                  	</div>
                  	<div class="col-sm-6">
                  	    <label for="add-adjustments" class="control-label">Adjustments</label>
                    	<input type="text" class="form-control" id="add-adjustments" name="add-adjustments" required>
                  	</div>
                  	<div class="col-sm-6">
                  	    <label for="add-transpo" class="control-label">Transportation</label>
                    	<input type="text" class="form-control" id="add-transpo" name="add-transpo" required>
                  	</div>
                  	<div class="col-sm-6">
                  	    <label for="add-incentives" class="control-label">Incentives</label>
                    	<input type="text" class="form-control" id="add-incentives" name="add-incentives" required>
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

