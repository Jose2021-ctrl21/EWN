<!-- EDIT MODAL -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Edit employee reimbursement</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="reimbursement_edit.php">
                <div class="form-group">
                  <center><div><h1 id="head-name-edit"></h1></div></center>
                      <div class="col-sm-12">
                          <input type="hidden" class="form-control" name="reimbursement_id" id="reimbursement_id" required>
                        <label for="employee_id" class="control-label">Employee id</label>
                          <input type="text" class="form-control" name="employee_id" id="employee_id" readonly>
                      </div>
                </div>
                <div class="form-group">
                      <div class="col-sm-6">
                          <label for="meal-allowance-edit" class="control-label">Meal allowance</label>
                          <input type="text" class="form-control" id="meal-allowance-edit" name="meal-allowance-edit">
                      </div>
                      <div class="col-sm-6">
                          <label for="meal-allowance-edit" class="control-label">Meal allowance additional</label>
                          <input type="text" class="form-control" id="meal-allowance-edit-additional" name="meal-allowance-edit-additional">
                      </div>
                      <div class="col-sm-6">
                        <label for="transpo-edit" class="control-label">Transportation</label>
                        <input type="text" class="form-control" id="transpo-edit" name="transpo-edit">
                      </div>
                      <div class="col-sm-6">
                        <label for="transpo-edit" class="control-label">Transportation additional</label>
                        <input type="text" class="form-control" id="transpo-edit-additional" name="transpo-edit-additional">
                      </div>
                      <div class="col-sm-12">
                          <label for="adjustments-edit" class="control-label">Adjustments</label>
                        <input type="text" class="form-control" id="adjustments-edit" name="adjustments-edit">
                      </div>
                      <!-- <div class="col-sm-6">
                          <label for="adjustments-edit" class="control-label">Adjustments additional</label>
                        <input type="text" class="form-control" id="adjustments-edit-additional" name="adjustments-edit-additional">
                      </div> -->
                </div>
          	</div>
          	<div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit" id="update"><i class="fa fa-check-square-o"></i> Update</button>
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
              <form class="form-horizontal" method="POST" action="reimbursement_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="reimbursementID" name="id">
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
