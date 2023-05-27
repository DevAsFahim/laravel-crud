<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

  <div class="container py-5">
    <a href="{{ url('/add-data') }}" class="btn btn-primary mb-3">Add Data</a>
    
  @if (Session::has('msg'))
      <p class="alert alert-success">{{ Session::get('msg') }}</p>
  @endif

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($showData as $key => $data)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->email }}</td>
          <td>
            <a href="{{ url('edit-data/'. $data->id) }}" class="btn btn-sm btn-success">Edit</a>
            <a href="{{ url('delete-data/'. $data->id) }}" onclick="return confirm('Are you sure to delete this data')" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $showData->links() }}
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>