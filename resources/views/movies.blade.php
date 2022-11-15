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

    .list-container {
      display: flex;
      flex-wrap: wrap;
    }

    .card {
      max-width: 300px;
      margin-top: 20px;
      margin-left: 4px;
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

    <!-- order parameters -->
    <select onchange="changePage(this);">
      @for ($i = 1 ; $i < 11; $i++) <option value="{{$i}}" {{ ( $page == $i ) ? 'selected' : '' }}>Page {{ $i }} </option>
        @endfor
    </select>
    <br>
    Order by:
    <select onchange="changeCriteria(this);">
      <option {{ ( $criteria == 'startYear' ) ? 'selected' : '' }} value="startYear">Release date</option>
      <option {{ ( $criteria == 'averageRating' ) ? 'selected' : '' }} value="averageRating">Audience Rating</option>
    </select>
    <br>
    <input type="radio" id="orderAsc" name="order" value="asc" onclick="changeOrder(this);" {{ ( $order == 'asc' ) ? 'checked' : '' }}>
    <label for="orderAsc">Ascending</label>
    <input type="radio" id="orderDesc" name="order" value="desc" onclick="changeOrder(this);" {{ ( $order == 'desc' ) ? 'checked' : '' }}>
    <label for="orderDesc">Descending</label>
    <br>
    <button onclick="querySortedPages()">Go</button>
    <!-- End parameters -->


    <!-- Movie list -->
    <h4>Displaying movies {{ ($page-1) * 20 + 1}} to {{ $page * 20 }}:</h4>
    <div class="list-container">
      @foreach ($movies as $movie)
      <div class="card">
        <h2>{{$movie->primaryTitle}}</h2>
        <a href="/movies/{{ $movie->id }}">
          <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
        </a>


        <br>
        <b>Release Year:</b> {{ $movie->startYear }}
        <br>
        <b>Duration:</b> {{ $movie->runtimeMinutes }} minutes
        <br>
        <b>Rating:</b> {{ $movie->averageRating }} / 10

        <br>
      </div>

      @endforeach
    </div>

  </div>
</body>

</html>

<script>
  <?php
  echo "var page = $page; var criteria = '$criteria'; var order = '$order'";
  ?>;

  function changePage(pageSelect) {
    page = pageSelect.value;
  }

  function changeCriteria(criteriaSelect) {
    criteria = criteriaSelect.value;
  }

  function changeOrder(orderRadio) {
    order = orderRadio.value;
  }

  function querySortedPages() {
    let query = `/movies?page=${page}&order_by=${criteria}&order=${order}`;
    window.location.replace(`/movies?page=${page}&order_by=${criteria}&order=${order}`);
  }
</script>