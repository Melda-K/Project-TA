<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Spesialis', 'guard_name' => 'web',]);
        $data = [
            [
                'username' => 'Sofia',
                'password' => Hash::make('konseling25'),
                'nama' => 'Sofia Nurkemala, M.Psi',
                'jenis_kelamin' => 'P',
                'spesialis' => 'Psikolog',
            ],
            [
                'username' => 'Nita',
                'password' => Hash::make('konseling25'),
                'nama' => 'dr.Nita Sarlytta Atmaja, Sp.KJ',
                'jenis_kelamin' => 'P',
                'spesialis' => 'Psikiater',
            ],
        ];

        foreach ($data as $item) {
            $user = User::create([
                'name' => $item['nama'],
                'username' => $item['username'],
                'password' => $item['password'],
            ]);

            DB::table('spesialis_kejiwaans')->insert([
                [
                    'nama' => $item['nama'],
                    'jenis_kelamin' => $item['jenis_kelamin'],
                    'spesialis' => $item['spesialis'],
                    'id_user' => $user->id,
                ],
            ]);

            $user->assignRole('Spesialis');
        }
    }
}
