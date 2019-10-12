<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Venda;

class VendaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_venda()
    {
        $venda = factory(Venda::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/vendas', $venda
        );

        $this->assertApiResponse($venda);
    }

    /**
     * @test
     */
    public function test_read_venda()
    {
        $venda = factory(Venda::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/vendas/'.$venda->id
        );

        $this->assertApiResponse($venda->toArray());
    }

    /**
     * @test
     */
    public function test_update_venda()
    {
        $venda = factory(Venda::class)->create();
        $editedVenda = factory(Venda::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/vendas/'.$venda->id,
            $editedVenda
        );

        $this->assertApiResponse($editedVenda);
    }

    /**
     * @test
     */
    public function test_delete_venda()
    {
        $venda = factory(Venda::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/vendas/'.$venda->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/vendas/'.$venda->id
        );

        $this->response->assertStatus(404);
    }
}
