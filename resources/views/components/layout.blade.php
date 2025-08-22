<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/image/logo.png" type="image/x-icon">
    @vite(['resources/css/app.css'])
    <title>THE GATES</title>
</head>
<body class="bg-cover bg-center text-white" style="background-image: url('/image/sfondo.jpg'); min-height: 100vh;">
    <x-navbar />
    <main class="container py-2">
        {{ $slot }}
    </main>
    @vite(['resources/js/app.js'])
</body>
</html>
