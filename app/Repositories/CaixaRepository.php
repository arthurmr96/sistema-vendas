<?php

namespace App\Repositories;

use App\Models\Caixa;
use App\Repositories\BaseRepository;

/**
 * Class CaixaRepository
 * @package App\Repositories
 * @version October 12, 2019, 7:55 pm UTC
*/

class CaixaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valor_inicial',
        'status'
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
        return Caixa::class;
    }
}
