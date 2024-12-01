<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'tipo_usuario' => 'admin',
                'endereco' => 'Vila da penha, PG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Comprador',
                'email' => 'comprador@comprador.com',
                'password' => Hash::make('comprador'), 
                'tipo_usuario' => 'comprador',
                'endereco' => 'Vila Margarida, SV',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
