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
        // $this->call(UsersTableSeeder::class);
        \App\Models\User::create([
          'name' => 'Nhật Phạm Văn',
          'role' => 2,
          'email' => 'thegioicotich.xahoa@wonderful.greate.thiendan',
          'password' => bcrypt('MottinhyeuBenho@SauLang'),
          'remember_token' => str_random(10),
        ]);
    }
}
