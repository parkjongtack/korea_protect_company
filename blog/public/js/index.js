$(document).ready(function(){
    var t_nav = $('.top_nav li');
    var s_nav = $('.h_sub_nav');
    $(t_nav).hover(function(){
        $('.h_sub_nav').stop().slideDown(500);
    },function(){
        $('.h_sub_nav').stop().slideUp(500);
    });
    $(s_nav).hover(function(){
        $('.h_sub_nav').stop().slideDown(500);
    },function(){
        $('.h_sub_nav').stop().slideUp(500);
    });
    $('.h_sub_nav li').hover(function(){
        $(this).addClass('on');
    },function(){
        $(this).removeClass('on');
    });

    //notice
    var tab_click =$('.tab_click');
    var tab_list =$('.tab_list');

    $(tab_click).click(function(){
        var idx = $(this).index();
        $(tab_click).removeClass('on')
        $(this).addClass('on');
        $(tab_list).hide();
        $(tab_list).eq(idx).show();
    });

    $('.faq_list li').click(function(){
        $(this).toggleClass('on');
        if($(this).hasClass('on')){
            $(this).children('.faq_a').slideDown();
        }else{
            $(this).children('.faq_a').slideUp();
        }
        
        
    });
});