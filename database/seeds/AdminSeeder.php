<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert([
            [
                'username' => 'admin.dev',
                'email' => 'admin@seltuazion.com',
                'password' => '$2y$10$r3uZ8j/QdkpkrAylOyIOVupQ1ywm4UxiO6iNFe03WRLMKosaJTkFS',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
