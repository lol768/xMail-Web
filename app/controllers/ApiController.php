<?php
class ApiController extends BaseController {

	public function getMcServer($ip, $port, $token){
        $tokenObj = ServerToken::where("token", $token)->first();
        if(!$tokenObj || !$tokenObj->validFor($ip, $port, $token)){
            return json_encode(array("error" => "Invalid request"));
        }
        
        $result = null;
        $json = json_decode(file_get_contents("http://api.minetools.eu/ping/" . $ip . "/" . $port), true);
            
        if(isset($json["error"])){
            $result = array("error" => "Error in request", "apimessage" => $json["error"]);
        }else{                
            $version = $json["version"]["name"];
            $version = explode(' ', $version);
            $version = $version[count($version) - 1];
            
            $favicon = isset($json['favicon']) ? $json["favicon"] : URL::asset("images/noicon.png");
            
            $result = array(
                "players" => $json["players"]["online"],
                "max" => $json["players"]["max"],
                "version" => $version,
                "favicon" => $favicon
            );
        }
        
        return json_encode($result);
	}
}
