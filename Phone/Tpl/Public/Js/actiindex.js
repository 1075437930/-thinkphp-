/**
 * Created by Administrator on 2017/1/20 0020.
 */
$(function(){
    $('.x').append($('.x a').eq(0).clone().css({'float':'left'}));
    siz=$('.x img').size();
    wid=$('.x img').width();
    $('.x').css({'width':siz*wid});
    for(s=0;s<siz-1;s++){
        $('.page').append("<li></li>");
    }
    var i=0;
    le=0;
    function move(){
        i++;
        if(i>=siz){
            i=1;
            $('.x').css({'left':'0px'});
        }
        if(i>=siz-1){
            $('.page li').eq(0).css({'background':'white'}).siblings().css({'background':'#869CA8'})
        }
        le=-i*wid;
        $('.x').animate({'left':le+'px'});
        $('.page li').eq(i).css({'background':'white'}).siblings().css({'background':'#869CA8'})
    }
    $('.page li').eq(0).css({'background':'white'})
    T=setInterval(move,2000);
    $('.hot figure').hover(function(){
        clearInterval(T)
        $('.btn').show();
    },function(){
        T=setInterval(move,2000);
        $('.btn').hide();
    })
    $('.btn-ri').click(function(){
        move();
    });
    $('.btn-le').click(function(){
        i--;
        if(i<0){
            i=siz-2;
        }
        if(i>=siz-1){
            $('.page li').eq(0).css({'background':'white'}).siblings().css({'background':'#869CA8'})
        }
        le=-i*wid;
        $('.x').animate({'left':le+'px'});
        $('.page li').eq(i).css({'background':'white'}).siblings().css({'background':'#869CA8'})
    })
    $('.page li').click(function(){
        inde=$(this).index();
        i=inde;
        le=-inde*wid;
        $('.x').animate({'left':le+'px'});
        $('.page li').eq(inde).css({'background':'white'}).siblings().css({'background':'#869CA8'})
    })
    $('.word p:last-child').css({'border':'0'});
    $('.city-con a').hover(function(){
        $(this).css({'color':'#16A085'})
    },function(){
        $(this).css({'color':'#333333'})
    });
    if(!city){
        $('.city-con a').eq(0).hover(function(){
            $(this).css({'color':'white'})
        },function(){
            $(this).css({'color':'white'})
        });
    }
    $('.city-con a').each(function(){
        uid=$(this).attr('uid');
        var obj=$(this)
        if(uid==city){
            $(this).hover(function(){
                $(this).css({'color':'white'})
            },function(){
                $(this).css({'color':'white'})
            });
        }
    })
    $('.close').click(function(e){
        $('.dropdown').hide();
        e.stopImmediatePropagation()
    });
    var x=0;
    $('.drop').click(function(e){
        if(x%2==0) {
            $('.dropdown').show()
        }else {
            $('.dropdown').hide()
        }
        x++
        e.stopImmediatePropagation()
    })
    $(document).click(function(){
        if(x%2!=0) {
            $('.dropdown').hide();
            x++
        }
    })
});