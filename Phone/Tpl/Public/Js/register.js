/**
 * Created by Administrator on 2017/1/10 0010.
 */
$(function(){
   $('input[name=email]').on('input propertychange blur',function(){
            va=$(this).val();
            if(/^\w+@[^_]+.[a-z]+$/.test(va)){
                $(this).data('nu',1)
                $(this).parent().next().hide();
            }else {
                $(this).data('nu',0)
                $(this).parent().next().show();
            }
   });
    $('input[name=user]').on('input propertychange blur',function(){
        va=$(this).val();
        if(/^\w{7,24}$/.test(va)){
            $(this).data('nu',1)
            $(this).parent().next().hide();
        }else {
            $(this).data('nu',0)
            $(this).parent().next().show();
        }
    });
    $('input[name=password]').on('input propertychange blur',function(){
        va=$(this).val();
        if(/^\w{6,20}$/.test(va)){
            $(this).data('nu',1)
            $(this).parent().next().hide();
        }else {
            $(this).data('nu',0)
            $(this).parent().next().show();
        }
    });
    $('input[name=repassword]').on('input propertychange blur',function(){
        va=$(this).val();
        va1=$('input[name=password]').val()
        if(va==va1){
            $(this).data('nu',1)
            $(this).parent().next().hide();
        }else {
            $(this).data('nu',0);
            $(this).parent().next().show();
        }
    });
    $('input[name=verify]').on('blur',function(){
        va=$(this).val();
        obj=$(this);
        $.ajax({
           url:'/kt/home.php/Login/cheveri',
           type:'post',
           data:{veri:va},
           success:function(data){
               if(data==1){
                   obj.data('nu',1);
                   obj.parent().next().hide();
               }else {
                   obj.data('nu',0);
                   obj.parent().next().show();
                   obj.next().attr('src',"/kt/home.php/Login/verify/"+Math.random());
               }
           }
        });
    });
    $('form').submit(function(){
        $('.auth').blur();
        tol=0;
        $('.auth').each(function(){
            tol+=$(this).data('nu')
        })
        if(tol!=5){
            return false;
        }
    })
    $('.form-group img').attr('src',"/kt/home.php/Login/verify/"+Math.random());
});