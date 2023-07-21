@include('templates.head')
@routes
<div class="main-wrapper">
    @include('templates.nav')
    <div class="container mt-5">
        @yield('content')
    </div>
    @include('templates.footer')
</div>
