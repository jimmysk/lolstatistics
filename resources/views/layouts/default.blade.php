<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('head_content')
</head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <div id="main" class="row">

            @yield('content')

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>
<!--     <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
	@yield('scripts')

</div>
</body>
</html>
