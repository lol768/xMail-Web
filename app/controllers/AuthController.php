<?php
class AuthController extends BaseController{
    public function getLogin(){
        return View::make('login');
    }
    
    public function postLogin(){
        $rules = array('username' => 'required', 'password' => 'required');
        $validator = Validator::make(Input::all(), $rules);
        
        if($validator->fails()){
            return Redirect::route('login')->withErrors($validator);
        }
        
        $auth = Auth::attempt(array(
            'name' => Input::get('username'),
            'password' => Input::get('password')
        ), false);
        
        if(!$auth){
            return Redirect::route('login')->withErrors(array('Invalid username or password'));
        }
        
        return Redirect::route('home');
    }
    
    public function getSignout(){
        Auth::logout(false);
        return Redirect::route('login')->with('xmSuccesses', array('You have been logged out'));
    }
    
    public function getRegister(){
        return View::make('register');
    }
    
    public function postRegister(){
        $messages = array('confpassword.required' => 'The confirmation password is required.');
        $rules = array('username' => 'required', 'password' => 'required|min:7', 'confpassword' => 'required|min:7', 'email' => 'required|email|unique:users,email');
        $validator = Validator::make(Input::all(), $rules, $messages);
        
        if($validator->fails()){
            return Redirect::route('register')->with('xmErrors', $this->validatorToXm($validator));
        }
        
        $password1 = Input::get('password');
        $password2 = Input::get('confpassword');
        if($password1 != $password2){
            return Redirect::route('register')->with('xmErrors', array('The passwords must match'));
        }
        
        $mcname = Input::get('username');
        $mcUser = $this->userByName($mcname);
        $mcuuid = !$mcUser ? $this->uuid($mcname) : $mcUser->uuid;
        
        if(!$mcuuid){
            return Redirect::route('register')->with('xmErrors', array('Could not validate Minecraft username as a paid account.'));
        }
        
        if(!$mcUser){
            $mcUser = new User();
        }else{
            // Validate not pending confirmation
            if($mcUser->register_token){
                return Redirect::route('register')->with('xmErrors', array('Account pending confirmation - check your email for the confirmation information. Click <a href="' . URL::route('resendregcode') . '">here</a> to send it again.'));
            }
            
            // Validate not already registered
            if($mcUser->password){
                return Redirect::route('register')->with('xmErrors', array('Account already registered. Did you <a href="' . URL::route('forgotpass') . '">forget your password</a>?'));
            }
        }
        
        $hashed = Hash::make(Input::get('password'));
        $mcUser->name = $mcname;
        $mcUser->email = Input::get('email');
        $mcUser->password = $hashed;
        $mcUser->uuid = $mcuuid;
        
        // Generate a registration code
        $code = sha1($mcuuid . time());
        $code = substr($code, 0, 16);
        $mcUser->register_token = $code;
        Session::put("registercode", $code);
        Session::put("codefor", $mcuuid);
        
        $mcUser->save();
        
        $this->sendRegCode(Input::get('email'));
        
        return Redirect::route('registercode')->with('xmSuccesses', array('Your account has been created. Please read the information below.'));
    }
    
    public function getResendRegCode(){
        return View::make('resendregcode');
    }
    
    public function postResendRegCode(){
        $rules = array("email" => "required|email|exists:users,email", "username" => "required"); // Can't check username as it may have changed
        $validator = Validator::make(Input::all(), $rules);
        
        if($validator->fails()){
            return Redirect::route('resendregcode')->with('xmErrors', $this->validatorToXm($validator));
        }

        $user = $this->userByName(Input::get('username'));
        if(!$user || $user->register_token == null){
            return Redirect::route('resendregcode')->with('xmErrors', array('No confirmation code found for that account!'));
        }else if(strtolower($user->email) != strtolower(Input::get('email'))){
            return Redirect::route('resendregcode')->with('xmErrors', array('That account does not belong to you! Did you enter the email and username correctly?'));
        }
        
        // Generate a new registration code
        $code = sha1($user->uuid . time());
        $code = substr($code, 0, 16);
        $user->register_token = $code;
        
        if(Session::has("registercode") && Session::get("codefor") == $user->uuid){
            Session::put("registercode", $code);
        }
        
        $user->save();
        
        if($this->sendRegCode($user->email)){
            return Redirect::route('resendregcode')->with('xmSuccesses', array('Your confirmation code has been sent to your email and it should arrive shortly. We\'ve chosen a new confirmation code for your security.'));
        }else{
            return Redirect::route('resendregcode')->with('xmErrors', array('Something went wrong with sending your confirmation code. Try again?'));
        }
    }
    
    private function sendRegCode($email){
        $user = User::where('email', $email)->first();
        if($user){
            $code = $user->register_token;
            if($code){
                Mail::queue('emails.register', array('mcname' => $user->name, 'token' => $code), function($message) use ($email){
                    $message->subject('xMail Account Confirmation');
                    $message->to($email);
                });
                return true;
            }
        }
        
        return false;
    }
    
    public function getRegisterCode(){
        $chosen = Server::orderByRaw("RAND()")->take(3)->get();
        $servers = array();
        
        foreach($chosen as $server){
            $token = new ServerToken();
            $token->server_ip = $server->ip;
            $token->server_port = $server->port;
            $token->token = md5($server->ip . $server->port . time());
            $token->save();
            
            $servers[count($servers)] = array(
                "name" => $server->name,
                "ip" => $server->ip,
                "port" => $server->port,
                "token" => $token->token
            );
        }
    
        return View::make('registercode')->with('code', Session::get('registercode'))->with('servers', $servers);
    }
}
?>