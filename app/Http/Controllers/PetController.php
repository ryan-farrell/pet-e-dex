<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\CatApiService;
use Illuminate\Support\Facades\Log;

class PetController extends Controller
{
    public function __construct(protected CatApiService $petService)
    {
        $this->petService = $petService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        try {
            $breeds = $this->petService->getBreedList();

            // Lets check for a search parameter
            if ($request->has('search') && !empty($request->get('search'))) {
                $search = $request->get('search');
                $breeds = $this->petService->searchBreeds($search);
            }


            return view('dashboard', compact('breeds'));
        } catch (Exception $e) {
            Log::error('Error fetching breeds: ' . $e->getMessage());
            $errorMessage = 'API Error: ' . $e->getMessage();

            return view('dashboard', ['breeds' => [], 'error' => $errorMessage]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $breedId
     * @return View
     */
    public function show($breedId): View
    {
        try {
            $breed = $this->petService->getBreedDetails($breedId);
            $response = $this->petService->getBreedImage($breedId);
            $image = $response[0];

            return view('pet.show', compact('breed', 'image'));
        } catch (Exception $e) {
            Log::error('Error fetching breed details: ' . $e->getMessage());
            $errorMessage = 'API Error: ' . $e->getMessage();

            return view('pet.show', ['breed' => [], 'image' => [], 'error' => $errorMessage]);
        }
    }
}
