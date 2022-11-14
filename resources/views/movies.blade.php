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
  <div class="container">
    <h1>{{ config('app.name') }}</h1>

    <!-- order parameters -->
    <select onchange="changePage(this);">
      @for ($i = 1 ; $i < 11; $i++) 
        <option value="{{$i}}" {{ ( $page == $i ) ? 'selected' : '' }}>Page {{ $i }} </option>
      @endfor
    </select>

    Order by:
    <select onchange="changeCriteria(this);">
      <option {{ ( $criteria == 'startYear' ) ? 'selected' : '' }} value="startYear">Release date</option>
      <option  {{ ( $criteria == 'averageRating' ) ? 'selected' : '' }} value="averageRating">Audience Rating</option>
    </select>

    <input type="radio" id="orderAsc" name="order" value="asc" onclick="changeOrder(this);" {{ ( $order == 'asc' ) ? 'checked' : '' }}>
    <label for="orderAsc">Ascending</label>
    <input type="radio" id="orderDesc" name="order" value="desc" onclick="changeOrder(this);" {{ ( $order == 'desc' ) ? 'checked' : '' }}>
    <label for="orderDesc">Descending</label>

    <button onclick="querySortedPages()">Go</button>


     <!-- movie list -->
    <h4>Displaying films {{ ($page-1) * 20 + 1}} to {{ $page * 20 }}:</h4>
    <?php $i = 1; ?>
    <div class="wrapper">
      @foreach ($movies as $movie)
      <div>
        <?php echo "<h2>#$i</h2>";
        $i++; ?>
        <a href="/movies/{{ $movie->id }}">
          <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
        </a>
      </div>

      @endforeach
    </div>

    <a href="/">Home</a>
  </div>
</body>

</html>

<script>
  <?php 
    echo "var page = $page; var criteria = '$criteria'; var order = '$order'";
  ?>;

  function changePage(pageSelect){
    page = pageSelect.value;
  }

  function changeCriteria(criteriaSelect) {
    criteria = criteriaSelect.value;
  }

  function changeOrder(orderRadio) {
    order = orderRadio.value;
  }

  function querySortedPages(){
    let query = `/movies?page=${page}&order_by=${criteria}&order=${order}`;
    window.location.replace(`/movies?page=${page}&order_by=${criteria}&order=${order}`);
  }
</script>