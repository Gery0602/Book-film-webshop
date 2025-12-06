<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Jelszó megváltoztatása</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     @livewireStyles
</head>
<body class="bg-zinc-900">
    {{ $slot }}
    @livewireScripts
</body>
</html>
