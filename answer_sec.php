<?php session_start(); 
include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  error_reporting(0);


  
  $secqa = $_POST['secqa'];
  $secAnsA = $_POST['sec-ans-a'];
  $secqb = $_POST['secqb'];
  $secAnsB = $_POST['sec-ans-b'];
  $secqc = $_POST['secqc'];
  $secAnsC = $_POST['sec-ans-c'];
  // echo "$secqa<br>$secAnsA<br>$secqb<br>$secAnsB<br>$secqc<br>$secAnsC<br>";
  //query
  $checkqaQuery = "SELECT id FROM admin
  WHERE sec_1 = '$secqa' AND ans_1 = '$secAnsA' AND
  sec_2 = '$secqb' AND ans_2 = '$secAnsB' AND
  sec_3 = '$secqc' AND ans_3 = '$secAnsC'";
  $result = $conn->query($checkqaQuery);

  if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      // echo "$secqa<br>$secAnsA<br>$secqb<br>$secAnsB<br>$secqc<br>$secAnsC<br>";
      $id = $row['id'];
      header("Location: create_new_pass_admin.php?id=".$id);

  } else {    
      $_SESSION['message'] = "No user found. Please carefully check your answers";
  }
     
  //For message
  if (isset($_SESSION['message'])) {
      echo "<div class='alert alert-danger' role='alert'>".$_SESSION['message']."</div>";
      unset($_SESSION['message']);
  }

    $conn->close();
  }

?>
<?php include 'header.php'; ?>
<body class="hold-transition login-page">
<?php include 'admin/includes/head_bar.php'; ?>






<div class="container">
    <div class="p-5 text-center rounded-3 mt-1">
        <h1 class="color-kabarkadogs fw-bold hero-title position-relative display-3">Please answer your security questions to recover your account</h1>
    </div>
</div>
<div class="login-box">
    <div class="col-lg-12">
        <div class="login-box-body">
            <form class="row g-3" method="post">         
            <center>
              <strong>
              <label for="" class="form-label font-weight-bold">
                Answer security question
              </label>
              <!-- <p><i>Enter your username before proceeding to security question</i></p> -->
              </strong>
            </center>
            <div class="col-3">
                  <!-- <label for="petName" class="form-label">Name of your pet:</label> -->
                  <select class="col-12 form-control mb-5" name="secqa">
                      <option value="secq1a">What is the name or your first pet?</option>
                      <option value="secq2a">What was your favorite book when you were a child?</option>
                      <option value="secq3a">What was the name of your favorite childhood toy?</option>
                      <option value="secq4a">What is your favorite sports team?</option>
                  </select>
                  <input type="text" class="form-control" id="sec-ans-a" name="sec-ans-a" placeholder="answer" required>
              </div>
              <div class="col-3">
                  <!-- <label for="motherMiddleName" class="form-label">Your mother's middle name:</label> -->
                  <select class="col-12 form-control mb-5" name="secqb">
                      <option value="secq1b">Mother's name</option>
                      <option value="secq2b">Where is your dream vacation destination?</option>
                      <option value="secq3b">Grand mother's name</option>
                      <option value="secq4b">What was the first exam you failed?</option>
                  </select>
                  <input type="text" class="form-control" id="sec-ans-b" name="sec-ans-b" placeholder="answer" required>
              </div>
              <div class="col-3">
                  <!-- <label for="lastDigitPhone" class="form-label">Last digits of your phone number:</label> -->
                  <select class="col-12 form-control mb-5" name="secqc">
                      <option value="secq1c">In which city did you have your first job?</option>
                      <option value="secq2c">Who is your favorite movie character of all time?</option>
                      <option value="secq3c">Your lucky number</option>
                      <option value="secq4c">What is your all-time favorite food?</option>
                  </select>
                  <input type="text" class="form-control" id="sec-ans-c" name="sec-ans-c" placeholder="answer" required>
              </div><br>
              <div class="col-3 mt-5">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
              </div>
            </form>
        </div>
    </div>
</div>
	
<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
    
});
</script>
</body>
</html>