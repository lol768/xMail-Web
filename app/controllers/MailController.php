<?php
class MailController extends BaseController {

	public function getMailbox(){
		return View::make('mailbox');
	}
    
    public function getMailboxMail(){
        $mailbox = array();
        
        $mailbox[0] = array("ID" => 1, "from" => "turt2live", "unread" => true, "sent" => "1 minute ago", "message" => $this->message());
        $mailbox[1] = array("ID" => 2, "from" => "Hawkfalcon", "unread" => true, "sent" => "4 hours ago", "message" => $this->message());
        $mailbox[2] = array("ID" => 3, "from" => "drtshock", "unread" => true, "sent" => "10:00 AM", "message" => $this->message());
        $mailbox[3] = array("ID" => 4, "from" => "FlamingPaw", "unread" => true, "sent" => "Yesterday", "message" => $this->message());
        $mailbox[4] = array("ID" => 5, "from" => "turt2live@turt2live.com", "unread" => true, "sent" => "July 5", "message" => $this->message());
        $mailbox[5] = array("ID" => 6, "from" => "Notch", "unread" => false, "sent" => "January 13", "message" => $this->message());
        $mailbox[6] = array("ID" => 7, "from" => "Dinnerbone", "unread" => false, "sent" => "Last year", "message" => $this->message());

        // TODO: Make this not happen...
        $maxLength = 50;
        for($i=0;$i<count($mailbox);$i++){
            $message = $mailbox[$i]["message"];
            
            if(strlen($message)>$maxLength){
                $message = substr($message, 0, $maxLength - 3) . "...";
            }
            
            $mailbox[$i]["message"] = $message;
            $mailbox[$i] = $this->GetHead($mailbox[$i]);
        }
        
        return Response::json($mailbox);
    }
    
    private function GetHead($mailMessage){
        $username = $mailMessage["from"];
        if(strpos($username, '@') === FALSE){
            // Likely a valid minecraft username
            $mailMessage["head"] = "https://minotar.net/avatar/".$username."/50";
        }else{ 
            $mailMessage["head"] = "images/head_placeholder.png";
        }
        return $mailMessage;
    }
    
    // TODO: Debug code remove
    private function message() {
        $length = rand(50, 300);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
            if(rand(0, 100) < 15) $randomString .= " ";
        }
        return $randomString;
    }
}
