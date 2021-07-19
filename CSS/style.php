<?php header("Content-type: text/css; charset: UTF-8"); ?>
/* To be very honest I actually do not understand this root element. I was going through alot of youtube vids and came across it and decide it would not be a bad trial and error */
:root{
    --nero: #252525;
    --dimgray: #666;
    --max-red: #d62826;
    --snow: #fafafa;
    --Libre: 'Libre Franklin', sans-serif;
    --Kaushan: "Kaushan Script";
    --transition: all 0.4 ease;
}
*{
    line-height: 1.5;
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: var(--Libre);
}
body{
    font-size: 1.05rem;
    font-weight: 150;
    text-rendering: optimizeLegibility;
    padding-left: 0.5%;
    padding-right: 0.5%;
}

/* stylings */
a{
    color: #000;
    text-decoration: none;
}
img{
    width: 100%;
    display: block;
}
li{
    list-style-type: none;
}
/* after severl trials I finally understood that you do not assign list styling for 'UL' but li itself. seems obvious but lol I'm just dumb I guess lol */
button{
    text-transform: uppercase;
    cursor: pointer;
    outline: 0;
    font-weight: 800;
}
.container{
    width: 94%; /* I wanted to use auto but I noticed it was giving me problems when I used bootstrap for the container so I just decided to depricate bootstrap from the project entirely */
    margin: 0 auto;
}
.center{
    display: flex;
    align-items: center;
    justify-content: center;
}
/* for this center styling I tried doing it individually but it got me confused and it was cumbersome and required more code and the more the code the more confused I got. I learned this from a youtuber named Qazi */
.text{
    padding: 0.3rem;
    line-height: 1.5;
}
/* I initially tried styling this through the paragraph but then I decide to just assign a class to all paragraphs and give it one name and life just got easier from there.*/
.padding-y{
    padding: 6rem 0;
}
.title{
    padding: 1rem 0;
    text-align: center;
}
.title h2{
    margin: 0 0.5rem;
    font-family: var(--Kaushan);
    letter-spacing: 2px;
}
.line{
    margin: 1.2rem;
}
.line div{
    width: 60px;
    height: 3px;
    background: var(--max-red);
    border-radius: 5px;
}
.line span{
    font-size: 1.4rem;
    margin: 0 1rem;
    color: var(--max-red);
}
/* END OF STYLINGS */

/* BANNER STYLING */
.banner-item{
    text-align: center;
    height: 100vh; /* I wanted to use % but i figured vh is just as responsive after trial and error*/
    display: grid;
    place-items: center; /* I still do not know why I am using this. I just added it after seeing it from a youtuber. I am yet to decide if I keep it. if it does not complicate my code maybe i would keep it*/
    color: #fff;
    animation: smooth fadeIn 2s; /* I was trying different things and just added this but I noticed I needed keyframes which I knew nothing about*/

    display: none;
    /*also realised I had to remove this after using the keyframes. I found this out after several trials and desperation to not start this code from the beginning. lol.*/
    /* So i reached out to a youtuber on their twitter page and they adviced me to add this back and gave me some java codes which i honestly do not understand but people outsource help so I thought why not*/
}

/* I completely and utterly have no idea how this works but I intend to read up on it. I was only trying stuff out when I found out this Keyframes code style*/
@keyframes fadeIn {
    from{
        opacity: 0;
    }
    to{
        opacity: 0;
    }
}

/* This is was one of my many experiments. the Linear-gradient is used for setting background properties in the same position/place. */
.banner-item:nth-child(1){
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../IMAGES/banner-bg-1.jpg) center/cover no-repeat fixed;
}
.banner-item:nth-child(2){
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../IMAGES/banner-bg-2.jpg) center/cover no-repeat fixed;
}
.banner-item:nth-child(3){
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../IMAGES/lounge.jpg) center/cover no-repeat fixed;
}
.banner-item h1{
    font-size: 2.5rem;
    text-transform: capitalize;
    font-family: var(--Kaushan);
}
.banner-item .text{
    text-transform: uppercase;
    letter-spacing: 3px;
    opacity: 0.9;
}
.banner-item button{
    background: transparent;
    color: #fff;
    letter-spacing: 2px;
    border: 3px solid #fff; /* figured it would be better styling it in one line than writing more code*/
    padding: 0.85rem 1.85rem;
    margin-top: 1.75rem;
    transition: var(--transition);
}
.banner-item button:hover{
    background: #fff;
    color: var(--dimgray);
}
.active-banner{
    display: grid;
}
/* END OF BANNER STYLING */

