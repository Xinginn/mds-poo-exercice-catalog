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

    .navbar {
      display: flex;
      padding-bottom: 1em;
    }

    .navbar a {
      width: 75px;
      height: 38px;
      color: white;
      font-size: larger;
      background-color: darkblue;
      border: solid 1px white;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <a href="/"> Home </a>
    <a href="/movies"> Movies </a>
    <a href="/genres"> Genres </a>
    <a href="/series"> Series </a>
  </nav>

  <div class="container">
    <h1>{{ config('app.name') }}</h1>

    <div>
      <h2> {{ $episode->primaryTitle }} </h2>
      <img src="{{ $episode->poster }}" alt="{{ $episode->primaryTitle }}">
    </div>
    <br>
    <b>Release Year:</b> {{ $episode->startYear }}
    <br>
    <b>Duration:</b> {{ $episode->runtimeMinutes }} minutes
    <br>
    <b>Rating:</b> {{ $episode->averageRating }} / 10

    <br>

    <div>
      <h4>Synopsis:</h4>
      <p>
        {{ $episode->plot }}
      </p>
    </div>

    <br>
    <div>
      <a href="/series/{{ $episode->series_id }}/season/{{ $episode->seasonNumber }}">Back to episode list</a>
    </div>
  </div>
</body>

</html>