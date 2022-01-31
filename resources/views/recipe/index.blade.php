@extends('layouts.master')

@section('title')
  Recipes- List
@endsection

@section('content')

<h2> Our last recipes </h2>

@for ($i = 0; $i < 9 && $i +3 <= count($recipes); $i+=3)

<div class="card-group row">

    <div class="card m-2 ">
      <img src="{{ asset('storage').'/'.$recipes[$i]->image }}" class="card-img-top mh-50" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$recipes[$i]->title}}</h5>
        <p class="card-text">{{$recipes[$i]->description}}</p>
        <p class="card-text"><small class="text-muted">Posted by: {{$recipes[$i]->user->name}}</small></p>
        <div class="d-flex justify-content-end">
          <a href="{{route('recipe.show',['id'=>$recipes[$i]->id])}}">
            <button class="btn btn-outline-danger">Read more</button>
          </a>
        </div>
      </div>
    </div>
    <div class="card m-2">
      <img src="{{ asset('storage').'/'.$recipes[$i+1]->image }}" class="card-img-top mh-25" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$recipes[$i+1]->title}}</h5>
        <p class="card-text">{{$recipes[$i+1]->description}}</p>
        <p class="card-text"><small class="text-muted">Posted by: {{$recipes[$i+1]->user->name}}</small></p>
        <div class="d-flex justify-content-end">
          <a href="{{route('recipe.show',['id'=>$recipes[$i+1]->id])}}">
            <button class="btn btn-outline-danger">Read more</button>
          </a>
        </div>
      </div>
    </div>
    <div class="card m-2">
      <img src="{{ asset('storage').'/'.$recipes[$i+2]->image }}" class="card-img-top mh-25" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$recipes[$i+2]->title}}</h5>
        <p class="card-text">{{$recipes[$i+2]->description}}</p>
        <p class="card-text"><small class="text-muted">Posted by: {{$recipes[$i+2]->user->name}}</small></p>
        <div class="d-flex justify-content-end">
          <a href="{{route('recipe.show',['id'=>$recipes[$i+2]->id])}}">
            <button class="btn btn-outline-danger">Read more</button>
          </a>
        </div>
      </div>
    </div>

  </div>
  <hr>

@endfor


            

@endsection