<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app"></div>
        <div class="container-fluid">

            <div class="row">

                <div class="col-12 col-lg-2 left-menu rounded-right">
                    @include('admin-view.admin-sidebar')
                </div>
                <div class="col-12 col-lg-10 body-menu">
                    <div class="row">
                        <div class="col-lg-12 navigation-column">
                            @include('admin-view.admin-navbar')
                        </div>

                        <div class="col-lg-12 body-column">
                            <div class="content">
                                <main class="py-4">
                                     @yield('content')
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');
body {
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
}
.container-fluid {
    height: 100vh;
}
.col-lg-2.left-menu {
    min-height: 100vh;
    background-color: #aec6cf;
}

.col-lg-10.body-menu {
    min-height: 80vh;
    background: #FFFFFF;
}
.col-lg-12.navigation-column {
    background-color: #8498B6;
    padding-top: 6px;
    height: 7vh;
}
.col-lg-12.body-column {
    overflow: auto;
    height: 92vh;
}
</style>
