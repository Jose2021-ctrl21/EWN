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
        Account
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">create account</li>
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
        <div class="form-group">
            <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                <?php if($_SESSION['access_role_1']==1 || $_SESSION['access_role_1']==3){ ?>
                <a href="#staff-user-profile" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>Create new account</a>
                <?php } ?>
                </div>
                <div class="box-body" style="overflow-x:auto;">
                <table id="example1" class="table table-bordered">
                    <thead>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Tools</th>
                    </thead>
                    <tbody>
                    <?php

                        $access_id = intval($_SESSION['access_role_1']);
                        $usrID = intval($_SESSION['user_id']);

                        if($access_id==3){
                          $sql = "SELECT * FROM admin";
                        }elseif($access_id==1){
                          $sql = "SELECT * FROM admin WHERE access_role_1 != 3 AND access_role_1 != 1";
                        }
                        else{
                          $id = $_SESSION['user'];
                          $sql = "SELECT * FROM admin WHERE id = $id";
                        }
                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td><img src='" . (!empty($row['photo']) ? '../images/'.$row['photo'] : '../images/profile.jpg') . "' width='30px' height='30px'></td>
                                    <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                                    <td>" . $row['username'] . "</td>
                                    <td>";
                                    if ($row['access_role_1'] != 3 && $row['id'] != $_SESSION['user_id']) {
                                        echo "
                                            <select class='form-control selected' data-employee-id='".$row['id']."'>
                                                <option selected>".$row['activation']."</option>
                                                <option value='Active'>Active</option>
                                                <option value='Deactivated'>Deactivated</option>
                                            </select>";
                                    }
                                    echo "
                                    </td>
                                </tr>";
                        }
                        
                        // <td>
                        // <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                        // <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
                        // </td>
                        ?>

                    </tbody>
                </table>
                </div>
            </div>
            </div>
            <!-- End col-xl-12 -->
            
        </div>
      </div>
      <!-- end row -->
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<script>
$(function(){
  $('.reset').click(function(e){
    e.preventDefault();
    $('#reset').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  // $('.delete').click(function(e){
  //   e.preventDefault();
  //   $('#delete').modal('show');
  //   var id = $(this).data('id');
  //   getRow(id);
  // });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'users_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#user-name').val(response.username);
      $('#reset-id').val(response.id);
      $('#reset-user-name').val(response.username);
      $('.employee_name').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>

<script>
    // Add event listener to select dropdowns with class 'selected'
    document.querySelectorAll('.selected').forEach(select => {
        select.addEventListener('change', function() {
            const selectedValue = this.value; // Get selected  activation value
            const employeeId = this.dataset.employeeId; // Get data-employee-id attribute
console.log(selectedValue+'--'+employeeId);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "users_activation.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                var response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        alert(response.message);
                    } else {
                        alert("Failed to update status: " + response.message);
                    }
            };
            xhr.send("selectedValue=" + encodeURIComponent(selectedValue) + "&employeeId=" + encodeURIComponent(employeeId));
            console.log(selectedValue + "--" + employeeId);
        });
    });
</script>
</body>
</html>
