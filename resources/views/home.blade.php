@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl mt-12 bg-white shadow-lg rounded-xl p-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-purple-700 mb-2">
            Developing Image-Based Taxonomical Database of Plants Used in Ayurveda
        </h1>
        <h2 class="text-xl font-semibold text-gray-700">
            Joint Initiative by Ministry of AYUSH & C-DAC, Pune
        </h2>
    </div>
    <div class="mb-7">
        <h3 class="text-lg text-gray-800 font-semibold mb-3">About the Webpage</h3>
        <p class="mb-2 text-gray-600">
            Ayurveda is an ancient system of medicine practiced in India, mainly plant-based. Correct identification and differentiation of similar-looking plants is challenging. This webpage eases morphological and microscopic identification of medicinal plants used in Ayurveda.
        </p>
        <p class="text-gray-600">
            The portal helps ayurveda practitioners, botanists, researchers, students, and the public identify and verify medicinal plants at their fingertips.
        </p>
        <p class="text-sm text-gray-500 italic mt-2">
            We welcome suggestions from researchers in academia and industry for future improvements.
        </p>
    </div>
    <div class="mb-4">
        <h3 class="text-md font-semibold text-gray-900 mb-2">Investigators</h3>
        <ul class="list-disc list-inside text-gray-700">
            <li>Investigator: <strong>Dr. Rasika Kolhe</strong></li>
            <li>Co-Investigator: <strong>Dr. Arun M. Gurav</strong></li>
            <li>Assistant: <strong>Mrs. Archana Mhase</strong></li>
        </ul>
    </div>
    <div class="mb-6">
        <h3 class="text-md font-semibold text-gray-900 mb-2">Main Objectives</h3>
        <ul class="list-disc ml-4 text-gray-700 space-y-1">
            <li>High-quality digital images with diagnostic characters</li>
            <li>Updated nomenclature and synonyms</li>
            <li>Taxonomical description</li>
            <li>Etymology of botanical names</li>
            <li>Comparison between similar/confusing plants</li>
            <li>Identification keys for medicinal plants</li>
        </ul>
    </div>
    <div class="flex gap-3 justify-center mt-6">
        <a href="{{ route('login') }}"
           class="bg-purple-700 hover:bg-purple-800 text-white font-semibold py-2 px-6 rounded-lg shadow">
            Login
        </a>
        <a href="{{ route('register') }}"
           class="bg-white border border-purple-700 text-purple-800 font-medium py-2 px-6 rounded-lg hover:bg-purple-50 shadow">
            Register
        </a>
    </div>
</div>
@endsection
