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
            	<form class="form-horizontal" method="POST" action="contact_person_edit.php">
            		<input type="hidden" class="" name="id" id="id">
                <div class="form-group">
                    <label for="contact-person-name" class="col-sm-3 control-label">Contact name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact-person-name" name="contact-person-name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact-person-address" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact-person-address" name="contact-person-address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact-person-number" class="col-sm-3 control-label">Contact number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact-person-number" name="contact-person-number" required>
                    </div>
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