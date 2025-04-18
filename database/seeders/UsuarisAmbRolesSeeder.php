<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarisAmbRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $llista_usuaris = [
        [
            'name' => 'admin',
            'role' => 'Administrador',
            'email' => 'leinad@fjeclot.net',
            'password' => Hash::make('123')
        ],
        [
            'name' => 'consultor',
            'role' => 'Consultor',
            'email' => 'aletse@fjeclot.net',
            'password' => Hash::make('123')
        ],
    ];
    DB::table('users')->insert($llista_usuaris);
    }
}
