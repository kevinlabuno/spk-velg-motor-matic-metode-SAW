<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPK SAW')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    @include('layout.header')

    <div class="flex">
        @include('layout.sidebar')

        <div id="main-content" class="flex-1 p-6 mt-16 transition-all duration-300 bg-white rounded-tl-lg">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
