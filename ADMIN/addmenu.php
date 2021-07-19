<?php
session_start();
if($_SESSION['utype']!="Admin"){
header("Location: index.php");
}
else{
 ?>
<!DOCTYPE html>
<html>
  <?php include('header/head.php');  ?> 
  <?php require_once '../CONNECTIONS/connection.php'?>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include('nav/header.php'); ?>
      <?php include('nav/sidenav.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel Admin</small>
            <!-- <small>Control panel <?php echo $_SESSION['utype']; ?></small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <?php include('nav/box.php');?>
          <!-- Main row -->
          <div class="row" style="width:80%; margin: auto">
            <!-- Left col -->
            <section  class="col-lg-12  connectedSortable">
            
              <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Add Menu</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <?php if(isset($_SESSION['errors'])) {?>
                  <div class="alert alert-danger"> 
                    <ul>
                       
                     <?php echo "<li>".$_SESSION['errors']."</li>";
                      unset($_SESSION['errors']);?>
                     
                    </ul>
                  
                  </div>
                  <?php }?>
                  <?php if (isset($_SESSION['success'])){ ?>

                  <div class="alert alert-success">
                    <?php echo $_SESSION['success'];  unset($_SESSION['success']);?>

                  </div>
                  <?php } ?>
                  <form enctype="multipart/form-data" action="functions/logics.php" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" name="meal" placeholder="Meal:" />
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="price" placeholder="Price:" />
                    </div>
                    <div class="form-group">
                      <input type="file" class="form-control" name="photo" />
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"></textarea>
                    </div>
                    <div class="box-footer clearfix">
                  <button type="submit" name="add_menu" class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                   </div>
                  </form>
                </div>
                
              </div>

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2021 <a href="#">Tivanni Food Palace</a>.</strong> All rights reserved.
      </footer>

     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <?php include('footer/foot.php') ?>
  </body>
</html>
<?php }?>