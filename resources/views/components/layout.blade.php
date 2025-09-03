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
<body>
  <div class="content-wrapper">
    <x-navbar />
    <main class="hero-section">
      {{ $slot }}
    </main>
  </div>
  @vite(['resources/js/app.js'])
</body>

</html>
