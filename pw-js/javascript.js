

jQuery(function(){
	jQuery('.menu-resp').click(function(e) {
		jQuery(this).next().slideToggle(300);
	});
});    


var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            slidesPerColumn: 1,
            spaceBetween: 0,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            freeMode: false,
            autoplay:6000,
            speed:2000

    
        }); 

jQuery(document).ready(function() {
	jQuery('.gallery a').attr('data-fancybox','gallery');
	  
        /*$('[data-fancybox="gallery"]').fancybox({
            arrows: true,
            buttons: [
                "zoom",
                "thumbs",
                "close"
            ],
            animationEffect: "fade",
            transitionEffect: "fade",
            loop: true,
            gutter: 50,
            keyboard: true,
            arrows: true,
        }); */

});


