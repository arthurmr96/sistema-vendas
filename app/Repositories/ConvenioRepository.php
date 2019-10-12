<?php

namespace App\Repositories;

use App\Models\Convenio;
use App\Repositories\BaseRepository;

/**
 * Class ConvenioRepository
 * @package App\Repositories
 * @version October 12, 2019, 8:05 pm UTC
*/

class ConvenioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valor',
        'data_vencimento',
        'pago'
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
        return Convenio::class;
    }
}
