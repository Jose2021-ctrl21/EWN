<?php session_start(); 
include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    error_reporting(0);
        $username = $_POST['new_username'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        $userId = (int)$_POST['user_id'];

        if($newPassword!=$confirmPassword){
            $_SESSION['error'] = "Password not match";
        }else{
            if(is_numeric($userId)){
                    $updatePasswordQuery = "UPDATE admin SET username = '$username', password = '$newPassword' WHERE id = $userId ";
                    if ($conn->query($updatePasswordQuery)) {
                        $_SESSION['success'] = "Password changed successfully";
                        header("Location: login/index.php");
                        exit();
                    } else {
                        $_SESSION['error'] = "Password change failed. Please try again";
                    }
            } 
            $_SESSION['error'] = "Id is not a number";
        }
    }



$id = $_GET['id'];
$sql_admin = "SELECT * FROM admin WHERE id = $id";
$result_admin = $conn->query($sql_admin);
if ($result_admin->num_rows > 0) {
    while ($row = $result_admin->fetch_assoc()) {
        $username = $row['username'];
        $password = $row['password'];
    }
}



//Display mesages
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
<?php include 'header.php'; ?>
<body class="hold-transition login-page">
<?php include 'admin/includes/head_bar.php'; ?>






<div class="container">
    <div class="p-5 text-center rounded-3 mt-1">
        <h1 class="color-kabarkadogs fw-bold hero-title position-relative display-3">Answer security question</h1>
    </div>
</div>
<div class="login-box">
    <div class="col-lg-12">
        <div class="login-box-body">
        <form class="row g-3" method="post">

                <center><strong><label for="" class="form-label font-weight-bold">Create new password:</label></strong></center>
                <div class="col-12">
                    <label for="new_username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="new_username" name="new_username" value="<?php echo $username ?>" autocomplete="off">
                </div>
                <div class="col-12">

                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_GET['id'] ?>">
                    <label for="new_password" class="form-label">New password:</label>
                    <input type="text" class="form-control" id="new_password" name="new_password" autocomplete="off">
                </div>
                <div class="col-12">
                    <label for="confirm_password" class="form-label">New confirm password:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" autocomplete="off">
                </div>
                
                <div class="col-12">
                  <button type="submit" class="btn btn-kabarkadogs w-100">Submit</button>
                </div>

        </form>
        </div>
    </div>
</div>
	
<?php include 'scripts.php' ?>
</body>
</html>