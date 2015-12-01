$(function() {
    
    $('a[href^="#"], a[href^="."]').click( function(){
	    var scroll_el = $(this).attr('href');
        if ($(scroll_el).length != 0) {
	    $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500);
        }
	    return false;
    });
    
    var theMap;
function addPlaceMark(coords, idMap, html) {
 ymaps.ready(function(){
  if (!theMap) {
   theMap = new ymaps.Map(idMap, {
    zoom: 16,
    center: coords 
   });
      theMap.behaviors.disable('scrollZoom');
  } else {
   theMap.setCenter(coords);
  }
  var placemark = new ymaps.Placemark(coords, {
   balloonContent: html
  });
  theMap.geoObjects.add(placemark);
 });
}
    
    $(".map").each(function() {
 var coords = $(this).data("coords").toString().split(",");
 var idMap = $(this).attr("id");
 var html = $(this).data("html");
 addPlaceMark(coords, idMap, html);
});

     $('.jcarousel')
        .jcarousel({
          wrap: 'circular',
				    animation: {
				        duration: 800,
				        easing:   'easeInOutExpo'
				}})
        .jcarouselAutoscroll({
            interval: 5000,
            target: '+=1',
            autostart: true
        });
    
    $('.sliderphoto')
        .jcarousel({
          wrap: 'both',
				    animation: {
				        duration: 500,
				        easing:   'linear'
				}});
    
    $('.sliderphoto-prev').click(function() {
    $('.sliderphoto').jcarousel('scroll', '-=1');
});
    
        $('.sliderphoto-next').click(function() {
    $('.sliderphoto').jcarousel('scroll', '+=1');
});

    

    
	/** FRONT SLIDER **/
/*	var countSlide=$('.carousel li').length;
	
	
	$('.typepage-text-about').find(".jcarousel").each(function() {
		var jcarouselContent = $(this);
	        jcarouselContent        
		        .jcarousel({
		            wrap: 'circular',
				    animation: {
				        duration: 800,
				        easing:   'easeInOutExpo'
				}})
				.jcarouselAutoscroll({
		        	interval: 3000,
			        target: '+=1',
			        autostart: true
			    });
	});
	
	if (countSlide>1) {
		
		var paginationContainer=$('.jcarousel-pagination');
		var paginationHTML='';
		var i=1;
		while(i<=countSlide) {
			paginationHTML+='<a href="#'+i+'"></a>';
			i++;
		}
		paginationContainer.html(paginationHTML);
		var width=document.body.offsetWidth;
		if (width<1000)
			width=1000;
		$('.front-slider .jcarousel-front').css("width", width);
		$('.front-slider .jcarousel-front li').css("width", width);	
	
		var jcarousel = $('.front-slider .jcarousel-front');
        
        jcarousel
        	.on('jcarousel:reload jcarousel:create', function () {
       			width = document.body.offsetWidth;
        		if (width>=1000) {
	               	width = document.body.offsetWidth;
	            } else {
		            width=1000;
	            }
	            jcarousel.jcarousel('items').css('width', width + 'px');
                $('.front-slider .jcarousel-front').css("width", width);
                $('.front-slider .jcarousel-front span').css("width", width);
                
            })        
	        .jcarousel({
	            wrap: 'circular',
			    animation: {
			        duration: 800,
			        easing:   'easeInOutExpo'
			}})
			.jcarouselAutoscroll({
	        	interval: 7000,
		        target: '+=1',
		        autostart: true
		    });

        $('.jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .jcarouselPagination();
  
     }*/
	/** END  FRONT SLIDER **/

	
	/** IMAGE VIEWER **/
	if ($('.fancybox').length>=1) {
		$(".fancybox").fancybox({
				openEffect : 'elastic',
				openSpeed  : 150,
				closeEffect : 'elastic',
				closeSpeed  : 150,
				closeClick : true,
				helpers : {
				}
			});
	}	
	/** END IMAGE VIEWER **/
	
	
	$.datepicker.regional['ru'] = { 
		closeText: 'Закрыть', 
		prevText: 'Пред', 
		nextText: 'След', 
		currentText: 'Сегодня', 
		monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь', 
		'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'], 
		monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн', 
		'Июл','Авг','Сен','Окт','Ноя','Дек'], 
		dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'], 
		dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'], 
		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'], 
		dateFormat: 'dd.mm.yy', 
		firstDay: 1, 
		isRTL: false 
	}; 
	$.datepicker.setDefaults($.datepicker.regional['ru']); 
	
	$(".datepicker").datepicker();


	//$('input[name="phone"]').mask("+7(999)999-99-99");	
		
	fancyInit();
	
	

	
})

function fancyInit() {
	if ($('.fancybox_html').length>=1) {
		$('.fancybox_html').each(function() {
		var className = $(this).data("class");
		var title = $(this).data("title");
		var description = $(this).data("description");
		if (title!=undefined)
			title='<div class="popup-title">'+title+'</div>';
		else
			title='';

		if (description!=undefined)
			description='<div class="popup-description">'+description+'</div>';
		else
			description='';
		$(this).fancybox({tpl: {
				live:true,
				wrap     : '<div class="fancybox-wrap '+className+'" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner">'+title+description+'</div></div></div></div>'}});
		});
	}
}