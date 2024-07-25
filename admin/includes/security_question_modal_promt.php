<?php
	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: ../login/index.php');
	}
    $id = $_SESSION['user'];

    $sql = "SELECT id FROM admin WHERE id = $id AND (ans_1 = '' OR ans_2 = '' OR ans_3 = '' OR sec_1 = '' OR sec_2 = '' OR sec_3 = '')";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();
    // Check if no rows are returned
    if(!empty($row['id'])){
    echo '
    <div class="modal fade" id="updateSec" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><b>IMPORTANT REMINDER. CREATE YOUR SECURITY QUESTION</b></h4>
                </div>
                <div class="modal-body">
                    <center><a href="admin_create_sec.php" style="text-decoration:underline"> <h3>Go to security question page</h3></a></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Ignore</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            // Show the modal when the document is ready
            $("#updateSec").modal("show");
        });
    </script>';
    }
?>
