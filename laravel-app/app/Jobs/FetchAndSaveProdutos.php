<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;  
use App\Models\Produto;

class FetchAndSaveProdutos implements ShouldQueue
{
    use Queueable;
    public function handle()
    {
        $response = Http::get('https://api.mercadolibre.com/sites/MLB/search?q=café');

        if ($response->successful()) {
            $products = $response->json()['results'];

            foreach ($products as $product) {
                // Buscando a descrição completa do produto
                $productDescription = '';
                $descriptionResponse = Http::get("https://api.mercadolibre.com/items/{$product['id']}/description");

                if ($descriptionResponse->successful() && isset($descriptionResponse->json()['plain_text'])) {
                    $productDescription = $descriptionResponse->json()['plain_text'];
                }

                $descricao = substr($productDescription, 0, 200);

                Produto::updateOrCreate(
                    ['link' => $product['permalink']], 
                    [
                        'nome' => $product['title'],
                        'descricao' => $descricao, 
                        'preco' => $product['price'],
                        'categoria' => $product['especial'],
                        'torra' => 'media',
                        'imagem' => $product['thumbnail'],
                        'link' => $product['permalink'],
                    ]
                );
            }
        }
    }
}
