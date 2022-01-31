@extends('layouts.master')

@section('title')
   Ingredients - Create
@endsection


@section('content')
    
    <h1>Create Ingredient</h1>

    <form action="{{route('ingredient.store')}}" method="post" enctype="multipart/form-data" onsubmit="return getSteps()">
        
        @csrf
        <input type="hidden" name="user" value="{{Auth::user()->id}}">

        <div class="form-group m-3">
            <label for="name">Ingredient Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ingredient Name">
        </div>
        <div class="form-group m-3">
            <label for="name">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Ingredient Description">
        </div>

        <div class="form-group m-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary m-3" id="submit">Create Ingredient</button>
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