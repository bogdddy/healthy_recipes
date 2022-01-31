<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  @yield('recipe')
  
  <!-- Boostrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  {{--  Font Awesome   --}}
  <script src="https://kit.fontawesome.com/35734be3a5.js" crossorigin="anonymous"></script>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>

  @include('layouts.navbar')

    <!-- Main  -->
    <main class="container">
    <div class="container-fluid border-top">
      <div class="row d-flex justify-content-center mt-3">

        <!-- Recipes  -->

          @yield('content')
          
        <!-- end recipes  -->

       

        <!-- end main  -->
      </div>
    </div>


@include('layouts.footer')

  <!-- Boostrap JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>

</body>

</html>