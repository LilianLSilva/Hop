<?php

namespace App\Http\Controllers;

use App\Services\VehicleInventoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class VehicleInventoryController extends Controller
{
    private $vehicleInventoryService;

    public function __construct(VehicleInventoryService $vehicleService)
    {
        $this->vehicleInventoryService = $vehicleService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $id)
    {
        try {
            $auto = $this->vehicleInventoryService->save($request, $id);
            return \Response()->json(['res' => true, 'message' => 'The Vehicle Inventory was correctly created'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $auto = $this->vehicleInventoryService->update($request, $id);
            return \Response()->json(['res' => true, 'message' => 'The Vehicle Inventory was correctly modified'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);

        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function increase($id)
    {
        try {
            $auto = $this->vehicleInventoryService->increase($id);
            return \Response()->json(['res' => true, 'message' => 'The Vehicle Inventory was correctly modified'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);

        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function decrease(Request $request, $id)
    {
        try {
            $auto = $this->vehicleInventoryService->update($request, $id);
            return \Response()->json(['res' => true, 'message' => 'The Vehicle Inventory was correctly modified'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);

        }
    }

}
