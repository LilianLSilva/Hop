<?php

namespace App\Repositories;

use App\Http\Request\CreateStarshipRequest;
use App\Models\StarshipInventory;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class StarshipLocalRepository extends BaseRepository
{
    public function __construct(StarshipInventory $starship)
    {
        parent::__construct($starship);
    }

    public function getStarship(Request $request)
    {
        return $this->model->where('name', 'LIKE', "%{$request->search}%")->first();
    }

    public function getStarshipByName(string $name)
    {
        return $this->model->where('name', 'LIKE', "%{$name}%")->first();
    }

    public function getStarshipId(int $id)
    {
        return $this->model->where('starship_id', '=', "{$id}")->first();
    }

    public function all()
    {
        return $this->model->all(); // all() si quiero ver todos los resultados paginate(10)
    }
}
