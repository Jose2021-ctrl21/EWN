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
        Deductions
      </h1>
      <ol class="breadcrumb">
      <li><button style="color:yellow;font-size:15px;margin-top:2px;background:green" class="lock"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;<span style="color:white;font-weight:bolder">LOCK SYSTEM</span></button></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Deductions</li>
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
        <div class="col-xs-8">
          <div class="box">
            <!-- <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div> -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="" class="table table-bordered">
                <thead>
                  <th>ID</th>
                  <th>Description</th>
                  <th>Employee contribution (decimal)</th>
                  <th>Employeer contribution (decimal)</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM deductions";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['id']."</td>
                          <td class='text-right'>".$row['description']."</td>
                          <td class='text-left'>".$row['employee_contribution']."</td>
                          <td class='text-left'>".$row['employeer_contribution']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                          </td>
                        </tr>
                      ";
                    }
                    // <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
          <div class="col-xs-4">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <?php
                            $sql_wage = "SELECT * FROM wage";
                            $query_wage = $conn->query($sql_wage);
                            $row_w = $query_wage->fetch_assoc();
                        ?>
                        <label for="current-wage">Minimum wage</label>
                        <input type="hidden" name="id" id="wage-id" value="<?php echo $row_w['id']; ?>">
                        <input type="text" class="form-control wage" id="current-wage" name="wage" value="<?php echo $row_w['current_wage']; ?>">
                    </div>
                    <button type="submit" class="btn btn-success" id="apply-wage">Apply</button>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <h3>Income tax</h3>
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnewTax" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp;Create annual gross range</a>
            </div>
            <div class="box-body" style="overflow-x:auto;">
              <table id="example1" class="table table-bordered">
                <thead>
                    <th class="hidden"></th>
                    <th>Annual salary range</th>
                    <th>Tax rate (decimal)</th>
                    <th>Tools</th>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM income_tax
                    ORDER BY id ASC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        // Convert string values to floats
                        $firstBracket =  $row['first_bracket'];
                        $secondBracket = $row['second_bracket'];
                        $taxRate = $row['tax_rate'];                        
                        echo "
                        <tr>
                            <td class='hidden'></td>
                            <td class='text-right'>&#8369;".$firstBracket." - &#8369;".$secondBracket."</td>
                            <td class='text-left'>0".$taxRate."</td>
                            <td>
                                <button class='btn btn-success btn-sm editTax btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                <button class='btn btn-danger btn-sm deleteTax btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
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
        <div class="col-xs-4">
          <h3>Contribution report</h3>
          <div class="box">
          <!-- Details -->
          <div class="box-body shadow" style="box-shadow: 0 1px 1px gray;">
          <form class="form-horizontal">
              <div class="form-group">
                  <div class="row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-4">
                          <label for="add-location" class="control-label">Contribution</label>
                          <div class="form-check">
                              <input type="radio" class="form-check-input" name="contribution" id="sss" value="sss" required/>
                              <label class="form-check-label" for="sss">SSS</label>
                          </div>
                          <div class="form-check">
                              <input type="radio" class="form-check-input" name="contribution" id="pagibig" value="pagibig" required/>
                              <label class="form-check-label" for="pagibig">Pagibig</label>
                          </div>
                          <div class="form-check">
                              <input type="radio" class="form-check-input" name="contribution" id="philhealth" value="philhealth" required/>
                              <label class="form-check-label" for="philhealth">Philhealth</label>
                          </div>
                          <div class="form-check">
                              <input type="radio" class="form-check-input" name="contribution" id="tin" value="income tax" required/>
                              <label class="form-check-label" for="tin">Income tax</label>
                          </div>
                      </div>
                      <div class="col-sm-4">
                         <label for="payroll" class="control-label">Date range</label>
                            <input type="text" class="form-control check-payroll" id="payroll" name="payroll" required>
                          <br/><br/> 
                          <div class="d-flex justify-content-end mt-3">
                              <button type="button" class="btn btn-primary generate">Generate</button>
                          </div>
                      </div>
                      <div class="col-sm-2"></div>
                  </div>
              </div>
          </form>
          </div>
          <!-- Details -->
            <div class="box-body">
              <table id="" class="table table-bordered">
            
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/deduction_modal.php'; ?>
  <?php include 'includes/security_modal.php'; ?>
  <?php include 'includes/income_tax_modal.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/security_question_modal_promt.php'; ?>
<?php include "includes/system_lock_modal.php";?>


