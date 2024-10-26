@extends('layouts.app')

@section('content')
    @if(isset($error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @else
        <div class="container mt-5">
            <div class="row">
            <!-- Main Breed Card -->
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $breed['name'] }}</h2>
                        <div class="breed-image-container mb-3">
                            <img src="{{ $image['url'] }}" class="breed-image" alt="{{ $breed['name'] }}">
                        </div>
                        <p><strong>Temperament:</strong> {{ $breed['temperament'] ?? 'Unknown' }}</p>
                        <p><strong>Life Expectancy:</strong> {{ $breed['life_span'] ?? 'N/A' }}</p>
                        <p><strong>Description:</strong> {{ $breed['description'] ?? 'No description available' }}</p>
                    </div>
                </div>
            </div>

            <!-- Additional Details Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Additional Details</h3>
                        <ul class="list-unstyled">
                            <li><strong>Weight:</strong>
                                Imperial: {{ $breed['weight']['imperial'] ?? 'N/A' }},
                                Metric: {{ $breed['weight']['metric'] ?? 'N/A' }}
                            </li>
                            <li><strong>Origin:</strong> {{ $breed['origin'] ?? 'Unknown' }}</li>
                            <li><strong>Country Code:</strong> {{ $breed['country_code'] ?? 'N/A' }}</li>
                            <li><strong>Indoor:</strong> {{ $breed['indoor'] ? 'Yes' : 'No' }}</li>
                            <li><strong>Adaptability:</strong> {{ $breed['adaptability'] ?? 'N/A' }}/5</li>
                            <li><strong>Affection Level:</strong> {{ $breed['affection_level'] ?? 'N/A' }}/5</li>
                            <li><strong>Child Friendly:</strong> {{ $breed['child_friendly'] ?? 'N/A' }}/5</li>
                            <li><strong>Dog Friendly:</strong> {{ $breed['dog_friendly'] ?? 'N/A' }}/5</li>
                            <li><strong>Energy Level:</strong> {{ $breed['energy_level'] ?? 'N/A' }}/5</li>
                            <li><strong>Grooming:</strong> {{ $breed['grooming'] ?? 'N/A' }}/5</li>
                            <li><strong>Health Issues:</strong> {{ $breed['health_issues'] ?? 'N/A' }}/5</li>
                            <li><strong>Intelligence:</strong> {{ $breed['intelligence'] ?? 'N/A' }}/5</li>
                            <li><strong>Shedding Level:</strong> {{ $breed['shedding_level'] ?? 'N/A' }}/5</li>
                            <li><strong>Social Needs:</strong> {{ $breed['social_needs'] ?? 'N/A' }}/5</li>
                            <li><strong>Stranger Friendly:</strong> {{ $breed['stranger_friendly'] ?? 'N/A' }}/5</li>
                            <li><strong>Vocalisation:</strong> {{ $breed['vocalisation'] ?? 'N/A' }}/5</li>
                            <li><strong>Experimental:</strong> {{ $breed['experimental'] ? 'Yes' : 'No' }}</li>
                            <li><strong>Hairless:</strong> {{ $breed['hairless'] ? 'Yes' : 'No' }}</li>
                            <li><strong>Natural:</strong> {{ $breed['natural'] ? 'Yes' : 'No' }}</li>
                            <li><strong>Rare:</strong> {{ $breed['rare'] ? 'Yes' : 'No' }}</li>
                            <li><strong>Rex:</strong> {{ $breed['rex'] ? 'Yes' : 'No' }}</li>
                            <li><strong>Suppressed Tail:</strong> {{ $breed['suppressed_tail'] ? 'Yes' : 'No' }}</li>
                            <li><strong>Short Legs:</strong> {{ $breed['short_legs'] ? 'Yes' : 'No' }}</li>
                            <li><strong>Hypoallergenic:</strong> {{ $breed['hypoallergenic'] ? 'Yes' : 'No' }}</li>
                        </ul>
                        @if(isset($breed['vetstreet_url']))
                            <a href="{{ $breed['vetstreet_url'] }}" target="_blank" class="btn btn-info me-2">Vetstreet Info</a>
                        @endif
                        @if(isset($breed['wikipedia_url']))
                            <a href="{{ $breed['wikipedia_url'] }}" target="_blank" class="btn btn-info me-2">Wikipedia</a>
                        @endif
                    </div>
                </div>
                </div>
                <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Main List</a>
            </div>
        </div>
    @endif

    <style>
        .breed-image-container {
            width: 100%;
            height: 400px;
            overflow: hidden;
        }
        .breed-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection
