<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIAN WAVE | Дводенний фестиваль для поціновувачів аніме та
        косплею, азіатської культури та гік тусовок.</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fixed.css') }}">

    <link rel="stylesheet" href="{{ asset('css/cyberpunk.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div id="app">
        <navigator-section></navigator-section>
        @yield('sections')
    </div>

    <script>
        window.__APP_DATA__ = @json($appData);
    </script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
