<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::insert([
            
            'name'=>'manoj',
            'email'=>'manoj@gmail.com',
            'password'=>bcrypt('password'),
            'image'=>'',
            'phone'=>'9861643394',
            'status'=>'1',
            'role_id'=>'1',

        ]);
        }       
    
}
