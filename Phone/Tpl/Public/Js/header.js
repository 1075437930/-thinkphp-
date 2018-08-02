/**
 * Created by Administrator on 2017/1/7 0007.
 */
$(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()>=400){
            $('.backtop').show();
        }else {
            $('.backtop').hide();
        }
    })
    $('.backtop').click(function(){
        $(window).scrollTop(0)
    })
});

