<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    public function run(): void
    {
        $administrators = [
            ['name' => 'Ismael Pina', 'email' => 'ismael.pina@miempresa.com', 'password' => 'Usuario1!'],
            ['name' => 'Gabriel Sanchez', 'email' => 'gabriel.sanchez@miempresa.com', 'password' => 'Usuario2!'],
            ['name' => 'Estrella Alvarez', 'email' => 'estrella.alvarez@miempresa.com', 'password' => 'Usuario3!'],
            ['name' => 'Guillermo Mateos', 'email' => 'guillermo.mateos@miempresa.com', 'password' => 'Usuario4!'],
        ];

        $repartidores = [
            ['name' => 'Sara Munoz', 'email' => 'sara.munoz@miempresa.com', 'password' => 'Usuario5!'],
            ['name' => 'Enrique Lopez', 'email' => 'enrique.lopez@miempresa.com', 'password' => 'Usuario6!'],
            ['name' => 'Samuel Pena', 'email' => 'samuel.pena@miempresa.com', 'password' => 'Usuario7!'],
            ['name' => 'Hugo Sanchez', 'email' => 'hugo.sanchez@miempresa.com', 'password' => 'Usuario8!'],
        ];

        foreach ($administrators as $admin) {
            DB::table('users')->insert([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => Hash::make($admin['password']), 
                'repartidor' => true, 
                'admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach ($repartidores as $repartidor) {
            DB::table('users')->insert([
                'name' => $repartidor['name'],
                'email' => $repartidor['email'],
                'password' => Hash::make($repartidor['password']), 
                'repartidor' => true, 
                'admin' => false, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
