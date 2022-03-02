<?php

namespace App\Repositories;

use App\Models\StarshipInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StarshipRestRepository extends BaseRepository
{
    public function __construct(StarshipInventory $starship)
    {
        parent::__construct($starship);
    }

    public function all()
    {
        return Http::get('https://swapi.dev/api/starships/');
    }

    public function get(int $id)
    {
        return Http::get('https://swapi.dev/api/starships/'.$id.'/')->json();
    }

    public function getStarships(Request $request){
        return Http::get('https://swapi.dev/api/starships', $request->query())->json();
    }
}
