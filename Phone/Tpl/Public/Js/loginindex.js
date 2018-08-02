/**
 * Created by Administrator on 2017/1/30 0030.
 */
$(function() {
    $('.log').click(function () {
        location = login;
    });
    i = 0;
    $('.bimg').click(function () {
        if (i % 2 == 0) {
            $(this).attr('src', '/kt/Home/Tpl/Public/Images/2017-01-07_203605.png');
            $(this).prev().removeAttr('checked');
        } else {
            $(this).attr('src', '/kt/Home/Tpl/Public/Images/2017-01-07_203526.png');
            $(this).prev().attr('checked', '');
        }
        i++;
    });

    if (error1) {
        $('.error1').html(error1).show();
    }
    ;

    if (error2) {
        $('.error1').html("用户名或密码错误").show();
    }
    ;
    $("input[name=user]").on('input propertychange blur', function () {
        va = $(this).val();
        if (va) {
            $(this).data('nu', 1);
            $(this).parent().next().hide();
        } else {
            $(this).data('nu', 0);
            $(this).parent().next().show();
        }
    });
    $("input[name=password]").on('input propertychange blur', function () {
        va = $(this).val();
        if (va) {
            $(this).data('nu', 1);
            $(this).parent().next().hide();
        } else {
            $(this).data('nu', 0);
            $(this).parent().next().show();
        }
    });
    $('form').submit(function () {
        $('.auth').blur();
        tol = 0
        $('.auth').each(function () {
            tol += $(this).data('nu');
        });
        if (tol != 2) {
            return false;
        }
    })
    $('.regi').click(function(){
        location=app+'/Login/register';
    });
    $('.casual').click(function(){
        location=app+'/Article/index';
    });
});