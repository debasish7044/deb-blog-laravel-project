<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  $user =  User::where('email','debasishd989@gmail.com')->first();


      //  if($user){
      //     User::create([
      //        'name' => 'Debasish Das',
      //        'email' => 'debasishd989@gmail.com',
      //        'role' => 'admin',
      //        'password' => Hash::make('12345678'),
      //    ]);
      //  }
   
       User::create([
             'name' => 'Debasish Das',
             'email' => 'debasishd989@gmail.com',
             'role' => 'admin',
             'password' => Hash::make('12345678'),
         ]);
      
    }
}
