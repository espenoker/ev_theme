import jquery from 'jquery';
import $ from 'jquery';
import 'slick-carousel';
var Masonry = require('masonry-layout');
 

$(".slider-wrapper").on("init", function(event, slick){
    $(".count").text(parseInt(slick.currentSlide + 1) + '/' + slick.slideCount);
});

$(".slider-wrapper").on("afterChange", function(event, slick, currentSlide){
    $(".count").text(parseInt(slick.currentSlide + 1) + '/' + slick.slideCount);
});
$(".slider-wrapper").slick({
    arrows: false,
    dots: true,
    dotsClass: 'slick-dots col-12 col-md-3',
    draggable: false,
    fade: true,
    speed: 400,
    autoplay: true,
});

const hamburgerTag = document.querySelector("div.toggle")
const menuTag = document.querySelector(".main-nav")

hamburgerTag.addEventListener("click", function (event) {  
    
    hamburgerTag.classList.toggle("is-active")
    menuTag.classList.toggle("is-active")
    
    
})

$(".toggle-tabs li").click(function(){
    $(this).addClass('active-tab').parents('ul.toggle-tabs').find('li').not($(this)).removeClass('active-tab');
    var currentTabIndex = $(this).index();
    $('.content-box:eq('+ currentTabIndex +')').addClass('active-content-box').parents('.tabbed-content-wrap').find('.content-box').not($('.content-box:eq('+ currentTabIndex +')')).removeClass('active-content-box');
});

   
	
 







$(".list .filter li a").click(function(e){
    showinRange($(this));
  
})

$('.list .filter li a').click(function(e){
    event.stopPropagation();
});
    
    
function showinRange(btn) {
    var slug = btn.attr("data-range");
    
    $(".list .list-item").removeClass("active");
    
    $(".list .list-item").each(function(e){
        var categories = $(this).attr("data-range");
        if (categories) {
            if (categories.indexOf(slug) > -1)
                $(this).toggleClass("active");
                
        }
    })

    $(".list .filter li a").removeClass("active");
    btn.addClass("active");
}









$(".portfolio .filter li a").click(function(e){
    showinRange2($(this));
   
})


$('.portfolio .filter li a').click(function(e){
    event.stopPropagation();

});

    
    
function showinRange2(btn) {
    var slug = btn.attr("data-category");

    $(".portfolio_items .portfolio_item").removeClass("actives");

    
    $(".portfolio_items .portfolio_item").each(function(e){
        var categories = $(this).attr("data-category");
        if (categories) {
            if (categories.indexOf(slug) > -1)
                $(this).toggleClass("actives");
                
        }
    })

    $(".portfolio .filter li a").removeClass("actives");
    btn.addClass("actives");
       
}


$("#nav-tab .nav-item").click(function(e){
    $(".portfolio_items .portfolio_item").removeClass("actives");
    $(".portfolio_items .portfolio_item").addClass("actives");

})

    
var a = 0;
function scrollo() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  
    if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter-value').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');
        $({
            countNum: $this.text()
        }).animate({
            countNum: countTo
            },

            {

            duration: 1600,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
            }

            });
        });
        a = 1;
    }

    }

$(window).scroll(function(e){
    var counterr = document.querySelector("#counter")
    if (counterr == null){
        /*donoting*/
    }
    else{
    scrollo();
    }
});

	


var msnry = new Masonry( '#map .companies', {
    itemSelector: '.col-4',
    columnWidth: '.grid-sizer',
    percentPosition: true

});




    