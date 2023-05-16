<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_pintura
 * @property string $forma_ingreso
 * @property float $valor
 * @property string $fecha_doc_ingreso
 * @property string $fecha_registro
 * @property string $observaciones
 * @property float $avaluo
 * @property Pintura $pintura
 */
class Ingreso extends Model
{
    /**
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['id_pintura', 'forma_ingreso', 'valor', 'fecha_doc_ingreso', 'fecha_registro', 'observaciones', 'avaluo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pintura()
    {
        return $this->belongsTo('App\Models\Pintura', 'id_pintura');
    }
}
