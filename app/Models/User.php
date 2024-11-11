<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Curso; // Importa el modelo Curso

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación de muchos a muchos con los cursos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(
            Curso::class,             // Modelo relacionado
            'users_have_cursos',      // Tabla intermedia
            'user_id',                // Clave foránea en la tabla intermedia para el modelo User
            'cursos_id'               // Clave foránea en la tabla intermedia para el modelo Curso
        );
    }
}
