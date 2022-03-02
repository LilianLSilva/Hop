<?php

namespace App\Repositories;

use App\Models\VehicleInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehicleRestRepository extends BaseRepository
{
    public function __construct(VehicleInventory $vehicle)
    {
        parent::__construct($vehicle);
    }

    public function all()
    {
        return Http::get('https://swapi.dev/api/vehicles/');
    }

    public function get(int $id)
    {
        return Http::get('https://swapi.dev/api/vehicles/'.$id.'/')->json();
    }

    public function getVehicles(Request $request){
        return Http::get('https://swapi.dev/api/vehicles', $request->query())->json();
    }

}

