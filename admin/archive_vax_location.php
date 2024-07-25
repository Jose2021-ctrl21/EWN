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
        Archived position/s
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Position</li>
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
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Id</th>
                  <th>Vaccination location</th>
                  <th>Incentives</th>
                  <th>Total DOCs</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM location WHERE location_archive = 'yes'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['id']."</td>
                          <td>".$row['province'].", ".$row['municipality']."</td>
                          <td>".$row['incentives']."</td>
                          <td>".number_format($row['doc'])."</td>
                          <td>
                            <button class='btn btn-success btn-sm restore btn-flat' data-id='".$row['id']."'><i class='fa fa-undo'></i> Restore</button>
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
  <?php 
  include 'includes/vax_location_modal.php';
   ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>


<script>
$(document).ready(function(){
  $('#add-incentives, #add-doc, #edit-incentives, #edit-doc, #edit-id').on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });
});
</script>

<script>
$(function(){
  $('.restore').click(function(e){
    e.preventDefault();
    $('#restore').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'vax_location_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#restore_locid').val(response.id);
      $('#restore_location').html(response.province+" "+response.municipality);
    }
  });
}
</script>
</body>
</html>
