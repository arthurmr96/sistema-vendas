<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Caixa;

class CaixaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_caixa()
    {
        $caixa = factory(Caixa::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/caixas', $caixa
        );

        $this->assertApiResponse($caixa);
    }

    /**
     * @test
     */
    public function test_read_caixa()
    {
        $caixa = factory(Caixa::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/caixas/'.$caixa->id
        );

        $this->assertApiResponse($caixa->toArray());
    }

    /**
     * @test
     */
    public function test_update_caixa()
    {
        $caixa = factory(Caixa::class)->create();
        $editedCaixa = factory(Caixa::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/caixas/'.$caixa->id,
            $editedCaixa
        );

        $this->assertApiResponse($editedCaixa);
    }

    /**
     * @test
     */
    public function test_delete_caixa()
    {
        $caixa = factory(Caixa::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/caixas/'.$caixa->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/caixas/'.$caixa->id
        );

        $this->response->assertStatus(404);
    }
}
