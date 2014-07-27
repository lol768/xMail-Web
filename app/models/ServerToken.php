<?php
class ServerToken extends Eloquent{

    protected $table = 'server_tokens';
    
    public function validFor($serverIp, $serverPort, $token){
        return $this->server_ip == $serverIp
            && $this->server_port == $serverPort
            && $this->token == $token;
    }
    
}
?>