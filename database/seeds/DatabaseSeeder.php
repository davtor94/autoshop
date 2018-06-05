<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate([
            'users',
            'tips',
            'ads'
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TipsSeeder::class);
        $this->call(AdsSeeder::class);
    }

    protected function truncate(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
