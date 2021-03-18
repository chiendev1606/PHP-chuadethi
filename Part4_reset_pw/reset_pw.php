<?php 
// khoi tao bien bao loi va bien bao thanh cong
$error   = "";
$success = "";

// phan tich chuoi str duoc gui ve tu reset_pw_process.php qua ham header
// lay chuoi queryString tu mang $_server, chi tiet xem lenh print_r ben duoi

/* echo '<pre>';
print_r($_SERVER);
echo '</pre>'; */

$QueryString = $_SERVER['QUERY_STRING'];

// dung ham Explode de tach chuoi $QueryString ra thanh mang de phan tich chuoi duoc gui ve
$info = explode("=",$QueryString);

// ------ Tien hanh tao thong bao loi va gui mat khau moi cho nguoi dung ---------

// neu info[0] == pwnew tuc la qua trinh change da thanh cong -> gan cho bien success thong bao thanh cong va mk moi
if ($info[0] == "pwnew"){
  $success = "Your current password is ".$info[1];
} else

// neu info[0] == error1 tuc la qua trinh reset da that bai-> gan cho bien error thong bao that bai
if ($info[0] == 'error1') {
  $error = "Username or phonenumber doesn't exist";
}else

// neu info[0] == error2 tuc la qua trinh reset da that bai-> gan cho bien error thong bao that bai
if ($info[0] == 'error2') {
  $error = "Invalid Username or Phonenumber";
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>RESET PASSWORD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
  <div id="wrapper">
  <div class="form-container">
    <h2 class="title">RESET PASSWORD</h2>

<!-- Gui du lieu den trang reset_pw_process.php de xu ly  -->

  <form action="./reset_pw_process.php" method="POST">
  <div class="form-group">
    <label for="">UserName</label>
    <input type="text" class="form-control" name="User_Name"  required>


  </div>
  <div class="form-group">
    <label for="">Phone Number</label>
    <input type="number" class="form-control" name="Phone_Number" required>

  </div>
  
  <div class="form-group">
   <div class="form-group">
   <button type="submit" name="submit" value="submit" class="btn btn-primary">Reset</button>
   <a href="../Part3_login_form/login.php"><button type="button" class="btn btn-warning">Login</button></a>
   <a href="../Part2_registration/registration.php"><button type="button" class="btn btn-danger">Create account</button></a>
   <a href="../Part5_change_pw/change_pw.php"><button type="button" class="btn btn-dark">Change password</button></a>
   
  </div>
  </div>



  </form>
  </div>
  <div class="error"><?php echo $error ?></div>
  <div class="success"><?php echo $success ?></div>

  </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>