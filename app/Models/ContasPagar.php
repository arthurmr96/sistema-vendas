<?php

namespace App\Models;

use Eloquent as Model;

/**
 * @SWG\Definition(
 *      definition="ContasPagar",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="valor_devido",
 *          description="valor_devido",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="valor_pago",
 *          description="valor_pago",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="pago",
 *          description="pago",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="data_vencimento",
 *          description="data_vencimento",
 *          type="string",
 *          format="date"
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
class ContasPagar extends Model
{

    public $table = 'pagar_contas';
    


    public $fillable = [
        'valor_devido',
        'valor_pago',
        'pago',
        'data_vencimento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valor_devido' => 'double',
        'valor_pago' => 'double',
        'pago' => 'boolean',
        'data_vencimento' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
