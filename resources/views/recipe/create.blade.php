@extends('layouts.master')

@section('title')
   Recipes - Create
@endsection


@section('content')
    
    <h1>Create Recipe</h1>

    <form action="{{route('recipe.store')}}" method="post" enctype="multipart/form-data" onsubmit="return getSteps()">
        
        @csrf
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <input type="hidden" name="steps" id="steps">

        <div class="form-group m-3">
            <label for="title">Recipe Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Recipe Title">
        </div>
        <div class="form-group m-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Image">
        </div>
        <div class="form-group m-3">
            <label for="description">Recipe Description</label>
            <input type="textarea" class="form-control" id="description" name="description" placeholder="Recipe description">
        </div>
        <div class="form-group m-3">
            <label for="category">Example select</label>
            <select class="form-control" id="category" name="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        @foreach ($ingredients as $ingredient)
        <div class="form-check form-check-inline m-3">
            <input class="form-check-input" type="checkbox" id="{{$ingredient->id}}" name="ingredients[]" value="{{$ingredient->id}}">
            <label class="form-check-label" for="{{$ingredient->id}}">{{$ingredient->name}}</label>
          </div>  
        @endforeach
          
        <hr>

        <h3 class="m-3">Recipe Steps</h3>
        <div class="form-group m-3">
            <input type="button" id="add-step" class="btn btn-outline-primary p-1" value="Add Step">
        </div>
        <div class="form-group p-3" id="steps-div">
            <label for="step1">Step 1</label>
            <input type="text" class="form-control" id="step1">
        </div>
        <div class="form-group m-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary m-3" id="submit">Create Recpipe</button>
        </div>


    </form>

<script>

    // add step button
    let i = 2;
    $('#add-step').click( () => {

        $('#steps-div').append(
            `
            <label class="mt-3" for="step${i}">Step ${i}</label>
            <input type="text" class="form-control" id="step${i}">
            `
        );
        
        i++;

    })

    function getSteps() {

         // place all steps into "steps" field
        let steps  = $("#steps-div").children();
        console.log(steps)
        let all_steps = [];

        for (const step of steps){
            if (step.nodeName == "INPUT"){
                console.log(step)

                all_steps.push(
                    {
                        "@type": "HowToStep",
                        "name" : step.id,
                        "text" : step.value,
                    }
                )

            }
        }

        $("#steps").val(JSON.stringify(all_steps));
        console.log(JSON.stringify(all_steps));
        
        return true;

    }


</script>
@endsection