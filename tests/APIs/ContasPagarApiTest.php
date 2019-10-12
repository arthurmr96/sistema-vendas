<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContasPagar;

class ContasPagarApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contas_pagar()
    {
        $contasPagar = factory(ContasPagar::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contas_pagars', $contasPagar
        );

        $this->assertApiResponse($contasPagar);
    }

    /**
     * @test
     */
    public function test_read_contas_pagar()
    {
        $contasPagar = factory(ContasPagar::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contas_pagars/'.$contasPagar->id
        );

        $this->assertApiResponse($contasPagar->toArray());
    }

    /**
     * @test
     */
    public function test_update_contas_pagar()
    {
        $contasPagar = factory(ContasPagar::class)->create();
        $editedContasPagar = factory(ContasPagar::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contas_pagars/'.$contasPagar->id,
            $editedContasPagar
        );

        $this->assertApiResponse($editedContasPagar);
    }

    /**
     * @test
     */
    public function test_delete_contas_pagar()
    {
        $contasPagar = factory(ContasPagar::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contas_pagars/'.$contasPagar->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contas_pagars/'.$contasPagar->id
        );

        $this->response->assertStatus(404);
    }
}
