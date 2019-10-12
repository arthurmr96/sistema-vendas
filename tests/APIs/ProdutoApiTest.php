<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Produto;

class ProdutoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_produto()
    {
        $produto = factory(Produto::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/produtos', $produto
        );

        $this->assertApiResponse($produto);
    }

    /**
     * @test
     */
    public function test_read_produto()
    {
        $produto = factory(Produto::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/produtos/'.$produto->id
        );

        $this->assertApiResponse($produto->toArray());
    }

    /**
     * @test
     */
    public function test_update_produto()
    {
        $produto = factory(Produto::class)->create();
        $editedProduto = factory(Produto::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/produtos/'.$produto->id,
            $editedProduto
        );

        $this->assertApiResponse($editedProduto);
    }

    /**
     * @test
     */
    public function test_delete_produto()
    {
        $produto = factory(Produto::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/produtos/'.$produto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/produtos/'.$produto->id
        );

        $this->response->assertStatus(404);
    }
}
