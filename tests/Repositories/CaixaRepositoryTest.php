<?php namespace Tests\Repositories;

use App\Models\Caixa;
use App\Repositories\CaixaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CaixaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CaixaRepository
     */
    protected $caixaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->caixaRepo = \App::make(CaixaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_caixa()
    {
        $caixa = factory(Caixa::class)->make()->toArray();

        $createdCaixa = $this->caixaRepo->create($caixa);

        $createdCaixa = $createdCaixa->toArray();
        $this->assertArrayHasKey('id', $createdCaixa);
        $this->assertNotNull($createdCaixa['id'], 'Created Caixa must have id specified');
        $this->assertNotNull(Caixa::find($createdCaixa['id']), 'Caixa with given id must be in DB');
        $this->assertModelData($caixa, $createdCaixa);
    }

    /**
     * @test read
     */
    public function test_read_caixa()
    {
        $caixa = factory(Caixa::class)->create();

        $dbCaixa = $this->caixaRepo->find($caixa->id);

        $dbCaixa = $dbCaixa->toArray();
        $this->assertModelData($caixa->toArray(), $dbCaixa);
    }

    /**
     * @test update
     */
    public function test_update_caixa()
    {
        $caixa = factory(Caixa::class)->create();
        $fakeCaixa = factory(Caixa::class)->make()->toArray();

        $updatedCaixa = $this->caixaRepo->update($fakeCaixa, $caixa->id);

        $this->assertModelData($fakeCaixa, $updatedCaixa->toArray());
        $dbCaixa = $this->caixaRepo->find($caixa->id);
        $this->assertModelData($fakeCaixa, $dbCaixa->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_caixa()
    {
        $caixa = factory(Caixa::class)->create();

        $resp = $this->caixaRepo->delete($caixa->id);

        $this->assertTrue($resp);
        $this->assertNull(Caixa::find($caixa->id), 'Caixa should not exist in DB');
    }
}
