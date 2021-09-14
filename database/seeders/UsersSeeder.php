<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Bryan Ortiz',
            'email'=> 'bryan@gmail.com',
            'password'=>Hash::make('123456789'),
            'url'=>'https://laravel.com/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $user=User::create([
            'name'=>'Keneth',
            'email'=> 'ken@gmail.com',
            'password'=>Hash::make('123456789'),
            'url'=>'https://laravel.com/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
