<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- //Bootstrap cdn linki -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <h1>Categories</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Color</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody>

        @foreach($categories as $category)

        <tr>
          <th scope="row">{{ $category->id }}</th>
          <td>{{ $category->name }}</td>
          <td>{{ $category->color }}</td>
          <td>{{ $category->description }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>



  <!-- //bundle js dosyasını bootstrap için ekledik -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>