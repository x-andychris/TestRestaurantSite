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
                  <h3 class="box-title">Food Orders</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" id="orderssearchbox" class="form-control input-sm" placeholder="Search Messages" />
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
                  <table class="table table-bordered table-striped" >
                    <thead>
                      <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Customer Name </th>
                        <th>Contact Number</th>
                        <th>Package Ordered</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Date Placed</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="ordersdisplaytable">
                     <?php 
                        $sql ="SELECT * FROM orders";
                        $result=$con->prepare($sql);
                        $row =$result->execute();
                        while($rows=$result->fetch(PDO::FETCH_ASSOC)){        
                      ?>
                      <tr>
                        <form enctype="multipart/form-data" action="functions/logics.php" method="post" >
                          <td class="mailbox-star">
                            <!-- Changing Buttons depending on the message status -->
                            <?php if($rows['OrderStatus'] == 'Unconfirmed') {?>
                              <a href="#"><i class="fa fa-star-o text-yellow"></i></a>
                            <?php }?>
                            <?php if($rows['OrderStatus'] == 'Confirmed') {?>
                              <a href="#"><i class="fa fa-star text-yellow"></i></a>
                            <?php }?>
                          </td>
                          <td>
                            <!--Displaying the id in an input and giving it a name so it can be pulled during edit or delete-->
                            <input type="text" value="<?php echo $rows['EntryId']; ?>" style="width:40px" readonly name="MessageId"/>
                          </td>
                          <td><?php echo $rows['CustomerName'] ?></td>
                          <td><?php echo $rows['CustomerContact'] ?></td>
                          <td><?php echo $rows['MenuTitle'] ?></td>
                          <td><?php echo $rows['Quantity'] ?></td>
                          <td>$<?php echo $rows['TotalPrice'] ?></td>
                          <td><?php echo $rows['OrderStatus'] ?></td>
                          <td><?php echo $rows['DateAdded'] ?></td>
                          <td>
                            <button type="button" onclick="populateEditModal('<?php echo $rows['EntryId']; ?>','<?php echo $rows['MenuTitle']; ?>','<?php echo $rows['Quantity']; ?>','<?php echo $rows['TotalPrice']; ?>','<?php echo $rows['OrderStatus']; ?>','<?php echo $rows['DateAdded']; ?>')" class="pull-right btn btn-default" data-toggle="modal" data-target="#editorderstatusModal"> Manage <i class="fa fa-edit"></i></button>
                          </td>
                        </form>
                        
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Customer Name </th>
                        <th>Contact Number</th>
                        <th>Package Ordered</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Date Placed</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                  <!-- Script to populate the Edit Order Status Modal with corresponding values from the Order selected -->
                  <script>
                    function populateEditModal(id,meal,quantity,tprice,status,date){
                        document.getElementById("orderModalId").value = id;
                        document.getElementById("orderModalIdDisp").innerHTML = id;
                        document.getElementById("orderModalMeal").value = meal;
                        document.getElementById("orderModalQuantity").value = quantity;
                        document.getElementById("orderModalTPrice").value = "$" + tprice;
                        document.getElementById("orderModalStatus").value = status;
                        document.getElementById("orderModalDate").value = date;

                        if (String(status) == "Unconfirmed"){
                        document.getElementById("unconfirmOrderbtn").disabled = true;
                        document.getElementById("confirmOrderbtn").disabled = false;
                        }else if (String(status) == "Confirmed"){
                        document.getElementById("confirmOrderbtn").disabled = true;
                        document.getElementById("unconfirmOrderbtn").disabled = false;
                        }
                    }
                  </script>
                  <!-- Script to filter through the table and return values based on the search parameter -->
                  <script>
                    $(document).ready(function(){
                      $("#orderssearchbox").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#ordersdisplaytable tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                  </script>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <!-- Including the modal for Food order status edit -->
            <?php include('modals/editorderstatus.php');?>
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