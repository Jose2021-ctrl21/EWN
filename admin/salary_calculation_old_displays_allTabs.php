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
        Earnings
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Earnings</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          $locationId = '';
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
      <?php
       $sql = "SELECT COUNT(*) AS total_location FROM location";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
             $total_locations = $row["total_location"];
           }
       } else {
           echo "0 results";
       }
       // Close connection
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <?php for($i = 1; $i <= $total_locations; $i++) {
                    // Fetch location name from the database based on $i
                    $sql_location = "SELECT assigned_location FROM location WHERE id = $i";
                    $result_location = $conn->query($sql_location);
                    if ($result_location->num_rows > 0) {
                        $row_location = $result_location->fetch_assoc();
                        $location_name = $row_location["assigned_location"];
                    } else {
                        $location_name = "Unknown Location";
                    }
                ?>
                  <li role="presentation" <?php echo ($i === 1) ? 'class="active"' : ''; ?>>
                    <a href="#location<?php echo $i; ?>" aria-controls="location<?php echo $i; ?>" role="tab" data-toggle="tab"><?php echo $location_name; ?></a>
                  </li>
                <?php } ?>
              </ul>
              <div class="box-header with-border bg-dark">
              <div class="row">
                  <!-- <div class="col-md-6">
                      <form action="salary_calculation_add.php" method="post">
                          <input type="hidden" name="ref-id" id="ref-id" value="
                          <?php 
                          // echo $i 
                          ?>">
                          <input type="submit" class="btn btn-primary btn-sm btn-flat" name="ref-submit" value="refresh">
                      </form>
                  </div> -->
                  <div class="col-md-6">
                      <a href="#total" data-toggle="modal" class="btn btn-warning btn-sm btn-flat">
                          <i class="fa fa-calculator"></i>Total
                      </a>
                  </div>
              </div>
          </div>

              <!-- Tab panes -->
              <div class="tab-content">
                <?php
                $i = 1;
                for($i = 1; $i <= $total_locations; $i++) { ?>
                  <div role="tabpanel" class="tab-pane <?php echo ($i === 1) ? 'active' : ''; ?> tabtab" id="location<?php echo $i; ?>" data-tab-id="<?php echo $i; ?>">
                    <table id="example<?php echo $i; ?>" class="table table-bordered">
                      <thead>
                        <th>Date hatch</th>
                        <th>Total DOC</th>
                        <th>Incentives rate</th>
                        <th>Incentives value</th>
                        <th>Xtra meal allowance</th>
                        <th>Meal allowance</th>
                        <th>Transportation</th>
                        <th>No. of EWN crew</th>
                        <th>Total cost</th>
                        <th>Toos</th>
                      </thead>
                      <tbody>
                        <?php
                          $sql = "SELECT *,
                          COUNT(DISTINCT efl.employee_id) AS crews,
                          SUM(efl.meal_allowance) AS meal_allowance,
                          SUM(efl.adjustments) AS adjustments,
                          SUM(efl.transportation) AS transportation,
	                        location.doc AS doc,
                          efl.incentives_value AS incentives_value,
                          efl.date AS date
                          FROM employee_financial_list AS efl
                          LEFT JOIN ass_sched_fin ON ass_sched_fin.ass_schedule = efl.date
	                        LEFT JOIN location ON efl.location_id = location.id
                          WHERE efl.location_id = '$i'";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                        ?>
                          <tr>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo number_format((float)$row['doc'],2)?></td>
                            <td><?php echo number_format((float)$row['incentives_value'],2)?></td>
                            <td>
                              <?= $row['crews'] != 0 ? number_format((float)$row['incentives_value'] / $row['crews'], 2) : "N/A" ?>
                            </td>
                            <td><?php echo number_format((float)$row['adjustments'],2)?></td>
                            <td><?php echo number_format((float)$row['meal_allowance'],2); ?></td>
                            <td><?php echo number_format((float)$row['transportation'],2); ?></td>
                            <td><?php echo $row['crews']; ?></td>
                            <td><?php echo number_format(((float)$row['meal_allowance'] + (float)$row['incentives_value']),2); ?></td>
                            <td>
                                <!-- <button class='btn btn-success btn-sm edit btn-flat' data-id='<?php echo $row['id']; ?>'>
                                    <i class='fa fa-calculator'></i> edit
                                </button> -->
                                <button class='btn btn-danger btn-sm delete btn-flat' data-id='<?php echo $row['id']; ?>'>
                                    <i class='fa fa-trash'></i> Delete
                                </button>
                          </td>
                          </tr>
                          <?php
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>
                <?php 
                } 
                ?>
              </div>
            </div>
          </div>
        </div>
        <!-- col-xs-6 -->
      </div>
    </section>   
  </div>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/salary_calculation_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
  $('.nav-tabs a').click(function(){
    var tabPaneId = $(this).attr('href');
    var tabPaneValue = $(tabPaneId).data('tab-id');
    getRow(tabPaneValue);
    // console.log(tabPaneValue);
  });

  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});


//edit
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'salary_calculation_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      // Update modal content
      $('#add-doc').val(response.doc);
      $('#add-incentives').val(response.incent);
      $('#add-salary').val(response.ass_salary);
      $('#add-crew').val(response.crew_numbers);
      $('#add-locid').val(response.add_loc_id);
      $('#com-loc-id').val(response.add_loc_id);
      $('#ref-id').val(response.add_loc_id);
      $('#del-salary-locid').val(response.id);
      $('#del_salary_calculation').html(response.incentives);
    },
    error: function(xhr, status, error) {
      // Handle errors
      console.error(xhr.responseText);
      alert("An error occurred while fetching data.");
    }
  });
}
</script>

</body>
</html>
