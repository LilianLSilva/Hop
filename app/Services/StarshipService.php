<?php

namespace App\Services;

use App\Http\Request\UpdateStarshipRequest;
use App\Models\StarshipInventory;
use App\Repositories\StarshipLocalRepository;
use App\Repositories\StarshipRestRepository;
use Illuminate\Http\Request;

class StarshipService
{
    private $starshipRestRepository;

    private $starshipLocalRepository;

    public function __construct(StarshipRestRepository $starshipRestRepository, StarshipLocalRepository $starshipLocalRepository)
    {
        $this->starshipRestRepository = $starshipRestRepository;
        $this->starshipLocalRepository = $starshipLocalRepository;
    }
    public function all()
    {
        $starships = $this->starshipLocalRepository->all();
        $new_starships =[];
        foreach ($starships as $starship){
            $otraVariable = $this->starshipRestRepository->get($starship->starship_id);
            $otraVariable['count'] = $starship->count;
            array_push($new_starships, $otraVariable);
        }
        return $new_starships;
    }

    /*trae todos los vehiculos o si se busca por el nombre con el parametro search*/

    public function getStarships(Request $request)
    {
        $starships = $this->starshipRestRepository->getStarships($request);
        $new_starships =[];
        foreach ($starships['results'] as $starship){
            $localStarship = $this->starshipLocalRepository->getStarshipByName($starship['name']);
            $starship['count'] = $localStarship->count;
            array_push($new_starships, $starship);
        }
        $starships['results'] = $new_starships;

        return $starships;
    }
    /* busca por nombre el starship*/
    public function getStarship(int $id)
    {
        $starship = $this->starshipLocalRepository->getStarshipId($id);
        $apiStarship = $this->starshipRestRepository->get($starship->starship_id);
        $apiStarship['count'] = $starship->count;
        return $apiStarship;
    }

    public function get(int $id)
    {
        return $this->starshipRepository->get($id);
    }

    public function save(CreateStarshipRequest $request)
    {
        $starship = New StarshipInventory($request->all());
        $this->starshipRepository->save($starship);
        return $starship;
    }

    public function update(UpdateStarshipRequest $request, Starship $starship)
    {
        $starship->fill($request->all());
        $this->starshipRepository->save($starship);
        return $starship;
    }

    public function delete(Starship $starship)
    {
        $this->starshipRepository->delete($starship);
        return $starship;
    }
}
