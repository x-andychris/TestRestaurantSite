<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css and fontawesome links -->
    <link rel="stylesheet" href="FONTAWESOME/all.php">
    <link rel="stylesheet" href="CSS/style.php">
    <link rel="stylesheet" href="CSS/newstyle.css">
    <!-- custom google fonts -->
    <link rel="stylesheet" href="GOOGLE FONTS/fonts.css">
    <script src="BOOTSTRAP/js/jquery-1.12.0.min.js" type="text/javascript"></script>
    <script src="BOOTSTRAP/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Tivanni Food Palace</title>
    <script>
        var cart = [];
        var cartdetails = [];
        $(function () {
            if (localStorage.cart)
            {
                cart = JSON.parse(localStorage.cart);
                cartdetails = JSON.parse(localStorage.cartdetails);
                clearCart();
            }
        });

        function addToCart(menuid,menu,price,image) {
            
            // update quantity if product is already present
            for (var i in cart) {
                if(cart[i].MenuId == menuid)
                {
                    cart[i].Quantity = cart[i].Quantity + 1;
                    cart[i].TotalPrice = cart[i].Price * cart[i].Quantity;
                    saveCart();
                    return;
                }
            }
            // create JavaScript Object
            var item = { MenuId: menuid, Menu: menu, Image: image, Price: parseInt(price), Quantity: 1, TotalPrice: price }; 
            cart.push(item);
            saveCart();
            // showCart();
        }

        function saveCart() {
            if ( window.localStorage)
            {
                localStorage.cart = JSON.stringify(cart);
                localStorage.cartdetails = JSON.stringify(cartdetails);
            }
        }
        function clearCart() {
            var cart = [];
            var cartdetails = [];
            var ccc = { SubTotal: 0, DeliveryCost: 0, Tax: 0, Total: 0};
            cartdetails.push(ccc);
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
    <!-- Header -->
    <header>
        <!-- banner -->
        <section class="banner" id="home">
            <ul class="banner-slider">
                <li class="banner-item  active-banner">
                    <div class="container">
                        <h1> Feel mother's love in every bite</h1>
                        <p class="text">Tastes as good as mother's milk</p>
                        <button type="
                        button">Taste Now</button>
                    </div>
                </li>
                <li class="banner-item">
                    <div class="container">
                        <h1> Food is the only spouse you need</h1>
                        <p class="text">Stop crowd pleasing. You're not pizza</p>
                        <button type="
                        button">Taste Now</button>
                    </div>
                </li>
                <li class="banner-item">
                    <div class="container">
                        <h1> Feel home in every recipe</h1>
                        <p class="text">There is no place like home</p>
                        <button type="
                        button">Taste Now</button>
                    </div>
                </li>
            </ul>
        </section>
    
    <!-- NAVBAR -->
        <nav class="navbar">
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
    </header>
    <!-- header end -->

    <!-- ABOUT SECTION -->
    <section class="padding-y about" id="about">
        <div class="container">
            <div class="about-row">
                <div class="about-col-1">
                    <img src="IMAGES/random.jpg" alt="" srcset="">
                </div>
                <div class="about-col-2">
                    <!-- TITLE -->
                    <div class="title">
                        <h2>About The Restaurant</h2>
                        <div class="line center">
                            <div></div>
                            <span><i class="fas fa-utensils    "></i></span>
                            <div></div>
                        </div>
                    </div>
                    <!-- END OF TITLE -->
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nobis, assumenda sequi veniam repellat praesentium officiis minus, nam impedit cumque ea nemo doloremque alias rerum nisi temporibus reprehenderit quia architecto.</p>
                    <p class="text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis voluptas corporis est, pariatur deleniti aliquid aperiam nemo perferendis recusandae placeat consequuntur eligendi maxime eaque quae soluta nisi cum blanditiis, nostrum similique assumenda, laboriosam hic sunt voluptate. Officia vel voluptas, cupiditate eveniet asperiores sapiente, natus beatae optio omnis ipsum illum mollitia?</p>
                </div>
                <div class="about-col-3">
                    <img src="IMAGES/crap.jpg" alt="">
            </div>
        </div>
    </section>
    <!-- END OF ABOUT SECTION -->

    <!-- SERVICE SECTION -->
    <section class="padding-y service" id="services">
        <div class="container">
            <!-- TITLE -->
            <div class="title">
                <h2>Special Services</h2>
                <div class="line center">
                    <div></div>
                    <span><i class="fas fa-utensils    "></i></span>
                    <div></div>
                </div>
            </div>
            <!-- END OF TITLE -->
            <div class="service-row">
                <div class="service-item">
                    <span><i class="fas fa-birthday-cake    "></i></span>
                    <h3>Birthday Party</h3>
                    <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci qui nulla repellat, error eos vitae eius nostrum sequi cupiditate molestias soluta nobis velit officia earum id tenetur cum dolores voluptates.</p>
                </div>
                <div class="service-item">
                    <span><i class="fas fa-glass-cheers"></i></span>
                    <h3>Wedding Party</h3>
                    <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci qui nulla repellat, error eos vitae eius nostrum sequi cupiditate molestias soluta nobis velit officia earum id tenetur cum dolores voluptates.</p>
                </div>
                <div class="service-item">
                    <span><i class="fas fa-pizza-slice"></i></span>
                    <h3>Business Meetings</h3>
                    <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci qui nulla repellat, error eos vitae eius nostrum sequi cupiditate molestias soluta nobis velit officia earum id tenetur cum dolores voluptates.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF SERVICE SECTION -->

    <!-- OPENINGS SECTION -->
    <section class="openings padding-y" id="openings">
        <div class="container">
            <!-- TITLE -->
            <div class="title">
                <h2>Opening hours</h2>
                <div class="line center">
                    <div></div>
                    <span><i class="fas fa-utensils"></i></span>
                    <div></div>
                </div>
            </div>
            <!-- END OF TITLE -->
            <div class="openings-row">
                <p class="text">We are open 7 days a week 8hours a day.</p>
                <h3>New Jersey Kitchen</h3>
                <ul>
                    <li>348 Street, Essex 435 New Jersey</li>
                    <li>Phione: 08012345678</li>
                    <li>Email: tivannifoodpalace@gmail.com</li>
                    <li>9:00 AM - 5:00 PM</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- END OF OPENINGS SECTION -->

    <!-- MENU SECTION -->
    <div class="padding-y menu" id="menu">
        <div class="container">
            <!-- TITLE -->
            <div class="title">
                <h2>Menu</h2>
                <div class="line center">
                    <div></div>
                    <span><i class="fas fa-utensils"></i></span>
                    <div></div>
                </div>
            </div>
            <!-- END OF TITLE -->
            <div class="menu-row">
                <!-- Loading the Menu's from the menu table -->
                <?php 
                    $sql ="SELECT  * FROM menu";
                    $result=$con->prepare($sql);
                    $row =$result->execute();
                    while($rows=$result->fetch(PDO::FETCH_ASSOC)){        
                    ?>
                        <div class="menu-item">
                            <div class="menu-img">
                                <img src="IMAGES/<?php echo $rows['Image']?>" alt="" srcset="" height="200">
                            </div>
                            <div class="menu-text">
                                <div class="price">
                                    <h3><?php echo $rows['Title']?></h3>
                                    <h3>$<?php echo $rows['Price']?></h3>
                                </div>
                                <p class="text"><?php echo $rows['Description']?></p>
                                <a href="cart.php" onclick="addToCart('<?php echo $rows['MenuId']?>','<?php echo $rows['Title']?>','<?php echo $rows['Price']?>','<?php echo $rows['Image']?>')">Order Now</a>
                            </div>
                        </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- END OF MENU SECTION -->

    <!-- TEAM SECTION -->
    <section class="padding-y team" id="team">
        <div class="container">
            <!-- TITLE -->
            <div class="title">
                <h2>Our Team</h2>
                <div class="line center">
                    <div></div>
                    <span><i class="fas fa-utensils"></i></span>
                    <div></div>
                </div>
            </div>
            <!-- END OF TITLE -->
            <div class="team-row">
                <div class="team-item">
                    <div class="team-img">
                        <img src="IMAGES/main-head-chef.jpg" alt="" srcset="">
                        <div class="team-info">
                            <h3>Son Liu-Feng</h3>
                            <p class="text">Senior Chef</p>
                            <ul class="center">
                                <li class="center">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="center">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="center">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="team-item">
                    <div class="team-img">
                        <img src="IMAGES/asst-head-chef.jpg" alt="" srcset="">
                        <div class="team-info">
                            <h3>John Cunningham</h3>
                            <p class="text">Asst. Senior Chef</p>
                            <ul class="center">
                                <li class="center">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="center">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="center">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="team-item">
                    <div class="team-img">
                        <img src="IMAGES/chef-1.jpg" alt="" srcset="">
                        <div class="team-info">
                            <h3>Shaemus Mc-Goffin</h3>
                            <p class="text">Chef</p>
                            <ul class="center">
                                <li class="center">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="center">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="center">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="team-img">
                        <img src="IMAGES/head-chef.jpg" alt="" srcset="">
                        <div class="team-info">
                            <h3>David Saheed</h3>
                            <p class="text">Chef</p>
                            <ul class="center">
                                <li class="center">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="center">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="center">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF TEAM SECTION -->

    <!-- CONTACT SECTION -->
    <div class="padding-y" id="contact" style="padding-top:4rem;">
        <div class="container">
            <!-- TITLE -->
            <div class="title">
                <h2>Contact</h2>
                <div class="line center">
                    <div></div>
                    <span><i class="fas fa-utensils"></i></span>
                    <div></div>
                </div>
            </div>
            <!-- END OF TITLE -->
            <div class="contact-row-1">
                <form enctype="multipart/form-data" class="contact-form" action="ADMIN/functions/logics.php" method="post">
                    <!-- Displaying a success or an error message after form submit -->
                    <div class="box">
                        <div class="box-header">
                        <!-- For Error Messages -->
                        <?php if(isset($_SESSION['errors'])) {?>
                        <div class="alert alert-danger"> 
                            <ul>
                            
                            <?php echo "<li>".$_SESSION['errors']."</li>";
                            unset($_SESSION['errors']);?>
                            
                            </ul>
                        </div>
                        <?php }?>
                        <!-- For Success Message -->
                        <?php if (isset($_SESSION['success'])){ ?>

                        <div class="alert alert-success">
                            <?php echo $_SESSION['success'];  unset($_SESSION['success']);?>

                        </div>
                        <?php } ?>
                        </div><!-- /.box-header -->
                    </div>
                    <!-- The actual form -->
                    <input type="text" name="name" class="form-control" placeholder="Your Name">
                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" style="resize:none;"></textarea>
                    <input type="submit" name="send_message" class="form-submit-btn" value="send message">
                </form>
            </div>
        </div>

        <div class="contact-info">
            <div class="container">
                <div class="contact-row-2">
                    <div class="contact-col-1">
                        <h2>Contact Details</h2>
                        <ul>
                            <li>348 Street, Essex 435 New Jersey</li>
                            <li>Phione: 08012345678</li>
                            <li>Email: tivannifoodpalace@gmail.com</li>
                            <li>website: www.tfp.com</li>
                        </ul>
                    </div>

                    <div class="contact-col-2">
                        <h2>Follow Us</h2>
                        <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci impedit nemo quia suscipit deleniti quidem optio pariatur tenetur tempore recusandae fugiat ipsum, hic debitis delectus?</p>
                        <ul class="center">
                            <li class="center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="center">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="center">
                                <a href="https://instagram.com/tivani_food_palace?igshid=l2fidp3intge"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="center">
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF CONTACT SECTION -->

    <!-- FOOTER -->
    <footer>
        <p class="text">Copyright &copy; TFP Restaurant Website 2021. Daeva Royale Design</p>
    </footer>
    <!-- END OF FOOTER -->


    <!-- jquery -->
    <script src="JQUERY/jquery-3.6.0.js"></script>
    <!-- custom js -->
    <script src="FONTAWESOME/all.js"></script>
    <script src="JAVA/script.js"></script>
</body>
</html>