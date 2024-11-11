<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Especifica la tabla asociada si no sigue la convención de pluralización
    protected $table = 'cursos';

    // Especifica los campos que son asignables en masa
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
        'nivel',
        'imagen',
    ];

    // Relación con los usuarios
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'user_curso', 'curso_id', 'user_id');
    }
}
