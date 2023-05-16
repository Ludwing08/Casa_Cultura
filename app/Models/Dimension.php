<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_pintura
 * @property float $alto_obra
 * @property float $ancho_obra
 * @property float $profundidad_obra
 * @property float $diametro_mayor_obra
 * @property float $diametro_menor_obra
 * @property float $plancha_grabado_alto
 * @property float $plancha_grabado_ancho
 * @property string $plancha_grabado_numero
 * @property float $marco_alto
 * @property float $marco_ancho
 * @property float $marco_profundidad
 * @property Pintura $pintura
 */
class Dimension extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'dimensiones';
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['id_pintura', 'alto_obra', 'ancho_obra', 'profundidad_obra', 'diametro_mayor_obra', 'diametro_menor_obra', 'plancha_grabado_alto', 'plancha_grabado_ancho', 'plancha_grabado_numero', 'marco_alto', 'marco_ancho', 'marco_profundidad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pintura()
    {
        return $this->belongsTo('App\Models\Pintura', 'id_pintura');
    }
}
