<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top skin-blue" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::link('admin', 'Book-Keeper', array('class' => 'navbar-brand')) }}
        </div>

        @include('partials.nav')
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                @yield('content')
            </div>
        </div>


    </div>
</div>
@include('partials.footer')

<!-- /.container -->

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->
{{ HTML::script('/js/jquery-2.1.3.min.js')}}
{{ HTML::script('/js/BeatPicker.min.js')}}
{{ HTML::script('/js/Chart.min.js') }}
{{ HTML::script('/js/scripts.js')}}
{{ HTML::script('/js/bootstrap.min.js')}}
{{ HTML::script('/ckeditor/ckeditor.js')}}
{{ HTML::script('/js/select2.full.min.js')}}
</body>
</html>