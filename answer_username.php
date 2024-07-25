<?php session_start(); 
include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  error_reporting(0);
  
  $username = $_POST['username'];

  // echo "$secqa<br>$secAnsA<br>$secqb<br>$secAnsB<br>$secqc<br>$secAnsC<br>";
  //query
  $checkqaQuery = "SELECT id FROM admin
  WHERE username = '$username'";
  $result = $conn->query($checkqaQuery);

  if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      // echo "$secqa<br>$secAnsA<br>$secqb<br>$secAnsB<br>$secqc<br>$secAnsC<br>";
      $id = $row['id'];
      header("Location: answer_sec.php?id=".$id);

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
        <h1 class="color-kabarkadogs fw-bold hero-title position-relative display-3">Enter your username before proceeding to security question</h1>
    </div>
</div>
<div class="login-box">
    <div class="col-lg-12">
        <div class="login-box-body">
            <form class="row g-3" method="post">         
            <center>
              <strong>
              <label for="" class="form-label font-weight-bold">
                Enter username
              </label>
              </strong>
            </center>
            <div class="col-3">
                  <input type="text" class="form-control" id="username" name="username" placeholder="answer" required>
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