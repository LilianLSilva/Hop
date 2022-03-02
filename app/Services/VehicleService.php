<?php

namespace App\Services;

use App\Models\VehicleInventory;
use App\Repositories\VehicleLocalRepository;
use App\Repositories\VehicleRestRepository;
use Illuminate\Http\Request;

class VehicleService
{
    private $vehicleRestRepository;

    private $vehicleLocalRepository;

    public function __construct(VehicleRestRepository $vehicleRestRepository, VehicleLocalRepository $vehicleLocalRepository)
    {
        $this->vehicleRestRepository = $vehicleRestRepository;
        $this->vehicleLocalRepository = $vehicleLocalRepository;
    }
    public function all()
    {
        $vehicles = $this->vehicleLocalRepository->all();
        $new_vehicles =[];
        foreach ($vehicles as $vehicle){
            $otraVariable = $this->vehicleRestRepository->get($vehicle->vehicle_id);
            $otraVariable['count'] = $vehicle->count;
            array_push($new_vehicles, $otraVariable);
        }
        return $new_vehicles;
    }

    /*trae todos los vehiculos o si se busca por el nombre con el parametro search*/

    public function getVehicles(Request $request)
    {
        $vehicles = $this->vehicleRestRepository->getVehicles($request);
        $new_vehicles =[];
        foreach ($vehicles['results'] as $vehicle){
            $localVehicle = $this->vehicleLocalRepository->getVehicleByName($vehicle['name']);
            $vehicle['count'] = $localVehicle->count;
            array_push($new_vehicles, $vehicle);
        }
        $vehicles['results'] = $new_vehicles;

        return $vehicles;
    }
/* busca por nid del vehicle*/
    public function getVehicle(int $id)
    {
        $vehicle = $this->vehicleLocalRepository->getVehicleId($id);
        $apiVehicle = $this->vehicleRestRepository->get($vehicle->vehicle_id);
        $apiVehicle['count'] = $vehicle->count;
        return $apiVehicle;
    }

    /* busca por nombre el vehicle*/
    public function getVehicleByName(Request $request)
    {
        $vehicle = $this->vehicleLocalRepository->getVehicle($request);
        $apiVehicle = $this->vehicleRestRepository->get($vehicle->vehicle_id);
        $apiVehicle['count'] = $vehicle->count;
        return $apiVehicle;
    }

    public function get(int $id)
    {
        return $this->vehicleRepository->get($id);
    }

    public function save(CreateVehicleRequest $request)
    {
        $vehicle = New VehicleInventory($request->all());
        $this->vehicleRepository->save($vehicle);
        return $vehicle;
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->fill($request->all());
        $this->vehicleRepository->save($vehicle);
        return $vehicle;
    }

    public function delete(Vehicle $vehicle)
    {
        $this->vehicleRepository->delete($vehicle);
        return $vehicle;
    }
}
