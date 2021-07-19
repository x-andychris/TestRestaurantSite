<?php
session_start();
if($_SESSION['utype']!="Admin"){
header("Location: index.php");
}
else{
 ?>
<!DOCTYPE html>
<html>
  <?php include('header/head.php') ?> 
  <?php require_once '../connections/connection.php'?>
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
            <small>Control panel</small>
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
              <div class="box">
                <!-- Display text and search box -->
                <div class="box-header with-border">
                  <h3 class="box-title">Contact Messages</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" id="messagessearchbox" class="form-control input-sm" placeholder="Search Messages" />
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div>
                  <br>
                  <!-- For Error Messages -->
                  <?php if(isset($_SESSION['errors'])) {?>
                  <div class="alert alert-danger" style="clear: both;margin-top:6px"> 
                    <ul>
                       
                     <?php echo "<li>".$_SESSION['errors']."</li>";
                      unset($_SESSION['errors']);?>
                     
                    </ul>
                  </div>
                  <?php }?>
                  <!-- For Success Message -->
                  <?php if (isset($_SESSION['success'])){ ?>

                  <div class="alert alert-success" style="clear: both;margin-top:6px">
                    <?php echo $_SESSION['success'];  unset($_SESSION['success']);?>

                  </div>
                  <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow:scroll">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Time Sent</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="messagesdisplaytable">
                     <?php 
                        $sql ="SELECT * FROM messages ORDER BY EntryId DESC";
                        $result=$con->prepare($sql);
                        $row =$result->execute();
                        while($rows=$result->fetch(PDO::FETCH_ASSOC)){        
                      ?>
                      <tr>
                        <form enctype="multipart/form-data" action="functions/logics.php" method="post" >
                          <td class="mailbox-star">
                            <!-- Changing Buttons depending on the message status -->
                            <?php if($rows['Status'] == 'Unread') {?>
                              <a href="#"><i class="fa fa-star-o text-yellow"></i></a>
                            <?php }?>
                            <?php if($rows['Status'] == 'Read') {?>
                              <a href="#"><i class="fa fa-star text-yellow"></i></a>
                            <?php }?>
                            <!-- Message Status -->
                            <input type="text" name="currentstatus" value="<?php echo $rows['Status']; ?>" readonly hidden/>
                          </td>
                          <td>
                            <!--Displaying the id in an input and giving it a name so it can be pulled during edit or delete-->
                            <input type="text" value="<?php echo $rows['EntryId']; ?>" style="width:40px" readonly name="MessageId"/>
                          </td>
                          <td><?php echo $rows['Name'] ?></td>
                          <td><?php echo $rows['Email'] ?></td>
                          <td><?php echo $rows['Message'] ?></td>
                          <td><?php echo $rows['DateAdded'] ?></td>
                          <td>
                            <!-- Changing Buttons depending on the message status -->
                            <?php if($rows['Status'] == 'Unread') {?>
                              <button type="submit" name="edit_message_status" class="pull-right btn btn-default" data-toggle="modal" data-target="#editmessagesModal">Mark as Read <i class="fa fa-edit"></i></button>
                            <?php }?>
                            <?php if($rows['Status'] == 'Read') {?>
                              <button type="submit" name="edit_message_status" class="pull-right btn btn-default" data-toggle="modal" data-target="#editmessagesModal">Mark as Un Read <i class="fa fa-edit"></i></button>
                            <?php }?>
                          </td>
                        </form>
                        
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Time Sent</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- Script to filter through the table and return values based on the search parameter -->
                  <script>
                    $(document).ready(function(){
                      $("#messagessearchbox").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#messagesdisplaytable tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                  </script>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

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
<?php } ?>