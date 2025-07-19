<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>M - {{ $title }}</title>
    {{-- Style --}}
    @include('components.layouts.style')
    @livewireStyles
</head>

<body>
    <div class="page">

        {{-- Sidebar --}}
        @include('components.layouts.sidebar')

        {{-- Navbar --}}
        @include('components.layouts.navbar')

        {{-- Page wrapper --}}
        <div class="page-wrapper">

            {{-- Content --}}
            {{ $slot }}

            {{-- Footer --}}
            @include('components.layouts.footer')
        </div>
    </div>
    {{-- Script --}}
    @include('components.layouts.script')
    @livewireScripts
</body>

</html>
