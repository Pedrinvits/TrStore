<?php

namespace Tests\Unit;

use App\Http\Controllers\SellersController;
use App\Models\Sellers;
use Tests\TestCase;

class SellerControllerTest extends TestCase
{
    public function insertTest(): void
    {
        $controller = new SellersController;
        $data = [
            'name' => 'Teste Name',
            'email' => 'teste@email.com.br'
        ];
        
        $response = $controller->inserir($data);
        $this->assertIsObject($response);
    }

    public function DeleteTest(): void
    {
        $controller = new SellersController;
        Sellers::create(['id' => 1, 'name' => 'Nome teste', 'email' => 'teste@email.com.br']);
        
        $data = 1;
        $reponse = $controller->deletar($data);
        $this->assertTrue($reponse);
    }
    public function updateTest(): void
    {
        $controller = new SellersController;
        Sellers::create(['id' => 1, 'name' => 'Nome teste', 'email' => 'teste@email.com.br']);

        $data = [
            'id' => '1',
            'name' => 'Updated Name',
            'email' => 'AlteracaoEmail@email.com.br'
        ];
        
        $response = $controller->atualizar($data);
        $this->assertIsObject($response);
    }
    
}
