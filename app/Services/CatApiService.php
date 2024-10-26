<?php

namespace App\Services;

use App\Services\PetApiService;
use Illuminate\Support\Facades\Http;

class CatApiService extends PetApiService
{
    public function __construct()
    {
        parent::__construct(
            config('services.petapi.catapi.base_url'),
            config('services.petapi.catapi.api_key')
        );
    }

    /**
     * Get the list of all cat breeds
     *
     * @return array
     */
    public function getBreedList(): array
    {
        return $this->makeRequest('/breeds');
    }

    /**
     * Get the details of a specific cat breed
     *
     * @param string $breedId
     * @return array
     */
    public function getBreedDetails(string $breedId): array
    {
        return $this->makeRequest("/breeds/{$breedId}");
    }

    /**
     * Get the image of a specific cat breed
     *
     * @param string $breedId
     * @return array
     */
    public function getBreedImage(string $breedId): array
    {
        return $this->makeRequest("/images/search?breed_ids={$breedId}");
    }
}
