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
        <link rel="stylesheet" href="CSS/modalstyling.css">
        <!-- <link rel="stylesheet" type="text/css" href="BOOTSTRAP/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="BOOTSTRAP/css/jquery-ui.css"> -->
        <!-- custom google fonts -->
        <link rel="stylesheet" href="GOOGLE FONTS/fonts.css">
        <script src="BOOTSTRAP/js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="BOOTSTRAP/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <title>TFP | Cart</title>
        <script>
            var cart = [];
            var cartdetails = [];
            var userinfo = [];
            $(function () {
                if (localStorage.cart)
                {
                    cart = JSON.parse(localStorage.cart);
                    cartdetails = JSON.parse(localStorage.cartdetails);
                    showCart();
                    showTotalCost();
                }
            });

            function updateitemcount(itemid,quantity){
                cart[parseInt(itemid)].Quantity = parseInt(quantity);
                cart[parseInt(itemid)].TotalPrice = cart[parseInt(itemid)].Price * cart[parseInt(itemid)].Quantity;
                saveCart();
                showCart();
                showTotalCost();
            }
            
            // var ccc = { SubTotal: 0, DeliveryCost: 1000, Tax: 55, Total: 1055};
            // cartdetails.push(ccc);

            function showTotalCost(){
                updatetotalcost();
                var subtotal = cartdetails[0].SubTotal;
                var deliverycost = cartdetails[0].DeliveryCost;
                var tax = cartdetails[0].Tax;
                var total = cartdetails[0].Total;
                
                document.getElementById("Subtotal").innerHTML = "$" + subtotal + ".00";
                document.getElementById("DeliveryCost").innerHTML = "$" + deliverycost + ".00";
                document.getElementById("Tax").innerHTML = "$" + tax + ".00";
                document.getElementById("Total").innerHTML = "$" + total + ".00";
            }

            function updatetotalcost(){
                var subtotal = 0;
                var deliverycost = 0;
                var tax = 0;
                var total = 0;
                // getting total from the cart
                for (var i in cart) {
                    subtotal += parseInt(cart[i].TotalPrice);
                }
                cartdetails[0].SubTotal = subtotal;
                cartdetails[0].Total = parseInt(cartdetails[0].SubTotal) + parseInt(cartdetails[0].DeliveryCost) + parseInt(cartdetails[0].Tax)
            }

            function deletefromcart(itemid, title){
                // confirming the delete action
                if(confirm("You are about removing " + title + " from the cart.")){
                    cart.splice(itemid, 1);
                    saveCart();
                    showCart();
                }
            }

            function saveCart() {
                if (window.localStorage)
                {
                    localStorage.cart = JSON.stringify(cart);
                    localStorage.cartdetails = JSON.stringify(cartdetails);
                }
            }

            function showCart() {
                if (cart.length == 0) {
                    $("#cart").css("visibility", "hidden");
                    return;
                }

                $("#cart").css("visibility", "visible");
                $("#cartBody").empty();
                var count = 0
                for (var i in cart) {
                    var item = cart[i];
                    var row = "<li class=\"items odd\">" +
                                    "<div class=\"infoWrap\">" +
                                        "<div class=\"cartSection\">" +
                                            "<input type=\"text\" value=\"" + item.MenuId +"\" readonly hidden name=\"MenuId\"/>" +
                                            "<img src=\"IMAGES/" + item.Image + "\" alt=\"\" class=\"itemImg\" style=\"height:100px;width:150px\" />" +
                                            "<p class=\"itemNumber\">#ORD-007544-0" + item.MenuId + "</p>" +
                                            "<h3>" + item.Menu +"</h3>" +
                                            
                                            "<p>" +
                                                "<input type=\"number\" onchange=\"updateitemcount(" + count + ",this.value)\" class=\"qty\" value=\"" + item.Quantity +"\" style=\"width: 5em;caret-color: transparent;\" min=\"1\"/>" +
                                                "<span>x $" + item.Price +"</span>" +
                                            "</p>" +
                                            
                                            "<p class=\"stockStatus\"> In Stock</p>" +
                                        "</div>" +
                                        "<div class=\"prodTotal cartSection\">" +
                                            "<p>$" + item.TotalPrice +"</p>" +
                                        "</div>" +
                                        "<div class=\"cartSection removeWrap\">" +
                                            "<a href=\"\" class=\"remove\" onclick=\"deletefromcart(" + count + ",'" + item.Menu + "')\">x</a>" +
                                        "</div>" +
                                    "</div>" +
                                "</li>";
                    $("#cartBody").append(row);
                    count++;
                }
            }

            function validateuser(){
                var fullname = document.getElementById("userFullName").value;
                var phoneno = document.getElementById("userContactNumber").value;
                if (fullname.length >= 3 && phoneno.length == 11){
                    userinfo.push(fullname);
                    userinfo.push(phoneno);
                    checkoutitems();
                }else{
                    alert("Fill in the fields properly");
                }
            }

            // posting the cart items to the php file to insert into database
            function checkoutitems(){
                var sendData = function() {
                    $.post('ADMIN/functions/logics.php', {
                        cart_checkout: cart,
                        user_info: userinfo
                    }, function(response) {
                        console.log(response);
                        alert(response);
                        if(String(response) != "An error occured while placing order"){
                            clearCart();
                            window.location.reload();
                        }
                    });
                }
                // calling the send data method when the cart array isnt empty
                if (cart.length >= 1){sendData();}
                else{alert("Cart is empty!");}
                
            }

            function clearCart() {
                var cart = [];
                var cartdetails = [];
                var detail = { SubTotal: 0, DeliveryCost: 0, Tax: 0, Total: 0};
                cartdetails.push(detail);
                if ( window.localStorage)
                {
                    localStorage.cart = JSON.stringify(cart);
                    localStorage.cartdetails = JSON.stringify(cartdetails);
                }
            }

        </script>
    </head>
    <?php require_once 'CONNECTIONS/connection.php'?>
    <body>
        <!-- NAVBAR -->
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="brand-and-toggler">
                    <a href="index.php" class="navbar-brand">
                        <img src="IMAGES/logo.png" alt="logo" srcset="">
                        <h3>Tivanni Food Palace</h3>
                    </a>
                    <button type = "button" id = "navbar-toggler">
                        <i class="fas fa-bars    "></i>
                    </button>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <li><a href="index.php">Home</a></li>
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
            <div class="cart" id="cart">
            <!--<ul class="tableHead">
                <li class="prodHeader">Product</li>
                <li>Quantity</li>
                <li>Total</li>
                <li>Remove</li>
                </ul>-->
                <ul class="cartWrap" id="cartBody">
                    
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
                        <li class="totalRow"><span class="label">Subtotal</span><span class="value" id="Subtotal">$35.00</span></li>
                        <li class="totalRow"><span class="label">Delivery Cost</span><span class="value" id="DeliveryCost">$5.00</span></li>
                        <li class="totalRow"><span class="label">Tax</span><span class="value" id="Tax">$4.00</span></li>
                        <li class="totalRow final"><span class="label">Total</span><span class="value" id="Total">$44.00</span></li>
                        <li class="totalRow"><a href=""  data-toggle="modal" data-target="#getUserDetailsModal" class="btn continue">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- User Details section -->
            <?php include('userdetailsmodal.php');?>
        </div>
            <!-- User Details section -->
            <!-- <?php include('userdetailsmodal.php');?> -->
        <!-- END OF CART SECTION -->
        <!-- FOOTER -->
        <footer>
            <p class="text">Copyright &copy; TFP Restaurant Website 2021. Daeva Royale Design</p>
        </footer>
        <!-- END OF FOOTER -->
        <script>
            // disable typing in the quantity input fields
            $("input.qty").keypress(function(){
                event.preventDefault();
            });

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

            

            // Just for testing, show all items
            $('a.btn.continue').click(function(){
                //$('li.items').show(400);
            })
        </script>
    </body>
</html>
<?php } ?>