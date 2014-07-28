<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PurgeRegisterTokensCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:purgetokens';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Purges old registration tokens';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $set = User::where('register_token_create', '>=', time() - (24 * 60 * 60))->get();
        $this->info($set->count() . ' records need purging');
        foreach($set as $user){
            $this->info('Expiring ' . $user->name . ' (' . $user->uuid . ') - ' . $user->email);
            $user->register_token = null;
            $user->register_token_create = null;   
            $user->password = null;
            $this->sendRegTokenExpired($user->email);
            $user->email = null; // Reset as we don't want to have them run into issues at registration
            $user->save();
        }
        $this->info('Done!');
	}
    
    private function sendRegTokenExpired($email){
        Mail::queue('emails.regexpired', array(), function($message) use ($email){
            $message->to($email);
            $message->subject("xMail Account Registration Expired");
        });
    }

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
