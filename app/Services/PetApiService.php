<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Interfaces\PetApiServiceInterface;

class PetApiService implements PetApiServiceInterface
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct($baseUrl, $apiKey)
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * Make a request to the API
     *
     * @param string $endpoint
     * @param array $params
     *
     * @return array
     */
    public function makeRequest(string $endpoint, array $params = []): array
    {
        $cacheKey = $this->generateCacheKey($endpoint, $params);

        return Cache::remember($cacheKey, 3600, function () use ($endpoint, $params) {
            $response = Http::withHeaders(['x-api-key' => $this->apiKey])
                ->get($this->baseUrl . $endpoint, $params);

            if ($response->successful()) {
                return $response->json();
            }

            // Handle potential errors
            $this->handleApiError($response);
        });
    }

    /**
     * Generate a unique cache key for the API request
     *
     * @param string $endpoint
     * @param array $params
     *
     * @return string
     */
    protected function generateCacheKey($endpoint, $params): string
    {
        return 'petapi:' . $endpoint . ':' . md5(json_encode($params));
    }

    /**
     * Handle API errors
     *
     * @param Response $response
     *
     * @return void
     */
    protected function handleApiError(Response $response): void
    {
        Log::error('API Error: ' . $response->body());
        abort($response->status(), 'API Error: ' . $response->body());
    }

    /**
     * Get all breeds from the API.
     *
     * @return array
     */
    public function getAllBreeds(): array
    {
        return [];
    }

    /**
     * Get a specific breed by its ID.
     *
     * @param string $id
     * @return array
     */
    public function getBreedById(string $id): array
    {
        return [];
    }

    /**
     * Get images for a specific breed.
     *
     * @param string $breedId
     * @return array
     */
    public function getBreedImages(string $breedId): array
    {
        return [];
    }

    /**
     * Search for breeds based on a query.
     *
     * @param string $query
     * @return array
     */
    public function searchBreeds(string $query): array
    {
        $queryParams = ['q' => $query];

        $response = Http::get($this->baseUrl . "/breeds/search", $queryParams);

        if ($response->successful()) {
            return $response->json();
        }

        $this->handleApiError($response);
    }
}
