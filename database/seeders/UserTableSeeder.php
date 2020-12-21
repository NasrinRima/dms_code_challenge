<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BasicPart\User;

class UserTableSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->_create(['name' => 'Mr. Developer', 'email' => 'developer@example.com', 'password' => bcrypt('@cc3$$#COM'), 'role_id' => '1','is_active'=>true]);
        $this->_create(['name' => 'Mr. Admin', 'email' => 'admin@example.com', 'password' => bcrypt('@cc3$$#COM'), 'role_id' => '2','is_active'=>true]);
    }
    
    private function _create(array $data){
        return User::create($data);
    }

}
