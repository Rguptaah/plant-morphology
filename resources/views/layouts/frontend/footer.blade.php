<!-- Footer -->
<footer>
    <div class="container">
        <p class="mb-1">&copy; {{ date('Y') }} PlantMorph. All rights reserved.</p>
        <p class="small">Built with ❤️ using Laravel & Bootstrap 5</p>
        <p>Total Visitors : {{ \App\Models\Visitor::count() }}</p>

    </div>
</footer>