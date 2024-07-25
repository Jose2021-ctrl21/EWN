<!-- CHECK DATE FOR DOCS IF NEED TO UPDATE -->
<?php
    include '../timezone.php';
    // $curDate = date('Y-m-d');
    $sql = "SELECT * FROM location WHERE date < CURDATE()";
    $query = $conn->query($sql);
   if($query->num_rows > 0){
            echo '
            <div class="modal fade" id="updateDocs" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title"><b>Update your password and create your security questions</b></h4>
                        </div>
                        <div class="modal-body">
                            <center><a href="vax_location.php" style="text-decoration:underline"> <h3>Go to vax location page</h3></a></center>
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
                    $("#updateDocs").modal("show");
                });
            </script>';
      }
?>