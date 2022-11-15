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
      max-width: 1000px;
    }

    .results-container {
      display: flex;
      flex-wrap: wrap;
    }

    .result {
      display: flex;
      flex-direction: column;
      width: 200px;
      margin-top: 2rem;
      margin-right: 1rem;
    }

    img {
      max-width: 200px;
      max-height: 250px;
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>{{ config('app.name') }}</h1>

    <!-- Search result -->
    <h2>Search results for '{{ $query }}':</h2>

    <h3>Movies:</h3>
    <div class="results-container">
      @foreach ($movies as $result)
      <div class="result">
        <a href="/movies/{{ $result->id }}">
          <img src="{{ $result->poster }}" alt="{{ $result->primaryTitle }}">
        </a>
        <b>{{$result->primaryTitle}}</b>

      </div>
      @endforeach
    </div>
    <hr>
    <h3>Series:</h3>
    @foreach ($series as $result)
    <div class="results-container">
      <a href="/series/{{ $result->id }}">
        <img src="{{ $result->poster }}" alt="{{ $result->primaryTitle }}">
      </a>
      <b>{{$result->primaryTitle}}</b>

      <br>
    </div>
    @endforeach


  </div>
</body>

</html>