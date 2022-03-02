<?php

namespace App\Services;

use App\Models\StarshipInventory;
use App\Repositories\StarshipLocalRepository;
use App\Repositories\StarshipRestRepository;
use Illuminate\Http\Request;

class StarshipInventoryService
{
    private $starshipRestRepository;

    private $starshipLocalRepository;

    public function __construct(StarshipLocalRepository $starshipLocalRepository, StarshipRestRepository $starshipRestRepository)
    {
        $this->starshipLocalRepository = $starshipLocalRepository;
        $this->starshipRestRepository = $starshipRestRepository;
    }

    public function save(Request $request, int $id)
    {
        $starship = $this->starshipRestRepository->get($id);
        $starshipInventory = new StarshipInventory();
        $starshipInventory->starship_id = $id;
        $starshipInventory->name = $starship['name'];
        $starshipInventory->count = $request['count'];
        $this->starshipLocalRepository->save($starshipInventory);
    }

    public function update(Request $request, int $id)
    {
        $starshipLocal = $this->starshipLocalRepository->getStarshipId($id);
        $starshipLocal->count = $request['count'];
        $this->starshipLocalRepository->save($starshipLocal);
    }

    public function increase(int $id)
    {
        $starshipLocal = $this->starshipLocalRepository->getStarshipId($id);
        $starshipLocal->count = $starshipLocal->count + 1;
        $this->starshipLocalRepository->save($starshipLocal);
    }

    public function decrease(int $id)
    {
        $starshipLocal = $this->starshipLocalRepository->getStarshipId($id);
        $starshipLocal->count = $starshipLocal->count - 1;
        $this->starshipLocalRepository->save($starshipLocal);
    }
}
