<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'David Torres',
            'email' => 'david@ejemplo.com',
            'address' => 'calle alvarado #1212',
            'password' => bcrypt('null'),
        ]);
      //  DB::table('users')->insert();
    }
}
