<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $pais
 * @property string $provincia
 * @property string $ciudad
 * @property string $biografia
 * @property Pintura[] $pinturas
 */
class Autor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'autores';

    /**
     * @var array
     */
    protected $fillable = ['nombres', 'apellidos', 'pais', 'provincia', 'ciudad', 'biografia'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pinturas()
    {
        return $this->hasMany('App\Models\Pintura', 'id_autor');
    }
}
