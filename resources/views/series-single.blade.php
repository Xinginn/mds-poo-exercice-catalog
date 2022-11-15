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

  <div class="container">
    <h1>{{ config('app.name') }}</h1>

    <div>
      <h2> {{ $series->primaryTitle }} </h2>
      <img src="{{ $series->poster }}" alt="{{ $series->primaryTitle }}">
    </div>
    <br>
    <b>Release Year:</b> {{ $series->startYear }}
    <br>
    <b>Duration:</b> {{ $series->runtimeMinutes }} minutes
    <br>
    <b>Rating:</b> {{ $series->averageRating }} / 10

    <br>

    <div>
      <h4>Synopsis:</h4>
      <p>
        {{ $series->plot }}
      </p>
    </div>

  </div>
</body>

</html>