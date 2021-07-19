<!-- Holds Information About the Total Orders, Number of items in Menu, Customers and Messages from the contact form-->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>
          <?php 
              $sql ="SELECT * FROM orders";
              $result=$con->prepare($sql);
              $row =$result->execute();
              $length = 0;
              while($rows=$result->fetch(PDO::FETCH_ASSOC)){$length++; }
              echo $length;     
            ?>
        </h3>
        <p>Total Orders</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="foodorders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <!-- Getting number of available meals-->
        <h3>
          <?php 
            $sql ="SELECT * FROM menu";
            $result=$con->prepare($sql);
            $row =$result->execute();
            $length = 0;
            while($rows=$result->fetch(PDO::FETCH_ASSOC)){$length++; }
            echo $length;     
          ?>
        </h3>
        <p>Available Menus</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="viewmenu.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>
        <!-- Checking the orders table for non repeating contact numbers to determine the number of unique customers -->
        <?php 
            $sql ="SELECT * FROM orders GROUP BY CustomerContact";
            $result=$con->prepare($sql);
            $row =$result->execute();
            $length = 0;
            while($rows=$result->fetch(PDO::FETCH_ASSOC)){$length++; }
            echo $length;     
          ?>
        </h3>
        <p>Total Customers</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <!-- Getting number of contact messages-->
        <h3>
          <?php 
            $sql ="SELECT * FROM messages";
            $result=$con->prepare($sql);
            $row =$result->execute();
            $length = 0;
            while($rows=$result->fetch(PDO::FETCH_ASSOC)){$length++; }
            echo $length;     
          ?>
        </h3>
        <p>Contact Messages</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="messages.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div><!-- ./col -->
</div><!-- /.row -->