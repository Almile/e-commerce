<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        Produto::insert([
            [
                'nome' => 'Café Gourmet Premium',
                'descricao' => 'Um café gourmet de alta qualidade, torrado artesanalmente.',
                'preco' => 29.90,
                'imagem' => 'images/cafe_gourmet.jpg', // Certifique-se de que essa imagem existe
                'categoria' => 'Gourmet',
                'torra' => 'clara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Café Tradicional',
                'descricao' => 'Café tradicional brasileiro, ideal para o dia a dia.',
                'preco' => 19.90,
                'imagem' => 'images/cafe_tradicional.jpg', // Certifique-se de que essa imagem existe
                'categoria' => 'Tradicional',
                'torra' => 'media',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Café Especial Orgânico',
                'descricao' => 'Café orgânico cultivado sem agrotóxicos, com sabor único.',
                'preco' => 39.90,
                'imagem' => 'images/cafe_organico.jpg', // Certifique-se de que essa imagem existe
                'categoria' => 'Especial',
                'torra' => 'media',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
