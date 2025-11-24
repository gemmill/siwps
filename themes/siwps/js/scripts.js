   $(document).ready(function(){


	$(".close").on("click",function(){
		$(".alert").remove()
	});

	
	$("img").Lazy({
		effect: 'fadeIn',
		effectTime: 500
	});




	$('.slick').slick({
		dots: false,
		infinite: true,
		speed: 1300,
		slidesToShow: 3,
		centerMode: true,
		variableWidth: true,
		lazyLoad: 'ondemand',
		prevArrow:'<div class="slick-arrow slick-prev" />',
		nextArrow:'<div class="slick-arrow slick-next" />',
		autoplay: true,
		autoplaySpeed: 3500
		
	});	
	
	
	
	$('#nav li, #navmobile li').each(function() {
	    var path = window.location.pathname;
	    var ahref = $(this).find('a').attr('href');
	    
	    var parser = document.createElement('a');
		parser.href = ahref;
		
		href = parser.pathname;

		if (href === path)  $(this).addClass('aktive');
		// if (href == "/"){
		// 	if (path == "/") {
		// 		$(this).addClass('aktive');
		// 	}
		// } else if (path.indexOf(href) !== -1) {
	    //     $(this).addClass('aktive');
	    // }
	});
	
	
	
	$("#navsticker").sticky({topSpacing:0});
	//$(".slick.large").sticky({topSpacing:0});
	

	$("#navmobiletoggle").on("click",function(){
		$("#navmobile").toggle();
		$(this).toggleClass("open");
	});
	

	



	(function() {
		var elements;
		var windowHeight;
	  
		function init() {
		  elements = document.querySelectorAll('.list');
		  windowHeight = window.innerHeight;
		}
	  
		function checkPosition() {
		  for (var i = 0; i < elements.length; i++) {
			var element = elements[i];
			var positionFromTop = elements[i].getBoundingClientRect().top;
	  
			if (positionFromTop - windowHeight <= 0) {
			  element.classList.add('fade-in-element');
			  element.classList.remove('hidden');
			}
		  }
		}
	  
		window.addEventListener('scroll', checkPosition);
		window.addEventListener('resize', init);
	  
		init();
		checkPosition();
	  })();
	
});

