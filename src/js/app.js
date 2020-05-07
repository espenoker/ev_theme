import jquery from 'jquery';
import $ from 'jquery';
import 'slick-carousel';

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

