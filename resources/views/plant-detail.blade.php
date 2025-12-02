@extends('layouts.frontend.app')

@section('title', $plant->species ?? 'Plant Details')

@section('content')
<div class="container py-5 my-5" style="background-color:#c7e9e4;">
    <div class="text-center mb-4">
        <h1 class="fw-bold fst-italic">{{ $plant->species ?? 'Datura innoxia Mill.' }}</h1>
    </div>

    <div class="row justify-content-center align-items-start">
        <!-- Left Section: Image -->
        <div class="col-md-5 text-center mb-4">
            <img src="{{ $plant->image ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Sacred_datura_%28Datura_wrightii%29_%2814212557338%29.jpg/250px-Sacred_datura_%28Datura_wrightii%29_%2814212557338%29.jpg' }}" 
                 alt="{{ $plant->species ?? 'Plant Image' }}" 
                 class="img-fluid rounded shadow"
                 style="max-height:400px; object-fit:cover;">
        </div>

        <!-- Right Section: Classification -->
        <div class="col-md-5">
            <div class="card border-0 bg-transparent">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Classification:</h5>
                    <p><strong>Family:</strong> {{ $plant->family ?? 'Solanaceae' }}</p>
                    <p><strong>Genus:</strong> {{ $plant->genus ?? 'Datura' }}</p>
                    <p><strong>Species:</strong> <em>{{ $plant->species ?? 'Datura innoxia Mill.' }}</em></p>

                    <hr>

                    <h5 class="fw-bold mb-3">Sanskrit Name:</h5>
                    <p class="fst-italic">{{ $plant->sanskrit_name ?? 'Dhattura' }}</p>

                    <hr>

                    <h5 class="fw-bold mb-3">Synonyms:</h5>
                    <p>{!! $plant->synonyms ?? '<em>Datura velutinosa</em> V.R. Fuentes in Revista Jard. Bot. Nac. Univ. Habana 1: 53 (1980 publ. 1981)' !!}</p>

                    <hr>

                    <h5 class="fw-bold mb-3">Etymology:</h5>
                    <p>{!! $plant->etymology ?? '<strong>Datura</strong> – vernacular East Indian name<br><strong>innoxia</strong> – harmless, not having prickles' !!}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- View More Details Button -->
    <div class="text-center mt-4">
        <a href="{{ route('plants.more-details') }}" class="btn btn-primary fw-semibold">
            View More Details
        </a>
    </div>
</div>
@endsection
