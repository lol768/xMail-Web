$(document).ready(function(){
    var servers = $(".server");
    
    for(var i = 0; i < servers.length; i++){
        var server = $(servers[i]);
        processServer(server);
    }
});

function processServer(server){
    var ip = server.attr("data-ip");
    var port = server.attr("data-port");
    var name = server.attr("data-name");
    var url = server.attr("data-url");
    
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(data){
            $(server.find(".loading")).remove();
                        
            var html = "";
            if(!data['error']){
                html += "<img src='" + data['favicon'] + "'>";
                html += "<div class='info'>";
                html += "<span class='name'>" + name + "</span><br/>";
                html += "<span class='ip'>" + ip + (port == 25565 ? "" : ":" + port) + "</span><br/>";
                html += "<span class='players'>" + data['version'] + " - " + data['players'] + "/" + data['max'] + " Players</span>";
                html += "</div>";
            }else{
                var html = errorServer(ip, port, name);
            }
            
            server.html(html + server.html());
        },
        error: function(data){
            $(server.find(".loading")).remove();
            
            var html = errorServer(ip, port, name);            
            server.html(html + server.html());
        }
    });
}

function errorServer(ip, port, name){
    var html = "";
    html += "<img src='" + noImage + "'>"; // Set in view
    html += "<div class='info'>";
    html += "<span class='name'>" + name + "</span><br/>";
    html += "<span class='ip'>" + ip + (port == 25565 ? "" : ":" + port) + "</span><br/>";
    html += "<span class='players'>Offline - 0/0 Players</span>";
    html += "</div>";
    return html;
}