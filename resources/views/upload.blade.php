<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload an Image</h2>

        <!-- Image Upload Form -->
        <form action="{{route('image.upload')}}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <div class="row g-2 align-items-center">
                <div class="col-md-10">
                    <input type="file" name="image" class="form-control" required>                    
                </div>                
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Upload Image</button>
                </div>
                <div class="col-md-10">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('error') !!}</li>
                        </ul>
                    </div>
                @endif
                </div>

            </div>
        </form>
        <!-- Uploaded Images Table -->
        <h3 class="text-center">Uploaded Images Will Be Shown Here</h3>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image Preview</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td><img src="{{asset('images/'.$image->filepath)}}" alt="Image" class="img-thumbnail" width="100"></td>
                </tr>
                @endforeach                
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 5 JS CDN (for any JavaScript functionality, e.g., modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
