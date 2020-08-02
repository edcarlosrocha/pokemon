<?php

namespace App\Http\Controllers;
use App\Services\PokemonsService;

class PokemonsController extends Controller
{
    public function index()
    {
        $responseAPI = PokemonsService::getPokemons();

        $pokemons = collect($responseAPI['results'])->map(function($pokemon){
            $array = array_filter(explode('/', $pokemon['url']));

            $pokemon['id']   = end($array);
            $pokemon['name'] = ucwords(str_replace('-', ' ', $pokemon['name']));
            return $pokemon;
        })->chunk(6)->toArray();

        return view('pokemons.list', ['pokemons' => $pokemons]);
    }
}
