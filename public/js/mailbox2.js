$(document).ready(function(){
    // Get mailbox
    $.getJSON("/api/mailbox.php", UpdateMailbox);
    $("body").on("click", "#mailbox tr", OpenMessage);
});

function UpdateMailbox(json){
    var target = $("#mailbox tbody");
    target.html("");
    $.each(json, function(i, item){
        target.append(
            "<tr data-mailid='"+item.ID+"' "+(item.unread ? "class='unread'": "")+">"
                +"<td class='message-from'><img src='"+item.head+"' class='message-head'>"+item.from+"</td>"
                +"<td class='message-content'>"+item.message+"</td>"
                +"<td class='message-timestamp'>"+item.sent+"</td>"
            +"</tr>"
        );
    });
}

function OpenMessage(e){
    e.preventDefault();
    
    var id = $(this).attr("data-mailid");
    console.log(id);
}