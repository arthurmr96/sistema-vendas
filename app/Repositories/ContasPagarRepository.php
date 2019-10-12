<?php

namespace App\Repositories;

use App\Models\ContasPagar;
use App\Repositories\BaseRepository;

/**
 * Class ContasPagarRepository
 * @package App\Repositories
 * @version October 12, 2019, 8:01 pm UTC
*/

class ContasPagarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valor_devido',
        'valor_pago',
        'pago',
        'data_vencimento'
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
        return ContasPagar::class;
    }
}
