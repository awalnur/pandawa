<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Initial extends Migration
{
    public function up()
    {
        /////
        echo "database instal...\n";
		$database_name = $this->db->database;
		$dump_file = dirname(__FILE__) . '/../dump/pedoma.sql';
		$user_name = $this->db->username;
		$password = $this->db->password;
		$commond = "mysql -u{$user_name} {$database_name}  < {$dump_file}";
		if($password){
			$commond = "mysql -u{$user_name} -p{$password} {$database_name} < {$dump_file}";
		}
		system($commond);
		echo 'done';
    }

    public function down()
    {
        echo "database restore....\n";
		self::up();
		echo "Done. \n";
    }
}
