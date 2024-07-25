<!-- Add -->
<div class="modal fade" id="addpayroll">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="date"></span> - <span class="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="payroll_add.php">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="first" class="col-sm-4 control-label">
                            <input type="radio" id="first" name="cut-off" value="1">
                            1st cut-off:
                        </label>

                        <label for="second" class="col-sm-4 control-label">
                            <input type="radio" id="second" name="cut-off" value="2">  
                            2nd cut-off:
                        </label>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-sm-2"></div>
                        <div class="form-group col-sm-4">
                            <label for="month" class="control-label">Month:</label>
                            <input type="text" class="form-control" id="month" name="month">
                        </div>
                        <div class="form-group col-sm-4" style="margin-left:20px">
                            <label for="year" class="control-label">Year:</label>
                            <input type="text" class="form-control" id="year" name="year">
                        </div>
                        <div class="form-group col-sm-2"></div>

                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="dateFrom" class="col-sm-3 control-label">Date from:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="dateFrom" name="date-from">
                    </div>
                </div>
                <div class="form-group">
                    <label for="dateTo" class="col-sm-3 control-label">Date to:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="dateTo" name="date-to">
                    </div>
                </div> -->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="addPayroll"><i class="fa fa-check-square-o"></i> Add new payroll</button>
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
            	<!-- <h4 class="modal-title"><b><span id=""></span></b></h4> -->
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="financial_statement_delete.php">
            		<input type="text" id="del_emp_payroll" name="id">
	                <h3 id="date"></h3>
            		<div class="text-center">
	                	<h1>DELETE ROW</h1>
	                	<h2 id="employee_name"></h2>
	                	<h2 id="id_uniq"></h2>
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

<!-- Payroll -->
<!-- Payroll -->
<!-- <div class="modal fade" id="payroll">
    <div class="modal-dialog modal-lg">
        <div class="modal-content printable-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form class="form-horizontal" method="POST" action="">
                <div class="box-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Date Range</th>
                                <th>Number of Days Worked</th>
                                <th>Total Deduction</th>
                                <th>Gross</th>
                                <th>Net Salary</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT *, 
                            pe.employee_id AS emp, 
                            pe.sss AS sss, 
                            pe.tin AS tin, 
                            pe.pagibig AS pagibig, 
                            pe.philhealth AS philhealth, 
                            em.employee_id AS employee_id,
                            pe.created_on As created_on
                            FROM payroll_employee AS pe
                            LEFT JOIN employees em ON pe.id = em.id
                            ";
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                          ?>
                          <tr>
                            <td><?php echo $row['emp']; ?></td>
                            <td><?php echo $row['date_range']; ?></td>
                            <td><?php echo $row['num_days_work']; ?></td>
                            <td><?php echo number_format($row['total_deduction']); ?></td>
                            <td><?php echo number_format($row['gross']); ?></td>
                            <td><?php echo number_format($row['net_salary']); ?></td>
                            <td><?php echo $row['created_on']; ?></td>
                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btnClose pull-left" data-dismiss="modal">
                        <i class="fa fa-close"></i> Close
                    </button>
                    <button type="button" class="btn btn-primary btn-flat btnPrint" onclick="printPayroll()">
                        <i class="fa fa-print"></i> Print payroll
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    @media print {
    body * {
        visibility: hidden;
    }
    .printable-content, .printable-content * {
        visibility: visible;
    }
    .btnClose{
        display: none;
    }
    .btnPrint{
        display:none
    }
}

</style>
<script>
    function printPayroll() {
        window.print();
    }
</script> -->
