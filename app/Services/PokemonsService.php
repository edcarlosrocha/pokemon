<?php

namespace App\Services;
use Http;

class PokemonsService
{
	private const ENDPOINT = "https://pokeapi.co/api/v2/";

	public static function getPokemons()
	{
		return Http::get(self::ENDPOINT . 'pokemon', [
            'offset' => 0,
            'limit'  => 1000
        ])->json();
	}

	public static function getPokemon(int $pokemon_id)
	{
		return Http::get(self::ENDPOINT . "pokemon/{$pokemon_id}")->json();
	}
}
