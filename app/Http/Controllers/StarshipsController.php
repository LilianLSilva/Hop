<?php

namespace App\Http\Controllers;

use App\Services\StarshipService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class StarshipsController extends Controller
{
    private $starshipService;

    public function __construct(StarshipService $starshipService)
    {
        $this->starshipService = $starshipService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $response = $this->starshipService->all();
        return $response;
    }

    public function getStarships(Request $request){
        try {
            $starship = $this->starshipService->getStarships($request);
            return \Response()->json(['data' => $starship], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function getStarship(int $id)
    {
        try {
            $vehicle = $this->starshipService->getStarship($id);
            return \Response()->json(['data' => $vehicle], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

    /*public function getStarship(Request $request)
    {
        try {
            $starship = $this->starshipService->getStarship($request);
            return \Response()->json(['data' => $starship], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }*/

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
