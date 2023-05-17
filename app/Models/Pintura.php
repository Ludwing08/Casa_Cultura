<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property integer $id
 * @property integer $id_autor
 * @property string $codigo
 * @property string $codigo_alternativo
 * @property string $nombre
 * @property string $siglo_año
 * @property string $firmado_atribuido_documento
 * @property string $ubicacion_firma
 * @property string $estado_conservacion
 * @property string $estado_integridad
 * @property string $ruta_imagen
 * @property string $tecnica
 * @property string $soporte
 * @property string $ubicacion_actual
 * @property Dimensione[] $dimensiones
 * @property Ingreso[] $ingresos
 * @property Autore $autore
 */
class Pintura extends Model
{
    /**
     * @var array
     */
    use HasFactory;
    protected $table = "pinturas";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['id_autor', 'codigo', 'codigo_alternativo', 'nombre', 'siglo_año', 'firmado_atribuido_documento', 'ubicacion_firma', 'estado_conservacion', 'estado_integridad', 'ruta_imagen', 'tecnica', 'soporte', 'ubicacion_actual'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dimensiones()
    {
        return $this->hasMany('App\Models\Dimension', 'id_pintura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingresos()
    {
        return $this->hasMany('App\Models\Ingreso', 'id_pintura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autores()
    {
        return $this->belongsTo('App\Models\Autor', 'id_autor');
    }

    public function getAutores(){
        return $this->hasOne(Autor::class, "id", "id_autor");
    }
    
}
