<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Manager</title>
  @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('books.index') }}">Book Manager</a>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>
</body>

</html>
