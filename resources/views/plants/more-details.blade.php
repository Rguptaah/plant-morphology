@extends('layouts.frontend.app')

@section('title', 'Plant More Details')

@section('content')
<div class="container-fluid py-5" style="background-color:#b5e0dc;">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">More details</h2>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 text-center">
                <div class="bg-light p-3 rounded shadow-sm"> <!-- writing-mode: vertical-rl; transform: rotate(180deg); -->
                    <div class="fw-bold mb-3" style="background-color:#6ba8a9; color:white; border-radius:10px;">
                        Datura innoxia Mill.
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary text-start fw-semibold" id="btnHabit">Habit</button>
                        <button class="btn btn-outline-primary text-start fw-semibold" id="btnRoot">Root</button>
                        <button class="btn btn-outline-primary text-start fw-semibold" id="btnStem">Stem</button>
                        <button class="btn btn-outline-primary text-start fw-semibold" id="btnLeaf">Leaf</button>
                        <button class="btn btn-outline-primary text-start fw-semibold" id="btnFlower">Flower</button>
                        <button class="btn btn-outline-primary text-start fw-semibold" id="btnFruit">Fruit</button>
                        <button class="btn btn-outline-primary text-start fw-semibold" id="btnSeed">Seed</button>
                    </div>
                </div>
            </div>

            <!-- Details Area -->
            <div class="col-md-9">
                <div id="detailContent" class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-semibold">
                        Habit - Erect, herb, grey-tomentose
                    </div>
                    <div class="card-body" style="background-color: #eaf8f6;">
                        <p><strong>Plant</strong> related to it or uses</p>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80" 
                                     class="img-fluid rounded shadow-sm" alt="Datura plant image 1">
                            </div>
                            <div class="col-md-6 mb-3">
                                <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80" 
                                     class="img-fluid rounded shadow-sm" alt="Datura plant image 2">
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="#" class="fw-bold text-primary">More Images →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const details = {
        Habit: "Habit - Erect, herb, grey-tomentose",
        Root: "Root - Taproot system, thick and fleshy.",
        Stem: "Stem - Green, erect, hairy and branched.",
        Leaf: "Leaf - Simple, alternate, ovate with entire margins.",
        Flower: "Flower - Large, white, funnel-shaped, fragrant.",
        Fruit: "Fruit - Capsule, spiny, ovoid and green turning brown on maturity.",
        Seed: "Seed - Numerous, kidney-shaped, brownish in color."
    };

    const images = {
        Habit: [
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80",
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80"
        ],
        Root: [
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80",
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80"
        ],
        Stem: [
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80",
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80"
        ],
        Leaf: [
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80",
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80"
        ],
        Flower: [
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80",
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80"
        ],
        Fruit: [
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80",
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80"
        ],
        Seed: [
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80",
            "https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=600&q=80"
        ]
    };

    const buttons = document.querySelectorAll('.btn-outline-primary');
    const content = document.getElementById('detailContent');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const key = button.textContent.trim();
            buttons.forEach(b => b.classList.remove('active'));
            button.classList.add('active');

            content.querySelector('.card-header').textContent = details[key];

            const body = content.querySelector('.card-body');
            body.innerHTML = `
                <p><strong>Plant</strong> related to it or uses</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <img src="${images[key][0]}" class="img-fluid rounded shadow-sm" alt="${key} image 1">
                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="${images[key][1]}" class="img-fluid rounded shadow-sm" alt="${key} image 2">
                    </div>
                </div>
                <div class="text-end">
                    <a href="#" class="fw-bold text-primary">More Images →</a>
                </div>
            `;
        });
    });
});
</script>
@endsection
