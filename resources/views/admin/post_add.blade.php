@extends('admin.dashboard')
@section('admin_content')

    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
        </div>
        <div class="card-body">
            <form action="{{ URL::to('/post/store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <li style="color: red"> {{ $error }}</li>
                    @endforeach
                @endif
                @if (session('status'))
                    <li style="color: red"> {{ session('status') }}</li>
                @endif
                <div class="form-group">
                    <label for="txtTitle">Title</label>
                    <textarea name="txtTitle" id="ckeditor" placeholder="Enter Title" class="form-control"
                            required></textarea>
                </div>
                <div class="form-group">
                    <label for="txtContent">Content</label>
                    <textarea name="txtContent" id="ckeditor1" placeholder="Enter Content" class="form-control"
                            required></textarea>
                </div>
                <div class="form-group">
                    <label for="select2SinglePlaceholder">Posted By</label>
                    <select class="select2-single-placeholder form-control" name="listUser" id="select2SinglePlaceholder">
                        @foreach ($post_all as $key => $value)
                        <option value="">Select</option>
                        <option value="{{$value->id}}">{{$value->name}}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="select2SinglePlaceholder">Status</label>
                    <select class="select2-single-placeholder form-control" name="listStatus">
                        <option value="">Select</option>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image</label>
                        <div class="text-center" id="profile-container">
                            <img style="width: 300px; height: 300px;" id="profileImage" src="{{ asset('image.png') }}"
                                class="rounded mx-auto d-block">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imageUpload" name="imgPost"
                                placeholder="Image Post">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                  </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $("#profileImage").click(function(e) {
                    $("#imageUpload").click();
                });

                function fasterPreview(uploader) {
                    if (uploader.files && uploader.files[0]) {
                        $('#profileImage').attr('src',
                            window.URL.createObjectURL(uploader.files[0]));
                    }
                }

                $("#imageUpload").change(function() {
                    fasterPreview(this);
                });
            </script>
        </div>
    </div>
@endsection
