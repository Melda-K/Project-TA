<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class  BkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'BK','guard_name' => 'web',]);
                $data = [
                    [
                        'username' => 'Lina',
                        'password' => Hash::make('konseling25'),
                        'nip' => '196827052007012006',
                        'nama_guru' => 'Lina Elyana, S.Pd., MM.Pd',
                        'jabatan' => 'Guru BK',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                       'username' => 'Dian',
                        'password' => Hash::make('konseling25'),
                        'nip' => '-',
                        'nama_guru' => 'Dian Rusdianto, S.Pd',
                        'jabatan' => 'Guru BK',
                        'jenis_kelamin' =>'L',
                    ],
                    [
                        'username' => 'Yuli',
                        'password' => Hash::make('konseling25'),
                        'nip' => '-',
                        'nama_guru' => 'Yuliastuti Dewi Y, S.Si',
                        'jabatan' => 'Guru BK',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'username' => 'Desy',
                        'password' => Hash::make('konseling25'),
                        'nip' => '-',
                        'nama_guru' => 'Desy Rosita Nuriswandi, S.Pd',
                        'jabatan' => 'Guru BK',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'username' => 'Yani',
                        'password' => Hash::make('konseling25'),
                        'nip' => '-',
                        'nama_guru' => 'Yani Agustiani, S.Pd',
                        'jabatan' => 'Guru BK',
                        'jenis_kelamin' =>'P',
                    ],
                ];
        
                foreach ($data as $item) {
                    $user = User::create([
                        'name' => $item['nama_guru'],
                        'username' => $item['username'],
                        'password' => $item['password'],
                    ]);
        
                    DB::table('gurus')->insert([
                        [
                            'nip' => $item['nip'],
                            'nama_guru' => $item['nama_guru'],
                            'jabatan' => $item['jabatan'],
                            'jenis_kelamin' => $item['jenis_kelamin'],
                            'id_user' => $user->id,
                        ],
                    ]);
        
                    $user->assignRole('BK');
                }
    }
}