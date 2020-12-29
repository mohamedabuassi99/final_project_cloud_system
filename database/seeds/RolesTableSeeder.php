<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = \App\Models\Role::create([
            'name'=>'admin',
            'display_name'=>'admin',
            'description'=>'can do any think in the project'
        ]);
        $user = \App\Models\Role::create([
            'name'=>'student',
            'display_name'=>'student',
            'description'=>'can do specific tasks'
        ]);
    }
}
