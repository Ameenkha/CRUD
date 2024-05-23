<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h4>Register</h4>
        </div>
        <div class="card-body">
          <form action="{{ URL::to('insertRecord') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="fullname">Full Name</label>
              <input type="text" class="form-control" name="fullname" placeholder="Enter your full name">
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="file">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" name="save" value="Save Record" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- table  --}}

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header text-center">
            <h4>User Details</h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Image</th>
                  <th>Delete</th>
                  <th>Update</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $item)
                    
                <!-- Example data row -->
                <tr>
                  <td>{{$item->fullname}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->password}}</td>

                  <td>

                    <img src="{{ URL::asset('uploads/'. $item->picture) }}" alt="User Image" class="img-fluid rounded">

                  </td>

                  <td>

                    <a href="{{URL::to('deleteRecord/'. $item->id)}}">Delete</a>

                  </td>
                  <td>

                    <a href="{{URL::to('updateRecord/'. $item->id)}}">Edit</a>

                  </td>

                </tr>

                @endforeach

                <!-- Add more data rows as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
