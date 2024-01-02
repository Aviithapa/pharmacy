<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'super-admin', 'display_name' => "Super Admin"],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Super Admin User',
                'email' => 'super-admin@pharmacy.com',
                'password' => Hash::make('Nepal@123'),
                'status' => true,
                'email_verified_at' => Carbon::now(),
                'phone_number' => '+977-01-5261884',
                'position' => 'Super Admin',
                'reference' => 'Nepal@123'
            ],
        ]);

        $userAdminId = DB::getPdo()->lastInsertId();


        // Assigning roles to the users
        DB::table('role_user')->insert([
            ['role_id' => 2, 'user_id' => $userAdminId], // Super admin
        ]);
    }
}
