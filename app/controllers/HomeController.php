<?php

class HomeController extends BaseController {

	public function getIndex(){
		if(Auth::check()){
            return Redirect::route('mailbox');
        }
        return Redirect::route('about');
	}
    
    public function getAbout(){
		return View::make('about');
    }
    
    public function getAboutPlayers(){
        return View::make('about_players');
    }
    
    public function getAboutOwners(){
        return View::make('about_owners');
    }
    
    public function getAboutNetworks(){
        return View::make('about_networks');
    }
    
    public function getAboutDevelopers(){
        return View::make('about_developers');
    }
    
    public function getContact(){
		return View::make('contact');
    }
    
    public function postContact(){
        $rules = array("email" => "required|email", "message" => "required");
        $validator = Validator::make(Input::all(), $rules);
        
        if($validator->fails()){
            return Redirect::route('contact')->with('xmErrors', $this->validatorToXm($validator));
        }
        
        $customerEmail = Input::get("email");
        $adminEmail = Config::get('xmail')["admin_email"];
        Mail::queue("emails.customer_contact", array(
                "email" => Input::get("email"), 
                "mcname" => Input::get("username"), 
                "content" => Input::get("message")
            ), function($message) use ($customerEmail) {
            $message->to($customerEmail);
            $message->subject("xMail Contact Request");
        });
        Mail::queue("emails.admin_contact", array(
                "email" => Input::get("email"), 
                "mcname" => Input::get("username"), 
                "content" => Input::get("message"),
                "ip" => Request::getClientIp(),
                "mcuuid" => Input::get("username") ? $this->uuid(Input::get("username")) : null,
                "currUser" => Auth::check() ? Auth::user()->name . " / " . Auth::user()->email : null
            ), function($message) use ($adminEmail) {
            $message->to($adminEmail);
            $message->subject("xMail Customer Contact");
        });
        
        return Redirect::route('contact')->with('xmSuccesses', array('Thank you for reaching out. We\'ve sent a copy of your request to your email and to the administrators of xMail.'));
    }
    
    public function getDownload(){
		return View::make('download');
    }
    
    public function getTerms(){
		return View::make('terms');
    }
    
    public function getPrivacyPolicy(){
		return View::make('privacy');
    }
    
    public function getServers(){
        $chosen = Server::orderByRaw("RAND()")->get();
        $servers = array();
        
        foreach($chosen as $server){
            $token = $this->generateServerToken($server->ip, $server->port);
            
            $servers[count($servers)] = array(
                "name" => $server->name,
                "ip" => $server->ip,
                "port" => $server->port,
                "token" => $token->token
            );
        }
        
        return View::make('servers')->with("servers", $servers);
    }
}
