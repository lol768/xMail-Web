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
    
    // TODO: Perform update operations
    
    protected function userByUuid($uuid, $findByName=true){
        $user = User::where('uuid', $uuid)->first();
        if(!$user && $findByName){
            $user = $this->userByName($this->name($uuid), false);
        }
        return $user;
    }
    
    protected function userByName($name, $findByUuid=true){
        $user = User::where('name', $name)->first();
        if(!$user && $findByUuid){
            $user = $this->userByUuid($this->uuid($name), false);
        }
        return $user;
    }
    
    protected function validatorToXm($validator){
        return $validator->messages()->all();
    }

}
