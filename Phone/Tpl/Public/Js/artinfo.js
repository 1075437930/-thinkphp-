/**
 * Created by Administrator on 2017/1/27 0027.
 */
$(function(){
$('.fabulous').click(function(){
    obj=$(this);
    if( obj.css('background-position')=='-6px -87px') {
        $.ajax({
            url: addfab,
            type: 'get',
            data: {fab: 1, article: id, user:userid},
            success: function (data) {
                if (data == 'no') {
                    obj.next().html('请先登录').show();
                    setTimeout(function () {
                        obj.next().hide()
                    }, 2000);
                }
                if(data==1){
                    obj.css({'background-position': '-6px -7px'});
                    obj.next().html('已赞').show();
                    setTimeout(function () {
                        obj.next().hide()
                    }, 2000);
                }
            }
        })
    }else {
        $.ajax({
            url:addfab,
            type:'get',
            data:{fab:0,article:id,user:userid},
            success:function(data){
                if(data==0){
                    obj.css({'background-position':'-6px -87px'});
                    obj.next().html('已取消赞').show();
                    setTimeout(function(){
                        obj.next().hide()
                    },2000);
                }
            }
        })
    }
});
$('.coll').click(function(){
    obj=$(this);
    if(obj.find('span').html()=='收藏') {
        $.ajax({
            url: collhand,
            type: 'get',
            data: {fab: 1, article: id, user: userid},
            success: function (data) {
                if (data == 'no') {
                    obj.next().html('请先登录').show();
                    setTimeout(function () {
                        obj.next().hide()
                    },2000);
                }
                if(data==1){
                    obj.find('span').html('已收藏');
                    obj.find('img').attr('src','/kt/Home/Tpl/Public/Images/2017-01-12_164828.png');
                    obj.next().html('已收藏').show();
                    setTimeout(function () {
                        obj.next().hide()
                    },2000);
                }
            }
        })
    }else {
        $.ajax({
            url:collhand,
            type:'get',
            data:{fab:0,article:id,user: userid},
            success:function(data){
                if(data==0){
                    obj.find('span').html('收藏');
                    obj.find('img').attr('src','/kt/Home/Tpl/Public/Images/2017-01-11_180151.png');
                    obj.next().html('已取消收藏').show();
                    setTimeout(function(){
                        obj.next().hide()
                    },2000);
                }
            }
        })
    }
})
$('.comment textarea').focus(function(){
    $(this).css({'border':'1px solid #0AA284'})
})
$('.comment textarea').blur(function(){
    $(this).css({'border':'1px solid #CCCCCC'})
})
$('.third input[type=button]').click(function(){
    val=$('.comment textarea').val();
    $.ajax({
        url:addcomment,
        type:'post',
        data:{comm:val,article:id},
        success:function(data){
            if(data=="no"){
                $('.error').html('请先登录').show();
                setTimeout(function(){
                    $('.error').hide();
                },2000)
            }
            if(data==0){
                $('.error').html('评论不能为空').show();
                setTimeout(function(){
                    $('.error').hide();
                },2000)
            }
            if(data!=0 && data!="no"){
                $('.comment-info').append(data)
            }
        }
    })
});
$('.close').click(function(){
    $('.re').fadeOut();
})
$('.reply').click(function(){
    obj=$(this);
    if("<{:isset($_SESSION['user_id'])}>") {
        $('.re').fadeIn();
        $('.re').find('.direct').html(obj.attr('rename'))
        $('.re').attr('poid', obj.attr('reid'))
        $('.re').find('button').click(function (e) {
            val = $('.re').find('textarea').val();
            $.ajax({
                url: addreplay,
                type: "post",
                data: {comm: $('.re').attr('poid'), ve: val},
                success: function (data) {
                    if (data == 0) {
                        $('.fabtip').html('回复不能为空').show()
                        setTimeout(function () {
                            $('.fabtip').hide();
                        }, 2000)
                    } else {
                        obj.after(data);
                        $('.re').fadeOut();
                    }
                }
            });
            e.stopImmediatePropagation();
        })
    }else {
        $('.fabtip').html('登录后才能回复').show();
        setTimeout(function () {
            $('.fabtip').hide();
        }, 2000)
    }
})
$('.about button').click(function(){
    obj=$(this);
    if(obj.html()=='+订阅'){
        $.ajax({
            url:subhand,
            type:"get",
            data:{sub:1,article:"<{$art[0]['si']}>"},
            success:function(data){
                if(data==1){
                    obj.html('已订阅').removeClass('nosub').addClass('subed')
                }
                if(data=='no'){
                    obj.next().html('请先登录').show();
                    setTimeout(function () {
                        obj.next().hide()
                    }, 2000);
                }
            }
        })
    }else {
        $.ajax({
            url:subhand,
            type:"get",
            data:{sub:0,article:"<{$art[0]['si']}>"},
            success:function(data){
                if(data==0){
                    obj.html('+订阅').removeClass('subed').addClass('nosub')
                }
            }
        })
    }
})
})