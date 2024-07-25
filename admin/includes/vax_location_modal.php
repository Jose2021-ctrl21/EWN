<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add location</b></h4>
          	</div>
          	<div class="modal-body">
              <form class="form-horizontal" method="POST" action="vax_location_add.php">
            	<input type="hidden" id="add-locid" name="id">
                <div class="form-group">
                  	<label for="province" class="col-sm-3 control-label">Province</label>
                  	<div class="col-sm-9">
					  	<select id="province" name="province" class="form-control" required>
							<option value="">Select Province</option>
						</select>
                  	</div>
				</div>
                <div class="form-group">
                  	<label for="city" class="col-sm-3 control-label">Municipality</label>
                  	<div class="col-sm-9">
					  	<select id="city" name="municipality" class="form-control" required>
							<option value="">Select Municipality</option>
						</select>
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="add-incentives" class="col-sm-3 control-label">Add incentives</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="add-incentives" name="add-incentives" required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="add-doc" class="col-sm-3 control-label">Add DOC</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="add-doc" name="add-doc" required>
                  	</div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save new location</button>
                    </div>
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
              <form class="form-horizontal" method="POST" action="vax_location_edit.php">
            	<input type="hidden" id="edit-locid" name="id">
                <div class="form-group">
                  	<label for="edit-id" class="col-sm-3 control-label">Update id</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit-id" name="edit-id" required>
                  	</div>
                </div>
                <!-- <div class="form-group">
                  	<label for="edit-province" class="col-sm-3 control-label">Province</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit-province" name="edit-province">
                  	</div>
				</div>
                <div class="form-group">
                  	<label for="edit-municipality" class="col-sm-3 control-label">Municipality</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit-municipality" name="edit-municipality" required>
                  	</div>
                </div> -->
				<div class="form-group">
                  	<label for="edit-province" class="col-sm-3 control-label">Province</label>
                  	<div class="col-sm-9">
					  	<input type="hidden" id="hidden_province" name="hidden-province"/>
					  	<select id="edit-province" name="edit-province" class="form-control">
							<option value="" id="edit_province"></option>
						</select>
                  	</div>
				</div>
                <div class="form-group">
                  	<label for="edit-city" class="col-sm-3 control-label">Municipality</label>
                  	<div class="col-sm-9">
						<input type="hidden" id="hidden_municipality" name="hidden-municipality"/>
					  	<select id="edit-city" name="edit-municipality" class="form-control">
							<option value="" id="edit_municipality"></option>
						</select>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="edit-incentives" class="col-sm-3 control-label">Edit incentives</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit-incentives" name="edit-incentives" required>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="edit-doc" class="col-sm-3 control-label">Edit DOC</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="edit-doc" name="edit-doc" required>
                  	</div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> Update location</button>
                    </div>
                </form>
          	</div>
        </div>
    </div>
</div>

<!-- Archive -->
<div class="modal fade" id="archive">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Archive...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="vax_location_archive.php">
            		<input type="hidden" id="del-locid" name="id">
            		<div class="text-center">
	                	<p>ARCHIVE LOCATION</p>
	                	<h2 id="del_location" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-warning btn-flat" name="archive"><i class="fa fa-trash"></i> Archive location</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- Restore -->
<div class="modal fade" id="restore">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Restore...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="vax_location_restore.php">
            		<input type="hidden" id="restore_locid" name="id">
            		<div class="text-center">
	                	<p>Restore Location</p>
	                	<h2 id="restore_location" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="restore"><i class="fa fa-undo"></i> Restore location</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

