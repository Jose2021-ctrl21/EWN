<style>
/* Apply blur effect to the modal container */
.mod  {
    background:greenyellow;
}
/* .modal-content{
    margin-top: 90%;
} */
</style>
<!-- Security for incometax -->
<div class="modal fade mod" id="page_lock" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="border-radius:3%">
          <div class="modal-header">
            <h4 class="modal-title"><b>SYSTEM IS LOCKED</b></h4>
          </div>
            <div class="modal-body">
                <form class="form-horizontal" id="security-form-page-lock" method="POST" action="">
                    <div class="form-group">
                        <label for="security-pass" class="col-sm-3 control-label">Enter password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="security-pass" name="security-pass" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-flat" id="security-enter"><i class="fa fa-lock"></i>&nbsp;Enter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    $sql = "SELECT status FROM system_lock WHERE id = 12345";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $status = $row['status'];
        if ($status == 'on') {
            echo "<script>$('#page_lock').modal('show');</script>";
        }
    }
?>

<script>
$(document).ready(function() {
    // Handle form submission
    $('#security-form-page-lock').submit(function(e) {
        e.preventDefault();
        const password = $('#security-pass').val();
        $.ajax({
            url: 'system_lock.php',
            method: 'POST',
            data: { password: password },
            success: function(response) {
                try {
                    response = JSON.parse(response);
                    if (response.result === true) {
                        $('#page_lock').modal('hide');
                        // Additional actions after successful authentication
                    } else {
                        alert('Incorrect password. Please try again.');
                    }
                } catch (e) {
                    console.log('Error parsing JSON response: ', e);
                    alert('An error occurred while validating the password. Please try again.');
                }
              console.log(password);

            },
            error: function(xhr, status, error) {
                console.error('AJAX error: ', status, error);
                alert('An error occurred while communicating with the server. Please try again.');
            }
        });
    });
});
</script>


<!-- SYSTEM LOCK SCRIPT -->
<script>
    $(document).ready(function() {
        $('.lock').on('click', function() {
            var sysLock = 'on';
            $.ajax({
                url: 'system_lock_process.php',
                method: 'POST',
                data: { sysLock: sysLock },
                success: function(response) {
                response = JSON.parse(response);
                if (response.result === true) {
                  window.location.reload();
                } 
                },
                error: function() {
                    alert('An error occurred while locking the system. Please try again.');
                }
            });
        });
    });
</script>