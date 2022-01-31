@extends('layouts.master')

@section('title')
  Categories - List
@endsection

@section('content')

<h1> All Categories:</h1>

<ul class="list-group p-5">
  @foreach ($categories as $category)
    <li class="list-group-item ">
        <a href="{{route('category.show',['id'=>$category->id])}}">{{$category->title}}</a>
    </li>
  @endforeach
</ul>

@endsection