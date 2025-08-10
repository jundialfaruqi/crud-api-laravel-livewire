<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Authentication' }} - Laravel Livewire</title>
    {{-- Style --}}
    @include('components.layouts.style')
    @livewireStyles
</head>

<body class="d-flex flex-column">
    <div class="page page-center">
        <div class="container container-normal py-4">
            {{-- Content --}}
            {{ $slot }}
        </div>
    </div>

    {{-- Script --}}
    @include('components.layouts.script')
    @livewireScripts
    @stack('footerScripts')
</body>

</html>
