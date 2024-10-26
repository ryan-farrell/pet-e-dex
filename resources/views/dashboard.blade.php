@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        #searchInput {
            padding: 10px 22px;
            border-color: var(--primary-bg-color-dark);
            min-width: 350px;
        }
        .searchInput-icon {
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
        }
        .breeds-container {
            flex: 1;
            overflow-y: auto;
        }
        .breed-link {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }
        .breed-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .breed-link > div {
            background-color: #f8f9fa;
            transition: background-color 0.3s ease;
        }
        .breed-link:hover > div {
            background-color: #e9ecef;
        }
    </style>
@endpush

@section('content')
    <h3 class="typewriter mt-1 mb-4">
        <span id="typewriterText">What pet are you looking for?</span>
    </h3>

    <form action="{{ route('home') }}" method="GET" class="d-flex justify-content-center w-100" style="max-width: 800px;">
        <div class="position-relative w-100">
            <input id="searchInput" class="form-control me-2 rounded-5 form-control-lg" type="search" placeholder="Search" aria-label="Search" name="search">
        <i class="ph ph-magnifying-glass position-absolute searchInput-icon"></i>
        </div>
    </form>

    @if(isset($error))
        <div class="alert alert-danger mt-5" role="alert">
            {{ $error }}
        </div>
    @else
        @if(count($breeds) > 0)
            <div class="container mt-3">
                <h1 class="text-center">Welcome to the Cat Pet-é-dex 🐱</h1>
                <p class="text-center mb-4">Explore the world of cat breeds!</p>

                <div id="breeds-container" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach($breeds as $breed)
                        <div class="col breed-item">
                            <a href="{{ route('pet.show', $breed['id']) }}" class="breed-link">
                                <div class="breed-card p-3 border rounded h-100 d-flex align-items-center justify-content-center">
                                    {{ $breed['name'] }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center mt-5">No breeds found that match your search!</p>
        @endif
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('searchInput').focus();

            const titles = [
                "Looking for a Dog Breed?",
                "Searching for a Cat Breed?",
                "What Dog Breed Fits You?",
                "Find Your Perfect Feline Companion",
                "Explore Cat Breeds by Trait",
                "Discover Rare Dog Breeds",
                "Which Breed is Right for Your Family?",
                "Find Cat Breeds with Unique Traits",
                "Discover Dogs by Size and Temperament"
            ];

            const randomTitle = titles[Math.floor(Math.random() * titles.length)];
            document.getElementById('typewriterText').textContent = randomTitle;
        });
    </script>
@endpush
