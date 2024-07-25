<!-- Add -->
<div class="modal fade" id="addnew_bp">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add new base pay</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="base_pay_add.php">
          		  <div class="form-group">
                  	<label for="base_pay" class="col-sm-3 control-label">Base pay</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="base_pay" name="base_pay" required>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add_bp"><i class="fa fa-save"></i> Save new base pay</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit_bp">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Update base pay</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="base_pay_edit.php">
            		<input type="hidden" id="base_pay_id" name="id">
                <div class="form-group">
                    <label for="edit_base_pay" class="col-sm-3 control-label">Base pay</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_base_pay" name="edit_base_pay">
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit_bp"><i class="fa fa-check-square-o"></i> Update base pay</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_bp">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Deleting</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="base_pay_delete.php">
            		<input type="text" id="del_bp_id" name="id">
            		<div class="text-center">
	                	<p>DELETE BASE PAY</p>
	                	<h2 id="del_bp" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete_bp"><i class="fa fa-trash"></i> Delete base pay</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     