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

   
	
 
$(".team .filter li a").click(function(e){
    showinRange($(this));
})

$('.team .filter li a').click(function(e){
    event.stopPropagation();
});
    
    
function showinRange(btn) {
    var slug = btn.attr("data-location");
    
    $(".team_people .team_person").removeClass("active");
    
    $(".team_people .team_person").each(function(e){
        var categories = $(this).attr("data-location");
        if (categories) {
            if (categories.indexOf(slug) > -1)
                $(this).toggleClass("active");
                
        }
    })

    $(".team .filter li a").removeClass("active");
    btn.addClass("active");
}

$("#map .filter a").click(function(e){
    showinRange2($(this));
})

$('#map .filter a').click(function(e){
    event.stopPropagation();
});
    
    
function showinRange2(btn) {
    var slug = btn.attr("data-tab");
    
    $("#map .tabs .tab").removeClass("active");

    
    $("#map .tabs .tab").each(function(e){
        var categories = $(this).attr("data-tab");
        if (categories) {
            if (categories.indexOf(slug) > -1)
                if ($(this).hasClass("active")){
                    $(this).removeClass("active");
                } else {
                    $(this).addClass("active");
                }
                
        }
    })

    $("#map .filter a").removeClass("active");
    btn.addClass("active");
}
    
var a = 0;
$(window).scroll(function() {

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

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});