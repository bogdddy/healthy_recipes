@extends('layouts.master')

@section('title')
  Ingredients - List
@endsection

@section('content')

<h1> All Ingredients:</h1>

<div class="tabale-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($ingredients as $ingredient)
        <tr>
          <th scope="row">{{$ingredient->id}}</th>
          <td>{{$ingredient->name}}</td>
          <td>{{$ingredient->description}}</td>
          <td>
            <form action="{{ route('ingredient.destroy',$ingredient->id) }}" method="POST">
              <a class="btn btn-sm btn-outline-primary" href="#"><i class="fa fa-fw fa-edit"></i> Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>


@endsection