<html lang="en">
    <head>
        @include('includes.auth.meta')
        <title>@yield('title') | Meet Doctor</title>

        @stack('before-style')
            @include('includes.auth.style')
        @stack('after-style')
    </head>

    <body>
        @yield('content')
    </body>
</html>
    