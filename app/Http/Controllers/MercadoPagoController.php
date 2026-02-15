<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

class MercadoPagoController extends Controller
{
    public function crearPreferencia()
    {
        MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));

        $client = new PreferenceClient();

        $preference = $client->create([
            "items" => [
                [
                    "title" => "Producto prueba",
                    "quantity" => 1,
                    "unit_price" => 1000
                ]
            ],
            "back_urls" => [
                "success" => "http://127.0.0.1:8000/user/cursos",
                "failure" => "http://127.0.0.1:8000/planes",
                "pending" => "http://127.0.0.1:8000/"
            ],
            "auto_return" => "approved"
        ]);

        return response()->json([
            "id" => $preference->id
        ]);
    }
}
