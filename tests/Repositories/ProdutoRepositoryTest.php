<?php namespace Tests\Repositories;

use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProdutoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProdutoRepository
     */
    protected $produtoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->produtoRepo = \App::make(ProdutoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_produto()
    {
        $produto = factory(Produto::class)->make()->toArray();

        $createdProduto = $this->produtoRepo->create($produto);

        $createdProduto = $createdProduto->toArray();
        $this->assertArrayHasKey('id', $createdProduto);
        $this->assertNotNull($createdProduto['id'], 'Created Produto must have id specified');
        $this->assertNotNull(Produto::find($createdProduto['id']), 'Produto with given id must be in DB');
        $this->assertModelData($produto, $createdProduto);
    }

    /**
     * @test read
     */
    public function test_read_produto()
    {
        $produto = factory(Produto::class)->create();

        $dbProduto = $this->produtoRepo->find($produto->id);

        $dbProduto = $dbProduto->toArray();
        $this->assertModelData($produto->toArray(), $dbProduto);
    }

    /**
     * @test update
     */
    public function test_update_produto()
    {
        $produto = factory(Produto::class)->create();
        $fakeProduto = factory(Produto::class)->make()->toArray();

        $updatedProduto = $this->produtoRepo->update($fakeProduto, $produto->id);

        $this->assertModelData($fakeProduto, $updatedProduto->toArray());
        $dbProduto = $this->produtoRepo->find($produto->id);
        $this->assertModelData($fakeProduto, $dbProduto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_produto()
    {
        $produto = factory(Produto::class)->create();

        $resp = $this->produtoRepo->delete($produto->id);

        $this->assertTrue($resp);
        $this->assertNull(Produto::find($produto->id), 'Produto should not exist in DB');
    }
}
