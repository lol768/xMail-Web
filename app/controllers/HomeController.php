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
