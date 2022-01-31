@php
use App\Models\Category;    
@endphp

<!-- Aside  -->
<div class="col-md-4">
    <div class="position-sticky d-flex flex-column align-baseline" style="top: 2rem;">

        <!-- Categories -->
        <div class="p-3">
            <h4 class="fst-italic">Categories</h4>
            <ol class="list-unstyled">
                @foreach (Category::all() as $category)
                    <li><a href=""> {{$category->title}} </a></li>
                @endforeach

            </ol>
        </div>

        <!-- About  -->
        <div class="p-3 mb-2 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <!-- Carousel  -->
        <div class="p-3">
            <h4 class="fst-italic">Carousel</h4>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="data:image/png;base64,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" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cosasdedevs.com/media/sections/images/python.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- end aside  -->
    </div>
</div>