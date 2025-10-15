@extends('layouts.frontend.app')

@section('title', 'Help & FAQ')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Explore the World of Plant Morphology 🌿</h1>
        <p>Discover, classify, and learn about plant structures in a modern interactive way.</p>
        <a href="{{ route('plants.index') }}" class="btn btn-light btn-lg mt-4">Start Exploring</a>
    </div>
</section>

<!-- Features / Cards Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-success">What You Can Do</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=900&q=80" class="card-img-top" alt="Search Plants">
                    <div class="card-body text-center">
                        <h5 class="card-title">Search Plant Details</h5>
                        <p class="card-text text-muted">Use Basic or Advanced Search to find morphological details of thousands of species.</p>
                        <a href="javscript:void(0);" class="btn btn-success">Search Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=900&q=80" class="card-img-top" alt="Plant Index">
                    <div class="card-body text-center">
                        <h5 class="card-title">Browse Plant Index</h5>
                        <p class="card-text text-muted">Explore the full plant index organized by family, genus, and characteristics.</p>
                        <a href="" class="btn btn-success">View Index</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="https://plus.unsplash.com/premium_vector-1727472340506-9125a8b42b24?q=80&w=1060&auto=format&fit=crop" class="card-img-top" alt="Register">
                    <div class="card-body text-center">
                        <h5 class="card-title">Join the Community</h5>
                        <p class="card-text text-muted">Register to contribute, save searches, and collaborate with plant researchers.</p>
                        <a href="#" class="btn btn-success">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection