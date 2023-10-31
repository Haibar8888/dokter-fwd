<html lang="en">
    <head>
        @include('includes.frontsite.meta')

        <title>@yield('title') | Meet Doctor</title>

        @stack('before-style')
            @include('includes.frontsite.style')
        @stack('after-style')

    </head>

    <body>
        @include('components.frontsite.header')

        @yield('content')

        @include('components.frontsite.footer')

        @stack('before-scripts')
            @include('includes.frontsite.script')
        @stack('after-scripts')

        {{-- if you have modal --}}
    </body>
</html>