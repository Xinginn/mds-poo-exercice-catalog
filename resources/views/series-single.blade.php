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

    <a href="/">Home</a>
  </div>
</body>

</html>