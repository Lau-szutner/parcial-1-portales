<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    // Campos que permitimos llenar (importante para el Seeder)
    protected $fillable = [
        'user_id',
        'plan_name',
        'status',
        'starts_at',
        'ends_at',
    ];

    // Indicar que estos campos deben tratarse como fechas (objetos Carbon)
    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    /**
     * Relación inversa: Una suscripción pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
