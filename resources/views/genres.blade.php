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
  <nav class="navbar">
    <a href="/movies"> Home </a>
    <a href="/movies"> Movies </a>
    <a href="/movies"> Genres </a>
    <a href="/movies"> Series </a>
  </nav>

  <div class="container">
    <h1>{{ config('app.name') }}</h1>

    <!-- Movie list -->
    <h2>Genres:</h2>
    @foreach ($genres as $genre)
    <a href="/movies?genre={{$genre->id}}">{{$genre->label}}</a><br>

    @endforeach
    <!-- End List -->


  </div>
</body>

</html>