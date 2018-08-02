/**
 * Created by Administrator on 2017/1/27 0027.
 */
$(function(){
    $('section.study button').click(function(){
        var obj = $(this);
        if (obj.html()=='+关注') {
            $.ajax({
                url:subhand,
                type: "get",
                data: {subid:id, fa:1},
                success: function (data) {
                    if (data == 'no') {
                        $('.tip').html('请先登录').show();
                        setTimeout(function () {
                            $('.tip').hide()
                        }, 2000)
                    }
                    if (data == 1) {
                        obj.html('已关注')
                    }
                }
            })
        } else {
            $.ajax({
                url:subhand,
                type: "get",
                data: {subid:id, fa:0},
                success: function (data) {
                    if (data == 0) {
                        obj.html('+关注');
                    }
                }
            })
        }
    })
})