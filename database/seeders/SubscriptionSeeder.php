<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subscription;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        // Buscamos al usuario por email
        $user = User::where('email', 'lautaro@hotmail.com')->first();

        if ($user) {
            Subscription::create([
                'user_id'     => $user->id,
                'plan_level'  => 3,            // 1 = starter, 2 = pro, 3 = senior
                'status'      => 'active',
                'starts_at'   => now(),
                'ends_at'     => now()->addYear(), // Suscripción por 1 año
            ]);

            $this->command->info("Suscripción nivel 3 (Senior) activada para: {$user->email}");
        } else {
            $this->command->error("No se encontró al usuario lautaro@hotmail.com. Asegúrate de que esté en la tabla users.");
        }
    }
}
