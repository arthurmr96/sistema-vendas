<?php

namespace App\Repositories;

use App\Models\Produto;
use App\Repositories\BaseRepository;

/**
 * Class ProdutoRepository
 * @package App\Repositories
 * @version October 12, 2019, 7:40 pm UTC
*/

class ProdutoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'descricao',
        'tipo',
        'preco_custo',
        'valor',
        'quantidade'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produto::class;
    }
}
