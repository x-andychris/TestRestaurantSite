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
        <script src="BOOTSTRAP/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="BOOTSTRAP/js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <title>TFP | Cart</title>
    </head>
    <?php require_once 'CONNECTIONS/connection.php'?>
    <body>
        <!-- NAVBAR -->
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="brand-and-toggler">
                    <a href="index.htm" class="navbar-brand">
                        <img src="IMAGES/logo.png" alt="logo" srcset="">
                        <h3>Tivanni Food Palace</h3>
                    </a>
                    <button type = "button" id = "navbar-toggler">
                        <i class="fas fa-bars    "></i>
                    </button>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <li><a href="">Home</a></li>
                        <li><a href="#about">about us</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#openings">Openings</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#team">Team</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->
        <!-- CART SECTION -->
        <div class="wrap cf">
            <div class="heading cf">
                <h1>My Cart</h1>
                <a href="index.php#menu" class="continue">Continue Shopping</a>
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
                                
                                <p>
                                    <input type="number" class="qty" value="1" style="width: 5em;caret-color: transparent;" min="1"/>
                                    <span>x $5.00</span>
                                </p>
                                
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
                                <p>
                                    <input type="number" class="qty" value="1" style="width: 5em;caret-color: transparent;" min="1"/>
                                    <span>x $5.00</span>
                                </p>
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
                            
                            <p>
                                <input type="number" class="qty" value="1" style="width: 5em;caret-color: transparent;" min="1"/>
                                <span>x $5.00</span>
                            </p>
                            
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
                                
                                <p>
                                    <input type="number" class="qty" value="1" style="width: 5em;caret-color: transparent;" min="1"/>
                                    <span>x $5.00</span>
                                </p>

                                <p class="stockStatus"> In Stock</p>
                            </div>  
                            <div class="prodTotal cartSection">
                                <p>$15.00</p>
                            </div>
                        
                            <div class="cartSection removeWrap">
                                <a href="#" class="remove">x</a>
                            </div>
                        </div>
                        <!-- <div class="special"><div class="specialContent">Free gift with purchase!, gift wrap, etc!!</div></div> -->
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
        </div>
        <!-- END OF CART SECTION -->
        <!-- FOOTER -->
        <footer>
            <p class="text">Copyright &copy; TFP Restaurant Website 2021. Daeva Royale Design</p>
        </footer>
        <!-- END OF FOOTER -->
        <script>
            // Remove Items From Cart
            $('a.remove').click(function(){
                event.preventDefault();
                if(confirm("Are you sure you want to remove this item?")){
                $( this ).parent().parent().parent().hide( 400 );
                }
                else{
                    return false;
                }
            
            })

            // disable typing in the quantity input fields
            $("input.qty").keypress(function(){
                event.preventDefault();
            });

            // Just for testing, show all items
            $('a.btn.continue').click(function(){
                //$('li.items').show(400);
            })
        </script>
    </body>
</html>
<?php } ?>