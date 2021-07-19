
<!DOCTYPE html>
<html>
<?php require_once 'CONNECTIONS/connection.php'?>
<body>




<?php 
    $sql ="SELECT  * FROM menu";
    $result=$con->prepare($sql);
    $row =$result->execute();
    while($rows=$result->fetch(PDO::FETCH_ASSOC)){        
    ?>
        <div class="item col-md-12">
            <div class="food-item">
                <img src="admin/<?php echo $rows['MenuId']?>" alt="">
                <div class="price"><?php echo $rows['Title'];?></div>
                
            </div>
        </div>
<?php }?>

</body>
</html>