<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::create([
        //     'name' => 'Admin',
        //     'guard_name' => 'web'
        // ]);
        
        $data = [
            [
                'name' => 'AdminKonseling',
                'username' => 'admin',
                'password' => Hash::make('konseling25'),
            ],
        ];

        foreach ($data as $item) {
            $user = User::create([
                'name' => $item['name'],
                'username' => $item['username'],
                'password' => $item['password'],
            ]);
            
            $user->assignRole('Admin');
        }
    }
}