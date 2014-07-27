<?php
class ServerSeeder extends Seeder {
    public function run(){
        DB::table('servers')->delete();
        
        $servers = array(
            array('ip' => "mc.turt2live.com", 'name' => 'xMail Official Server', 'port' => 25565)
        );
        
        DB::table('servers')->insert($servers);
    }
}
?>