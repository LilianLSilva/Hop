<?php

namespace App\Http\Controllers;

use App\Services\VehicleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class VehiclesController extends Controller
{
    private $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $response = $this->vehicleService->all();
        return $response;
    }

    public function getVehicles(Request $request){
        try {
            $vehicle = $this->vehicleService->getVehicles($request);
            return \Response()->json(['data' => $vehicle], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function getVehicle(int $id)
    {
        try {
            $vehicle = $this->vehicleService->getVehicle($id);
            return \Response()->json(['data' => $vehicle], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

/*
    public function getVehicle(Request $request)
    {
        try {
            $vehicle = $this->vehicleService->getVehicle($request);
            return \Response()->json(['data' => $vehicle], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }
*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