/* NAVBAR */
.navbar{
    z-index: 99;
    background: #fff;
    box-shadow: 0 2px 6px 0 rgba(209, 209, 209, 0.57);
}
.brand-and-toggler{
    font-size: 1.4rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.6rem;
    border-bottom: 1.5px solid #f0f0f0;
}
.navbar-brand{
    display: flex;
    align-items: center;
}
.navbar-brand img{
    width: 45px;
}
.navbar-brand h3{
    padding-left: 0.4rem;
    color: goldenrod;
    font-weight: 500;
}
#navbar-toggler{
    font-size: 1.675rem;
    padding: 0 0.3rem;
    background: none;
    border: none;
    color: var(--nero);
}
.navbar-nav{
    padding: 0.6rem;
}
.navbar-nav li{
    margin: 0.2rem;
    padding: 0.5rem;
}
.navbar-nav li a{
    font-weight: 400;
    text-transform: uppercase;
    font-size: 0.9rem;
    color: var(--dimgray);
}
.navbar-nav li a:hover{
    color: var(--nero);
}
.navbar-collapse{
    display: none;
}
.fixed-navbar{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
}
/* END OF NAVBAR */

/* ABOUT */
.about-row > div{
    margin: 1.2rem 0;
}
.about-col-1, .about-col-3{
    display: none;
}
/* END OF ABOUT */

/* SERVICES */
.service{
    background-color: var(--snow);
}
.service-item{
    text-align: center;
    padding: 1.6rem 0;
    margin: 1.2rem 0;
}
.service-item span{
    font-size: 2.4rem;
}
.service-item h3{
    font-weight: 400;
}
/* END OF SERIVCE */

/* OPENINGS */
.openings{
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(../IMAGES/random.jpg) center/cover no-repeat fixed;
    color: #fff;
    text-align: center;
    clip-path: ellipse(100% 55% at 48% 44%);
}
.openings-row .text{
    text-transform: uppercase;
    letter-spacing: 3px;
}
.openings-row h3{
    font-size: 1.5rem;
    font-weight: 500;
    letter-spacing: 1.5px;
}
.openings-row ul{
    margin: 1rem 0;
}
.openings-row ul li{
    margin: 0.65rem 0;
    font-weight: 400;
}
/* END OF OPENINGS */

/* MENU */
.menu-row{
    margin: 2rem 0;
}
.menu-item{
    margin: 0.6rem 0;
}
.menu-text{
    padding: 1rem 0;
}
.price{
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: var(--dimgray);
}
.menu-text a{
    margin-top: 0.6rem;
    display: block;
    background: var(--max-red);
    width: 120px;
    text-align: center;
    padding: 0.45rem 0;
    color: #fff;
    font-weight: 600;
    transition: var(--transition);
}
.menu-text a:hover{
    background: var(--nero);
}
/* END OF MENU */

/* TEAM STYLING */
.team{
    background: var(--snow);
}
.team-row{
    margin: 2rem 0;
}
.team-item{
    margin-bottom: 1.5rem;
}
.team-img{
    position: relative;
    overflow: hidden;
}
.team-info{
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    background: var(--snow);
    padding: 1rem 0;
    transform: translateY(35%);
    transition: var(--transition);
}
.team-info h3{
    font-size: 1.6rem;
    color: var(--dimgray);
}
.team-info .text{
    text-transform: uppercase;
    font-size: 1rem;
    letter-spacing: 3px;
    color: var(--max-red);
}
.team-info ul{
    margin-top: 1rem;
}
.team-info ul li{
    background: var(--nero);
    margin: 0 0.4rem;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    transition: var(--transition);
}
.team-info ul li:hover{
    background: var(--max-red);
}
.team-info ul li a{
    color: #fff;
}
.team-item:hover .team-info{
    transform: translateY(0);
}
/* END OF TEAM STYLING */

