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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- custom css and fontawesome links -->
        <link rel="stylesheet" href="FONTAWESOME/all.php">
        <link rel="stylesheet" href="CSS/style.php">
        <link rel="stylesheet" href="CSS/newstyle.css">
        <link rel="stylesheet" href="CSS/cartstyling.css">
        <!-- custom google fonts -->
        <link rel="stylesheet" href="GOOGLE FONTS/fonts.css">
        <script src="BOOTSTRAP/js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="BOOTSTRAP/js/bootstrap.min.js" type="text/javascript"></script>
        <title>TFP | Cart</title>
    </head>
    <?php require_once 'CONNECTIONS/connection.php'?>
    <body>
        <div class="wrap cf">
            <h1 class="projTitle">Responsive Table<span>-Less</span> Shopping Cart</h1>
            <div class="heading cf">
                <h1>My Cart</h1>
                <a href="#" class="continue">Continue Shopping</a>
            </div>
            <div class="cart">
            <!--<ul class="tableHead">
                <li class="prodHeader">Product</li>
                <li>Quantity</li>
                <li>Total</li>
                <li>Remove</li>
                </ul>-->
                <ul class="cartWrap">
                    <!-- First Cart Item -->
                    <li class="items odd">
                        <div class="infoWrap"> 
                            <div class="cartSection">
                                <img src="http://lorempixel.com/output/technics-q-c-300-300-4.jpg" alt="" class="itemImg" />
                                <p class="itemNumber">#QUE-007544-002</p>
                                <h3>Item Name 1</h3>
                                
                                <p> <input type="text"  class="qty" placeholder="3"/> x $5.00</p>
                                
                                <p class="stockStatus"> In Stock</p>
                            </div>  
                            <div class="prodTotal cartSection">
                                <p>$15.00</p>
                            </div>
                            <div class="cartSection removeWrap">
                                <a href="#" class="remove">x</a>
                            </div>
                        </div>
                    </li>
                    <!-- Second Cart Item -->
                    <li class="items even">
                        <div class="infoWrap"> 
                            <div class="cartSection">
                                <img src="http://lorempixel.com/output/technics-q-c-300-300-4.jpg" alt="" class="itemImg" />
                                <p class="itemNumber">#QUE-007544-002</p>
                                <h3>Item Name 1</h3>
                                <p> <input type="text"  class="qty" placeholder="3"/> x $5.00</p>
                                <p class="stockStatus"> In Stock</p>
                            </div>  
                            
                            <div class="prodTotal cartSection">
                                <p>$15.00</p>
                            </div>

                            <div class="cartSection removeWrap">
                                <a href="#" class="remove">x</a>
                            </div>
                        </div>
                    </li>
                    <!-- Third Cart Item -->
                    <li class="items odd">
                        <div class="infoWrap"> 
                            <div class="cartSection">
                                
                            <img src="http://lorempixel.com/output/technics-q-c-300-300-4.jpg" alt="" class="itemImg" />
                            <p class="itemNumber">#QUE-007544-002</p>
                            <h3>Item Name 1</h3>
                            
                            <p> <input type="text"  class="qty" placeholder="3"/> x $5.00</p>
                            
                            <p class="stockStatus out"> Out of Stock</p>
                            </div>  
                            <div class="prodTotal cartSection">
                                <p>$15.00</p>
                            </div>
                            <div class="cartSection removeWrap">
                                <a href="#" class="remove">x</a>
                            </div>
                        </div>
                    </li>
                    <!-- Fourth Cart Item -->
                    <li class="items even">
                        <div class="infoWrap"> 
                            <div class="cartSection info">
                                <img src="http://lorempixel.com/output/technics-q-c-300-300-4.jpg" alt="" class="itemImg" />
                                <p class="itemNumber">#QUE-007544-002</p>
                                <h3>Item Name 1</h3>
                                
                                <p> <input type="text"  class="qty" placeholder="3"/> x $5.00</p>
                                
                                <p class="stockStatus"> In Stock</p>
                            </div>  
                            <div class="prodTotal cartSection">
                                <p>$15.00</p>
                            </div>
                        
                            <div class="cartSection removeWrap">
                                <a href="#" class="remove">x</a>
                            </div>
                        </div>
                        <div class="special"><div class="specialContent">Free gift with purchase!, gift wrap, etc!!</div></div>
                    </li>
                    <!--<li class="items even">Item 2</li>-->
                </ul>
            </div>
            
            <!-- Promo Code section -->
            <div class="promoCode">
                <label for="promo">Have A Promo Code?</label>
                <input type="text" name="promo" placholder="Enter Code" />
                <a href="#" class="btn"></a></div>
            
                <div class="subtotal cf">
                    <ul>
                        <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>
                        <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>
                        <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li>
                        <li class="totalRow final"><span class="label">Total</span><span class="value">$44.00</span></li>
                        <li class="totalRow"><a href="#" class="btn continue">Checkout</a></li>
                    </ul>
                </div>
            </div>

        <script>
            // Remove Items From Cart
            $('a.remove').click(function(){
            event.preventDefault();
            $( this ).parent().parent().parent().hide( 400 );
            
            })

            // Just for testing, show all items
            $('a.btn.continue').click(function(){
                $('li.items').show(400);
            })
        </script>
    </body>
</html>
<?php } ?>