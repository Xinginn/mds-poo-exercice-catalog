<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <style>
    .container {
      margin: auto;
      max-width: 900px;
    }

    .wrapper {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
    }
  </style>
</head>

<body>
  @include('navbar')

  <div class="container">
  <h1>{{ config('app.name') }}</h1>

    <div class="wrapper">

      <div>
        <h2>Random movie:</h2>
        <br>
        <div style="display:flex;flex-direction:column">
          <b>{{ $movie->primaryTitle }}</b>

          <a href="/movies/{{ $movie->id }}">
            <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
          </a>
        </div>
      </div>

    </div>

  </div>
</body>

</html>