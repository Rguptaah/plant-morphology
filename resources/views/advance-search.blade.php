@extends('layouts.frontend.app')

@section('title', 'Advanced Search')

@section('content')
<div class="container py-5 my-5" style="background-color:#dff7f3;">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Advanced Search</h2>
        <p class="text-muted">Refine your plant search with detailed filters.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <form id="advancedSearchForm" class="row g-3" onsubmit="event.preventDefault(); performAdvancedSearch();">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Family</label>
                    <select class="form-select" id="familyFilter">
                        <option value="">-- Select Family --</option>
                        <option value="Solanaceae">Solanaceae</option>
                        <option value="Malvaceae">Malvaceae</option>
                        <option value="Fabaceae">Fabaceae</option>
                        <option value="Rubiaceae">Rubiaceae</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Genus</label>
                    <input type="text" class="form-control" id="genusFilter" placeholder="Enter Genus">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Species</label>
                    <input type="text" class="form-control" id="speciesFilter" placeholder="Enter Species">
                </div>

                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary px-4 fw-semibold">Search</button>
                    <button type="reset" class="btn btn-outline-secondary ms-2" onclick="resetAdvancedSearch()">Clear</button>
                </div>
            </form>

            <hr class="my-4">

            <div id="advancedSearchResults" class="list-group">
                <p class="text-muted text-center">Use filters above and click search to see results.</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const plantDatabase = [
        { family: 'Solanaceae', genus: 'Solanum', species: 'Solanum melongena L.' },
        { family: 'Solanaceae', genus: 'Datura', species: 'Datura metel L.' },
        { family: 'Malvaceae', genus: 'Hibiscus', species: 'Hibiscus rosa-sinensis L.' },
        { family: 'Fabaceae', genus: 'Cicer', species: 'Cicer arietinum L.' },
        { family: 'Rubiaceae', genus: 'Coffea', species: 'Coffea arabica L.' },
    ];

    function performAdvancedSearch() {
        const family = document.getElementById('familyFilter').value.toLowerCase();
        const genus = document.getElementById('genusFilter').value.toLowerCase();
        const species = document.getElementById('speciesFilter').value.toLowerCase();
        const resultsContainer = document.getElementById('advancedSearchResults');

        const results = plantDatabase.filter(p =>
            (!family || p.family.toLowerCase().includes(family)) &&
            (!genus || p.genus.toLowerCase().includes(genus)) &&
            (!species || p.species.toLowerCase().includes(species))
        );

        resultsContainer.innerHTML = '';

        if (results.length === 0) {
            resultsContainer.innerHTML = `<p class="text-danger text-center">No matches found.</p>`;
            return;
        }

        results.forEach(p => {
            const item = document.createElement('div');
            item.className = 'list-group-item';
            item.innerHTML = `<strong>${p.species}</strong> <br><small>${p.family} → ${p.genus}</small>`;
            resultsContainer.appendChild(item);
        });
    }

    function resetAdvancedSearch() {
        document.getElementById('advancedSearchResults').innerHTML =
            `<p class="text-muted text-center">Use filters above and click search to see results.</p>`;
    }
</script>
@endpush
@endsection
