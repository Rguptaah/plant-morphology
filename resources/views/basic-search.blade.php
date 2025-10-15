@extends('layouts.frontend.app')

@section('title', 'Basic Search')

@section('content')
<div class="container py-5 my-5" style="background-color:#e8f8f7;">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Basic Search</h2>
        <p class="text-muted">Search plants quickly by name, family, or species.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="basicSearchForm" class="d-flex mb-4" onsubmit="event.preventDefault(); performBasicSearch();">
                <input type="text" class="form-control me-2" id="basicSearchInput" placeholder="Enter plant name, family, or species...">
                <button class="btn btn-success fw-semibold" type="submit">Search</button>
            </form>

            <div id="basicSearchResults" class="list-group">
                <p class="text-muted text-center">Type something above to search.</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const plants = [
        { family: 'Solanaceae', genus: 'Datura', species: 'Datura metel L.' },
        { family: 'Solanaceae', genus: 'Solanum', species: 'Solanum tuberosum L.' },
        { family: 'Fabaceae', genus: 'Pisum', species: 'Pisum sativum L.' },
        { family: 'Rubiaceae', genus: 'Coffea', species: 'Coffea arabica L.' },
        { family: 'Malvaceae', genus: 'Hibiscus', species: 'Hibiscus rosa-sinensis L.' },
    ];

    function performBasicSearch() {
        const query = document.getElementById('basicSearchInput').value.toLowerCase().trim();
        const resultsContainer = document.getElementById('basicSearchResults');
        resultsContainer.innerHTML = '';

        if (!query) {
            resultsContainer.innerHTML = `<p class="text-muted text-center">Please enter a search term.</p>`;
            return;
        }

        const filtered = plants.filter(p =>
            p.family.toLowerCase().includes(query) ||
            p.genus.toLowerCase().includes(query) ||
            p.species.toLowerCase().includes(query)
        );

        if (filtered.length === 0) {
            resultsContainer.innerHTML = `<p class="text-danger text-center">No plants found for "${query}".</p>`;
            return;
        }

        filtered.forEach(p => {
            const item = document.createElement('div');
            item.className = 'list-group-item';
            item.innerHTML = `<strong>${p.species}</strong> <br><small>${p.family} → ${p.genus}</small>`;
            resultsContainer.appendChild(item);
        });
    }
</script>
@endpush
@endsection
