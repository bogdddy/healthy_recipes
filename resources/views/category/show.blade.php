@extends('layouts.master')

@section('title')
  Categories - Show
@endsection

@section('content')

  <div class="col-8">
    <h1 class="m-3 mb-5"> {{$category->title}} recipes: </h1>

    @foreach ($recipes as $recipe)
  
      <div class="card m-2">
        <img src="{{ asset('storage').'/'.$recipe->image }}" class="card-img-top mh-25" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$recipe->title}}</h5>
          <p class="card-text">{{$recipe->description}}</p>
          <p class="card-text"><small class="text-muted">{{$recipe->user->name}}</small></p>
          <div class="d-flex justify-content-end">
            <a href="{{route('recipe.show',['id'=>$recipe->id])}}">
              <button class="btn btn-outline-danger">Read more</button>
            </a>
          </div>
        </div>
      </div>
  
      <hr>
    @endforeach
  </div>
  

@endsection


		{{-- <div class="mb-3">
            <div class="row g-0">
              <div class="col-md-4 d-flex align-items-center">
                 php artisan storage:link 
                <img
                  src="{{ asset('storage').'/'.$recipe->image }}"
                  class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $recipe-> title}}</h5>
                  <p class="card-text"> {{ $recipe-> description}}</p>
                  <div class="d-flex flex-row justify-content-around">
                    <p class="card-text pt-2"><small class="text-muted">Posted by {{ $recipe -> user -> name}}</small></p>
                    <a href="{{route('recipe.show',['id'=>$recipe->id])}}"><button class="btn btn-primary">Read More</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>    
      --}}