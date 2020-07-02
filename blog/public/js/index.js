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

    $(".tab_menu").click(function(){
        $('.tab_menu').removeClass('on');
        $(this).addClass('on');
        var tab_idx = $(this).index();
        console.log(tab_idx)
        $('.tab_con').hide();
        $('.tab_con').eq(tab_idx).show();
    });

    $(".board_view_con .board_sub_title .file_down").click(function(){
        $(".board_view_con .board_sub_title .file_down_real").toggle();
    });
    var url = location.href;
    console.log(url)
    if(url.indexOf("tech") !== -1){
        console.log(url)
        $(".sub_top").css({background: 'url(../img/sub_top01.png) no-repeat center'})
    }else if(url.indexOf("institution") !== -1){
        console.log(url)
        $(".sub_top").css({background: 'url(../img/sub_top02.png) no-repeat center'})
    }else if(url.indexOf("dispute") !== -1){
        console.log(url)
        $(".sub_top").css({background: 'url(../img/sub_top03.png) no-repeat center'})
    }else if(url.indexOf("education") !== -1){
        console.log(url)
        $(".sub_top").css({background: 'url(../img/sub_top04.png) no-repeat center'})
    }else if(url.indexOf("happycall") !== -1){
        console.log(url)
        $(".sub_top").css({background: 'url(../img/sub_top05.png) no-repeat center'})
    }else if(url.indexOf("information") !== -1){
        console.log(url)
        $(".sub_top").css({background: 'url(../img/sub_top06.png) no-repeat center'})
    }
});