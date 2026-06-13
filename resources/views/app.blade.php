<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" width="50" href="{{ asset('asset_images/feds-logo.png') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/threejs/r125/three.min.js"></script>
        @vite('resources/js/app.js')
        <x-inertia::head />
    </head>
    <body>
        <x-inertia::app />
    </body>
</html>