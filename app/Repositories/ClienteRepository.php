<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\BaseRepository;

/**
 * Class ClienteRepository
 * @package App\Repositories
 * @version October 12, 2019, 7:15 pm UTC
*/

class ClienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'sobrenome',
        'telefone',
        'email',
        'celular',
        'endereco'
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
        return Cliente::class;
    }
}
