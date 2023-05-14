<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    use HasFactory;
    protected $table = 'autores';
    protected $primaryKey = 'id';
    protected $fillable = ['nombres', 'apellidos', 'pais', 'provincia', 'ciudad'];
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pinturas()
    {
        return $this->hasMany('App\Models\Pintura', 'id_autor');
    }
}
