<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        @include('main/layouts/head')
    </head>
    <body>
        @include('main/layouts/navbar')

            @section('content')
                @show

        @include('main/layouts/footer')
    </body>
</html>