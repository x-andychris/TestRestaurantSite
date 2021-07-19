<?php
session_start();
if(isset($_SESSION['utype']) && $_SESSION['utype']!="admin"){
header("Location: ../login.php");
}
else{
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>AdminLTE 2 | Login</title>
    <link rel="stylesheet" type="text/css" href="../css/newstyle.css">
    <link rel="stylesheet" type="text/css" href="../BOOTSTRAP/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../BOOTSTRAP/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="dist/css/loginpage.css">
    <script src="../BOOTSTRAP/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="../BOOTSTRAP/js/bootstrap.min.js" type="text/javascript"></script>
  </head>
  <?php require_once '../CONNECTIONS/connection.php'?>
  <body class="skin-blue sidebar-mini">
  <div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                ADMIN PANEL
            </div>

            <div class="col-lg-12 login-form">
                  <?php if(isset($_SESSION['errors'])) {?>
                  <div class="alert alert-danger"> 
                    <ul>
                       
                     <?php echo "<li>".$_SESSION['errors']."</li>";
                      unset($_SESSION['errors']);?>
                     
                    </ul>
                  
                  </div>
                  <?php }?>
                <div class="col-lg-12 login-form">
                    <form enctype="multipart/form-data" action="functions/logics.php" method="post">
                        <div class="form-group">
                            <label class="form-control-label">USERNAME</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">PASSWORD</label>
                            <input type="password" class="form-control" name="password" required i>
                        </div>

                        <div class="col-lg-12 loginbttm">
                            <div class="col-lg-6 login-btm login-text">
                                <!-- Error Message -->
                            </div>
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit" name="login" class="btn btn-outline-primary">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
  </body>
</html>
<?php }?>