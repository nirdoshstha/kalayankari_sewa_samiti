<!DOCTYPE html>
<html lang="en">

@include('frontend.includes.header')


<body>
   @include('frontend.includes.navbar')
    <main>
    @if(Request::is('/'))
        @include('frontend.includes.slider')
    @endif
        @yield('content')
        
    </main>
    @include('frontend.includes.footer')
    @include('frontend.includes.scripts')
</body>

</html>