<?php namespace Tests\Repositories;

use App\Models\Venda;
use App\Repositories\VendaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class VendaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var VendaRepository
     */
    protected $vendaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->vendaRepo = \App::make(VendaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_venda()
    {
        $venda = factory(Venda::class)->make()->toArray();

        $createdVenda = $this->vendaRepo->create($venda);

        $createdVenda = $createdVenda->toArray();
        $this->assertArrayHasKey('id', $createdVenda);
        $this->assertNotNull($createdVenda['id'], 'Created Venda must have id specified');
        $this->assertNotNull(Venda::find($createdVenda['id']), 'Venda with given id must be in DB');
        $this->assertModelData($venda, $createdVenda);
    }

    /**
     * @test read
     */
    public function test_read_venda()
    {
        $venda = factory(Venda::class)->create();

        $dbVenda = $this->vendaRepo->find($venda->id);

        $dbVenda = $dbVenda->toArray();
        $this->assertModelData($venda->toArray(), $dbVenda);
    }

    /**
     * @test update
     */
    public function test_update_venda()
    {
        $venda = factory(Venda::class)->create();
        $fakeVenda = factory(Venda::class)->make()->toArray();

        $updatedVenda = $this->vendaRepo->update($fakeVenda, $venda->id);

        $this->assertModelData($fakeVenda, $updatedVenda->toArray());
        $dbVenda = $this->vendaRepo->find($venda->id);
        $this->assertModelData($fakeVenda, $dbVenda->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_venda()
    {
        $venda = factory(Venda::class)->create();

        $resp = $this->vendaRepo->delete($venda->id);

        $this->assertTrue($resp);
        $this->assertNull(Venda::find($venda->id), 'Venda should not exist in DB');
    }
}
