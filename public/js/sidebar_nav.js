(function($){
//for resizing window
var resized;
$(window).on('resize orientationChanged', function(){
clearTimeout(resized);
resized = setTimeout(myFunction, 400);
});

//on document ready
    $(document).on('ready',function(){
	myFunction();	
    });

     function myFunction(){
		$('#expandNav').unbind('click').on('click',function(){ 
			if($(this).hasClass('closeNav')){
				$('#expandNav').removeClass('closeNav');
			$('#expandNav').addClass('openNav');
			$(".icons_dv").animate({width: '100%'}, 500 );
				$(".ryt_maindv").animate({'padding-left':'252px'}, 500 );
			setTimeout(function(){
					$('#admin_menu_icn').show();
					}, 300);
		if($('.menu_name').hasClass('show')){
			$('.menu_name').removeClass('show');
		
			setTimeout(function(){
  $('.menu_name').addClass('hide');
}, 300);
			}else{
					setTimeout(function(){
$('.menu_name').removeClass('hide');
}, 300);
				
			$('.menu_name').addClass('show');	
				
				$('.nav_arrow').addClass('hide');
				$('.nav_arrow').removeClass('show');
				$('.icon_right').removeClass('hide');
				$('.icon_right').addClass('show');
				
				}
				
				/*send msg icon*/
				if($('#send_msg_icn').hasClass('show')){
					$('#send_msg_icn').removeClass('show');
					$('#send_msg_icn').addClass('hide');
					}else{
					
					setTimeout(function(){
							$('#send_msg_icn').removeClass('hide');
					$('#send_msg_icn').addClass('show');
					}, 300);
					
					/*footer text*/
						if($('.copyryt').hasClass('hide')){
							$('.copyryt').removeClass('hide');
							$('.copyryt').addClass('show');
							}else{
								$('.copyryt').removeClass('show');
							$('.copyryt').addClass('hide');
								}
						
						}
						if($('#snd_msg_li').hasClass('show')){
					$('#snd_msg_li').removeClass('show');
					$('#snd_msg_li').addClass('hide');
					}else{
						$('#snd_msg_li').removeClass('hide');
					$('#snd_msg_li').addClass('show');
						
						}			
			}
                  else{ 
                             $('.left_sidebar').removeClass('hide');          
					$('#expandNav').addClass('closeNav');
					$('#expandNav').removeClass('openNav');
					$('.left_sidebar').css({'z-index':'9'});
					$('#admin_menu_icn').hide();
			
				/*send msg icon*/
				if($('#send_msg_icn').hasClass('show')){
					$('#send_msg_icn').removeClass('show');
					$('#send_msg_icn').addClass('hide');
					}else{
						$('#send_msg_icn').removeClass('hide');
					$('#send_msg_icn').addClass('show');
						
						}
						if($('#snd_msg_li').hasClass('show')){
					$('#snd_msg_li').removeClass('show');
					$('#snd_msg_li').addClass('hide');
					}else{
						setTimeout(function(){
						$('#snd_msg_li').removeClass('hide');
					$('#snd_msg_li').addClass('show');
						}, 500);
						}
						
						/*footer text*/
						if($('.copyryt').hasClass('hide') && $('.expandNav').hasClass('openNav')){
							$('.copyryt').removeClass('hide');
							$('.copyryt').addClass('show');
							}else{
								$('.copyryt').removeClass('show');
							$('.copyryt').addClass('hide');
								}
			
			$(".ryt_maindv").animate({'padding-left':'68px'}, 500 );
			$(".icons_dv").animate({width: '48px'}, 500 );
$('.nav_arrow').addClass('show');
		$('.icon_right').removeClass('show');
				$('.icon_right').addClass('hide');			
		if($('.menu_name').hasClass('hide')  ){
					setTimeout(function(){
$('.menu_name').removeClass('hide');
}, 300);
			
			$('.menu_name').addClass('show');
			}else{
					$('.menu_name').removeClass('show');
					setTimeout(function(){
$('.menu_name').addClass('hide');
}, 300);
				}
                        $('.left_sidebar').removeClass('hide');   
				}
                      
			});
						
			if($(document).width() >= '991'){ 
  $('.left_sidebar').removeClass('hide');                                                        $('.res_toggle').hide();
  if($('.copyryt').hasClass('hide') && $('#expandNav').hasClass('openNav')){
                                          $('.copyryt').removeClass('hide');
  }
var attr = $('.left_sidebar').attr('style');
if (typeof attr !== typeof undefined && attr !== false) {
     $('.left_sidebar').removeAttr('style')  
}

				$('#expandNav').removeClass('closeNav');
				$('#expandNav').addClass('openNav');
				$('#expandNav').addClass('show');
				$('#expandNav').removeClass('hide');
				$('.icons_dv').css({width:'100%'});
				$('.ryt_maindv').css({'padding-left':'252px'});	
				$('.nav_arrow').addClass('hide');
				$('.nav_arrow').removeClass('show');
				$('.icon_right').removeClass('hide');
				$('.icon_right').addClass('show');	
				$('#admin_menu_icn').show();		
		/*send msg icon */
				$('#snd_msg_li').addClass('hide');
					$('.menu_name').removeClass('hide');
					$('.menu_name').addClass('show');
						/*footer text*/				
							$('.icons_dv>ul>li').on('mouseover',function(){

				if($(this).children().children('.menu_name').hasClass('show') && $('#expandNav').hasClass('closeNav')){ 
			
					$(this).children().children('.menu_name').removeClass('show');
					$(this).children().children('.menu_name').addClass('hide');
					}else{ 
						$('.left_sidebar').css({'z-index':'999'});
							$(this).children().children('.menu_name').removeClass('hide');
					$(this).children().children('.menu_name').addClass('show');
						}			
				});			
					$('.icons_dv>ul>li').on('mouseout',function(){
				
				if($(this).children().children('.menu_name').hasClass('show') && $('#expandNav').hasClass('closeNav')){
					$(this).children().children('.menu_name').removeClass('show');
					$(this).children().children('.menu_name').addClass('hide');
					$('.left_sidebar').css({'z-index':'0'});
					}else{
							$('.left_sidebar').css({'z-index':'0'});
							$(this).children().children('.menu_name').removeClass('hide');
					$(this).children().children('.menu_name').addClass('show');
						}
				
				});
				}
				else if($(document).width() <= '767'){            
			$('.left_sidebar').hide();
			$('.nav_arrow').addClass('hide');       
			$('.res_toggle').show();
			$(".icons_dv").animate({width: '100%'}, 500 );
			$('.ryt_maindv').removeAttr('style');
				if($('#expandNav').hasClass('show')){
                            $('#expandNav').removeClass('show');
                            $('#expandNav').addClass('hide');                                                }
				$('.menu_name').removeClass('hide');
				$('.menu_name').removeClass('show');
			
				$('.copyryt').removeClass('show');
				//toggle                         
  $('.res_toggle').off('click').on('click',function(){ 
					$('.left_sidebar ').removeClass('hide');
					$('.left_sidebar ').slideToggle();
					});
		//hide nav on click
				$(document).on('click','.icons_dv>ul>li',function(){
			 if($(document).width() <= '767'){
			$('.left_sidebar').addClass('hide');
                   }		
			});
		}			
				  else{ 
				 
					$('#expandNav').addClass('closeNav');
					$('#expandNav').removeClass('openNav');
					$('.res_toggle').hide();
					$('#admin_menu_icn').hide();
                              $('.left_sidebar').removeClass('hide');                       var attr = $('.left_sidebar').attr('style');

if (typeof attr !== typeof undefined && attr !== false) {
     $('.left_sidebar').removeAttr('style')  
}
 $('.left_sidebar').css({'z-index':'0'});
                              $('#expandNav').removeClass('hide');
                              $('.menu_name').removeClass('hide');
			
				/*send msg icon*/
				if($('#send_msg_icn').hasClass('show')){
					$('#send_msg_icn').removeClass('show');
					$('#send_msg_icn').addClass('hide');
					}else{
						$('#send_msg_icn').removeClass('hide');
					$('#send_msg_icn').addClass('show');
						
						}
						if($('#snd_msg_li').hasClass('show')){
					$('#snd_msg_li').removeClass('show');
					$('#snd_msg_li').addClass('hide');
					}else{
						setTimeout(function(){
						$('#snd_msg_li').removeClass('hide');
					$('#snd_msg_li').addClass('show');
						}, 500);
						}
						
						/*footer text*/
						if($('.copyryt').hasClass('hide') && $('#expandNav').hasClass('openNav')){
							$('.copyryt').removeClass('hide');
							$('.copyryt').addClass('show');
							}else{
								$('.copyryt').removeClass('show');
							$('.copyryt').addClass('hide');
								}
			
			$(".ryt_maindv").animate({'padding-left':'68px'}, 500 );
			$(".icons_dv").animate({width: '48px'}, 500 );
	
$('.nav_arrow').addClass('show');
				$('.icon_right').removeClass('show');
				$('.icon_right').addClass('hide');
						
		if($('.menu_name').hasClass('hide') && $('#expandNav').hasClass('openNav')){
					setTimeout(function(){
$('.menu_name').removeClass('hide');
}, 300);
			
			$('.menu_name').addClass('show');
			}else{
					$('.menu_name').removeClass('show');
					setTimeout(function(){
$('.menu_name').addClass('hide');
}, 300);
				}
				}
							$('.icons_dv>ul>li').unbind('mouseover').on('mouseover',function(){
		
                        if($(document).width() >= '767'){
				if($(this).children().children('.menu_name').hasClass('show') && $('#expandNav').hasClass('closeNav')){ 
			
					$(this).children().children('.menu_name').removeClass('show');
					$(this).children().children('.menu_name').addClass('hide');
					}else{ 
					$('.left_sidebar').css({'z-index':'999'});
							$(this).children().children('.menu_name').removeClass('hide');
					$(this).children().children('.menu_name').addClass('show');
						}
                        }
				});
				
					$('.icons_dv>ul>li').unbind('mouseout').on('mouseout',function(){
			if($(document).width() >= '767'){	
				if($(this).children().children('.menu_name').hasClass('show') && $('#expandNav').hasClass('closeNav')){
					$(this).children().children('.menu_name').removeClass('show');
					$(this).children().children('.menu_name').addClass('hide');
						$('.left_sidebar').css({'z-index':'0'});
					}else{
						$('.left_sidebar').css({'z-index':'0'});
							$(this).children().children('.menu_name').removeClass('hide');
					$(this).children().children('.menu_name').addClass('show');
						}
                                    }
                              });	
     }
	})(jQuery);
	