<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\USer;
use App\Models\Role;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole =Role::where('name', 'admin')->first();
        $authorRole =Role::where('name', 'author')->first();
        $userRole =Role::where('name', 'user')->first();

        $admin=User::create([
        	'name'=>'Admin User',
        	'email'=>'admin@mainwing.com',
        	'password'=>Hash::make('mainwing'),
        ]);
        $author=User::create([
        	'name'=>'Author User',
        	'email'=>'author@mainwing.com',
        	'password'=>Hash::make('mainwing'),
        ]);
        $user=User::create([
        	'name'=>'Generic User',
        	'email'=>'user@mainwing.com',
        	'password'=>Hash::make('mainwing'),
        ]);
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
