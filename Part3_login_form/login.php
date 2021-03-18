


<?php
// ghep file validate_login.php de validate va xu ly du lieu
// tat ca cac bien deu chua trong file validate_login.php
 

require_once "./validate_login.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
  <div id="wrapper">
  <div class="form-container">
    <h2 class="title">LOGIN !!</h2>
  <form action="#" method="POST">
  <div class="form-group">
    <label for="">UserName</label>
    <input type="text" class="form-control" name="User_Name"  required>


  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="Password" required>

  </div>
  
  <div class="form-group">
   <div class="form-group">
   <button type="submit" name="submit" value="submit" class="btn btn-primary">Sign in</button>
   <a href="../Part5_change_pw/change_pw.php"><button type="button" class="btn btn-warning">Change Password</button></a>
   <a href="../Part2_registration/registration.php"><button type="button" class="btn btn-danger">Create account</button></a>
   <a href="../Part4_reset_pw/reset_pw.php"><button type="button" class="btn btn-dark">Reset password</button></a>
  </div>
  </div>



  </form>
  </div>

   <!-- Neu co loi thi hien thi ra loi -->
  <div class="error"><?php echo $error ?></div>

  </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>