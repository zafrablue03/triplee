<!DOCTYPE html>
<html lang="en">

@include('partials.frontend.head')

<body id="page-top">

  <!-- Navigation -->
    @include('partials.frontend.navigation')

    <!-- Header -->
    @include('partials.frontend.header')

    {{-- Body --}}
    @yield('content')
    

    @include('partials.frontend.contact-us')

    <!-- Footer -->
    @include('partials.frontend.footer')
    {{-- Modals --}}
    @include('partials.frontend.modals')

    @include('sweetalert::alert')
    {{-- Javascripts --}}
    @include('partials.frontend.javascripts')

</body>

</html>
