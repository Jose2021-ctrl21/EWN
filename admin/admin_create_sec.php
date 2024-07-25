<?php include 'includes/session.php'; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_SESSION['user_id']);
    $secqa = $_POST['secqa'];
    $secAnsA = $_POST['sec-ans-a'];
    $secqb = $_POST['secqb'];
    $secAnsB = $_POST['sec-ans-b'];
    $secqc = $_POST['secqc'];
    $secAnsC = $_POST['sec-ans-c'];

    // All fields are filled and passwords match, proceed with registration
    $sql = "UPDATE admin SET sec_1 = '$secqa', ans_1='$secAnsA', sec_2='$secqb', ans_2='$secAnsB', sec_3='$secqc', ans_3='$secAnsC' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Security question created successfully".$id;
        header("location: admin_create_sec.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to create security question";
    } 
}

$conn->close();
?>





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
        Create security question
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>QA</li>
        <li class="active">QA</li>
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
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
          <div class="box">
            <div class="box-body">
            <form class="row" method="post">
                <center><strong><label for="" class="form-label font-weight-bold">Create security question</label></strong></center>
                <div class="col-sm-12">
                    <!-- <label for="petName" class="form-label">Name of your pet:</label> -->
                    <select class="col-sm-12 form-control" name="secqa">
                        <option value="secq1a">What is the name or your first pet?</option>
                        <option value="secq2a">What was your favorite book when you were a child?</option>
                        <option value="secq3a">What was the name of your favorite childhood toy?</option>
                        <option value="secq4a">What is your favorite sports team?</option>
                    </select>
                    <input type="text" class="form-control" id="sec-ans-a" name="sec-ans-a" placeholder="answer" required>
                </div>
                <div class="col-sm-12">
                    <!-- <label for="motherMiddleName" class="form-label">Your mother's middle name:</label> -->
                    <select class="col-sm-12 form-control" name="secqb">
                        <option value="secq1b">Mother's name</option>
                        <option value="secq2b">Where is your dream vacation destination?</option>
                        <option value="secq3b">Grand mother's name</option>
                        <option value="secq4b">What was the first exam you failed?</option>
                    </select>
                    <input type="text" class="form-control" id="sec-ans-b" name="sec-ans-b" placeholder="answer" required>
                </div>
                <div class="col-sm-12">
                    <!-- <label for="lastDigitPhone" class="form-label">Last digits of your phone number:</label> -->
                    <select class="col-sm-12 form-control" name="secqc">
                        <option value="secq1c">In which city did you have your first job?</option>
                        <option value="secq2c">Who is your favorite movie character of all time?</option>
                        <option value="secq3c">Your lucky number</option>
                        <option value="secq4c">What is your all-time favorite food?</option>
                    </select>
                    <input type="text" class="form-control" id="sec-ans-c" name="sec-ans-c" placeholder="answer" required>
                </div><br><br>
                <div class="col-sm-12">
                  <button type="submit" class="col-md-12 btn btn-primary mb-5">Apply</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4"></div>

      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>


</body>
</html>





