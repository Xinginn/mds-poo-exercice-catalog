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
  </style>
</head>

<body>
  @include('navbar')
  <div class="container">
    <h1>{{ config('app.name') }}</h1>
    <!-- Episode list -->
    <h2>Episodes for season {{ $season }}:</h2>
    <?php $i = 1; ?>
    @foreach ($episodes as $item)
    <h2>#{{ $i }} {{ $item->primaryTitle }}</h2>
    <a href="/series/{{ $series }}/season/{{ $season }}/episode/{{ $item->id }}">
      <img src="{{ $item->poster }}" alt="{{ $item->primaryTitle }}">
    </a>
    <br>
    <b>Release Year:</b> {{ $item->startYear }}
    <br>
    <b>Duration:</b> {{ $item->runtimeMinutes }} minutes
    <br>
    <b>Rating:</b> {{ $item->averageRating }} / 10
    <?php $i++; ?>
    @endforeach
    <!-- End List -->

    <br>
    <div>
      <a href="/series/{{ $series }}">Back to series description</a>
    </div>

  </div>
</body>

</html>