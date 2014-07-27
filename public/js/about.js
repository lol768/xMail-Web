$(document).ready(function(){
    $(".aboutbox").click(function(){
        var url = $(this).attr('data-url');
        window.location.href = url;
    });
});
