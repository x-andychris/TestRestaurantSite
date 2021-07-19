<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['uname']?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <!-- Menu Section -->
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Menu</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="addmenu.php"><i class="fa fa-circle-o"></i> Add Menu</a></li>
          <li><a href="viewmenu.php"><i class="fa fa-circle-o"></i> View Menu</a></li>
        </ul>
      </li>
      <!-- Site Orders Section -->
      <li>
        <a href="foodorders.php">
          <i class="fa fa-files-o"></i> <span>Food Orders</span>
          <small class="label label-primary pull-right">
          <?php 
              $sql ="SELECT * FROM orders where OrderStatus = 'Unconfirmed'";
              $result=$con->prepare($sql);
              $row =$result->execute();
              $length = 0;
              while($rows=$result->fetch(PDO::FETCH_ASSOC)){$length++; }
              echo $length;     
            ?>
          </small>
        </a>
      </li>
      <!-- Contact Messages Section -->
      <li>
        <a href="messages.php">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <small class="label pull-right bg-yellow">
            <?php 
              $sql ="SELECT * FROM messages where Status = 'Unread'";
              $result=$con->prepare($sql);
              $row =$result->execute();
              $length = 0;
              while($rows=$result->fetch(PDO::FETCH_ASSOC)){$length++; }
              echo $length;     
            ?>
          </small>
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>