<?php

namespace App\Http\Controllers;

use App\Services\StarshipInventoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class StarshipInventoryController extends Controller
{
    private $StarshipInventoryService;

    public function __construct(StarshipInventoryService $starshipService)
    {
        $this->starshipInventoryService = $starshipService;
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
            $auto = $this->starshipInventoryService->save($request, $id);
            return \Response()->json(['res' => true, 'message' => 'The Starship Inventory was correctly created'], 200);
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
            $auto = $this->starshipInventoryService->update($request, $id);
            return \Response()->json(['res' => true, 'message' => 'The Starship Inventory was correctly modified'], 200);
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
            $auto = $this->starshipInventoryService->increase($id);
            return \Response()->json(['res' => true, 'message' => 'The Starship Inventory was correctly modified'], 200);
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
            $auto = $this->starshipInventoryService->update($request, $id);
            return \Response()->json(['res' => true, 'message' => 'The Starship Inventory was correctly modified'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);

        }
    }

}
