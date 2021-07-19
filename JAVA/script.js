

$(document).ready(function(){
    //banner image change
    let bannerCount = 0;
    setInterval(function(){
        hideAllBanner();
        ChangeBannerCount();
        ChangeBanner();
    }, 8000);

    function ChangeBanner(){
        $('.banner-item').each(function(idx){
            if(bannerCount == idx){
                $(this).addClass('active-banner');
            }
        });
    }
    function hideAllBanner(){
        $('.banner-item').each(function(idx){
            $(this).removeClass('active-banner');
        });
    }
    function ChangeBannerCount(){
        bannerCount++;
        if(bannerCount >= $('.banner-item').length){
            bannerCount = 0;
        }
    }

    // FIXED NAVBAR
    $(window).scroll(function(){
        let dxd = $(window).scrollTop();
        if(dxd >= 800){
            $('.navbar').addClass('fixed-navbar');
        }
        else{
            $('.navbar').removeClass('fixed-navbar');
        }
    });

    // NAVBAR TOGGLE
    $('#navbar-toggler').click(function(){
        $('.navbar-collapse').slideToggle(600);
    });
});