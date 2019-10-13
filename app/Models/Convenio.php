<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="Convenio",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cliente_id",
 *          description="cliente_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="valor",
 *          description="valor",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="data_vencimento",
 *          description="data_vencimento",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="pago",
 *          description="pago",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Convenio extends Model
{

    public $table = 'convenios';

    public $with = ['cliente'];

    public $hidden = ['cliente_id'];

    public $fillable = [
        'cliente_id',
        'valor',
        'data_vencimento',
        'pago'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'valor' => 'double',
        'data_vencimento' => 'date',
        'pago' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class);
    }
}