<script>
  $(document).ready(function(){
    // Ensure all input handling scripts are correctly closed
    $('#employeer-contribution, #employee-contribution, #edit-employeer-contribution, #edit-employee-contribution').on('input', function() {
      this.value = this.value.replace(/[^0-9.]/g, '');
    });
  });
</script>

<script>
  $(function(){
    // Handle edit button click
    $('.edit').click(function(e){
      e.preventDefault();
      $('#security_edit').modal('show');
      var id = $(this).data('id');
      getRow(id); // Ensure this function is defined and works correctly
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
    

    // // Handle delete button click
    // $('.delete').click(function(e){
    //   e.preventDefault();
    //   $('#security_archive').modal('show');
    //   var id = $(this).data('id');
    //   getRow(id);
    // });
    // $('#security-form-archive').submit(function(e) {
    //     e.preventDefault();
    //     const password = $('#security-pass-archive').val();
    //     $.ajax({
    //       url: 'vax_location_security.php',
    //       method: 'POST',
    //       data: { password: password },
    //       success: function(response) {
    //         response = JSON.parse(response);
    //         if(response.result === true) {
    //           $('#security_archive').modal('hide');
    //           $('#delete').modal('show');
    //           getRow(id);
    //         } else {
    //           alert('Incorrect password. Please try again.');
    //           console.log(response.result);
    //         }
    //       },
    //       error: function() {
    //         alert('An error occurred while validating the password. Please try again.');
    //       }
    //     });
    // });
  });

  // Function to get row details
  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'deduction_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('.decid').val(response.id);
        $('#edit_description').val(response.description);
        $('#edit-employeer-contribution').val(response.employeer_contribution);
        $('#edit-employee-contribution').val(response.employee_contribution);
        $('#del_deduction').html(response.description);
        $('#annual_salary_range').html(response.description);
      }
    });
  }
</script>

