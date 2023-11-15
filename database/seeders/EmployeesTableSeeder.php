<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'address' => 'HN',
            'phone' => '0909090992',
            'role_id' => '4',
            'password' => bcrypt('admin1234'),
        ]);
    }
}
