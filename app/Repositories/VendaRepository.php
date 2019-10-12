<?php

namespace App\Repositories;

use App\Models\Venda;
use App\Repositories\BaseRepository;

/**
 * Class VendaRepository
 * @package App\Repositories
 * @version October 12, 2019, 8:17 pm UTC
*/

class VendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valor'
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
        return Venda::class;
    }
}
