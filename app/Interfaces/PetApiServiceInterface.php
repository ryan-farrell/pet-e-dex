<?php

namespace App\Interfaces;

interface PetApiServiceInterface
{
    /**
     * Get all breeds from the API.
     *
     * @return array
     */
    public function getAllBreeds(): array;

    /**
     * Get a specific breed by its ID.
     *
     * @param string $id
     * @return array
     */
    public function getBreedById(string $id): array;

    /**
     * Search for breeds based on a query.
     *
     * @param string $query
     * @return array
     */
    public function searchBreeds(string $query): array;

    /**
     * Get images for a specific breed.
     *
     * @param string $breedId
     * @return array
     */
    public function getBreedImages(string $breedId): array;
}