<!-- WAGE SCRIPT -->
<script>
    $(document).ready(function() {
        $('#apply-wage').click(function() {
          $('#security_wage').modal('show');
          wageSecurityModal();
        });

        function wageFunction(){
            var id = $('#wage-id').val();
            var wage = $('#current-wage').val();
            $.ajax({
                url: 'deduction_wage.php', // Your server-side script to handle the update
                method: 'POST',
                data: { id: id, wage: wage },
                success: function(response) {
                    response = JSON.parse(response);
                    if(response.success) {
                        alert('Wage updated successfully');
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while updating the wage. Please try again.');
                }
            });
          }
          function wageSecurityModal(){
            $('#security-form-edit-wage').submit(function(e) {
                e.preventDefault();
                const password = $('#security-pass-edit-wage').val();

                $.ajax({
                  url: 'vax_location_security.php', // Your server-side validation endpoint
                  method: 'POST',
                  data: { password: password },
                  success: function(response) {
                    response = JSON.parse(response);
                    if(response.result === true) {
                      $('#security_wage').modal('hide');
                      wageFunction();
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
          }
    });
</script>

<!-- INCOME TAX SCRIPT,-->
<script>
  $(function(){
    // Handle tax edit button click
    $('.editTax').click(function(e){
      e.preventDefault();
      $('#security_edit_tax').modal('show');
      var id = $(this).data('id');
      getRowTax(id);
    });
    $('#security-form-edit-tax').submit(function(e) {
        e.preventDefault();
        const password = $('#security-pass-edit-tax').val();
        $.ajax({
          url: 'vax_location_security.php',
          method: 'POST',
          data: { password: password },
          success: function(response) {
            response = JSON.parse(response);
            if(response.result === true) {
              $('#security_edit_tax').modal('hide');
              $('#editTax').modal('show');
              getRow(id);
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

    // Handle tax delete button click
    $('.deleteTax').click(function(e){
      e.preventDefault();
      $('#security_archive').modal('show');
      var id = $(this).data('id');
      getRowTax(id);
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
              $('#deleteTax').modal('show');
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
  });



  // Function to get tax row details
  function getRowTax(id){
    $.ajax({
      type: 'POST',
      url: 'income_tax_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        console.log(response);
        $('#tax-id').val(response.id);
        $('.delete_id').val(response.id);
        $('#edit-first-bracket').val(response.first_bracket);
        $('#edit-second-bracket').val(response.second_bracket);
        $('#edit-tax-rate').val(response.tax_rate);
      }
    });
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var generateButton = document.querySelector('.generate');
    
    generateButton.addEventListener('click', function() {
      const contribution = document.querySelector("input[name='contribution']:checked").value;
      const payroll = document.getElementById('payroll').value;
      fetchData(contribution, payroll);
    });

    function fetchData(contribution, payroll) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'deduction_fetch_data.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
          var response = JSON.parse(xhr.responseText);
          var printableContent = `
            <div style="display:flex;align-items:center;justify-content:center;flex-direction:column;text-align:center">
              <div style="margin-right: 20px;">
                <img src="../images/ewn.png" class="img-responsive" id="ewn-logo" alt="img" style="width: 100px">
              </div>
              <center><h1><b>EWN Manpower Services</b></h1></center>
              <b style="margin-left: 20px;">09396193386<i class="fa fa-phone"></i></b>
              <b style="margin-left: 20px;">ewn@gmail.com <i class="fa fa-envelope-o"></i></b>
              <b style="margin-left: 20px;">Noveleta, Cavite <i class="fa fa-location-arrow"></i></b>
            </div>`;
          printableContent += "<h1>Contribution report</h1>";
          printableContent += "<p>Contribution: " + contribution + "</p>";
          printableContent += "<p>Date range: " + payroll + "</p>";
          printableContent += "<table border=''>";

          let overAll = 0;
          if (contribution === 'sss') {
            printableContent += `
              <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Employee contribution</th>
                <th>Employer contribution</th>
                <th>Total</th>
              </tr>`;
            for (var i = 0; i < response.length; i++) {
              printableContent += "<tr>";
              printableContent += "<td>" + response[i].employee_id + "</td>";
              printableContent += "<td>" + response[i].name + "</td>";
              printableContent += "<td>" + response[i].sss + "</td>";
              printableContent += "<td>" + response[i].sss_employeer + "</td>";
              printableContent += "<td>" + response[i].total + "</td>";
              printableContent += "</tr>";
              overAll += parseFloat(response[i].total);
            }
          } else {
            printableContent += `
              <tr>
                <th>Employee ID</th>
                <th>Name</th>`;
            if (contribution === "pagibig") {
              printableContent += "<th>Employee contribution</th>";
              printableContent += "<th>Employer contribution</th>";
            }
            if (contribution === "philhealth") {
              printableContent += "<th>Employee contribution</th>";
              printableContent += "<th>Employer contribution</th>";
            }
            if (contribution === "income tax") {
              printableContent += "<th>Employee contribution</th>";
            }
            printableContent += "<th>Total</th>";
            printableContent += "</tr>";
            for (var i = 0; i < response.length; i++) {
              printableContent += "<tr>";
              printableContent += "<td>" + response[i].employee_id + "</td>";
              printableContent += "<td>" + response[i].name + "</td>";
              if (contribution === "pagibig") {
                printableContent += "<td>" + response[i].pagibig + "</td>";
                printableContent += "<td>" + response[i].pagibig_employeer + "</td>";
              }
              if (contribution === "philhealth") {
                printableContent += "<td>" + response[i].philhealth + "</td>";
                printableContent += "<td>" + response[i].philhealth_employeer + "</td>";
              }
              if (contribution === "income tax") {
                printableContent += "<td>" + response[i].tin + "</td>";
              }
              printableContent += "<td>" + response[i].total + "</td>";
              printableContent += "</tr>";
              overAll += parseFloat(response[i].total);
            }
          }

          printableContent += "<tr>";
          printableContent += "<th></th>";
          printableContent += "<th></th>";
          printableContent += "<th></th>";
          printableContent += "<th>Total</th>";
          printableContent += "<th>" + parseFloat(overAll).toLocaleString() + "</th>";
          printableContent += "</tr>";
          printableContent += "</table>";
          printableContent += `
            <br><br><br>
            <div style="display:flex;align-items:left;justify-content:left;flex-direction:row;text-align:left">
              <div style="text-align:center">
                <span>Prepared by:</span><br><br>
                <span style="font-size:20px !important"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></span><br>
                <i><?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?></i><br>
              </div>
            </div>`;

          var printWindow = window.open('', '_blank');
          printWindow.document.open();
          printWindow.document.write(`
            <html>
            <head>
              <title>Print</title>
              <style>
                body {
                  font-family: Arial, sans-serif;
                }
                h1 {
                  text-align: center;
                }
                table {
                  width: 100%;
                  border-collapse: collapse;
                  margin: 20px 0;
                }
                table, th, td {
                  border: 1px solid black;
                }
                th, td {
                  padding: 8px;
                  text-align: left;
                }
                th {
                  background-color: #f2f2f2;
                }
              </style>
            </head>
            <body>
              ${printableContent}
            </body>
            </html>`);
          printWindow.document.close();
          printWindow.print();
        }
      };
      xhr.send("contribution=" + contribution + "&payroll=" + payroll);
    }
  });
</script>

</body>
</html>
