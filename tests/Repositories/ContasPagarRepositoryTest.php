<?php namespace Tests\Repositories;

use App\Models\ContasPagar;
use App\Repositories\ContasPagarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContasPagarRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContasPagarRepository
     */
    protected $contasPagarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contasPagarRepo = \App::make(ContasPagarRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_contas_pagar()
    {
        $contasPagar = factory(ContasPagar::class)->make()->toArray();

        $createdContasPagar = $this->contasPagarRepo->create($contasPagar);

        $createdContasPagar = $createdContasPagar->toArray();
        $this->assertArrayHasKey('id', $createdContasPagar);
        $this->assertNotNull($createdContasPagar['id'], 'Created ContasPagar must have id specified');
        $this->assertNotNull(ContasPagar::find($createdContasPagar['id']), 'ContasPagar with given id must be in DB');
        $this->assertModelData($contasPagar, $createdContasPagar);
    }

    /**
     * @test read
     */
    public function test_read_contas_pagar()
    {
        $contasPagar = factory(ContasPagar::class)->create();

        $dbContasPagar = $this->contasPagarRepo->find($contasPagar->id);

        $dbContasPagar = $dbContasPagar->toArray();
        $this->assertModelData($contasPagar->toArray(), $dbContasPagar);
    }

    /**
     * @test update
     */
    public function test_update_contas_pagar()
    {
        $contasPagar = factory(ContasPagar::class)->create();
        $fakeContasPagar = factory(ContasPagar::class)->make()->toArray();

        $updatedContasPagar = $this->contasPagarRepo->update($fakeContasPagar, $contasPagar->id);

        $this->assertModelData($fakeContasPagar, $updatedContasPagar->toArray());
        $dbContasPagar = $this->contasPagarRepo->find($contasPagar->id);
        $this->assertModelData($fakeContasPagar, $dbContasPagar->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_contas_pagar()
    {
        $contasPagar = factory(ContasPagar::class)->create();

        $resp = $this->contasPagarRepo->delete($contasPagar->id);

        $this->assertTrue($resp);
        $this->assertNull(ContasPagar::find($contasPagar->id), 'ContasPagar should not exist in DB');
    }
}
