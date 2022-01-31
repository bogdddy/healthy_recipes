@php
    use App\Models\Category;
@endphp

<!-- NAVBAR  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger ">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand d-flex align-items-center border border-light rounded p-3" href="{{route('recipe.index')}}">
        <em class="fas fa-seedling m-2"></em> Helthy Recipes
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('recipe.index')}}">Home</a>
          </li>

          {{-- Categories list --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              All Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('category.index')}}">All Categories</a></li>
              @foreach (Category::all() as $category)
                  <li><a class="dropdown-item" href="{{route('category.show',['id'=>$category->id])}}">{{$category->title}}</a></li>
              @endforeach  
            </ul>
          </li>
          
          @if(Auth::user() != null)
          {{-- Recipes MENU --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Recipes Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('recipe.index')}}">Recipe List</a></li>
                <li><a class="dropdown-item" href="{{route('recipe.create')}}">Create Recipe</a></li>
            </ul>
          </li>

          {{-- Ingredients MENU --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Ingredients Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('ingredient.index')}}">Ingredient List</a></li>
                <li><a class="dropdown-item" href="{{route('ingredient.create')}}">Create Ingredient</a></li>
            </ul>
          </li>
          @endif

          <li class="nav-item">
            <form class="d-flex">
              <input class="form-control me-2 ml-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
          </li>
        
        </ul>

        {{-- Login & Register buttons --}}
        @if(Auth::user() == null)
            <a href="{{route('login')}}" class="btn btn-outline-light m-2">Login</a>
            <button class="btn btn-outline-light" type="submit">Register</button>
        @endif

        {{-- Dashboard --}}
        @if(Auth::user() != null)
            <a href="{{route('dashboard')}}" class="btn btn-outline-light m-2"><i class="fas fa-user"></i></a>
        @endif

      </div>
    </div>
  </nav>