<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@pharmacy.com',
                'password' => Hash::make('Nepal@123'),
                'status' => true,
                'email_verified_at' => Carbon::now(),
                'phone_number' => '+977-01-5261884',
                'position' => 'Admin',
                'reference' => 'Nepal@123'
            ],
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
        $userSuperAdminId = $userAdminId + 1; // Assuming consecutive user IDs

        // Assigning roles to the users
        DB::table('role_user')->insert([
            ['role_id' => 1, 'user_id' => $userAdminId], // Admin role
            ['role_id' => 2, 'user_id' => $userSuperAdminId], // Superadmin role
        ]);
    }
}
