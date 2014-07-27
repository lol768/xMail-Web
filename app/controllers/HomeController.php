<?php

class HomeController extends BaseController {

	public function getIndex(){
		return View::make('home');
	}
    
    public function getAbout(){
		return View::make('about');
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
}
