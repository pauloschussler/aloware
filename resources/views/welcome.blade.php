<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>


<body class="antialiased">

    <div id="navbar">
        <navbar-component />

    </div>

</body>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</html>
