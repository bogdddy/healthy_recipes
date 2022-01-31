@extends('layouts.master')


@section('title')
	{{ $recipe-> title}}
@endsection

@section('recipe')
<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Recipe",
      "name": "{{$recipe->title}}",
      "image": [
      "https://example.com/photos/1x1/photo.jpg",
      "https://example.com/photos/4x3/photo.jpg",
      "https://example.com/photos/16x9/photo.jpg"
      ],
      "author": {
        "@type": "Person",
        "name": "{{$recipe->user->name}}"
      },
      "datePublished": "2018-03-10",
      "description": "{{$recipe->description}}",
      "prepTime": "PT1M",
      "cookTime": "PT2M",
      "totalTime": "PT3M",
      "keywords": "{{$recipe->title}}",
      "recipeIngredient": [
		@foreach ($ingredients as $ingredient)"{{$ingredient->get_ingredient($ingredient->ingredient_id)}}",
		@endforeach],
      "recipeInstructions": [
	@foreach ($recipe->steps as $step)	{
		"@type": "HowToStep",
		"text": "{{$step->text}}"
		},
	@endforeach]
    }
    </script>
@endsection

@section('content')
	
	<div class="col-8">

		{{-- RECIPE --}}
		<article class="blog-post ">
    	<h2 class="blog-post-title">{{$recipe->title}}</h2>
        <p class="blog-post-meta text-muted"> by {{$recipe->user->name}}</p>
		<div class="d-flex justify-content-center">
			{{-- php artisan storage:link  --}}
			 <img src="{{ asset('storage').'/'.$recipe->image }}" class="img-fluid rounded-start" alt="..."> 
		</div>
		<p class="mt-3">{{$recipe->description}}</p>
	
		{{-- INGREDIENTS --}}
		<div class="row">
			<h4>Ingredients :</h4>
			<hr>

			<div id="ingredients" class="p-3">
				@foreach ($ingredients as $ingredient)
					<h6>{{$ingredient->get_ingredient($ingredient->ingredient_id)}}</h6>
				@endforeach
			</div>
		</div>

		{{-- STEPS --}}
		<div class="row">
			<h4>Steps :</h4>
			<hr>

			<div id="steps" class="p-3">
				@foreach ($recipe->steps as $step)
					<h6><b>{{$step->name}}</b></h6>
					<p class="ml-2">{{$step->text}}</p>
				@endforeach
			</div>
		</div>

		@if(Auth::user() != null)
			<div class="row pt-3 pl-3 m-4">
				<form action ="{{route('comment.create')}}" method="POST">
					@csrf

					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<input type="hidden" name="recipe_id" value="{{$recipe->id}}">
					<label for="comment">What do you think about the recipe?</label><br>
					<textarea id="comment" name="comment" rows="10" cols="100"  placeholder="Leave a comment ..."></textarea>
					<div class="d-flex justify-content-end">
						<button class="btn btn-primary mt-2" type="submit"> Comment </button>
					</div>

				</form>
			</div>
		@endif

        <!-- Comments  -->
		@foreach ($recipe->comments as $comment)
			<div class="card p-3 mt-3">
			<div class="d-flex justify-content-between align-items-center flex-row">
				<div class="user d-flex flex-row align-items-center">
				<span>
					<small class="font-weight-bold text-primary">{{$comment->user->name}}</small>
					<i class="fas fa-user"></i>
					<small class="font-weight-bold">{{$comment->comment}}</small>
				</span>
				</div> 
			</div>
			<div class="action d-flex justify-content-between mt-2 align-items-center">
				<div class="reply px-4">
				@if(Auth::user() != null && Auth::user()->isAdmin())
					<form action="{{route('comment.delete')}}" method="POST">

						@csrf
						@method('delete')

						<input type="hidden" name="comment_id" value="{{$comment->id}}">
						<input type="hidden" name="recipe_id" value="{{$recipe->id}}">

						<input type="submit" class="btn btn-danger" value="Delete">
						<span class="dots"></span>
					</form>
				@endif
				<a><small>Reply</small></a>
				<span class="dots"></span>
				</div>
			</div>
			</div>
		@endforeach

              <!-- end comments  -->
    </article>
	</div>

@endsection