/* CONTACT STYLING */
.contact.padding-y{
    padding-bottom: 0;
}
.contact-form{
    padding: 0.6rem;
}
.form-control{
    width: 100%;
    color: Var(--dimgray);
    font-size: 1rem;
    font-weight: 200;
    border: 2px solid #f0f0f0;
    border-radius: 3px;
    padding: 0.7rem;
    margin-bottom: 1.2rem;
    outline: 0;
}
.form-control:focus{
    border-color: var(--dimgray);
}
.form-submit-btn{
    background: var(--nero);
    color: #fff;
    text-transform: uppercase;
    font-size: 1rem;
    padding: 0.85rem 0;
    border: none;
    width: 100%;
    cursor: pointer;
    transition: var(--transition);
}
.form-submit-btn:hover{
    background: var(--max-red);
}
.contact-info{
    background: var(--max-red);
}
.contact-row-2{
    margin-top: 6rem;
    color: #fff;
    text-align: center;
}
.contact-col-1, .contact-col-2{
    padding: 6rem 0;
}
.contact-col-1 ul li{
    padding: 0.2rem 0;
}
.contact-col-2{
    padding-top: 0;
}
.contact-col-2 ul{
    margin-top: 1.5rem;
}
.contact-col-2 ul li{
    width: 40px;
    height: 40px;
    background: #fff;
    margin: 0 0.4rem;
    border-radius: 50%;
    cursor: pointer;
    transition: var(--transition);
}
.contact-col-2 ul a{
    color: var(--max-red);
    transition: var(--transition);
}
.contact-col-2 ul li:hover{
    background: var(--nero);
}
.contact-col-2 ul li:hover a{
    color: #fff;
}
#contact{
    padding: 0;
}
/* END OF CONTACT STYLING */

/* FOOTER */
footer{
    padding: 2rem 0;
    text-align: center;
}
/* END OF FOOTER */

/* QUERIES */
@media screen and (min-width: 480px){
    .banner-item h1{
        font-size: 4rem;
    }
    .title h2{
        font-size: 2rem;
        letter-spacing: 3px;
    }
    .menu-item{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        align-items: center;
        column-gap: 2rem;
    }
}

@media screen and (min-width: 768px){
    .service-item{
        width: 70%;
        margin-left: auto;
        margin-right: auto;
    }
    .team-item{
        margin-bottom: 0;
    }
    .team-row{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    .contact-form{
        width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    .contact-col-2{
        padding-top: 6rem;
    }
    .contact-row-2{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (min-width: 992px){
    .container{
        width: 90vw;
    }
    .banner-item{
        font-size: 6rem;
    }
    .navbar .container{
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    #navbar-toggler{
        display: none;
    }
    .navbar-collapse{
        flex: 1 0 auto;
        display: block!important;
    }
    .navbar-nav{
        display: flex!important;
        justify-content: flex-end;
    }
    .navbar-nav li{
        margin: 0 1.2rem;
        padding: 0;
    }
    .service-row{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        column-gap: 2rem;
    }
    .service-item p{
        width: 100%;
    }
    .menu-row{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        align-items: center;
        justify-content: center;
        column-gap: 2rem;
    }
}

@media screen and (min-width: 1200px){
    .container{
        width: 100%;
    }
    .about-row{
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
        align-items: center;
        column-gap: 2rem;
    }
    .about-col-1, .about-col-3{
        display: block;
    }
    .about-row > div{
        margin: 0;
    }
    .team-row{
        grid-template-columns: repeat(4, 1fr);
    }
    .contact-col-2{
        width: 75%;
        margin-left: auto;
        margin-right: auto;
    }
}
/* END OF QUERIES */