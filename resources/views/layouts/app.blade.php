<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.20/tailwind.min.css" rel="stylesheet"/> --}}
    <script src="http://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @yield('content')
</body>
</html>
