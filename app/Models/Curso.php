<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Curso extends Model
{
    use HasFactory;

    // Especifica la tabla asociada
    protected $table = 'cursos';

    // Especifica los campos que son asignables en masa
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
        'nivel',
        'imagen',
        'precio',
    ];

    /**
     * Relación de muchos a muchos con los usuarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,             // Modelo relacionado
            'users_have_cursos',     // Tabla intermedia
            'cursos_id',             // Clave foránea en la tabla intermedia para el modelo Curso
            'user_id'                // Clave foránea en la tabla intermedia para el modelo User
        );
    }
}
