<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAdminSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert([
            'full_name' => "Abdelhamid",
            'name'      => "abdelhamid_admin",
            'email' => "wassim.elkaouia@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'b_day'  => "1994-07-06",
            'avatar' => "/profile_default.jpeg",
            'role_id' => 1,
        ]);
    }
}
