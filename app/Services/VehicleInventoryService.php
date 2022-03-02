<?php

namespace App\Services;

use App\Models\VehicleInventory;
use App\Repositories\VehicleLocalRepository;
use App\Repositories\VehicleRestRepository;
use Illuminate\Http\Request;

class VehicleInventoryService
{
    private $vehicleRestRepository;

    private $vehicleLocalRepository;

    public function __construct(VehicleLocalRepository $vehicleLocalRepository, VehicleRestRepository $vehicleRestRepository)
    {
        $this->vehicleLocalRepository = $vehicleLocalRepository;
        $this->vehicleRestRepository = $vehicleRestRepository;
    }

    public function save(Request $request, int $id)
    {
        $vehicle = $this->vehicleRestRepository->get($id);
        $vehicleInventory = new VehicleInventory();
        $vehicleInventory->vehicle_id = $id;
        $vehicleInventory->name = $vehicle['name'];
        $vehicleInventory->count = $request['count'];
        $this->vehicleLocalRepository->save($vehicleInventory);
    }

    public function update(Request $request, int $id)
    {
        $vehicleLocal = $this->vehicleLocalRepository->getVehicleId($id);
        $vehicleLocal->count = $request['count'];
        $this->vehicleLocalRepository->save($vehicleLocal);
    }

    public function increase(int $id)
    {
        $vehicleLocal = $this->vehicleLocalRepository->getVehicleId($id);
        $vehicleLocal->count = $vehicleLocal->count + 1;
        $this->vehicleLocalRepository->save($vehicleLocal);
    }

    public function decrease(int $id)
    {
        $vehicleLocal = $this->vehicleLocalRepository->getVehicleId($id);
        $vehicleLocal->count = $vehicleLocal->count - 1;
        $this->vehicleLocalRepository->save($vehicleLocal);
    }

}
