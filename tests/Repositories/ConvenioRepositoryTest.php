<?php namespace Tests\Repositories;

use App\Models\Convenio;
use App\Repositories\ConvenioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ConvenioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConvenioRepository
     */
    protected $convenioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->convenioRepo = \App::make(ConvenioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_convenio()
    {
        $convenio = factory(Convenio::class)->make()->toArray();

        $createdConvenio = $this->convenioRepo->create($convenio);

        $createdConvenio = $createdConvenio->toArray();
        $this->assertArrayHasKey('id', $createdConvenio);
        $this->assertNotNull($createdConvenio['id'], 'Created Convenio must have id specified');
        $this->assertNotNull(Convenio::find($createdConvenio['id']), 'Convenio with given id must be in DB');
        $this->assertModelData($convenio, $createdConvenio);
    }

    /**
     * @test read
     */
    public function test_read_convenio()
    {
        $convenio = factory(Convenio::class)->create();

        $dbConvenio = $this->convenioRepo->find($convenio->id);

        $dbConvenio = $dbConvenio->toArray();
        $this->assertModelData($convenio->toArray(), $dbConvenio);
    }

    /**
     * @test update
     */
    public function test_update_convenio()
    {
        $convenio = factory(Convenio::class)->create();
        $fakeConvenio = factory(Convenio::class)->make()->toArray();

        $updatedConvenio = $this->convenioRepo->update($fakeConvenio, $convenio->id);

        $this->assertModelData($fakeConvenio, $updatedConvenio->toArray());
        $dbConvenio = $this->convenioRepo->find($convenio->id);
        $this->assertModelData($fakeConvenio, $dbConvenio->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_convenio()
    {
        $convenio = factory(Convenio::class)->create();

        $resp = $this->convenioRepo->delete($convenio->id);

        $this->assertTrue($resp);
        $this->assertNull(Convenio::find($convenio->id), 'Convenio should not exist in DB');
    }
}
