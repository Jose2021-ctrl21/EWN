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
        Base pay per cut off
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Base pay</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Add new base pay</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Id</th>
                  <th>Base pay</th>
                  <th style="width:5px">Active</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM base_pay";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $checked = $row['active'] == 'yes' ? 'checked' : '';
                      echo "
                        <tr>
                          <td>".$row['id']."</td>
                          <td>".number_format($row['base_pay'], 2)."php</td>
                          <td><input type='radio' name='bp' id='bp'class='bp_class' value='".$row['id']."' $checked/></td>
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
  <?php include 'includes/base_pay_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>

<script>
$(document).ready(function(){
  $('#base_pay, #edit_base_pay').on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });
});
</script>
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
        alert(response);
      }
    });
  });

  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    // console.log(id);
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
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
