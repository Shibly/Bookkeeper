<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Add custom CSS here -->
      {{ HTML::style('css/bootstrap.min.css') }}
      {{ HTML::style('css/font-awesome.css')}}

      <!-- Add custom CSS here -->
      {{ HTML::style('css/style.css') }}


  </head>

  <body class="bg-black">
    
    @yield('content')
    


  </body>
</html>