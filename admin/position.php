<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
    <section class="content-header">
      <h1>
        Positions
      </h1>
      <ol class="breadcrumb">
        <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Positions</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Add new position</a>
            </div>
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Position title</th>
                  <th>Base pay</th>
                  <th>Rate</th>
                  <th>Leave credits</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM position";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['description']."</td>
                          <td>&#8369;".number_format(floatval($row['base_pay']), 2)."</td>
                          <td>&#8369;".number_format($row['rate'], 2)."</td>
                          <td>".$row['leave_credits']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/position_modal.php'; ?>
  <?php include 'includes/security_modal.php'; ?>
  <?php include 'includes/base_pay_modal.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>


<!-- SYSTEM LOCK SCRIPT -->
<!-- <script>
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
</script> -->


<script>
$(document).ready(function(){
  $('#rate, #edit_rate').on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });
});
$(document).ready(function(){
  $('#base_pay').on('input', function() {
        var rate = (parseFloat($(this).val()) / 12).toFixed(2);
        $('#rate').val(rate);
    });
});
$(document).ready(function(){
  $('#edit_base_pay').on('input', function() {
        var rate = (parseFloat($(this).val()) / 12).toFixed(2);
        $('#edit_rate').val(rate);
    });
});

</script>

<script>
$(function(){
      $('.edit').click(function(e){
        e.preventDefault();
        // $('#edit').modal('show');
        $('#security_edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $('#security-form-edit').submit(function(e) {
        e.preventDefault();
        const password = $('#security-pass-edit').val();

        $.ajax({
          url: 'vax_location_security.php', // Your server-side validation endpoint
          method: 'POST',
          data: { password: password },
          success: function(response) {
            response = JSON.parse(response);
            if(response.result === true) {
              $('#security_edit').modal('hide');
              $('#edit').modal('show');
              getRow(id); // Use the saved id here
            } else {
              alert('Incorrect password. Please try again.');
              console.log(response.result);
            }
          },
          error: function() {
            alert('An error occurred while validating the password. Please try again.');
          }
        });

      });

      $('.delete').click(function(e){
        e.preventDefault();
        $('#security_archive').modal('show');
        var id = $(this).data('id');
        console.log(id);
        getRow(id);
      });
    });

    $('#security-form-archive').submit(function(e) {
        e.preventDefault();
        const password = $('#security-pass-archive').val();

        $.ajax({
          url: 'vax_location_security.php', // Your server-side validation endpoint
          method: 'POST',
          data: { password: password },
          success: function(response) {
            response = JSON.parse(response);
            if(response.result === true) {
              $('#security_archive').modal('hide');
              $('#delete').modal('show');
              getRow(id); // Use the saved id here
            } else {
              alert('Incorrect password. Please try again.');
              console.log(response.result);
            }
          },
          error: function() {
            alert('An error occurred while validating the password. Please try again.');
          }
        });

      });

    

    function getRow(id){
      $.ajax({
        type: 'POST',
        url: 'position_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
          $('#posid').val(response.id);
          $('#edit_title').val(response.description);
          $('#edit_base_pay').val(response.base_pay);
          $('#edit_leave_credits').val(response.leave_credits);
          $('#edit_rate').val(response.rate);
          $('#del_posid').val(response.id);
          $('#del_position').html(response.description);
        }
      });
    }
    </script>
    <!-- END FOR POSITION -->

    <script>
        $(document).ready(function(){
          $('#base_pay, #edit_base_pay').on('input', function() {
                this.value = this.value.replace(/[^0-9.]/g, '');
            });
        });
    </script>

<!-- BASE PAY -->
<script>
$(function(){
      $('.bp_class').on('change', function() {
          var selectedValue = $(this).val();
          console.log(selectedValue);
          $.ajax({
          type: 'POST',
          url: 'base_pay_active_edit.php',
          data: {id:selectedValue},
          dataType: 'json',
          success: function(response){
            alert("Changed");
          }
        });
      });

      $('.edit_bp').click(function(e){
        e.preventDefault();
        $('#edit_bp').modal('show');
        var id = $(this).data('id');
        // console.log(id);
        getRow_bp(id);
      });

      $('.delete_bp').click(function(e){
        e.preventDefault();
        $('#delete_bp').modal('show');
        var id = $(this).data('id');
        getRow_bp(id);
      });
    });

    function getRow_bp(id){
      $.ajax({
        type: 'POST',
        url: 'base_pay_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
          $('#base_pay_id').val(response.id);
          $('#edit_base_pay').val(response.base_pay);
          $('#del_bp_id').val(response.id);
          $('#del_bp').html(response.base_pay);
        }
      });
    }
</script>

</body>
</html>
