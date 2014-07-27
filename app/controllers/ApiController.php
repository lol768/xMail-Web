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
        
        $tokenObj->delete();        
        return Response::json($result);
	}
    
    public function getPurgeOldCodes($secret){
        $result = array();
        
        if($secret != Config::get('xmail')["api_secret"]){
            $result = array("status" => "error", "error" => "invalid secret");
        }else{
            $set = User::where('register_token_create', '>=', time() - (24 * 60 * 60))->get();
            $expired = array();
            foreach($set as $user){
                $user->register_token = null;
                $user->register_token_create = null;   
                $user->password = null;
                $this->sendRegTokenExpired($user->email);
                $user->email = null; // Reset as we don't want to have them run into issues at registration
                $user->save();
                array_push($expired, array("name" => $user->name, "uuid" => $user->uuid));
            }
            $result["expired"] = $expired;
            $result["status"] = "ok";
        }
        
        return Response::json($result);
    }
    
    private function sendRegTokenExpired($email){
        Mail::queue('emails.regexpired', array(), function($message) use ($email){
            $message->to($email);
            $message->subject("xMail Account Registration Expired");
        });
    }
    
    private function sendRegTokenConfirm($email){
        Mail::queue('emails.confirmed', array(), function($message) use ($email){
            $message->to($email);
            $message->subject("xMail Account Confirmed");
        });
    }
    
    // TODO: Update route when this changes
    public function getRegConfirm($token){
        $user = User::where('register_token', $token)->first();
        
        $result = null;
        if(!$user || !$user->register_token || !$token || strlen($token) != 16){
            $result = array("error" => "not found or not pending registration", "status" => "error");
        }else{            
            // Check for expired token
            $now = new DateTime();
            $created = new DateTime($user->register_token_create);
            $expire = 24 * 60 * 60; // 24 hours
            if($now->getTimestamp() - $created->getTimestamp() < $expire){
                $user->register_token = null;
                $user->register_token_create = null;   
                $result = array("status" => "ok", "message" => "user verified");
                $this->sendRegTokenConfirm($user->email);
            }else{
                // Expired :(
                $user->register_token = null;
                $user->register_token_create = null;   
                $user->password = null;   
                $result = array("error" => "token expired", "status" => "error");
                $this->sendRegTokenExpired($user->email);
                $user->email = null; // Reset as we don't want to have them run into issues at registration
            }
            
            $user->save();
        }
        
        return Response::json($result);
    }
}
