<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Consulto</title>
</head>
<body>
    <header class="bg-secondary p-3">
        <nav class="navbar navbar-light bg-light rounded">
              <a class="navbar-brand" href="/">
                <img src="{{ asset('logo/th.jpeg') }}" height="65" alt="MDB Logo"
                  loading="lazy" />
                  <small>Consulto</small>
              </a>
              <h3> première platforme de consultation en ligne au Maroc</h3>
              <p></p>
          </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-body-tertiary text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2024 Copyright:
          <a class="text-body" href="#">Consulto.ma</a>
        </div>
      </footer>
</body>
</html>

