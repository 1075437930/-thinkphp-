/**
 * Created by Administrator on 2017/1/7 0007.
 */
$(function(){
    i=0;
    $('.to-ri').click(function(e){
        if(i%2==0){
            $(this).css({'background':'#F3F3F3'})
            $(this).find('ul').show();
        }else {
            $(this).css({'background':'white'})
            $(this).find('ul').hide();
        }
        i++;
        e.stopPropagation()
    });
    $(document).click(function(){
        if(i%2!=0){
            $('.to-ri').css({'background':'white'})
            $('.to-ri').find('ul').hide();
            i--
        }
    });
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

