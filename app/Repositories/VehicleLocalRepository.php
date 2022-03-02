<?php

namespace App\Repositories;

use App\Http\Request\CreateVehicleRequest;
use App\Models\VehicleInventory;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VehicleLocalRepository extends BaseRepository
{
    public function __construct(VehicleInventory $vehicle)
    {
        parent::__construct($vehicle);
    }

    public function getVehicle(Request $request)
    {
        return $this->model->where('name', 'LIKE', "%{$request->search}%")->first();
    }

    public function getVehicleByName(string $name)
    {
        return $this->model->where('name', 'LIKE', "%{$name}%")->first();
    }

    public function getVehicleId(int $id)
    {
        return $this->model->where('vehicle_id', '=', "{$id}")->first();
    }

    public function all()
    {
        return $this->model->all(); // all() si quiero ver todos los resultados paginate(10)
    }
}
