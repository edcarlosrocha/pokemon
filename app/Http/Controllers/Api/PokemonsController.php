<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PokemonsService;

class PokemonsController extends Controller
{
    public function show(int $id)
    {
        $pokemon = PokemonsService::getPokemon($id);
        return response()->json($pokemon);
    }
}
