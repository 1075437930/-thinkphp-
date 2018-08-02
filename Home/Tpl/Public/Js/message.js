$(function(){
    $('.close').click(function(){
        if(window.confirm('是否要删除这条回复？')){
            location=url+'/delmessage/id/'+$(this).attr('di');
        }
    })
});