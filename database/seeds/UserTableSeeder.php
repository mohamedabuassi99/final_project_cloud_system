<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = \App\Models\User::create([
            'name'=> 'admin',
            'email'=>'admin@admin.com',
            'password'=> bcrypt('123456789')
        ]);
        $user->attachRole('admin');
    }
}
