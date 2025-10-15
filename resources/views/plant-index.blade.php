@extends('layouts.frontend.app')

@section('title', 'Plant Index')

@section('content')
<div class="container py-5 my-5" style="background-color:#91d8d2;">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Plant Index</h2>
        <p class="text-muted">Explore plant families, genus, and species interactively</p>
    </div>

    <div class="row justify-content-center">
        <!-- Family Column -->
        <div class="col-md-3 mb-4">
            <h4 class="fw-bold text-center mb-3">Family List</h4>
            <div id="familyList" class="list-group">
                <button class="list-group-item list-group-item-action family-item fw-semibold"
                    data-family="Malvaceae">Malvaceae</button>
                <button class="list-group-item list-group-item-action family-item fw-semibold"
                    data-family="Rubiaceae">Rubiaceae</button>
                <button class="list-group-item list-group-item-action family-item fw-semibold"
                    data-family="Fabaceae">Fabaceae</button>
                <button class="list-group-item list-group-item-action family-item fw-semibold"
                    data-family="Solanaceae">Solanaceae</button>
            </div>
        </div>

        <!-- Genus Column -->
        <div class="col-md-3 mb-4">
            <h4 class="fw-bold text-center mb-3">Genus</h4>
            <div id="genusList" class="list-group">
                <p class="text-muted text-center">Select a family to view genus</p>
            </div>
        </div>

        <!-- Species Column -->
        <div class="col-md-4 mb-4">
            <h4 class="fw-bold text-center mb-3">Plant Species</h4>
            <div id="speciesList" class="list-group">
                <p class="text-muted text-center">Select a genus to view species</p>
            </div>
        </div>
    </div>
</div>
@stack('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const data = {
            'Solanaceae': {
                'Datura': [
                    { name: 'Datura metel L.', slug: 'datura-metel' },
                    { name: 'Datura stramonium L.', slug: 'datura-stramonium' },
                    { name: 'Datura inoxia P. Miller', slug: 'datura-inoxia' }
                ],
                'Solanum': [
                    { name: 'Solanum melongena L.', slug: 'solanum-melongena' },
                    { name: 'Solanum tuberosum L.', slug: 'solanum-tuberosum' }
                ],
                'Withania': [{ name: 'Withania somnifera L.', slug: 'withania-somnifera' }],
                'Physalis': [{ name: 'Physalis peruviana L.', slug: 'physalis-peruviana' }],
                'Brugmansia': [{ name: 'Brugmansia suaveolens L.', slug: 'brugmansia-suaveolens' }]
            },
            'Malvaceae': {
                'Hibiscus': [
                    { name: 'Hibiscus rosa-sinensis L.', slug: 'hibiscus-rosa-sinensis' },
                    { name: 'Hibiscus cannabinus L.', slug: 'hibiscus-cannabinus' }
                ]
            },
            'Rubiaceae': {
                'Coffea': [
                    { name: 'Coffea arabica L.', slug: 'coffea-arabica' },
                    { name: 'Coffea canephora L.', slug: 'coffea-canephora' }
                ]
            },
            'Fabaceae': {
                'Cicer': [{ name: 'Cicer arietinum L.', slug: 'cicer-arietinum' }],
                'Pisum': [{ name: 'Pisum sativum L.', slug: 'pisum-sativum' }]
            }
        };

        const familyList  = document.getElementById('familyList');
        const genusList   = document.getElementById('genusList');
        const speciesList = document.getElementById('speciesList');

        familyList.addEventListener('click', e => {
            if (e.target.classList.contains('family-item')) {
                const selectedFamily = e.target.dataset.family;
                renderGenus(selectedFamily);
                highlightSelected(familyList, e.target);
                speciesList.innerHTML = `<p class="text-muted text-center">Select a genus to view species</p>`;
            }
        });

        function renderGenus(family) {
            const genusData = data[family];
            genusList.innerHTML = '';
            for (let genus in genusData) {
                const btn = document.createElement('button');
                btn.className = 'list-group-item list-group-item-action genus-item';
                btn.textContent = genus;
                btn.dataset.genus = genus;
                genusList.appendChild(btn);
            }

            genusList.querySelectorAll('.genus-item').forEach(genusBtn => {
                genusBtn.addEventListener('click', e => {
                    highlightSelected(genusList, e.target);
                    renderSpecies(family, e.target.dataset.genus);
                });
            });
        }

        function renderSpecies(family, genus) {
            const species = data[family][genus];
            speciesList.innerHTML = '';
            species.forEach(sp => {
                const link = document.createElement('a');
                link.className = 'list-group-item list-group-item-action';
                link.innerHTML = `<em>${sp.name}</em>`;
                link.href = `/plant/${sp.slug}`;
                speciesList.appendChild(link);
            });
        }

        function highlightSelected(container, selectedItem) {
            container.querySelectorAll('.list-group-item').forEach(el => el.classList.remove('active'));
            selectedItem.classList.add('active');
        }
    });
</script>

@endsection