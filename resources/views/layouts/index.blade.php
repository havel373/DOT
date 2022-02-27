<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
    <div id="app">
        @include('layouts.header')
        <main class="py-4">
            {{$slot}}
        </main>
    </div>
@include('layouts.js')
@yield('custom_js')
</body>
</html>