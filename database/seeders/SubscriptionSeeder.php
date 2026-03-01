<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subscription;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'lautaro@hotmail.com')->first();

        if ($user) {
            Subscription::create([
                'user_id'     => $user->id,
                'plan_level'  => 3,            
                'status'      => 'active',
                'starts_at'   => now(),
                'ends_at'     => now()->addYear(), 
            ]);

            $this->command->info("Suscripción nivel 3 (Senior) activada para: {$user->email}");
            
        } else {
            $this->command->error("No se encontró al usuario lautaro@hotmail.com. Asegúrate de que esté en la tabla users.");
        }

        foreach ([
            ['email' => 'juan.perez@example.com', 'level' => 1],
            ['email' => 'maria.lopez@example.com', 'level' => 2],
        ] as $info) {
            $u = User::where('email', $info['email'])->first();
            if ($u) {
                Subscription::create([
                    'user_id'     => $u->id,
                    'plan_level'  => $info['level'],
                    'status'      => 'active',
                    'starts_at'   => now(),
                    'ends_at'     => now()->addYear(),
                ]);
                $this->command->info("Suscripción nivel {$info['level']} activada para: {$u->email}");
            } else {
                $this->command->error("No se encontró al usuario {$info['email']}.");
            }
        }
    }
}
