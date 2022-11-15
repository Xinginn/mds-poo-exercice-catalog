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
  </style>
</head>

<body>
  @include('navbar')

  <div class="container">

    <div>
      <h2> {{ $movie->primaryTitle }} </h2>
      <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
    </div>
    <br>
    <b>Release Year:</b> {{ $movie->startYear }}
    <br>
    <b>Duration:</b> {{ $movie->runtimeMinutes }} minutes
    <br>
    <b>Rating:</b> {{ $movie->averageRating }} / 10

    <br>

    <div>
      <h4>Synopsis:</h4>
      <p>
        {{ $movie->plot }}
      </p>
    </div>

  </div>
</body>

</html>