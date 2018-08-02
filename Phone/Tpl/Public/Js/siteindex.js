/**
 * Created by Administrator on 2017/1/28 0028.
 */
$(function(){
    $('.sites .drop').click(function(){
        $(this).css({'background':'#EEEEEE'});
        $('.dt').toggle();
    })
    $('.arr').parent().click(function(){
        $(this).next().toggle();
    })
    $('.dt li').click(function(){
        va=$(this).attr('uid');
        if(va!=''){
            $.ajax({
                url: findsite,
                type: "get",
                data: {'id': va},
                success: function (data) {
                    $('article section').html(data)
                }
            })
        }
    });
    $('.mysite li').click(function(){
        va=$(this).attr('sid');
        na=$(this).attr('na');
        $.ajax({
            url: arlist,
            type: "get",
            data: {'id': va,'na':na},
            success: function (data) {
                $('article section').html(data)
            }
        })
    })
    $(document).on('click','.jia button',function(){
        obj=$(this);
        vid=obj.attr('vid');
        if(obj.html()=='+订阅'){
            $.ajax({
                url:subhand,
                type:"get",
                data:{sub:1,article:vid},
                success:function(data){
                    if(data==1){
                        obj.html('已订阅').removeClass('nosub').addClass('subed')
                    }
                }
            })
        }else {
            $.ajax({
                url:subhand,
                type:"get",
                data:{sub:0,article:vid},
                success:function(data){
                    if(data==0){
                        obj.html('+订阅').removeClass('subed').addClass('nosub')
                    }
                }
            })
        }
    })
})