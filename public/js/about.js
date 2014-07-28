$(document).ready(function(){
    $(".aboutbox").click(function(){
        var url = $(this).attr('data-url');
        
        if($(this).attr('data-newwindow') == '1'){
            var w = window.open(url, '_blank');
            w.focus();
        } else window.location.href = url;
    });
});
