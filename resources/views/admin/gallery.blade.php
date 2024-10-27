<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

        body{
            background-color: #2c4863;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .page-header{
            text-align: center;
        }
        .form-container{
            max-width: 600px;
            background-color: #4c6b8b;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);

            margin: 0 auto;
            padding: 20px;
        }
        .gallery-image {
            height: 200px;
            object-fit: cover;
        }

    </style>

  </head>

  <body>
    {{-- start header --}}
    @include('admin.header')
    {{-- end header --}}

    {{-- start sidebar --}}
    @include('admin.sidebar')
    {{-- end sidebar --}}

    {{-- start body --}}
    <div class="page-content">
        <div class="page-header">
            <div class="container">
                <h1 class="display-4 text-secondary mb-4">Gallery</h1>

                <div class="row">
                    @foreach ($galleries as $gallery)
                        <div class="col-md-4 mb-4 d-flex align-items-stretch">
                            <div class="text-white w-100">
                                <img src="/gallery/{{$gallery->image}}" class="card-img gallery-image" alt="Gallery Image" />
                                <a href="{{url('delete_galleryimg',$gallery->id)}}" class="btn btn-danger w-30 mt-2">Delete Image</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-container mt-4">
                    <form action="{{ url('upload_gallery') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-white" style="font-size: 18px;">Upload Image</label>
                            <input type="file" name="image" class="form-control-file" id="imageUpload" required />
                        </div>
        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-block">Add Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end body --}}

    {{-- footer section --}}
    @include('admin.footer')
  </body>
</html>
