$(document).ready(function() {
	$(window).resize(media);
	scrolspy();
	if($("#media-check").css("display") == "flex"){
		media();
	}
	$n = 1;
	$c =1;
	if ($c==1){
		$(".game-filter").addClass("game-hide");
		$(".game-label").addClass("game-hide");
		$(".game-label:nth-of-type(2)").removeClass("game-hide");
		$(".gf"+$c).removeClass("game-hide");
		$(".gf"+$c).addClass("animate-appear");
	}
	$(function(){
		$('.typed-right').typed({
			strings: ['<strong>Best of Players</strong>', '<strong>Exhilarating Games</strong>','<strong>the real fun</strong>'],
			contentType:'html',
			typeSpeed: 100,
			showCursor: true,
			backSpeed: 0,
			backDelay: 1000,
			loop:true,
		});
	});
	$(function(){
		$('.event-typed').typed({
			strings: ['<strong>107 games have been played</strong>', '<strong>584 events have been created</strong>','<strong>We are now a community of 1006 players</strong>' , '<strong>Mafia is most popular game</strong>'],
			contentType:'html',
			typeSpeed: 100,
			showCursor: true,
			backSpeed: 0,
			backDelay: 1000,
			loop:true,
		});
	});
	$.fn.moveIt = function(){
		var $window = $(window);
		var instances = [];		
		$(this).each(function(){
			instances.push(new moveItItem($(this)));
		});		
		window.addEventListener('scroll', function(){
			var scrollTop = $window.scrollTop();
			instances.forEach(function(inst){
				inst.update(scrollTop);
			});
		}, {passive: true});
	}
	var moveItItem = function(el){
		this.el = $(el);
		this.speed = parseInt(this.el.attr('data-scroll-speed'));
	};
	moveItItem.prototype.update = function(scrollTop){
		this.el.css('transform', 'translateY(' + -(scrollTop / this.speed) + 'px)');
	};
	function media(){
		if($("#media-check").css("display") == "flex"){
			$(".box:nth-of-type(1)").attr('data-scroll-speed' , '3');
			$(".box:nth-of-type(2)").attr('data-scroll-speed' , '2');
			$(".box:nth-of-type(3)").attr('data-scroll-speed' , '4');
			$(".box:nth-of-type(4)").attr('data-scroll-speed' , '2');
			$(".box:nth-of-type(5)").attr('data-scroll-speed' , '3');
			$(function(){
				$('[data-scroll-speed]').moveIt();
			});
			$(window).scroll(function(){
				scrolspy();
			}
			);
		}
		else{
			$(".box:nth-of-type(1)").attr('data-scroll-speed' , '0');
			$(".box:nth-of-type(2)").attr('data-scroll-speed' , '0');
			$(".box:nth-of-type(3)").attr('data-scroll-speed' , '0');
			$(".box:nth-of-type(4)").attr('data-scroll-speed' , '0');
			$(".box:nth-of-type(5)").attr('data-scroll-speed' , '0');
		};
	};
	function scrolspy()
	{
		$h = $(this).height();
		if ($(this).scrollTop()>0 && $(this).scrollTop()<($h)){
			$(".nl1").addClass("active-nav");
			$(".nl2").removeClass("active-nav");
			$(".nl3").removeClass("active-nav");
			$(".nl4").removeClass("active-nav");
		}
		else if ($(this).scrollTop()>$h +5 && $(this).scrollTop()<($h*2+15)){
			$(".nl2").addClass("active-nav");
			$(".nl1").removeClass("active-nav");
			$(".nl3").removeClass("active-nav");
			$(".nl4").removeClass("active-nav");
		}
		else if($(this).scrollTop()>$h*2 + 15 && $(this).scrollTop()<($h*3+30)){
			$(".nl3").addClass("active-nav");
			$(".nl2").removeClass("active-nav");
			$(".nl1").removeClass("active-nav");
			$(".nl4").removeClass("active-nav");
		}
		else if ($(this).scrollTop()>$h*3 + 35 ){
			$(".nl4").addClass("active-nav");
			$(".nl2").removeClass("active-nav");
			$(".nl3").removeClass("active-nav");
			$(".nl1").removeClass("active-nav");
		};
	};
	$(".gc-left").click(function()
	{
		$(".gf"+$c).removeClass("animate-right");
		$(".gf"+$c).removeClass("animate-appear");
		$(".gf"+$c).removeClass("game-hide");
		$(".gf"+$c).addClass("animate-left");
		$c = $c +1;
		$(".game-label:nth-of-type("+$c+")").fadeOut();
		$(".game-label:nth-of-type("+$c+")").promise().done(function()
		{
			if($c>5)
				{ $c=1;}
			$(".game-label:nth-of-type("+($c+1)+")").fadeIn();
			$(".gf"+$c).removeClass("game-hide");
			$(".gf"+$c).removeClass("animate-left");
			$(".gf"+$c).removeClass("animate-right");
			$(".gf"+$c).addClass("animate-appear");		
		})
	});
	$(".gc-right").click(function()
	{
		$(".gf"+$c).removeClass("animate-left");
		$(".gf"+$c).removeClass("animate-appear");
		$(".gf"+$c).removeClass("game-hide");
		$(".gf"+$c).addClass("animate-right");
		$(".game-label:nth-of-type("+($c+1)+")").fadeOut();
		$c = $c -1;
		$(".game-label:nth-of-type("+($c+2)+")").promise().done(function()
		{
			if($c<1)
				{ $c=5;}
			$(".game-label:nth-of-type("+($c+1)+")").fadeIn();	
			$(".gf"+$c).removeClass("game-hide");
			$(".gf"+$c).removeClass("animate-left");
			$(".gf"+$c).removeClass("animate-right");
			$(".gf"+$c).addClass("animate-appear");	
		})
	});
	setInterval(function()
	{
		$(".gf"+$c).removeClass("animate-left");
		$(".gf"+$c).removeClass("animate-appear");
		$(".gf"+$c).removeClass("game-hide");
		$(".gf"+$c).addClass("animate-right");
		$(".game-label:nth-of-type("+($c+1)+")").fadeOut();
		$c = $c -1;
		$(".game-label:nth-of-type("+($c+2)+")").promise().done(function()
		{
			if($c<1)
				{ $c=5;}
			$(".game-label:nth-of-type("+($c+1)+")").fadeIn();	
			$(".gf"+$c).removeClass("game-hide");
			$(".gf"+$c).removeClass("animate-left");
			$(".gf"+$c).removeClass("animate-right");
			$(".gf"+$c).addClass("animate-appear");	
		})
	} , 5000);
	$(".game-label").hover(function(){
		$(".game-filter").css("filter" , "blur(5px)");
	} , function(){
		$(".game-filter").css("filter" , "blur(0px)");
	})
});