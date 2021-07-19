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
                <div class="box-header">
                  <h3 class="box-title">Menu List</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" id="menusearchbox" class="form-control input-sm" placeholder="Search Menu" />
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div>
                  <br/>
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
                        <th>ID</th>
                        <th>Meal </th>
                        <th>Price</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Last Update</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody id="menudisplaytable">
                     <?php 
                        $sql ="SELECT * FROM menu";
                        $result=$con->prepare($sql);
                        $row =$result->execute();
                        while($rows=$result->fetch(PDO::FETCH_ASSOC)){        
                      ?>
                      <tr>
                        <form enctype="multipart/form-data" action="functions/logics.php" method="post" onsubmit="return confirm('You\'re about deleting \'<?php echo $rows['Title'] ?>\' from the menu\nContinue?')">
                          <td>
                            <!--Displaying the id in an input and giving it a name so it can be pulled during edit or delete-->
                            <input type="text" value="<?php echo $rows['MenuId']; ?>" style="width:40px" readonly name="MenuId"/>
                          </td>
                          <td><?php echo $rows['Title'] ?></td>
                          <td>$<?php echo $rows['Price'] ?></td>
                          <td><img height="150" width="200" src='../IMAGES/<?php echo $rows["Image"];?>'  /></td>
                          <td><?php echo $rows['Description'] ?></td>
                          <td><?php echo $rows['LastUpdate'] ?></td>
                          <td>
                            <button type="button" onclick="populateEditModal('<?php echo $rows['MenuId'];?>','<?php echo $rows['Title'] ?>','<?php echo $rows['Price'] ?>','<?php echo $rows['Image'] ?>','<?php echo $rows['Description'] ?>')" class="pull-right btn btn-default" data-toggle="modal" data-target="#editmenuModal">Edit <i class="fa fa-edit"></i></button>
                          </td>
                          <td>
                            <button type="submit" name="delete_menu" class="pull-right btn btn-default">Delete <i class="fa fa-remove"></i></button>
                          </td>
                        </form>
                        
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Meal </th>
                        <th>Price</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Last Update</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- Script to populate the Edit Menu Modal with corresponding values from the meal selected -->
                  <script>
                    function populateEditModal(id,meal,price,photo,text){
                      document.getElementById("menuModalId").value = id;
                      document.getElementById("menuModalMeal").value = meal;
                      document.getElementById("menuModalPrice").value = price;
                      // document.getElementById("menuModalPhoto").innerHTML = photo;
                      document.getElementById("menuModalPhoto2").value = photo;
                      document.getElementById("menuModalDescription").value = text;
                    }
                  </script>
                  <!-- Script to filter through the table and return values based on the search parameter -->
                  <script>
                    $(document).ready(function(){
                      $("#menusearchbox").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#menudisplaytable tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                  </script>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <!-- Including the modal for user edit -->
            <?php include('modals/editmenu.php');?>
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