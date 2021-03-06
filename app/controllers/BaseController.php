<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
    
    protected function uuid($username){
        $json = json_decode(file_get_contents("http://uuid.turt2live.com/uuid/{$username}"), true);
        if(isset($json['uuid'])){
            if($json['uuid'] != 'unknown') return $json['uuid'];
        }
        return false;
    }
    
    protected function name($uuid){
        $json = json_decode(file_get_contents("http://uuid.turt2live.com/name/{$uuid}"), true);
        if(isset($json['status']) && isset($json['name']) && $json['status'] == 'ok'){
            if($json['name'] != 'unknown') return $json['name'];
        }
        return false;
    }
    
    protected function userByUuid($uuid, $findByName=true){        
        $user = User::where('uuid', $uuid)->first();
        if(!$user && $findByName){
            $user = $this->userByName($this->name($uuid), false);
        }
        return $user;
    }
    
    protected function userByName($name, $findByUuid=true){
        $users = User::where('name', $name)->get();
        
        if($users->count() > 1){
            // Multiple names? Oh no...
            $now = new DateTime();
            $now->setTimestamp(time());
            foreach($users as $u){
                // Check that the name belongs to this user
                $expectedName = $this->name($u->uuid);
                if($expectedName != $u->name){
                    $u->name = $expectedName;
                    $u->uuid_check = $now;
                    $u->save();
                }
            }
        }
        
        $user = User::where('name', $name)->first();
        if(!$user && $findByUuid){
            $user = $this->userByUuid($this->uuid($name), false);
        }
        return $user;
    }
    
    protected function generateServerToken($ip, $port){        
        $token = new ServerToken();
        $token->server_ip = $ip;
        $token->server_port = $port;
        $token->token = md5($ip . $port . time());
        $token->save();
        
        return $token;
    }
    
    protected function validatorToXm($validator){
        return $validator->messages()->all();
    }

}
